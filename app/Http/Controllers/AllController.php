<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\General;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Stripe\Checkout\Session as StripSession;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session as ProjectSession;

class AllController extends Controller
{
    public function __construct() {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (auth()->user()->usertype != 0) {
                abort(404, 'Page Not Found!!!');
            }
            return $next($request);
        });
    }

    function index() {
        if (ProjectSession::has('referer_url')) {
            $messages = ['title' => 'Data Saved!!', 'detail' => 'Payment You Proceed has been Cancelled. Please Try Again.'];
            Session()->flash('alert-danger', $messages);
        }
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();

        // $plans = DB::table('products')->where('user_id', Auth::id())->get();
        $plans = DB::table('products')
            ->join('categories', 'products.cate_id', '=', 'categories.id')
            ->where('products.user_id', Auth::id())
            ->where('pro_status', 'Published')
            ->where('status', 1)
            ->select(
                'products.*',
                'categories.cate_name as category_name'
            )
            ->orderBy('id', 'DESC')
            ->get();
        $data = DB::table('subscriptions')
            ->where('useer_id', Auth::id())
            ->orderByDesc('id')
            ->first();

        // dd($data);
        // if (empty($plans->count())) {
        //     return redirect('list-management?label=horse');
        // }
        // $plan = DB::table('plans')
        //     ->where('user_id', auth()->id())
        //     ->where('status', 1)
        //     ->first();

        if (!$data) {
            return redirect('list-management?label=horse');
        }
        return view('admin.horse-listing', compact('username', 'data', 'usertype', 'plans' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
    }

    function reals() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $plans = DB::table('realstates')->where('user_id', Auth::id())->get();
        $data = DB::table('subscriptions')
            ->where('useer_id', Auth::id())
            ->orderByDesc('id')
            ->first();
        if (!$data) {
            return redirect('list-management?label=realestates');
        }
        return view('admin.realstate-listing', compact('username', 'data', 'usertype', 'plans' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
    }
    function ser() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $plans = DB::table('services')->where('user_id', Auth::id())->get();
        $data = DB::table('subscriptions')
            ->where('useer_id', Auth::id())
            ->orderByDesc('id')
            ->first();
        if (!$data) {
            return redirect('list-management?label=services');
        }
        return view('admin.service-listing', compact('username', 'data', 'usertype', 'plans' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
    }

    function payment($id) {
        if (!Auth::check()) {
            return redirect()->back()->with(    'error', 'Please Login to Subscribe Package.');
        }
        $plan = DB::table('plans')->where('id', Crypt::decrypt($id))->first();
        $user = Auth::user();
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $customer = Customer::create([
            'email' => $user->email,
            'name' => $user->name,
        ]);
        session(['referer_url' => url()->previous()]);
        // 2. Create Checkout Session
        $session = StripSession::create([
            'payment_method_types' => ['card'],
            'customer' => $customer->id,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $plan->name,
                    ],
                    'unit_amount' => $plan->price * 100, // $10.00 in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.sucess') . '?session_id={CHECKOUT_SESSION_ID}',
            // 'success_url' => route('subscription.page.stripe.webhook') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
                // 👇 Pass all user data as metadata (Stripe will send it to webhook)
            'metadata' => [
                'plan_id' => $plan->id,
                'payment_type' => 'Stripe',
            ],
        ]);
        return redirect($session->url);
        // return response()->json(['url' => $session->url]);
    }
    function cancel() {
        $messages = ['title' => 'Data Saved!!', 'detail' => 'Payment You Proceed has been Cancelled. Please Try Again.'];
        Session()->flash('alert-danger', $messages);
        ProjectSession::forget('referer_url');
        // return "Cancel";
        return redirect('list-management');
    }
    function sucess(Request $request) {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {
            $session = StripSession::retrieve($request->query('session_id'));
            if ($session->payment_status !== 'paid') {
                return redirect()->route('login')->with('error', 'Payment not completed.');
            }
            $meta = $session->metadata;

            $plan = DB::table('plans')->where('id', $meta->plan_id)->first();
            DB::transaction(function () use ($plan) {

                // 1️⃣ Insert into subscriptions table
                $subscriptionId = DB::table('subscriptions')->insertGetId([
                    'useer_id'        => Auth::id(),
                    'package_name'  => $plan->name,
                    'package_price' => $plan->price,
                    'package_usage' => $plan->quantity,
                    'purchased_at'  => now(),
                    'payment_type'  => $meta->payment_type ?? 'Credit',
                    'pacakge_status'  => 'Active', // Active ya Expired
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);

                // 2️⃣ Insert into subscribed table
                DB::table('subscribed')->insert([
                    'subscription_id'   =>      $subscriptionId,
                    'remaining_token'   =>      $plan->quantity,
                    'created_at'        =>      now(),
                    'updated_at'        =>      now(),
                ]);
            });
            ProjectSession::forget('referer_url');
            // return "Success";
            $messages = ['title' => 'Data Saved!!', 'detail' => "You have Sucessfully Subscribed the package and You have `{$plan->quantity}` show Point"];
            Session()->flash('alert-danger', $messages);
            return redirect('list-management');
        } catch (Exception $e) {
            Log::error('Payment success error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Something went wrong. Please log in.');
        }
    }

    function invoice($encryptedId) {
        try {
        $subscriptionId = decrypt($encryptedId);
    } catch (DecryptException $e) {
        abort(404);
    }

    $plan = DB::table('subscriptions')
        ->join('subscribed', 'subscriptions.id', '=', 'subscribed.subscription_id')
        ->where('subscriptions.id', $subscriptionId)   // 👈 decrypted id
        ->where('subscriptions.useer_id', Auth::id())   // 👈 security check
        ->select(
            'subscriptions.*',
            'subscribed.*'
        )
        ->first();


        if (!$plan) {
            abort(403);
        }

        $pdf = Pdf::loadView('admin.invoice', ['plan' => $plan]);
        return $pdf->stream(Auth::user()->name . '.pdf');
        // return view('admin.invoice', compact('plan'));
    }
}
