@extends('layouts.admin_app')

@section('content')
<div class="content">
    <div class="pb-5">
        <div class="row g-4">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h2 class="mb-2 text-white main_heading_dashboard text-start">Add Category</h2>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="border_box_one">
            <form method="POST" action="{{url('/cate_store')}}" enctype="multipart/form-data" class="row g-3 mb-6">
              @csrf
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control gen_input" name="cate_name" id="floatingInputGrid" type="text" placeholder="Enter Category Name"><label for="floatingInputGrid">Enter Category Name</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control gen_input" name="cate_image" id="floatingInputGrid" type="file" placeholder="Enter Category Image"><label for="floatingInputGrid">Enter Category Image</label></div>
              </div>
              <div class="col-sm-6 col-md-12">
                <div class="form-floating"><input class="form-control gen_input" name="cate_desc" id="floatingInputGrid" type="text" placeholder="Enter Category Description"><label for="floatingInputGrid">Enter Category Description</label></div>
              </div>
              <div class="col-12 gy-6">
                <div class="row g-3 justify-content-end">
                  <div class="col-auto"><a href="{{url('/manage_category')}}" class="btn submit_btn_one" style="border: 1px solid #1d2139">Cancel</a></div>
                  <div class="col-auto"><button type="submit" class="btn submit_btn_one" style="width: 300px; border: 1px solid #1d2139">Create Category</button></div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection
