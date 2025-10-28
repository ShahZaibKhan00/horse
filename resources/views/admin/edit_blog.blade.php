@extends('layouts.admin_app')

@section('content')
<div class="content">
    <div class="pb-5">
        <div class="row g-4">
            <div class="col-12 col-xxl-6">
                    <h2 class="mb-2 main_heading_dashboard text-start">Update Blog</h2>
            </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            @foreach($data as $data)
            <form method="POST" action="{{url('/update_blog')}}" enctype="multipart/form-data" class="row g-3 mb-6">
              @csrf
              <input type="hidden" value="{{$data->id}}" name="id">
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$data->name}}" name="name" id="floatingInputBudget" type="text" placeholder="Enter Blog Name"><label for="floatingInputBudget">Enter Blog Name</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" name="blog_img" id="floatingInputBudget" type="file" placeholder="Blog Image"><label for="floatingInputBudget">Blog Image</label></div>
              </div>
              <div class="col-12 gy-4">
                <div class="">
                  <h4 class="mb-3"> Blog Description </h4>
                  <textarea name="description" id="summernote" required class="form-control"  rows="4">{{$data->description}}</textarea>
                  <!--<textarea class="tinymce" name="T_review" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'></textarea>-->
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$data->slug}}" name="slug" id="floatingInputGrid" type="text" placeholder="Enter Slug"><label for="floatingInputGrid">Enter Slug</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$data->meta_title}}" name="meta_title" id="floatingInputGrid" type="text" placeholder="Enter Meta Title"><label for="floatingInputGrid">Enter Meta Title</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$data->meta_description}}" name="meta_description" id="floatingInputGrid" type="text" placeholder="Enter Meta Description"><label for="floatingInputGrid">Enter Meta Description</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$data->meta_keyword}}" name="meta_keyword" id="floatingInputGrid" type="text" placeholder="Enter Meta Keyword"><label for="floatingInputGrid">Enter Meta Keyword</label></div>
              </div>
              <div class="col-12 gy-6">
                <div class="row g-3 justify-content-end">
                  <div class="col-auto"><button class="btn submit_btn_one">Cancel</button></div>
                  <div class="col-auto"><button type="submit" class="btn submit_btn_one">Update Blog</button></div>
                </div>
              </div>
            </form>
            @endforeach
          </div>
        </div>
    </div>
@endsection
