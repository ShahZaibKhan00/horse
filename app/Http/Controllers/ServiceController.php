<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\General;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
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
        if ($usertype == '1') {
            $data = Service::orderBy('id', 'desc')->get();
            return view('admin.service', compact('username', 'data', 'userprofile', 'Logo', 'Web_name', 'categories'));
        } else {
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
        $plans = DB::table('subscriptions')
            ->join('subscribed', 'subscriptions.id', '=', 'subscribed.subscription_id')
            ->where('subscriptions.useer_id', Auth::id())
            ->select('subscriptions.*', 'subscribed.*')
            ->orderBy('subscriptions.created_at', 'desc')
            ->get();
        if(Auth::user()->usertype == '0'){
            if ($plans[0]->remaining_token == 0) {
                $messages = [
                    'title' => 'Ads Finished!',
                    'detail' => 'Your ads have been finished. Kindly recharge them.'
                ];
                Session()->flash('alert-danger', $messages);
                return redirect()->back();
            }
        }
        // if ($usertype == '1') {
            return view('admin.add_service', compact('username', 'usertype', 'userprofile', 'Logo', 'Web_name', 'categories'));
        // } else {
        //     return redirect('/');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'number' => 'required',
        ], [
            'full_name.required' => 'The Service Full Name field is required.',
            'number.required' => 'The Service Email field is required.',
        ]);

        $pro_images = [];

        if ($request->hasFile('ser_gallery')) {
            foreach ($request->file('ser_gallery') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/services', $filename, 'public');
                $pro_images[] = $filename;
            }
        }
        $data = new Service;

        $ser_profile = $request->ser_profile;
        if ($ser_profile != "") {
            $destinationPath = public_path('/service-profile');
            $extension = $ser_profile->getClientOriginalExtension();
            $servName = time() . '_' . rand(10, 100) . '.' . $extension;
            $ser_profile->move($destinationPath, $servName);
            $data->ser_profile = $servName;
        }
        if ($request->hasFile('pro_video_url')) {
            $videos = $request->file('pro_video_url');
            $videoNames = [];
            foreach ($videos as $video) {
                $extension = $video->getClientOriginalExtension();
                $videoName = time() . '_' . rand(100,999) . '.' . $extension;
                $video->move(public_path('service-videos'), $videoName);
                $videoNames[] = $videoName;
            }
            $data->pro_video_url = implode(',', $videoNames);
        }


        $data->full_name = $request->full_name;
        $data->business_name = $request->business_name;
        $data->email = $request->email;
        $data->number = $request->number;
        $data->website_url = $request->website_url;
        $data->Address = $request->Address;
        $data->city = $request->city ?? "";
        $data->state = $request->state;
        $data->per_bio = $request->per_bio;
        $data->facebook = $request->facebook;
        $data->insta = $request->insta;
        $data->tiktok = $request->tiktok;
        $data->linkedin = $request->linkedin;
        $data->youtube = $request->youtube;
        $data->zillow = $request->zillow;

        $data->experience = $request->experience;
        $data->Languages = $request->languages;
        $data->business_name1 = $request->business_name1;
        $data->business_location1 = $request->business_location1;
        if ($request->hasFile('certifications')) {
            $images = $request->file('certifications');
            $destinationPath = public_path('/certification_images');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->certifications = json_encode($imageNames);
        }
        $data->services_offered = implode(',', $request->services_offered);
        $data->service_desc = $request->service_desc;
        $data->service_location = implode(',', $request->service_location);
        $data->pkg_price = $request->pkg_price ?? '$0';
        $data->pricing_type = $request->pricing_type;
        $data->payment_method = $request->payment_method;
        $data->ser_gallery = json_encode($pro_images);

        $data->demo_link = implode(',', $request->demo_link);
        $data->User_id = Auth::user()->id;
        $data->save();
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

        $messages = ['title' => 'Data Saved!!', 'detail' => 'Data Saved Successfully!'];
        Session()->flash('alert-success', $messages);
        $usertype = Auth::user()->usertype;
        $messages = ['title' => 'Data Saved!!', 'detail' => 'Data Saved Successfully!'];
        Session()->flash('alert-success', $messages);
        if($usertype == '1')
            return redirect('/manage_realstate');
        else
            return redirect("/service-listing");
        return redirect()->back();

        // return redirect('/manage_service');
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
        // if ($usertype == '1') {
            $data = Service::where('id', '=', $id)->get();
            return view('admin.edit_service', compact('username', 'usertype', 'data', 'userprofile', 'Logo', 'Web_name', 'categories'));
        // } else {
        //     return redirect('/');
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        // DB::beginTransaction();
        $data = Service::find($id);

        // $ser_profile = $request->ser_profile;
        // if ($ser_profile != "") {
        //     $destinationPath = public_path('/service-profile');
        //     $extension = $ser_profile->getClientOriginalExtension();
        //     $servName = time() . '_' . rand(10, 100) . '.' . $extension;
        //     $ser_profile->move($destinationPath, $servName);
        //     $data->ser_profile = $servName;
        // }
        $ser_profile = $request->ser_profile;
        if ($request->hasFile('pro_video_url')) {
            // 🔥 Purani videos delete karo
            if (!empty($data->pro_video_url)) {
                $oldVideos = explode(',', $data->pro_video_url);
                foreach ($oldVideos as $oldVideo) {
                    $oldPath = public_path('service-videos/' . $oldVideo);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }
            // 🔥 Nayi videos upload karo
            $videos = $request->file('pro_video_url');
            $videoNames = [];
            foreach ($videos as $video) {
                $extension = $video->getClientOriginalExtension();
                $videoName = time() . '_' . rand(100,999) . '.' . $extension;
                $video->move(public_path('service-videos'), $videoName);
                $videoNames[] = $videoName;
            }
            $data->pro_video_url = implode(',', $videoNames);
        }

        if ($ser_profile != "") {

            // 🔥 Purani image delete
            if ($data->ser_profile != "" && file_exists(public_path('/service-profile/'.$data->ser_profile))) {
                unlink(public_path('/service-profile/'.$data->ser_profile));
            }

            $destinationPath = public_path('/service-profile');
            $extension = $ser_profile->getClientOriginalExtension();
            $servName = time() . '_' . rand(10, 100) . '.' . $extension;

            $ser_profile->move($destinationPath, $servName);

            $data->ser_profile = $servName;
        }

        // dd("a");

        $data->full_name = $request->full_name;
        $data->business_name = $request->business_name;
        $data->email = $request->email;
        $data->number = $request->number;
        $data->website_url = $request->website_url;
        $data->Address = $request->Address;
        $data->city = $request->city ?? "";
        $data->state = $request->state;
        $data->facebook = $request->facebook;
        $data->insta = $request->insta;
        $data->tiktok = $request->tiktok;
        $data->linkedin = $request->linkedin;
        $data->youtube = $request->youtube;
        $data->zillow = $request->zillow;

        $data->business_name1 = $request->business_name1;
        $data->business_location1 = $request->business_location1;
        $data->per_bio = $request->per_bio;
        $data->experience = $request->experience;
        $data->Languages = implode(',', $request->Languages ?? []);
        if ($request->hasFile('certifications')) {
            $images = $request->file('certifications');
            $destinationPath = public_path('/certification_images');
            $imageNames = [];

            foreach ($images as $image) {
                if ($image) {
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $imageNames[] = $imageName;
                }
            }

            $data->certifications = json_encode($imageNames);
        }
        $data->services_offered = implode(',', $request->services_offered);
        $data->service_desc = $request->service_desc;
        $data->service_location = implode(',', $request->service_location ?? []);
        $data->pkg_price = $request->pkg_price ?? '$0';
        $data->pricing_type = $request->pricing_type;
        $data->payment_method = $request->payment_method;
        // if ($request->hasFile('ser_gallery')) {
        //     $images = $request->file('ser_gallery');
        //     $destinationPath = public_path('/gallery_images');
        //     $imageNames = [];

        //     foreach ($images as $image) {
        //         if ($image) {
        //             $extension = $image->getClientOriginalExtension();
        //             $imageName = time() . '_' . rand(10, 100) . '.' . $extension;
        //             $image->move($destinationPath, $imageName);
        //             $imageNames[] = $imageName;
        //         }
        //     }

        //     $data->ser_gallery = json_encode($imageNames);
        // }
        if ($request->hasFile('ser_gallery')) {

            // 🔴 Pehle purani images delete karo (agar mojood hain)
            if (!empty($data->ser_gallery)) {
                $oldImages = json_decode($data->ser_gallery, true);

                if (is_array($oldImages)) {
                    foreach ($oldImages as $oldImage) {
                        Storage::disk('public')->delete('uploads/services/' . $oldImage);
                    }
                }
            }

            // 🟢 Ab new images upload karo (same as create function)
            $pro_images = [];

            foreach ($request->file('ser_gallery') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('uploads/services', $filename, 'public');
                $pro_images[] = $filename;
            }

            // Save new images in database
            $data->ser_gallery = json_encode($pro_images);
        }
        $data->demo_link = implode(',', $request->video_url);
        $data->save();
        $messages = ['title' => 'Data Saved!!', 'detail' => 'Data Updated Successfully!'];
        Session()->flash('alert-success', $messages);
        // dd($data);
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
            return redirect('/manage_realstate');
        else
            return redirect("/service-listing");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Service::find($id);
        $data->delete();
        return redirect()->back();
        // return redirect('/manage_service');
    }
}
