<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    function index() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $plans = '';
        $categories = Category::all();
        $Web_name = $logoquery->G_name;
        if($usertype == '1')
            $plans = DB::table('plans')
                ->orderBy('created_at', 'desc')
                ->get();
            return view('admin.index-plan', compact('username' , 'plans' , 'userprofile' , 'Logo' , 'categories' , 'Web_name'));
    }

    function create() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $data = '';
        $categories = Category::all();
        $Web_name = $logoquery->G_name;
        return view('admin.manage-plan', compact('username' , 'data' , 'userprofile' , 'Logo' , 'categories' , 'Web_name'));
    }

    function store(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        // Insert using Query Builder
        DB::table('plans')->insert([
            'name'       => $request->name,
            'price'      => $request->price,
            'quantity'   => $request->quantity,
            'description'   => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $messages = ['title' => 'Data Saved!!', 'detail' => 'The Plan Created Successfully.'];
        Session()->flash('alert-success', $messages);
        return redirect()->route('admin.plan');
    }

    function edit($id) {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $data = '';
        $categories = Category::all();
        $Web_name = $logoquery->G_name;
        $plan = DB::table('plans')->where('id', $id)->first();
        return view('admin.manage-plan', compact('plan', 'username' , 'data' , 'userprofile' , 'Logo' , 'categories' , 'Web_name'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::table('plans')
            ->where('id', $id)
            ->update([
                'name'       => $request->name,
                'price'      => $request->price,
                'description'   => $request->description,
                'quantity'   => $request->quantity,
                'updated_at' => now(),
            ]);
        $messages = ['title' => 'Data Saved!!', 'detail' => 'The Plan Updated Successfully.'];
        Session()->flash('alert-success', $messages);
        return redirect()->back();
    }
    public function destroy($id)
    {
        DB::table('plans')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Plan deleted successfully!');
    }

    function package() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $plans = DB::table('subscriptions')
            ->join('subscribed', 'subscriptions.id', '=', 'subscribed.subscription_id')
            ->where('subscriptions.useer_id', Auth::id())
            ->select('subscriptions.*', 'subscribed.*')
            ->orderBy('subscriptions.created_at', 'desc')
            ->get();
        return view('admin.membership', compact('username' , 'plans' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
    }

    function listing() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $plans = DB::table('plans')->get();
        return view('layouts.listing', compact('username' , 'plans' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
    }

    function horseListing() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $plans = DB::table('plans')->get();
        return view('layouts.horse-listing', compact('username' , 'plans' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
    }
    // function realstateListing() {
    //     $usertype = Auth::user()->usertype;
    //     $username = Auth::user()->name;
    //     $userprofile = Auth::user()->Profile_img;
    //     $logoquery = General::where('id', 1)->first();
    //     $Logo = $logoquery->G_logo;
    //     $Web_name = $logoquery->G_name;
    //     $categories = Category::all();
    //     $plans = DB::table('plans')->get();
    //     return view('layouts.realstate-listing', compact('username' , 'plans' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
    // }
    // function serviceListing() {
    //     $usertype = Auth::user()->usertype;
    //     $username = Auth::user()->name;
    //     $userprofile = Auth::user()->Profile_img;
    //     $logoquery = General::where('id', 1)->first();
    //     $Logo = $logoquery->G_logo;
    //     $Web_name = $logoquery->G_name;
    //     $categories = Category::all();
    //     $plans = DB::table('plans')->get();
    //     return view('layouts.service-listing', compact('username' , 'plans' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
    // }
}
