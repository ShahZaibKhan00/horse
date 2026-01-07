<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Addon;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\Contact;
use App\Models\General;
use App\Models\Product;
use App\Models\Service;
use App\Mail\AdminEmail;
use App\Models\Category;
use App\Models\Realstate;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use App\Mail\CashAdminEmail;
use Illuminate\Http\Request;
use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\CashPaymentConfirmation;
use App\Models\HorseFavorite;
use App\Models\RealStateFavorite;
use Illuminate\Support\Facades\Crypt;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $cate_data = Category::orderBy('id', 'desc')->take(2)->get();
        $pro_data = Product::orderBy('id', 'desc')->take(8)->get();
        $pro_data_sale = Product::where('pro_ad_type', 'For Sale')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        // Clone 2: Where pro_ad_type = 'Auction'
        $pro_data_auction = Product::where('pro_ad_type', 'At Auction')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();
        $services = Service::orderBy('id', 'desc')->take(8)->get();
        $states = Realstate::orderBy('id', 'desc')->take(8)->get();
        return view('front.index' , compact('Logo', 'pro_data_sale', 'pro_data_auction', 'states' , 'Number' , 'Email', 'services', 'Address' , 'pro_data' , 'cate_data'));
    }

    public function about_us()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.about_us' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }

    public function products()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $data = Category::orderBy('id', 'desc')->get();
        return view('front.products' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'data'));
    }

    public function cate_products($id)
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $cate = Category::where('id' , decrypt($id))->get();
        $data = Product::where('cate_id' , decrypt($id))->orderBy('id', 'desc')->get();
        return view('front.cate_products' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'data' , 'cate'));
    }

    public function products_detail($id)
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $data = Product::where('pro_sku', '=' , $id)->first();
        return view('front.view_detail_page' , compact('Logo' , 'Number' , 'Email' , 'Address', 'data'));
    }

    public function seller_profile_one($id)
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        // $data = Product::where('pro_sku' , $id)->get();
        $proquery = Product::where('pro_sku', '=' , $id)->first();
        // $data = Product::where('id' , $proquery->id)->get();
        $data = Product::where('id' , $id)->get();
        // $color_addon = Addon::where('pro_sku' , $proquery->pro_sku)->get();
        return view('front.seller_profile_page' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'data'));
    }


    public function seller_profile_main($id)
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        // $data = Product::where('pro_sku' , $id)->get();
        $proquery = Product::where('pro_sku', '=' , $id)->first();
        // $data = Product::where('id' , $proquery->id)->get();
        $data = Product::where('id' , $id)->get();
        // $color_addon = Addon::where('pro_sku' , $proquery->pro_sku)->get();
        return view('front.seller_profile_main' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'data'));
    }

    public function cart()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $data = Cart::join('products', 'products.pro_sku', '=', 'carts.pro_sku')->where('carts.user_ip', $_SERVER['REMOTE_ADDR'])->where('carts.status', 'cart')->select('carts.*', 'products.pro_Fimg')->get();
        // $data = Cart::where('user_ip' , $_SERVER['REMOTE_ADDR'])->where('status' , 'cart')->get();
        return view('front.cart' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'data'));
    }

    public function cart_submit(Request $request)
    {
        for ($i = 0; $i < count($request->pro_name); $i++) {
            $data = new Cart;

            $data->pro_name = $request->pro_name[$i];
            $data->color_name = $request->color_name[$i];
            $data->pro_color = $request->pro_color[$i];
            $data->pro_quantity = $request->pro_quantity[$i];

            $data->pro_sku = $request->pro_sku;
            $data->status = "cart";

            if (Auth::check()) {
                $data->user_id = Auth::user()->id;
            }

            $data->user_ip = $_SERVER['REMOTE_ADDR'];
            $data->save();
        }

        return redirect('cart');

    }

    public function checkout()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $Web_name = $logoquery->G_name;
        $data = Cart::where('user_ip' , $_SERVER['REMOTE_ADDR'])->where('status' , 'cart')->get();
        return view('front.checkout' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'Web_name' , 'data'));
    }

    public function order_complated()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $Web_name = $logoquery->G_name;
        return view('front.order_complated' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'Web_name'));
    }

    public function accessories()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $data = Product::where('cate_id' , 2)->orderBy('id', 'desc')->get();
        return view('front.accessories' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'data'));
    }

    public function contact_us()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.contact_us' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }

    public function contact_query(Request $request)
    {
        $contact = new Contact;

        $contact->F_Name = $request->first_name;
        $contact->L_Name = $request->last_name;
        $contact->Email = $request->email;
        $contact->Number = $request->phone;
        $contact->Contact_Desc = $request->desc;
        if ($request->status == ""){
            $contact->check_status = "No";
        }else {
            $contact->check_status = $request->status;
        }
        $contact->form_name = $request->form_name;

        $contact->save();
        return redirect('/thankyou');
    }

    public function submit_order(Request $request)
    {
        $order_id = 'ON_' . rand(99999, 10000);
        $cartIds = $request->cart_ids;
        $data = new Order;

        $data->f_name = $request->f_name;
        $data->l_name = $request->l_name;
        $data->company_name = $request->company_name;
        $data->country = $request->country;
        $data->st_adress = $request->st_adress;
        $data->town_city = $request->town_city;
        $data->state = $request->state;
        $data->postalcode = $request->postalcode;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->order_note = $request->order_note;
        $data->cart_ids = implode(',', $cartIds);
        $data->status = 'Processing';
        $data->order_id = $order_id;
        if (Auth::check()) {
                $data->user_id = Auth::user()->id;
            }
        $data->user_ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($cartIds)) {
            Cart::whereIn('id', $cartIds)->update(['status' => 'order', 'order_id' => $order_id]);
        }

        $data->save();
        return redirect('/order_complated');
    }

    public function thankyou()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.thankyou' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }

    public function services(Request $request)
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $filters = [
            'health' => request('health'),
            'holistic' => request('holistic'),
            'breeding' => request('breeding'),
            'leasing' => request('leasing'),
            'transport' => request('transport'),
            'grooming' => request('grooming'),
            'recreational' => request('recreational'),
            'property' => request('property'),
            'boarding' => request('boarding'),
            'farrier' => request('farrier'),
            'consulting' => request('consulting'),
            'retail' => request('retail'),
            'promotion' => request('promotion'),
        ];
        $name = request('name');
        $location = request('location');
        $activeFilters = array_filter($filters);

        $services = Service::query();
        if (!empty($name)) {
            $services->where(function ($query) use ($name) {
                $query->where('full_name', 'LIKE', "%{$name}%")
                    ->orWhere('business_name', 'LIKE', "%{$name}%");
            });
        }

        // Location
        if (!empty($location)) {
            $services->where(function ($query) use ($location) {
                $query->where('city', 'LIKE', "%{$location}%")
                    ->orWhere('state', 'LIKE', "%{$location}%");
            });
        }
        if (!empty($activeFilters)) {
            foreach ($activeFilters as $key => $service) {
                $services->whereRaw("FIND_IN_SET(?, services_offered)", [$service]);
            }
        }

        $services = $services->orderBy('id', 'desc')->get();
        return view('front.services' , compact('Logo' ,'services', 'Number' , 'Email' , 'Address'));
    }

    public function horse_listing_filter(Request $request)
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $sale = request('type');
        $listed_horses = request('listed_horses');
        $auction_horses = request('auction_horses');
        $lease_horses = request('lease_horses');
        $at_stud = request('at_stud');
        $sort = $request->input('sort');

        \Log::info($listed_horses);
        $breed = $request['breed'];
        $from = request('from');
        $to = request('to');
        $breed = request('breed');
        $state = request('state');
        $name = request('name');

        $skill = $request->query('skill', null);
        $rider = request('rider');
        $selectedColor = request('selectedColor', "");
        $selectedGender = $request->query('selectedGender', "");
        $selectedDiscipline = $request->query('selectedDiscipline', "");
        $age_min = $request->query('age_min');
        $age_max = $request->query('age_max');
        $age_unit = $request->query('age_unit');

        $height_min = request('height_min');
        $height_max = request('height_max');

        $query = Product::query();

        if (!empty($name)) {
            $query->where('pro_name', 'LIKE', "%{$name}%");
        }

        if (!empty($location)) {
            $query->where('pro_city', $location)->orWhere('pro_state', $location);
        }
        if (!empty($sale)) {
            $query->where('pro_ad_type', $sale);
        }

        // --- Handle pro_ad filtering ---
        $includeTypes = [];
        $excludeTypes = [];

        // For Sale
        if ($listed_horses === 'For Sale') {
            $includeTypes[] = 'For Sale';
        } elseif ($listed_horses === 'not-for-sale') {
            $excludeTypes[] = 'For Sale';
        }

        if ($auction_horses === 'At Auction') {
            $includeTypes[] = 'At Auction';
        } elseif ($auction_horses === 'not-at-auction') {
            $excludeTypes[] = 'At Auction';
        }

        if ($lease_horses === 'For Lease') {
            $includeTypes[] = 'For Lease';
        } elseif ($lease_horses === 'not-for-lease') {
            $excludeTypes[] = 'For Lease';
        }

        if ($at_stud === 'At Stud') {
            $includeTypes[] = 'At Stud';
        } elseif ($at_stud === 'not-for-stud') {
            $excludeTypes[] = 'At Stud';
        }

        if (!empty($includeTypes) && empty($excludeTypes)) {
            $query->whereIn('pro_ad_type', $includeTypes);
        } elseif (empty($includeTypes) && !empty($excludeTypes)) {
            $query->whereNotIn('pro_ad_type', $excludeTypes);
        } elseif (!empty($includeTypes) && !empty($excludeTypes)) {
            $allowed = array_diff($includeTypes, $excludeTypes);
            if (!empty($allowed)) {
                $query->whereIn('pro_ad_type', $allowed);
            } else {
                $query->whereRaw('1 = 0');
            }
        }
        if ($from !== null && $to !== null) {
            $query->whereBetween('pro_reg_price', [$from,$to]);
        }

        if (!empty($breed)) {
            $query->whereIn('pro_breed', (array)$breed);
        }

        if (!empty($skill)) {
            $query->whereRaw("FIND_IN_SET(?, pro_rider_level)", [$skill]);
        }

        if (!empty($rider)) {
            $query->whereRaw("FIND_IN_SET(?, pro_skill)", [$rider]);
        }

        if (!empty($selectedColor)) {
            $query->where('pro_color', $selectedColor);
        }

        if (!empty($selectedGender)) {
            $query->where('pro_gender', $selectedGender);
        }

        if (!empty($age_min) && !empty($age_max)) {
            if ($age_unit === 'months') {
                $query->whereBetween('pro_age_month', [(int)$age_min, (int)$age_max]);
            } else {
                $query->whereBetween('pro_age_year', [(int)$age_min, (int)$age_max]);
            }
        }

        if (!empty($height_min) && !empty($height_max)) {
            $query->whereBetween('pro_height', [(float)$height_min, (float)$height_max]);
        }
   // dd($sort);
        switch ($sort) {
            case 'price_desc':
                $query->orderBy('pro_reg_price', 'DESC');
                break;
            case 'price_asc':
                $query->orderBy('pro_reg_price', 'ASC');
                break;
            case 'price_high':
                $query->where('pro_reg_price', '>=', 1000)->orderBy('pro_reg_price', 'DESC');
                break;
            case 'price_low':
                $query->where('pro_reg_price', '<=', 500)->orderBy('pro_reg_price', 'ASC');
                break;
            default:
                $query->orderBy('id', 'DESC');
        }

        $products = $query->get();
        // $products = $query->orderBy('id', 'DESC')->get();

        return view('front.horse_listing_filter' , compact('selectedColor', 'age_min', 'age_max', 'height_min', 'sort', 'height_max',
            'products','selectedGender', 'from', 'to', 'breed', 'skill', 'rider', 'Logo' , 'Number' , 'Email' , 'Address'));
    }

    public function service_listing_filter()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.service_listing_filter' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }

    public function farm_directory_listing_filter()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.farm_directory_listing_filter' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }

    public function realestate_listing_filter()
    {
        $amenities = DB::table('realstates')
            ->select('amenities')
            ->distinct()
            ->get();
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $location = request('location');
        $price_min = request('price_min');
        $price_max = request('price_max');
        $acre_min = request('acre_min');
        $acre_max = request('acre_max');
        $bedrooms_min = request('bedrooms_min');
        $bedrooms_max = request('bedrooms_max');
        $bathrooms_min = request('bathrooms_min');
        $bathrooms_max = request('bathrooms_max');
        $heated_barn = request('heated_barn');
        $stall_min = request('stall_min');
        $stall_max = request('stall_max');
        $has_indoor_ring = request('has_indoor_ring');
        $has_outdoor_ring = request('has_outdoor_ring');
        $fenced_grass = request('fenced_grass');
        $fencing = request('fencing');
        $sort = request('sort');

        $query = Realstate::query();
        if (!empty($location)) {
            $query->where('real_location', 'LIKE', "%{$location}%");
        }

        if (!empty($price_min) && !empty($price_max)) {
            $query->whereBetween('real_price', ['$'.$price_min, '$'.$price_max]);
        }

        // if (!empty($acre_min) && !empty($acre_max)) {
        //     $query->where('real_acres', '>=', $acre_min)
        //         ->where('real_acres', '<=', $acre_max);
        // }

        if (!empty($acre_min) && !empty($acre_max)) {
            $query->whereBetween('real_acres', [$acre_min, $acre_max]);
        }


        if (!empty($bedrooms_min) && !empty($bedrooms_max)) {
            $query->whereBetween('real_bedroom', [$bedrooms_min, $bedrooms_max]);
        }

        if (!empty($bathrooms_min) && !empty($stall_max))
            $query->whereBetween('real_bathroom', [$bathrooms_min, $stall_max]);

        if (!empty($heated_barn)) {
            $query->where('heated_barn', $heated_barn);
        }

        if (!empty($stall_min) && !empty($stall_max))
            $query->whereBetween('num_stalls', [$stall_min, $stall_max]);

        if (!empty($fenced_grass)) {
            $query->where('fenced_grass', $fenced_grass);
        }

        if (!empty($fencing)) {
            $query->where(function ($query) use ($fencing) {
                foreach ($fencing as $item) {
                    $query->orWhereRaw("FIND_IN_SET(?, fencing)", [$item]);
                }
            });
        }

        $req_amenities = (array) request('amenitie');

        if (!empty($req_amenities)) {
            $query->whereIn('amenities', $req_amenities);
        }

         switch ($sort) {
            case 'price_desc':
                $query->orderBy('real_price', 'DESC');
                break;
            case 'price_asc':
                $query->orderBy('real_price', 'ASC');
                break;
            // case 'price_high':
            //     $query->where('real_price', '>=', 1000)->orderBy('real_price', 'DESC');
            //     break;
            // case 'price_low':
            //     $query->where('real_price', '<=', 500)->orderBy('real_price', 'ASC');
            //     break;
            default:
                $query->orderBy('id', 'DESC');
        }

        $products = $query->get();
        $states = $query->orderBy('id', 'DESC')->get();

        return view('front.realestate_listing_filter', compact('Logo', 'states', 'amenities', 'Number', 'Email', 'Address', 'sort'));
    }

    public function service_details($id)
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $data = Service::join('users', 'services.User_id', '=', 'users.id')
            ->select(
                'services.*',
                'services.Address as service_address',
                'users.*',
                'users.Address as user_address'
            )
            ->where('services.id', Crypt::decrypt($id))
            ->firstOrFail();

        return view('front.service_details', compact('Logo', 'data', 'Number', 'Email', 'Address'));
    }

    public function farm_listing()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $states = Realstate::orderBy('id', 'desc')->take(8)->get();

        return view('front.farm_listing' , compact('Logo' , 'Number' , 'Email', 'states' , 'Address'));
    }
    public function farm_detail()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.farm_detail' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }
    public function membership_form()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.membership_form' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }
    public function membership()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.membership' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }

    public function realestate()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.realestate' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }
    public function faqs()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        return view('front.faqs' , compact('Logo' , 'Number' , 'Email' , 'Address'));
    }

    function farmFavorite($id) {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        try {
            $realstateId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return back()->with('error', 'Invalid ID.');
        }

        $alreadyFavorite = RealStateFavorite::where('user_id', Auth::id())
            ->where('realstate_id', $realstateId)
            ->exists();

        if ($alreadyFavorite) {
            return back()->with('error', 'This property is already in your favorites.');
        }

        $realnew = new RealStateFavorite();
        $realnew->user_id = Auth::id();
        $realnew->realstate_id = $realstateId;
        $realnew->save();

        return back()->with('success', 'Added to your favorites.');
    }

    function horseFavorite($id) {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        try {
            $realstateId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return back()->with('error', 'Invalid ID.');
        }

        $alreadyFavorite = HorseFavorite::where('user_id', Auth::id())
            ->where('product_id', $realstateId)
            ->exists();

        if ($alreadyFavorite) {
            return back()->with('error', 'This Horse is already in your favorites.');
        }

        $realnew = new HorseFavorite();
        $realnew->user_id = Auth::id();
        $realnew->product_id = $realstateId;
        $realnew->save();

        return back()->with('success', 'Added to your favorites.');
    }

    
}
