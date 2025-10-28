<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\General;
use App\Models\Category;

class CategoryController extends Controller
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
            $data = Category::orderBy('id', 'desc')->get();
            return view('admin.category' , compact('username' , 'data' , 'userprofile' , 'Logo' , 'Web_name' , 'categories'));
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
            return view('admin.add_category' , compact('username' , 'userprofile' , 'Logo'  , 'Web_name' , 'categories'));
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
            'cate_name' => 'required',
            'cate_desc' => 'required',
            'cate_image' => 'required',
        ], [
            'cate_name.required' => 'The Category name field is required.',
            'cate_image.required' => 'The Category Image field is required.',
            'cate_desc.required' => 'The Category description field is required.',
        ]);
        
        $data = new Category;

        $data->cate_name = $request->cate_name;
        $data->cate_desc = $request->cate_desc;
        $cate = $request->cate_image;
        if($cate != ""){
            $destinationPath = public_path('/category_images');
            $extension = $cate->getClientOriginalExtension();
            $cateName = time() . '.' . $extension;
            $cate->move($destinationPath, $cateName);
            $data->cate_image = $cateName;
        }

        $data->save();
        return redirect('/manage_category');
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
            $data = Category::where('id', '=', $id)->get();
            return view('admin.edit_category' , compact('username' , 'data' , 'userprofile' , 'Logo'  , 'Web_name' , 'categories'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'cate_name' => 'required',
            'cate_desc' => 'required',
        ], [
            'cate_name.required' => 'The Category name field is required.',
            'cate_desc.required' => 'The Category description field is required.',
        ]);
        
        $id = $request->id;
        $data = Category::find($id);

        $data->cate_name = $request->cate_name;
        $data->cate_desc = $request->cate_desc;
        $cate = $request->cate_image;
        if($cate != ""){
            $destinationPath = public_path('/category_images');
            $extension = $cate->getClientOriginalExtension();
            $cateName = time() . '.' . $extension;
            $cate->move($destinationPath, $cateName);
            $data->cate_image = $cateName;
        }

        $data->save();
        return redirect('/manage_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect('/manage_category');
    }
}
