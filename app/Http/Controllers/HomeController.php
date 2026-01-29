<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\General;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\HorseFavorite;
use App\Models\RealStateFavorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function dashboard(){
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $contacts = Contact::where('form_name' , '=' , 'Contacts')->get();
            $sevenDaysAgo = Carbon::now()->subDays(6);
            $sevendayscontacts = Contact::where('form_name' , '=' , 'Contacts')->whereDate('created_at', '>=', $sevenDaysAgo)->get();
            $product_count = Product::count();
            $active_listing = Product::where('pro_status', 'Published')->count();
            $Contactdata = [];
            for ($i = 6; $i >= 0; $i--) {
                $currentDate = Carbon::now()->subDays($i)->format('Y-m-d');
                $requestsCount = Contact::whereDate('created_at', $currentDate)->count();
                $Contactdata[] = $requestsCount;
            }

            // $bookingsdata = [];
            // for ($i = 6; $i >= 0; $i--) {
            //     $currentDate = Carbon::now()->subDays($i)->format('Y-m-d');
            //     $bookingCount = Booking::where('booking_status' , '=' , 'paid')->whereDate('created_at', $currentDate)->count();
            //     $bookingsdata[] = $bookingCount;
            // }

            return view('admin.home' , compact('username' , 'product_count', 'active_listing', 'userprofile' , 'Logo' , 'Web_name' , 'Contactdata' , 'sevendayscontacts' , 'contacts' , 'categories'));
        }else{
            $userid = Auth::user()->id;
            $contacts = Order::where('user_id' , $userid)->get();
            $sevenDaysAgo = Carbon::now()->subDays(6);
            $sevendayscontacts = Order::where('user_id' , $userid)->whereDate('created_at', '>=', $sevenDaysAgo)->get();

            $Contactdata = [];
            for ($i = 6; $i >= 0; $i--) {
                $currentDate = Carbon::now()->subDays($i)->format('Y-m-d');
                $requestsCount = Order::whereDate('created_at', $currentDate)->count();
                $Contactdata[] = $requestsCount;
            }

            // $bookingsdata = [];
            // for ($i = 6; $i >= 0; $i--) {
            //     $currentDate = Carbon::now()->subDays($i)->format('Y-m-d');
            //     $bookingCount = Booking::where('booking_status' , '=' , 'paid')->whereDate('created_at', $currentDate)->count();
            //     $bookingsdata[] = $bookingCount;
            // }

            return view('user.home' , compact('username' , 'userprofile' , 'Logo' , 'Web_name' , 'Contactdata' , 'sevendayscontacts' , 'contacts' , 'categories'));
        }
    }

    public function contacts()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $contacts = Contact::where('form_name' , '=' , 'Contacts')->orderBy('id', 'desc')->get();
            return view('admin.contacts' , compact('contacts' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'  , 'categories'));
        }else{
            return redirect('/');
        }
    }

    public function profile_us()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $id = Auth::user()->id;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $profile = User::where('id', '=', $id)->get();
            return view('admin.profile' , compact('profile' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'  , 'categories'));
        }else{
            $profile = User::where('id', '=', $id)->get();
            return view('user.profile' , compact('profile' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'));
        }
    }

    public function updateProfileImage(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('/Profile_image');
            $imageName = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);

            // Update user's profile image in the database
            $user->Profile_img = $imageName;
            $user->save();
            // $user->update(['Profile_img' => $destinationPath . '/' . $imageName]);

            return response()->json(['url' => asset('/Profile_image/' . $imageName)]);
        }

        return response()->json(['error' => 'Image not found.'], 400);
    }

    public function edit_profile()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $id = Auth::user()->id;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $profile = User::where('id', '=', $id)->get();
            return view('admin.edit_profile' , compact('profile' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'  , 'categories'));
        }else{
            $profile = User::where('id', '=', $id)->get();
            return view('user.edit_profile' , compact('profile' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'));
        }
    }

    public function updateProfileInfo(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'Number' => 'nullable|string|max:20',
            'Address' => 'nullable|string|max:255',
            'bussiness_name' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:100',
            'town' => 'nullable|string|max:100',
            'website_link' => 'nullable|url|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'insta_link' => 'nullable|url|max:255',
            'tiktok_link' => 'nullable|url|max:255',
            'youtube_link' => 'nullable|url|max:255',
            'business_link' => 'nullable|url|max:255',
            'pro_rider_level' => 'nullable|string',   // comma-separated values
            'pro_breed_level' => 'nullable|string',
            'pro_service_level' => 'nullable|string',
            'about' => 'nullable|string|max:2000',
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->Number = $request->Number;
        $user->Address = $request->Address;
        $user->bussiness_name = $request->bussiness_name;
        $user->state = $request->state;
        $user->town = $request->town;
        $user->website_link = $request->website_link;
        $user->facebook_link = $request->facebook_link;
        $user->insta_link = $request->insta_link;
        $user->tiktok_link = $request->tiktok_link;
        $user->youtube_link = $request->youtube_link;
        $user->business_link = $request->business_link;
        $user->skill = $request->filled('pro_rider_level') && $request->input('pro_rider_level') !== null
    ? explode(',', $request->input('pro_rider_level'))
    : ($user->skill ?? []);

$user->breed = $request->filled('pro_breed_level') && $request->input('pro_breed_level') !== null
    ? explode(',', $request->input('pro_breed_level'))
    : ($user->breed ?? []);

$user->services = $request->filled('pro_service_level') && $request->input('pro_service_level') !== null
    ? explode(',', $request->input('pro_service_level'))
    : ($user->services ?? []);

        $user->about = $request->about;
        $user->update();
        return redirect('/profile');
    }

    public function general_us()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $id = Auth::user()->id;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $general = General::where('id', '=', $id)->get();
            return view('admin.general' , compact('general' , 'username' , 'userprofile' , 'Logo' , 'Web_name'  , 'categories'));
        }else{
            return redirect('/');
        }
    }

    public function updateLogoImage(Request $request)
    {
        $id = Auth::user()->id;
        $user = General::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('/assets/images');
            $imageName = 'profile_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);

            // Update user's profile image in the database
            $user->G_logo = $imageName;
            $user->save();
            // $user->update(['Profile_img' => $destinationPath . '/' . $imageName]);

            return response()->json(['url' => asset('/assets/images/' . $imageName)]);
        }

        return response()->json(['error' => 'Image not found.'], 400);
    }

    public function edit_general()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $id = Auth::user()->id;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $general = General::where('id', '=', $id)->get();
            return view('admin.edit_general' , compact('general' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'  , 'categories'));
        }else{
            return redirect('/');
        }
    }

    public function updateGeneralInfo(Request $request)
    {
        $info = General::find(1);
        $info->G_name = $request->G_name;
        $info->G_email = $request->Email;
        $info->G_number = $request->Number;
        $info->G_address = $request->address;
        $info->GF_text = $request->GF_text;
        $info->GS_facebook = $request->GS_facebook;
        $info->GS_twitter = $request->GS_twitter;
        $info->GS_instagram = $request->GS_instagram;
        $info->GS_linkedin = $request->GS_linkedin;
        $info->GS_tiktok = $request->GS_tiktok;
        $info->GS_pintrest = $request->GS_pintrest;
        $info->update();
        return redirect('/general');
    }

    public function orders()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $data = Order::orderBy('id', 'desc')->get();
            return view('admin.orders' , compact('data' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'  , 'categories'));
        }else{
            $userid = Auth::user()->id;
            $data = Order::where('user_id' , $userid)->orderBy('id', 'desc')->get();
            return view('user.orders' , compact('data' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'  , 'categories'));
        }
    }

    public function view_order($id)
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $getdata = Order::where('id' , $id)->orderBy('id', 'desc')->first();
            $addondata = Cart::where('order_id' , $getdata->order_id)->orderBy('id', 'desc')->get();
            $data = Order::where('id' , $id)->orderBy('id', 'desc')->get();
            return view('admin.view_order' , compact('data' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'  , 'categories' , 'addondata'));
        }else{
            $getdata = Order::where('id' , $id)->orderBy('id', 'desc')->first();
            $addondata = Cart::where('order_id' , $getdata->order_id)->orderBy('id', 'desc')->get();
            $data = Order::where('id' , $id)->orderBy('id', 'desc')->get();
            return view('user.view_order' , compact('data' , 'username' , 'userprofile' , 'Logo'  , 'Web_name'  , 'categories' , 'addondata'));
        }
    }
    function adminMembership() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $plans = DB::table('plans')
                ->orderBy('created_at', 'desc')
                ->get();
        return view('admin.membership', compact('username' , 'plans', 'userprofile' , 'Logo'  , 'Web_name', 'categories'));
    }

    function horse() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $horses = HorseFavorite::with('product')->where('user_id', Auth::id())->get();
        return view('admin.horse-favorite', compact('horses', 'username', 'userprofile', 'Logo', 'Web_name', 'categories'));
    }
    function realstate() {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $realstates = RealStateFavorite::with('realstate')->where('user_id', Auth::id())->get();
        return view('admin.real-state-favorite', compact('realstates', 'username', 'userprofile', 'Logo', 'Web_name', 'categories'));
    }

    public function dashboardU() {

    }
}
