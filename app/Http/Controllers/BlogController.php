<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\General;
use App\Models\Category;
use App\Models\Gallery;

class BlogController extends Controller
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

        $categories = Category::all();
        $Web_name = $logoquery->G_name;
        if($usertype == '1'){
            $data = Blog::orderBy('id', 'desc')->get();
            return view('admin.blogs' , compact('username' , 'data' , 'userprofile' , 'Logo' , 'categories' , 'Web_name'));
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
        $categories = Category::all();
        $Web_name = $logoquery->G_name;
        if($usertype == '1'){
            return view('admin.add_blog' , compact('username' , 'userprofile' , 'Logo' , 'categories' , 'Web_name'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Blog;

        $data->name = $request->name;
        $profile = $request->blog_img;
        if($profile != ""){
            $destinationPath = public_path('/Blog_image');
            $extension = $profile->getClientOriginalExtension();
            $profileName = time() . '.' . $extension;
            $profile->move($destinationPath, $profileName);
            $data->image = $profileName;
        }
        $data->description = $request->description;
        $data->slug = $request->slug;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $data->status = 0;

        $data->save();
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        $categories = Category::all();
        $Web_name = $logoquery->G_name;
        if($usertype == '1'){
            $data = Blog::where('id', '=', $id)->get();
            return view('admin.edit_blog' , compact('username' , 'data' , 'userprofile' , 'Logo' , 'categories' , 'Web_name'));
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
        $data = Blog::find($id);

        $data->name = $request->name;
        $profile = $request->blog_img;
        if($profile != ""){
            $destinationPath = public_path('/Blog_image');
            $extension = $profile->getClientOriginalExtension();
            $profileName = time() . '.' . $extension;
            $profile->move($destinationPath, $profileName);
            $data->image = $profileName;
        }
        $data->description = $request->description;
        $data->slug = $request->slug;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;
        $data->status = 0;

        $data->save();
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Blog::find($id);
        $data->delete();
        return redirect('/blogs');
    }


    // Gallery Image Controller
    public function galleryindex()
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $images = Gallery::all();
        $categories = Category::all();
        $Web_name = $logoquery->G_name;

        return view('admin.gallery', compact('images', 'categories', 'userprofile' , 'Logo' , 'Web_name', 'userprofile', 'username'));
    }

    public function gallerystore(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/gallery'), $imageName);

                Gallery::create([
                    'image' => 'gallery/' . $imageName
                ]);
            }
        }

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function gallerydestroy($id)
    {
        $image = Gallery::findOrFail($id);
        $imagePath = public_path('uploads/' . $image->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
