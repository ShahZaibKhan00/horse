<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\General;
use App\Models\Category;
use App\Models\Realstate;

class RealstateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $data = Realstate::orderBy('id', 'desc')->get();
            return view('admin.realstate' , compact('username' , 'data' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            return view('admin.add_realstate' , compact('username' , 'userprofile' , 'Logo'  , 'Web_name' , 'categories'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ], [
            'first_name.required' => 'The Real state name field is required.',
            'last_name.required' => 'The Real State Price field is required.',
        ]);
        
        $data = new Realstate;

        $data->ad_type = $request->ad_type;
        $data->bid_amount = $request->bid_amount;
        $data->reserve_amount = $request->reserve_amount;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->auc_link = $request->auc_link;
        $data->property_type = $request->property_type;
        $data->real_location = $request->real_location;
        $data->real_title = $request->real_title;
        $data->real_price = $request->real_price;
        $data->real_acres = $request->real_acres;
        $data->real_bedroom = $request->real_bedroom;
        $data->real_bathroom = $request->real_bathroom;
        $data->real_farm_name = $request->real_farm_name;
        $data->real_garage = $request->real_garage;
        $data->num_spaces = $request->num_spaces;
        $data->garage_type = implode(',' , $request->garage_type);
        $data->barn_type = $request->barn_type;
        $data->num_stalls = $request->num_stalls;
        $data->num_barn = $request->num_barn;
        $data->num_sheds = $request->num_sheds;
        $data->barn_flooring = $request->barn_flooring;
        $data->rubber_matts = $request->rubber_matts;
        $data->tack_room = $request->tack_room;
        $data->heated_not = $request->heated_not;
        $data->wash_stall = $request->wash_stall;
        $data->hot_water = $request->hot_water;
        $data->cold_water = $request->cold_water;
        $data->hay_storage = implode(',' , $request->hay_storage);
        $data->heated_barn = $request->heated_barn;
        $data->air_condition_barn = $request->air_condition_barn;
        $data->dry_lots = $request->dry_lots;
        $data->num_lots = $request->num_lots;
        $data->fenced_grass = $request->fenced_grass;
        $data->num_fenced_grass = $request->num_fenced_grass;
        $data->fencing = implode(',' , $request->fencing);
        $data->out_ride_ring = $request->out_ride_ring;
        $data->out_dimensions = implode(',' , $request->out_dimensions);
        $data->out_water_system = $request->out_water_system;
        $data->in_ride_ring = $request->in_ride_ring;
        $data->in_dimensions = implode(',' , $request->in_dimensions);
        $data->in_water_system = $request->in_water_system;
        $data->round_pen = $request->round_pen;
        $data->property_overview = $request->property_overview;
        $data->ad_write_up = $request->ad_write_up;
        $data->property_features = implode(',' , $request->property_features);
        if ($request->hasFile('property_document')) {
            $images = $request->file('property_document');
            $destinationPath = public_path('/Property_documents');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->property_document = json_encode($imageNames);
        }
        if ($request->hasFile('gallery_imgs')) {
            $images = $request->file('gallery_imgs');
            $destinationPath = public_path('/Gallery_imgs');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->gallery_imgs = json_encode($imageNames);
        }
        if ($request->hasFile('gallery_vids')) {
            $images = $request->file('gallery_vids');
            $destinationPath = public_path('/Gallery_vids');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->gallery_vids = json_encode($imageNames);
        }
        $data->video_url = implode(',' , $request->video_url);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->agent_name = $request->agent_name;
        $data->email = $request->email;
        $data->number = $request->number;
        $data->website_link = $request->website_link;
        if ($request->hasFile('per_pic')) {
            $images = $request->file('per_pic');
            $destinationPath = public_path('/Personal_pictures');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->per_pic = json_encode($imageNames);
        }
        $data->facebook = $request->facebook;
        $data->insta = $request->insta;
        $data->tiktok = $request->tiktok;
        $data->linkedin = $request->linkedin;
        $data->youtube = $request->youtube;
        $data->zillow = $request->zillow;
        $data->amenities = $request->amenities;
        $data->User_id = Auth::user()->id;

        $data->save();
        return redirect('/manage_realstate');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        if($usertype == '1'){
            $data = Realstate::where('id', '=', $id)->get();
            return view('admin.edit_realstate' , compact('username' , 'data' , 'userprofile' , 'Logo'  , 'Web_name' , 'categories'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request)
    {
        $id = $request->id;
        $data = Realstate::find($id);
        $data->ad_type = $request->ad_type;
        $data->bid_amount = $request->bid_amount;
        $data->reserve_amount = $request->reserve_amount;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->auc_link = $request->auc_link;
        $data->property_type = $request->property_type;
        $data->real_location = $request->real_location;
        $data->real_title = $request->real_title;
        $data->real_price = $request->real_price;
        $data->real_acres = $request->real_acres;
        $data->real_bedroom = $request->real_bedroom;
        $data->real_bathroom = $request->real_bathroom;
        $data->real_farm_name = $request->real_farm_name;
        $data->real_garage = $request->real_garage;
        $data->num_spaces = $request->num_spaces;
        $data->garage_type = implode(',' , $request->garage_type);
        $data->barn_type = $request->barn_type;
        $data->num_stalls = $request->num_stalls;
        $data->num_barn = $request->num_barn;
        $data->num_sheds = $request->num_sheds;
        $data->barn_flooring = $request->barn_flooring;
        $data->rubber_matts = $request->rubber_matts;
        $data->tack_room = $request->tack_room;
        $data->heated_not = $request->heated_not;
        $data->wash_stall = $request->wash_stall;
        $data->hot_water = $request->hot_water;
        $data->cold_water = $request->cold_water;
        $data->hay_storage = implode(',' , $request->hay_storage);
        $data->heated_barn = $request->heated_barn;
        $data->air_condition_barn = $request->air_condition_barn;
        $data->dry_lots = $request->dry_lots;
        $data->num_lots = $request->num_lots;
        $data->fenced_grass = $request->fenced_grass;
        $data->num_fenced_grass = $request->num_fenced_grass;
        $data->fencing = implode(',' , $request->fencing);
        $data->out_ride_ring = $request->out_ride_ring;
        $data->out_dimensions = implode(',' , $request->out_dimensions);
        $data->out_water_system = $request->out_water_system;
        $data->in_ride_ring = $request->in_ride_ring;
        $data->in_dimensions = implode(',' , $request->in_dimensions);
        $data->in_water_system = $request->in_water_system;
        $data->round_pen = $request->round_pen;
        $data->property_overview = $request->property_overview;
        $data->ad_write_up = $request->ad_write_up;
        $data->property_features = implode(',' , $request->property_features);
        if ($request->hasFile('property_document')) {
            $images = $request->file('property_document');
            $destinationPath = public_path('/Property_documents');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->property_document = json_encode($imageNames);
        }
        if ($request->hasFile('gallery_imgs')) {
            $images = $request->file('gallery_imgs');
            $destinationPath = public_path('/Gallery_imgs');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->gallery_imgs = json_encode($imageNames);
        }
        if ($request->hasFile('gallery_vids')) {
            $images = $request->file('gallery_vids');
            $destinationPath = public_path('/Gallery_vids');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->gallery_vids = json_encode($imageNames);
        }
        $data->video_url = implode(',' , $request->video_url);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->agent_name = $request->agent_name;
        $data->email = $request->email;
        $data->number = $request->number;
        $data->website_link = $request->website_link;
        if ($request->hasFile('per_pic')) {
            $images = $request->file('per_pic');
            $destinationPath = public_path('/Personal_pictures');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->per_pic = json_encode($imageNames);
        }
        $data->facebook = $request->facebook;
        $data->insta = $request->insta;
        $data->tiktok = $request->tiktok;
        $data->linkedin = $request->linkedin;
        $data->youtube = $request->youtube;
        $data->zillow = $request->zillow;
        $data->amenities = $request->amenities;
        $data->save();
        return redirect('/manage_realstate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Realstate::find($id);
        $data->delete();
        return redirect('/manage_realstate');
    }
}
