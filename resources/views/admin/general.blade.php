@extends('layouts.admin_app')

@section('content')
<style>
.avatar-upload {
  position: relative;
}
label svg {
    margin: 8px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: -8px;
  z-index: 1;
  top: -4px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f5f5f5;
  border-color: #99c0f3;
}
.avatar-upload .avatar-preview {
    width: 200px;
    height: 150px;
    position: relative;
    border-radius: 10%;
    border: 6px solid #b6caf8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 0;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}
.card-body a.btn:hover {
    color: #fff !important;
}
.card-body a.btn {
    background-color: transparent !important;
}
</style>
<div class="content">
    <div class="row g-3 justify-content-between mb-4">
        <div class="col-auto">
            <h2 class="mb-2">General Setting</h2>
        </div>
    </div>
    @foreach ($general as $general)
    <div class="row g-5 h-100">
        <div class="col-12 col-md-7">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-between pb-3">
                    <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                    <div class="col-12 col-sm-auto mb-sm-2">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="logoUpload" accept=".png, .jpg, .jpeg" />
                                <label for="logoUpload"><span class="text-primary-600 dark__text-primary-300" data-feather="edit"></span></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('{{ url('') }}/assets/images/{{$general->G_logo}}');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-auto flex-1">
                        <h3>{{$general->G_name}}</h3>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="card h-100">
            <div class="card-body pb-3">
                <div class="d-flex align-items-center mb-3">
                <h3 class="me-1">Website Info</h3><a href="{{url('edit_general')}}" class="btn btn-link p-0"><svg class="svg-inline--fa fa-pen fs-0 ms-3 text-500" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path></svg><!-- <span class="fas fa-pen fs-0 ms-3 text-500"></span> Font Awesome fontawesome.com --></a>
                </div>
                <h5 class="text-800">Address</h5>
                <p class="text-800">{{$general->G_address}}</p>
                <div class="mb-3">
                <h5 class="text-800">Email</h5><a href="mailto:{{$general->G_email}}">{{$general->G_email}}</a>
                </div>
                <h5 class="text-800">Phone</h5><a class="text-800" href="tel:{{$general->G_number}}">{{$general->G_number}}</a>
            </div>
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="card h-100">
            <div class="card-body pb-3">
                <div class="d-flex align-items-center mb-3">
                <h3 class="me-1">Footer Text</h3>
                </div>
                <p class="text-800">{{$general->GF_text}}</p>
            </div>
            </div>
        </div>
        <div class="col-12 col-md-12 mb-5">
            <div class="card h-100">
            <div class="card-body pb-3">
                <div class="d-flex align-items-center mb-3">
                <h3 class="me-1">Social Links</h3>
                </div>
                <h5 class="text-800">Facebook</h5>
                <p class="text-800">{{$general->GS_facebook}}</p>
                <h5 class="text-800">Twitter</h5>
                <p class="text-800">{{$general->GS_twitter}}</p>
                <h5 class="text-800">Instagram</h5>
                <p class="text-800">{{$general->GS_instagram}}</p>
                <h5 class="text-800">Linkedin</h5>
                <p class="text-800">{{$general->GS_linkedin}}</p>
                <h5 class="text-800">Tiktok</h5>
                <p class="text-800">{{$general->GS_tiktok}}</p>
                <h5 class="text-800">Pintrest</h5>
                <p class="text-800">{{$general->GS_pintrest}}</p>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    
@endsection
