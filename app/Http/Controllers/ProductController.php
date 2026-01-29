<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\General;
use App\Models\Product;
use App\Models\Category;
use App\Models\Addon;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $cate_name = str_replace('-', ' ', $id);
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $catequery = Category::where('cate_name', '=' , $cate_name)->first();
        $cateid = $catequery->id;
        if($usertype == '1'){
            $data = Product::whereRaw("FIND_IN_SET($cateid , cate_id)")->orderBy('id', 'desc')->get();
            return view('admin.products' , compact('username' , 'data' , 'userprofile' , 'Logo' , 'categories' , 'Web_name' , 'cate_name'));
        }else{
			$userid = Auth::user()->id;
            $data = Product::whereRaw("FIND_IN_SET($cateid , cate_id)")->where('user_id' , $userid)->orderBy('id', 'desc')->get();
            return view('user.products' , compact('username' , 'data' , 'userprofile' , 'Logo' , 'categories' , 'Web_name' , 'cate_name'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($name)
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        // if($usertype == '1'){
            return view('admin.add_product' , compact('username' , 'usertype', 'userprofile' , 'Logo' , 'categories' , 'Web_name' , 'name'));
        // }else{
        //     return view('user.add_product' , compact('username' , 'userprofile' , 'Logo' , 'categories' , 'Web_name' , 'name'));
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        // dd($request->all());
        $request->validate([
            'pro_name' => 'required',
            'pro_Fimg' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10240',
            'pro_imgs' => 'nullable',
        ], [
            'pro_name.required' => 'The Product Name field is required.',
            'pro_Fimg.required' => 'The Product Featured image field is required.',
            'pro_Fimg.image' => 'The featured image must be an image file.',
            'pro_Fimg.mimes' => 'The featured image must be a file of type: jpeg, png, jpg, svg.',
            'pro_Fimg.max' => 'The featured image may not be greater than 10MB.',
        ]);

        $latestSubscription = DB::table('subscriptions')
                ->where('useer_id', auth()->id())
                ->where('pacakge_status', 'Active')
                ->orderBy('created_at', 'desc')
                ->first();
            if ($latestSubscription) {
                DB::table('subscribed')
                    ->where('subscription_id', $latestSubscription->id)
                    ->where('remaining_token', '>', 0)          // optional safety
                    ->decrement('remaining_token', 1);
            }
            else {
                $messages = ['title' => 'Data Saved!!', 'detail' => 'Please Purchase the Subscription Before this process.'];
                Session()->flash('alert-danger', $messages);
                return redirect()->back();
            }
        try {

            // DB::beginTransaction();
            $product = new Product;

            $SKU = 'PROSKU' . md5(Str::random(8));

            $product->pro_sku = $SKU;
            // Handle featured image upload
            // if ($request->hasFile('pro_Fimg')) {
            //     $featuredImage = $request->file('pro_Fimg');
            //     $featuredImageName = 'Featured_' . time() . '_' . Str::random(10) . '.' . $featuredImage->getClientOriginalExtension();

            //     // Store using local disk
            //     $featuredImagePath = $featuredImage->storeAs('Featured_image', $featuredImageName, 'local');
            //     $product->pro_Fimg = $featuredImagePath;
            // }

            if ($request->hasFile('pro_Fimg')) {
                $featuredImage = $request->file('pro_Fimg');
                $featuredImageName = 'Featured_' . time() . '_' . Str::random(10) . '.' . $featuredImage->getClientOriginalExtension();

                // Move the file to the public folder manually
                $featuredImage->move(public_path('Featured_image'), $featuredImageName);

                // Save only the filename in the database
                $product->pro_Fimg = $featuredImageName;
            }



            // dd($destinationPathone);
            // if ($request->hasFile('pro_Fimg')) {
            //     $image = $request->file('pro_Fimg');
            //     $destinationPathone = public_path('/Featured_image');
            //     $imageNameone = 'Featured_' . time() . '.' . $image->getClientOriginalExtension();
            //     $image->move($destinationPathone, $imageNameone);

            //     $product->pro_Fimg = $imageNameone;
            // }


            $pro_images = [];

            if ($request->hasFile('pro_imgs')) {
                foreach ($request->file('pro_imgs') as $image) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('uploads/products', $filename, 'public');
                    $pro_images[] = $filename; // Only storing the name
                }
            }

            if ($request->hasFile('pro_reg_file')) {
                $images = $request->file('pro_reg_file');
                $destinationPath = public_path('/Product_images');
                $imageNames = [];

                foreach ($images as $image) {
                    if ($image) {
                        $extension = $image->getClientOriginalExtension();
                        $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                        $image->move($destinationPath, $imageName);
                        $imageNames[] = $imageName;
                    }
                }

                $product->pro_reg_file = json_encode($imageNames);
            }

            if ($request->hasFile('ppe_file')) {
                $images = $request->file('ppe_file');
                $destinationPath = public_path('/Product_images');
                $imageNames = [];

                foreach ($images as $image) {
                    if ($image) {
                        $extension = $image->getClientOriginalExtension();
                        $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                        $image->move($destinationPath, $imageName);
                        $imageNames[] = $imageName;
                    }
                }

                $product->ppe_file = json_encode($imageNames);
            }

            if ($request->hasFile('xray_file')) {
                $images = $request->file('xray_file');
                $destinationPath = public_path('/Product_images');
                $imageNames = [];

                foreach ($images as $image) {
                    if ($image) {
                        $extension = $image->getClientOriginalExtension();
                        $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                        $image->move($destinationPath, $imageName);
                        $imageNames[] = $imageName;
                    }
                }

                $product->xray_file = json_encode($imageNames);
            }

                //  if ($request->hasFile('pro_video_url')) {
                //     $images = $request->file('pro_video_url');
                //     $destinationPath = public_path('/pro_video');
                //     $imageNames = [];

                //     foreach ($images as $image) {
                //         if ($image) {
                //             $extension = $image->getClientOriginalExtension();
                //             $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                //             $image->move($destinationPath, $imageName);
                //             $imageNames[] = $imageName;
                //         }
                //     }

                //     $product->pro_video_url = json_encode($imageNames);
                //  } else {
                //     $product->pro_video_url = implode(',', $request->pro_video_url);
                //  }

            if ($request->hasFile('pro_video_url')) {
                foreach ($request->file('pro_video_url') as $video) {
                    if ($video && $video->isValid()) {
                        $extension = $video->getClientOriginalExtension();
                        $videoName = time() . '_' . uniqid() . '.' . $extension;
                        $video->move(public_path('/pro_video'), $videoName);
                        $videoNames[] = $videoName;
                    }
                }
                $product->pro_video_url = json_encode($videoNames);
            }


            $product->pro_name = $request->pro_name;
            $product->pro_reg_price = str_replace('$', '', $request->pro_reg_price);
            $product->about_price = implode(',' , $request->about_price);
            $product->pro_height = $request->pro_height;
            $product->pro_color = $request->pro_color;
            $product->pro_skill = $request->pro_address;
            $product->pro_breed = $request->pro_breed;
            $product->pro_ad_type = $request->pro_ad_type;
            $product->pro_gender = $request->pro_gender;
            $product->pro_reg_name = $request->pro_reg_name;
            $product->pro_reg_association = $request->pro_reg_association;
            $product->pro_reg_number = $request->pro_reg_number;
            $product->pro_rider_level = $request->pro_rider_level;
            $product->gaited = $request->gaited;
            $product->pro_city = $request->pro_city;
            $product->pro_state = $request->pro_state;
            $product->pro_address = $request->pro_address;
            $product->per_phone = $request->per_phone;
            $product->per_email = $request->per_email;
            $product->per_state = $request->per_state;
            $product->per_zip = $request->per_zip;
            $product->per_address = $request->per_address;
            $product->per_website = $request->per_website;
            $product->pro_facebook = $request->pro_facebook;
            $product->pro_youtube = $request->pro_youtube;
            $product->pro_insta = $request->pro_insta;
            $product->pro_tiktok = $request->pro_tiktok;
            $product->pro_desc = $request->pro_desc;
            $product->pro_stock = $request->pro_stock;
            $product->registerd_horse = $request->registerd_horse;
            $product->pro_imgs = json_encode($pro_images);

            $product->bid_amount = str_replace('$', '', $request->bid_amount);
            $product->reserve_amount = str_replace('$', '', $request->reserve_amount);
            $product->auc_start_date = $request->auc_start_date;
            $product->auc_end_date = $request->auc_end_date;
            $product->auc_link = $request->auc_link;
            $product->trial_period = $request->trial_period;
            $product->pro_age_year = $request->pro_age_year;
            $product->pro_age_month = $request->pro_age_month;
            $product->pro_sire = $request->pro_sire;
            $product->pro_dam = $request->pro_dam;
            $product->pro_grand_sire = implode(',' , $request->pro_grand_sire);
            $product->pro_grand_dam = implode(',' , $request->pro_grand_dam);
            $product->pro_great_grand_sire = implode(',' , $request->pro_great_grand_sire);
            $product->pro_great_grand_dam = implode(',' , $request->pro_great_grand_dam);
            $product->pro_twogreat_grand_sire = implode(',' , $request->pro_twogreat_grand_sire);
            $product->pro_twogreat_grand_dam = implode(',' , $request->pro_twogreat_grand_dam);

            $product->cate_id = "1";
            $product->pro_status = "Published";
            $product->user_id = Auth::user()->id;
            $product->save();

            // if ($product) {
            //     $latestSubscription = DB::table('subscriptions')
            //         ->where('user_id', auth()->id())
            //         ->where('pacakge_status', 'Active')
            //         ->orderBy('created_at', 'desc')
            //         ->first();
            //     if ($latestSubscription) {
            //         DB::table('subscribed')
            //             ->where('subscription_id', $latestSubscription->id)
            //             ->where('remaining_token', '>', 0)          // optional safety
            //             ->decrement('remaining_token', 1);
            //     }
            //     else {
            //         $messages = ['title' => 'Data Saved!!', 'detail' => 'Please Purchase the Subscription Before this process.'];
            //         Session()->flash('alert-danger', $messages);
            //         return redirect()->back();
            //     }
            // }

            if($usertype == '1'){
                return redirect("/products/$request->cate_id_name");
            } else {
                $messages = ['title' => 'Data Saved!!', 'detail' => 'Record has been added successfully.'];
                Session()->flash('alert-success', $messages);
                return redirect('/horse-listing');
            }
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            return back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($cate , $id)
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if ($usertype == '1') {
            $data = CJApiService::getProductDetail($id);
            // dd($data);
            return view('admin.list_now', compact('username', 'userprofile', 'Logo', 'data', 'categories' , 'Web_name'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id , $name)
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        // if($usertype == '1'){
            $get = Product::where('id', '=', $id)->first();
            $data = Product::where('id', '=', $id)->get();
            $addons = Addon::where('pro_sku', '=', $get->pro_sku)->get();
            // dd($get);
            return view('admin.edit_product' , compact('username' , 'usertype', 'userprofile' , 'Logo' , 'categories' , 'data' , 'Web_name' , 'name', 'addons'));
        // }else{
        //     $get = Product::where('id', '=', $id)->first();
        //     $data = Product::where('id', '=', $id)->get();
        //     $addons = Addon::where('pro_sku', '=', $get->pro_sku)->get();
        //     return view('admin.edit_product' , compact('username' , 'userprofile' , 'Logo' , 'categories' , 'data' , 'Web_name' , 'name', 'addons'));
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        $id = $request->id;
        $product = Product::find($id);
        $SKU = $request->pro_sku;

        $product->pro_sku = $SKU;

        // ========== Featured Image ==========
        if ($request->hasFile('pro_Fimg')) {
            $image = $request->file('pro_Fimg');
            $filename = 'Featured_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/Featured_image'), $filename);
            $product->pro_Fimg = $filename;
        }

        // ========== Multiple Product Images ==========
        if ($request->hasFile('pro_imgs')) {
            $pro_images = [];
            foreach ($request->file('pro_imgs') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/products', $filename, 'public'); // only this uses storage path
                $pro_images[] = $filename;
            }
            $product->pro_imgs = json_encode($pro_images);
        }

        // ========== Registration File ==========
        if ($request->hasFile('pro_reg_file')) {
            $reg_files = [];
            foreach ($request->file('pro_reg_file') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/Product_images'), $filename);
                $reg_files[] = $filename;
            }
            $product->pro_reg_file = json_encode($reg_files);
        }

        // ========== PPE Files ==========
        if ($request->hasFile('ppe_file')) {
            $ppe_files = [];
            foreach ($request->file('ppe_file') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/Product_images'), $filename);
                $ppe_files[] = $filename;
            }
            $product->ppe_file = json_encode($ppe_files);
        }

        // ========== X-Ray Files ==========
        if ($request->hasFile('xray_file')) {
            $xray_files = [];
            foreach ($request->file('xray_file') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/Product_images'), $filename);
                $xray_files[] = $filename;
            }
            $product->xray_file = json_encode($xray_files);
        }

        // ========== Video Files ==========
        if ($request->hasFile('pro_video_url')) {
            $videos = [];
            foreach ($request->file('pro_video_url') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/pro_video'), $filename);
                $videos[] = $filename;
            }
            $product->pro_video_url = json_encode($videos);
        } elseif (is_array($request->pro_video_url)) {
            $product->pro_video_url = implode(',', $request->pro_video_url);
        }

        // ========== Remaining Fields ==========
        $product->pro_name = $request->pro_name;
        $product->pro_reg_price = str_replace('$', '', $request->pro_reg_price);
        $product->about_price = implode(',', $request->about_price ?? []);
        $product->pro_height = $request->pro_height;
        $product->pro_color = $request->pro_color;
        $product->pro_skill = $request->pro_skill;
        $product->pro_breed = $request->pro_breed;
        $product->pro_ad_type = $request->pro_ad_type;
        $product->pro_gender = $request->pro_gender;
        $product->pro_reg_name = $request->pro_reg_name;
        $product->pro_reg_association = $request->pro_reg_association;
        $product->pro_reg_number = $request->pro_reg_number;
        $product->pro_rider_level = $request->pro_rider_level;
        $product->gaited = $request->gaited;
        $product->pro_city = $request->pro_city;
        $product->pro_state = $request->pro_state;
        $product->pro_address = $request->pro_address;
        $product->per_phone = $request->per_phone;
        $product->per_email = $request->per_email;
        $product->per_state = $request->per_state;
        $product->per_zip = $request->per_zip;
        $product->per_address = $request->per_address;
        $product->per_website = $request->per_website;
        $product->pro_facebook = $request->pro_facebook;
        $product->pro_youtube = $request->pro_youtube;
        $product->pro_insta = $request->pro_insta;
        $product->pro_tiktok = $request->pro_tiktok;
        $product->pro_desc = $request->pro_desc;
        $product->pro_stock = $request->pro_stock;
        $product->registerd_horse = $request->registerd_horse;

        // Auction
        $product->bid_amount = str_replace('$', '', $request->bid_amount);
        $product->reserve_amount = str_replace('$', '', $request->reserve_amount);
        $product->auc_start_date = $request->auc_start_date;
        $product->auc_end_date = $request->auc_end_date;
        $product->auc_link = $request->auc_link;
        $product->trial_period = $request->trial_period;
        $product->pro_age_year = $request->pro_age_year;
        $product->pro_age_month = $request->pro_age_month;
        $product->pro_sire = $request->pro_sire;
        $product->pro_dam = $request->pro_dam;

        // Pedigree
        $product->pro_grand_sire = implode(',', $request->pro_grand_sire ?? []);
        $product->pro_grand_dam = implode(',', $request->pro_grand_dam ?? []);
        $product->pro_great_grand_sire = implode(',', $request->pro_great_grand_sire ?? []);
        $product->pro_great_grand_dam = implode(',', $request->pro_great_grand_dam ?? []);
        $product->pro_twogreat_grand_sire = implode(',', $request->pro_twogreat_grand_sire ?? []);
        $product->pro_twogreat_grand_dam = implode(',', $request->pro_twogreat_grand_dam ?? []);

        $product->save();
        $messages = ['title' => 'Data Saved!!', 'detail' => 'Data Updated Successfully.'];
        Session()->flash('alert-success', $messages);
        if($usertype == '1')
            return redirect("/products/$request->cate_id_name");
        else
            return redirect('/horse-listing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id , $name)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect("/products/$name");
    }
    public function destroy_addon($id , $proid , $name)
    {
        // dd($id);
        $data = Addon::find($id);
        $data->delete();
        return redirect("/edit_list/$proid/$name");
    }
}
