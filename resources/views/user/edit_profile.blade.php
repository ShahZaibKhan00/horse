@extends('layouts.user_app')

@section('content')

<style>
  .form-floating span.useremail{
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
    font-weight: 600;
    height: 48px;
    line-height: 2.49;
    color: var(--phoenix-gray-900);
    background-color: var(--phoenix-input-bg);
    background-clip: padding-box;
    border: 1px solid var(--phoenix-input-border-color);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.375rem;
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0);
    box-shadow: inset 0 1px 2px rgba(0,0,0,0);
    -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    -o-transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
  }
</style>
<div class="content">
    <div class="pb-5">
        <div class="row g-4">
            <div class="col-12 col-xxl-6">
                <div class="mb-4">
                    <h2 class="mb-2">Update Profile</h2>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
          @foreach ($profile as $profile)
            <form method="POST" action="{{url('/update_profile_info')}}" enctype="multipart/form-data" class="row g-3 mb-6">
              @csrf
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><span class="useremail">{{$profile->email}}</span></div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-floating"><input class="form-control" value="{{$profile->Number}}" name="Number" id="floatingInputBudget" type="number" placeholder="Enter Number"><label for="floatingInputBudget">Number</label></div>
              </div>
              <div class="col-12 gy-4">
                <div class="">
                  <h4 class="mb-3"> Personal Address</h4><textarea placeholder="Enter Personal Address" class="form-control" style="height: 120px" name="address">{{$profile->Address}}</textarea>
                </div>
              </div>
              <div class="col-12 gy-6">
                <div class="row g-3 justify-content-end">
                  <div class="col-auto"><button class="btn btn-phoenix-primary px-5">Cancel</button></div>
                  <div class="col-auto"><button type="submit" class="btn btn-primary px-5 px-sm-15">Update Profile Info</button></div>
                </div>
              </div>
            </form>
            @endforeach
          </div>
        </div>
    </div>
    
@endsection
