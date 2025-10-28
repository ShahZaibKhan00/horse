@extends('layouts.admin_app')

@section('content')

<div class="content">
    <div class="pb-5">
        <div class="row g-4">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h2 class="mb-2">Update General</h2>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
          @foreach ($general as $general)
            <form method="POST" action="{{url('/update_general_info')}}" enctype="multipart/form-data" class="row g-3 mb-6">
              @csrf
              <div class="col-sm-6 col-md-4">
              <div class="form-floating"><input class="form-control" value="{{$general->G_name}}" name="G_name" id="floatingInputBudget" type="text" placeholder="Enter Website Name"><label for="floatingInputBudget">Website Name</label></div>
              </div>
              <div class="col-sm-6 col-md-4">
              <div class="form-floating"><input class="form-control" value="{{$general->G_email}}" name="Email" id="floatingInputBudget" type="email" placeholder="Enter Number"><label for="floatingInputBudget">Email</label></div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating"><input class="form-control" value="{{$general->G_number}}" name="Number" id="floatingInputBudget" type="text" placeholder="Enter Number"><label for="floatingInputBudget">Number</label></div>
              </div>
              <div class="col-12 gy-4">
                <div class="">
                  <h4 class="mb-3"> Website Address</h4><textarea placeholder="Enter Website Address" class="form-control" style="height: 120px" name="address">{{$general->G_address}}</textarea>
                </div>
              </div>
              <div class="col-12 gy-4">
                <div class="">
                  <h4 class="mb-3"> Footer Text</h4><textarea placeholder="Enter Footer Text" class="form-control" style="height: 120px" name="GF_text">{{$general->GF_text}}</textarea>
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$general->GS_facebook}}" name="GS_facebook" id="floatingInputBudget" type="text" placeholder="Enter Facebook Link"><label for="floatingInputBudget">Enter Facebook Link</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$general->GS_twitter}}" name="GS_twitter" id="floatingInputBudget" type="text" placeholder="Enter Twitter Link"><label for="floatingInputBudget">Enter Twitter Link</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$general->GS_instagram}}" name="GS_instagram" id="floatingInputBudget" type="text" placeholder="Enter Instagram Link"><label for="floatingInputBudget">Enter Instagram Link</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$general->GS_linkedin}}" name="GS_linkedin" id="floatingInputBudget" type="text" placeholder="Enter Linkedin Link"><label for="floatingInputBudget">Enter Linkedin Link</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$general->GS_tiktok}}" name="GS_tiktok" id="floatingInputBudget" type="text" placeholder="Enter Tiktok Link"><label for="floatingInputBudget">Enter Tiktok Link</label></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$general->GS_pintrest}}" name="GS_pintrest" id="floatingInputBudget" type="text" placeholder="Enter Pintrest Link"><label for="floatingInputBudget">Enter Pintrest Link</label></div>
              </div>
              <div class="col-12 gy-6">
                <div class="row g-3 justify-content-end">
                  <div class="col-auto"><button class="btn btn-phoenix-primary px-5">Cancel</button></div>
                  <div class="col-auto"><button type="submit" class="btn btn-primary px-5 px-sm-15">Update General Info</button></div>
                </div>
              </div>
            </form>
            @endforeach
          </div>
        </div>
    </div>
    
@endsection
