@php
$layout = Auth::user()->usertype == 1 ? 'layouts.admin_app' : 'layouts.user_app';
@endphp
@extends($layout)
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
/* Existing styles ke baad yeh add karein */
.file-type-icon {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    color: #555;
    background-color: #f8f9fa;
    border-radius: 8px;
}
.pdf-icon-style {
    color: #dc3545; /* Red for PDF */
}
.doc-icon-style {
    color: #0d6efd; /* Blue for Word */
}
   .file-main-box {
   width: fit-content;
   margin-left: auto;
   display: flex;
   flex-direction: column;
   align-items: center;
   }
   .file-main-box h3 {
   font-size: 16px;
   }
   .file-wrapper {
   width: 130px;
   height: 130px;
   border: 2px dashed #1d2139;
   position: relative;
   margin: 0 auto;
   margin-top: 0;
   /* background: #1d2139; */
   border-radius: 18px;
   }
   .file-wrapper:after {
   content: '+';
   position: absolute;
   top: 0;
   bottom: 50px;
   left: 0;
   right: 0;
   margin: auto;
   width: max-content;
   height: max-content;
   display: block;
   max-height: 85px;
   font-size: 70px;
   font-weight: bolder;
   color: #1d2139;
   }
   .file-wrapper:before {
   content: 'Upload Image';
   display: block;
   position: absolute;
   left: 0;
   right: 0;
   margin: auto;
   bottom: 25px;
   width: max-content;
   height: max-content;
   font-size: 0.75em;
   color: #1d2139;
   }
   .file-wrapper:hover:after {
   font-size: 73px;
   }
   .file-wrapper .close-btn {
   display: none;
   }
   input[type="file"] {
   position: absolute;
   width: 100%;
   height: 100%;
   opacity: 0;
   cursor: pointer;
   }
   .file-main-box input[type="file"] {
   z-index: 99999;
   }
   .file-set {
   background-size: cover;
   background-repeat: no-repeat;
   color: transparent;
   padding: 10px;
   border-width: 0px;
   }
   .file-set:hover {
   transition: all 0.5s ease-out;
   filter: brightness(110%);
   }
   .file-set:before {
   color: transparent;
   }
   .file-set:after {
   color: transparent;
   }
   .file-set .close-btn {
   position: absolute;
   width: 35px;
   height: 35px;
   display: block;
   background: #000;
   color: #fff;
   top: 0;
   right: 0;
   font-size: 25px;
   text-align: center;
   line-height: 1.5;
   cursor: pointer;
   opacity: 0.8;
   }
   .file-set>input {
   pointer-events: none;
   }
   .upload_img_box {
   position: relative;
   width: 80px;
   height: 80px;
   margin: 5px;
   background-color: #1d2139;
   }
   .upload_img_box img {
   width: 100%;
   height: 100%;
   object-fit: cover;
   border-radius: 6px;
   }
   .upload_img_box.inactive {
   filter: blur(2px);
   pointer-events: none;
   }
   .custom-upload__box {
   margin-bottom: 40px;
   }
   .custom-upload__btn-box {
   width: 100%;
   height: 200px;
   border: 1px dashed #000;
   border-radius: 10px;
   display: flex;
   justify-content: center;
   align-items: center;
   position: relative;
   }
   .custom-upload__btn p {
   margin: 0 !important;
   color: #ccc;
   }
   .custom-upload__inputfile {
   width: 100%;
   height: 100%;
   opacity: 0;
   position: absolute;
   z-index: 99;
   top: 0;
   left: 0;
   cursor: pointer;
   }
   .custom-upload-images-flex {
   display: flex;
   flex-wrap: wrap;
   gap: 10px;
   max-width: 960px;
   margin: 0 auto;
   justify-content: center;
   }
   .custom-upload-img-box {
   width: 80px;
   height: 80px;
   border: 2px dashed #ccc;
   display: flex;
   align-items: center;
   justify-content: center;
   cursor: default;
   position: relative;
   border-radius: 8px;
   padding: 10px;
   background: #fff;
   }
   .custom-remove-btn {
   position: absolute;
   top: 2px;
   right: 4px;
   background: rgba(255, 0, 0, 0.9);
   color: white;
   border-radius: 50%;
   width: 20px;
   height: 20px;
   display: flex;
   align-items: center;
   justify-content: center;
   cursor: pointer;
   display: flex;
   font-size: 14px;
   line-height: 1;
   z-index: 100;
   }
   .custom-upload-img-box img {
   max-width: 100%;
   max-height: 100%;
   object-fit: contain;
   }
   .custom-upload-img-box:hover .custom-remove-btn {
   display: flex;
   }
   .pdf-icon {
   width: 100%;
   height: 100%;
   background-color: #f0f0f0;
   display: flex;
   align-items: center;
   justify-content: center;
   font-size: 14px;
   color: #555;
   position: relative;
   text-align: center;
   }
   .remove-multi-img,
   .remove-btn {
   position: absolute;
   top: 4px;
   right: 4px;
   background: red;
   color: white;
   border-radius: 50%;
   width: 20px;
   height: 20px;
   text-align: center;
   font-size: 14px;
   line-height: 20px;
   cursor: pointer;
   z-index: 2;
   display: flex;
   align-items: center;
   justify-content: center;
   }
   .multi_up_btn {
   width: 100%;
   height: 200px;
   border: 1px dashed #ccc;
   border-radius: 10px;
   display: flex;
   justify-content: center;
   align-items: center;
   box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
   cursor: pointer;
   }
   .asterisk {
   color: red;
   }
   .textarea {
   font-size: 0.8rem;
   padding: 20px;
   border-radius: 10px;
   border: 1px solid #EBEBEB;
   outline: none;
   background: #EBEBEB;
   }
   .placeholder_new {
   color: #313755;
   font-size: 0.8rem;
   padding: 7px 10px;
   }
   .dropdown-container {
   position: relative;
   width: 100%;
   font-family: sans-serif;
   }
   .dropdown-header {
   border: 2px solid #1d2139;
   padding: 9px 7px;
   cursor: pointer;
   display: flex;
   width: 100%;
   height: 55px;
   flex-wrap: wrap;
   gap: 5px;
   border-radius: 10px;
   background: white;
   }
   .dropdown-header .tag {
   background-color: #e0e5e9;
   padding: 4px 12px;
   border-radius: 8px;
   display: flex;
   align-items: center;
   font-size: 0.8rem;
   }
   .dropdown-header .tag button {
   background: none;
   border: none;
   margin-left: 5px;
   cursor: pointer;
   }
   .dropdown-list {
   position: absolute;
   top: 100%;
   left: 0;
   right: 0;
   max-height: 200px;
   overflow-y: auto;
   border: 1px solid #ccc;
   border-top: none;
   background: white;
   z-index: 999;
   display: none;
   }
   .dropdown-list.active {
   display: block;
   }
   .dropdown-list div {
   padding: 10px;
   cursor: pointer;
   font-size: 0.8rem;
   }
   .dropdown-list div:hover {
   background-color: #f0f0f0;
   }
   .gen_flex_box {
   display: flex;
   align-items: center;
   gap: 15px
   }
   .gen_flex_box input {
   width: 100px;
   }
   .gen_flex_box h5 {
   font-size: 15px;
   height: 37px;
   display: flex;
   align-items: center;
   color: #31374a;
   }
   .dz-image-preview {
   height: 140px !important;
   width: 140px !important;
   }
   .dropzone.dropzone-multiple .dz-image {
   height: 100%;
   width: 100%;
   -o-object-fit: cover;
   object-fit: cover;
   border-radius: 0;
   }
   .dropzone .dz-preview .dz-remove {
   color: red !important;
   }
   .input {
   width: 100%;
   font-size: 14px;
   padding: 15px 15px;
   margin-bottom: 0px;
   border: none;
   border-radius: 5px;
   }
   .upload__box {
   border-radius: 5px;
   background: white;
   position: relative;
   }
   .upload__inputfile {
   width: 100%;
   height: 100%;
   opacity: 0;
   position: absolute;
   z-index: 99;
   top: 0;
   left: 0;
   }
   .upload__btn {
   display: inline-block;
   font-weight: 600;
   color: #ccc;
   text-align: center;
   width: 100%;
   padding: 5px;
   transition: all 0.3s ease;
   cursor: pointer;
   height: 100%;
   font-size: 14px;
   }
   .upload__box p {
   color: #ccc;
   }
   .upload__btn:hover {
   background-color: unset;
   color: #4045ba;
   transition: all 0.3s ease;
   }
   .upload__btn-box {
   margin-bottom: 0px;
   border: 1px dashed #000;
   border-radius: 5px;
   padding: 30px 30px;
   }
   .upload__img-wrap {
   display: flex;
   flex-wrap: wrap;
   position: relative;
   z-index: 999;
   gap: 10px;
   }
   .upload__img-box {
   width: 100px;
   margin-bottom: 12px;
   border-radius: 5px;
   overflow: visible;
   }
   .upload__img-close {
   width: 18px;
   height: 18px;
   border-radius: 5px;
   background-color: rgba(0, 0, 0, 0.5);
   position: absolute;
   top: -15px;
   right: -15px;
   text-align: center;
   line-height: 16px;
   z-index: 999;
   cursor: pointer;
   }
   .upload__img-close:after {
   content: "✖";
   font-size: 10px;
   color: white;
   opacity: 0;
   }
   .img-bg {
   background-repeat: no-repeat;
   background-position: center;
   background-size: cover;
   position: relative;
   padding-bottom: 100%;
   }
   .upload__box p span {
   display: inline-block;
   width: 100%;
   color: var(--primeColor);
   font-weight: 600;
   }
   .upload__box p span.browse_option {
   color: #8d8d8d;
   font-weight: 400;
   }
   .custom-upload__inputfile {
   width: 100%;
   height: 100%;
   opacity: 0;
   position: absolute;
   z-index: 99;
   top: 0;
   left: 0;
   }
   .custom-upload__btn-box {
   width: 100%;
   height: 200px;
   border: 1px dashed #000;
   border-radius: 10px;
   display: flex;
   justify-content: center;
   align-items: center;
   position: relative;
   }
   .custom-upload__btn p {
   margin: 0 !important;
   color: #ccc;
   }
   .browse_option {
   color: #8d8d8d;
   font-weight: 400;
   }
   label.custom-upload__btn p {
   display: flex;
   flex-direction: column;
   align-items: center;
   }
   .custom-upload__box {
   margin-bottom: 40px;
   }
   .custom-upload-img-box {
   width: 100px;
   height: 100px;
   border: 2px dashed #ccc;
   display: flex;
   align-items: center;
   justify-content: center;
   cursor: default;
   position: relative;
   border-radius: 8px;
   padding: 10px;
   }
   .custom-remove-btn {
   position: absolute;
   top: 2px;
   right: 4px;
   background: rgba(0, 0, 0, 0.7);
   color: white;
   border-radius: 50%;
   padding: 2px 6px;
   cursor: pointer;
   display: flex;
   font-size: 14px;
   line-height: 1;
   }
   .custom-upload-img-box img {
   max-width: 100%;
   max-height: 100%;
   object-fit: contain;
   /* filter: brightness(0) invert(1); */
   }
   .custom-upload-images-flex {
   display: flex;
   flex-wrap: wrap;
   gap: 10px;
   max-width: 1100px;
   }
   .custom-relative-box {
   position: relative;
   }
   .custom-relative-box p {
   position: absolute;
   top: -26px;
   width: 100%;
   text-align: center;
   color: #000;
   }
   .custom-relative-box p a {
   text-decoration: underline;
   text-transform: capitalize;
   font-weight: 700;
   }
   .custom-upload-img-box.inactive {
   display: none;
   }
   .profile-upload-container {
   text-align: center;
   background: #fff;
   padding: 10px;
   border-radius: 10px;
   display: flex;
   justify-content: center;
   align-items: center;
   }
   .profile-pic-wrapper {
   position: relative;
   display: inline-block;
   width: 120px;
   height: 120px;
   border-radius: 10px;
   overflow: hidden;
   cursor: pointer;
   border: 2px dashed #ccc;
   }
   .profile-pic-image {
   width: 100%;
   height: 100%;
   object-fit: cover;
   display: block;
   }
   .profile-remove-btn {
   position: absolute;
   top: 4px;
   right: 4px;
   background: rgba(0, 0, 0, 0.6);
   color: #fff;
   border-radius: 50%;
   font-size: 16px;
   padding: 2px 6px;
   cursor: pointer;
   line-height: 1;
   }
   .profile-error-msg {
   color: red;
   font-size: 14px;
   }
   .heading__lg {
   font-size: 35px;
   }
   .upload__img-close {
   position: absolute;
   top: 3px;
   right: 3px;
   background: #000;
   border-radius: 50%;
   width: 20px;
   height: 20px;
   color: #fff;
   font-size: 14px;
   text-align: center;
   line-height: 20px;
   cursor: pointer;
   z-index: 10;
   display: flex;
   justify-content: center;
   align-items: center;
   padding-left: 14px;
   }
   .pdf-icon,
   .docx-icon,
   .video-icon {
   width: 100px;
   height: 100px;
   background-color: #f0f0f0;
   display: flex;
   align-items: center;
   justify-content: center;
   font-size: 32px;
   color: #555;
   position: relative;
   }
   .file-icon-text {
   font-size: 30px;
   text-align: center;
   line-height: 100px;
   }
   .service-category {
   margin-bottom: 25px;
   }
   .category-title {
   font-size: 18px;
   font-weight: bold;
   color: #000;
   margin-bottom: 1rem;
   }
   .custom-multiselect {
   position: relative;
   width: 100%;
   }
   .selected-tags {
   display: flex;
   align-items: center;
   gap: 6px;
   flex-wrap: wrap;
   min-height: 44px;
   padding: 4px 8px;
   border: 1px solid #ccc;
   border-radius: 6px;
   background: #fff;
   cursor: text;
   height: 55px !important;
   border: 2px solid #1d2139;
   border-radius: 8px !important;
   }
   .selected-tags .tag {
   background-color: #e0e5e9;
   padding: 10px 12px;
   border-radius: 8px;
   display: flex;
   align-items: center;
   font-size: 0.8rem;
   gap: 8px;
   }
   .selected-tags .tag .remove {
   cursor: pointer;
   font-weight: 700;
   padding-left: 4px;
   }
   .multi-input {
   min-width: 140px;
   border: none;
   outline: none;
   font-size: 14px;
   padding: 6px 4px;
   flex: 1 0 140px;
   background: transparent;
   }
   .custom-multiselect .dropdown {
   position: absolute;
   top: calc(100% + 6px);
   left: 0;
   right: 0;
   background-color: white;
   border: 1px solid #ccc;
   max-height: 200px;
   overflow-y: auto;
   z-index: 999;
   border-radius: 4px;
   padding: 6px 0;
   box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
   }
   .custom-multiselect .dropdown div {
   padding: 8px 12px;
   cursor: pointer;
   font-size: 13px;
   color: #000;
   }
   .custom-multiselect .dropdown div:hover {
   background-color: #f0f0f0;
   }
   .hidden {
   display: none;
   }
   /* small hint style when no results */
   .dropdown .no-results {
   padding: 8px 12px;
   color: #777;
   font-size: 13px;
   }
   .price-input-box {
   position: relative;
   margin-bottom: 10px;
   }
   .remove-btn {
   position: absolute;
   right: 10px;
   top: 8px;
   background: none;
   border: none;
   color: #dc3545;
   font-size: 18px;
   cursor: pointer;
   }
   .submit_btn_one, .submit_btn_one:hover {
   width: 200px;
   }
   .web_link_wrap {
   position: relative;
   }
   .web_link_wrap .gen_input_one {
   padding-left: 120px;
   }
   .web_link_wrap span {
   position: absolute;
   width: 100px;
   height: 55px;
   display: flex;
   align-items: center;
   justify-content: center;
   line-height: 1;
   background: #dec77e38;
   border-radius: 8px 0 0 8px;
   box-shadow: rgb(204, 219, 232) 4px 3px 18px 3px inset, rgb(233 193 119 / 68%) -3px -3px 11px -8px inset;
   }
</style>
<div class="content user_main_content p-5">
<div class="pb-5">
@if ($errors->any())
<div class="alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
@foreach ($data as $data)
<form method="POST" action="{{ url('/update_service') }}" enctype="multipart/form-data" class="row g-3 mb-6">
   @csrf
   <input type="hidden" value="{{ $data->id }}" name="id">
   <input type="hidden" id="images_to_delete" name="images_to_delete" value="[]">
   <input type="hidden" id="certifications_to_delete" name="certifications_to_delete" value="[]">
   <div class="box_top">
      <h2 class="mb-2 main_heading_dashboard">Edit Service Ad Information</h2>
   </div>
   <div class="row gy-4">
      <div class="col-12">
         <div class="border_box_one mb-3">
            <div class="row align-items-end">
               <div class="col-6">
                  <h3 class="mb-5 heading__lg">Basic Information</h3>
               </div>
               <div class="col-6">
                  {{-- 
                  <div class="file-main-box">
                     <h3 class="mb-3 ">Service Provider Image</h3>
                     <div class="file-wrapper">
                        <input type="file" name="ser_profile" accept="image/*" />
                        <div class="close-btn">×</div>
                     </div>
                  </div>
                  --}}
                  <style>
                     .file-wrapper {
                     position: relative;
                     width: 150px;
                     height: 150px;
                     cursor: pointer;
                     overflow: hidden;
                     }
                     .preview-img {
                     width: 100%;
                     height: 100%;
                     object-fit: cover;
                     border: 2px solid #ddd;
                     border-radius: 8px;
                     }
                     #image-input {
                     position: absolute;
                     top: 0;
                     left: 0;
                     width: 100%;
                     height: 100%;
                     opacity: 0;
                     cursor: pointer;
                     }
                  </style>
                  <div class="file-main-box">
                     <h3 class="mb-3">Upload new Image</h3>
                     <div class="file-wrapper">
                        <!-- Old Image Preview -->
                        <img id="preview-image" src="{{ $data->ser_profile ? asset('service-profile/' . $data->ser_profile) : asset('no-image.png') }}" width="148"
                           height="147">
                        <!-- File Input -->
                        <input type="file" name="ser_profile" id="image-input" accept="image/*" />
                        <div class="close-btn" onclick="removeImage()">×</div>
                     </div>
                  </div>
                  <script>
                     document.getElementById('image-input').addEventListener('change', function() {
                         const [file] = this.files;
                         if (file) {
                             document.getElementById('preview-image').src = URL.createObjectURL(file);
                         }
                     });
                  </script>
                  <script>
                     document.getElementById('image-input').addEventListener('change', function(e) {
                         const [file] = this.files;
                         if (file) {
                             document.getElementById('preview-image').src = URL.createObjectURL(file);
                         }
                     });
                     
                     function removeImage() {
                         document.getElementById('preview-image').src = "";
                         document.getElementById('image-input').value = "";
                     }
                  </script>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <h5 class="mb-2">Full Name or Business Name <span class="asterisk">*</span></h5>
                  <input class="form-control gen_input_one   mb-3" type="text" name="full_name" value="{{ $data->full_name }}" placeholder="Full Name" required />
               </div>
               {{-- 
               <div class="col-6">
                  <h5 class="mb-2">Business Name (if applicable)</h5>
                  <input class="form-control gen_input_one   mb-3" type="text" name="business_name" value="{{ $data->business_name }}"
                     placeholder="Business Name (if applicable)" />
               </div>
               --}}
               <div class="col-6">
                  <h5 class="mb-2">Email Address <span class="asterisk">*</span></h5>
                  <input class="form-control gen_input_one   mb-3" type="email" name="email" value="{{ $data->email }}" placeholder="Email Address" required />
               </div>
               <div class="col-6">
                  <h5 class="mb-2">Phone Number <span class="asterisk">*</span></h5>
                  <input class="form-control gen_input_one   mb-3 phone-input" type="tel" name="number" value="{{ $data->number }}" placeholder="Phone Number" required />
               </div>
               <div class="col-6">
                  <h5 class="mb-2">Website URL (optional)</h5>
                  <div class="web_link_wrap">
                     <span>http://</span>
                     <input class="form-control gen_input_one websiteInput mb-3" type="text" name="website_url"  value="{{ $data->website_url }}" placeholder="Website URL (optional)" />
                  </div>
               </div>
            </div>
         </div>
         <div class="border_box_one mb-3">
            <div class="row">
               <div class="col-12">
                  <h3 class="mb-2">Address Details<span class="asterisk">*</span></h3>
                  <input class="form-control gen_input mb-3" type="text" name="Address" value="{{ $data->Address }}" placeholder="Enter Your Address" />
               </div>
               
               <div class="col-4">
                   <h3 class="mb-2">Town / City<span class="asterisk">*</span></h3>
                  <input class="form-control gen_input mb-3" type="text" name="city" value="{{ $data->city }}" placeholder="Enter Town" />
               </div>
               
               
               <div class="col-4">
                  <!-- <input class="form-control gen_input mb-3" type="text" name="business_location1" placeholder="Enter Business Location" />  -->
                  <div class="col-12">
                      <h3 class="mb-2">State<span class="asterisk">*</span></h3>
                     <select class="form-control gen_input mb-3" name="state">
                        <option value="">Select your State</option>
                        <option value="alabama (AL)" {{ ($data->state ?? '') == 'alabama (AL)' ? 'selected' : '' }}>Alabama (AL)</option>
                        <option value="alaska (AK)" {{ ($data->state ?? '') == 'alaska (AK)' ? 'selected' : '' }}>Alaska (AK)</option>
                        <option value="arizona (AZ)" {{ ($data->state ?? '') == 'arizona (AZ)' ? 'selected' : '' }}>Arizona (AZ)</option>
                        <option value="arkansas (AR)" {{ ($data->state ?? '') == 'arkansas (AR)' ? 'selected' : '' }}>Arkansas (AR)</option>
                        <option value="california (CA)" {{ ($data->state ?? '') == 'california (CA)' ? 'selected' : '' }}>California (CA)</option>
                        <option value="colorado (CO)" {{ ($data->state ?? '') == 'colorado (CO)' ? 'selected' : '' }}>Colorado (CO)</option>
                        <option value="connecticut (CT)" {{ ($data->state ?? '') == 'connecticut (CT)' ? 'selected' : '' }}>Connecticut (CT)</option>
                        <option value="delaware (DE)" {{ ($data->state ?? '') == 'delaware (DE)' ? 'selected' : '' }}>Delaware (DE)</option>
                        <option value="florida (FL)" {{ ($data->state ?? '') == 'florida (FL)' ? 'selected' : '' }}>Florida (FL)</option>
                        <option value="georgia (GA)" {{ ($data->state ?? '') == 'georgia (GA)' ? 'selected' : '' }}>Georgia (GA)</option>
                        <option value="hawaii (HI)" {{ ($data->state ?? '') == 'hawaii (HI)' ? 'selected' : '' }}>Hawaii (HI)</option>
                        <option value="idaho (ID)" {{ ($data->state ?? '') == 'idaho (ID)' ? 'selected' : '' }}>Idaho (ID)</option>
                        <option value="illinois (IL)" {{ ($data->state ?? '') == 'illinois (IL)' ? 'selected' : '' }}>Illinois (IL)</option>
                        <option value="indiana (IN)" {{ ($data->state ?? '') == 'indiana (IN)' ? 'selected' : '' }}>Indiana (IN)</option>
                        <option value="iowa (IA)" {{ ($data->state ?? '') == 'iowa (IA)' ? 'selected' : '' }}>Iowa (IA)</option>
                        <option value="kansas (KS)" {{ ($data->state ?? '') == 'kansas (KS)' ? 'selected' : '' }}>Kansas (KS)</option>
                        <option value="kentucky (KY)" {{ ($data->state ?? '') == 'kentucky (KY)' ? 'selected' : '' }}>Kentucky (KY)</option>
                        <option value="louisiana (LA)" {{ ($data->state ?? '') == 'louisiana (LA)' ? 'selected' : '' }}>Louisiana (LA)</option>
                        <option value="maine (ME)" {{ ($data->state ?? '') == 'maine (ME)' ? 'selected' : '' }}>Maine (ME)</option>
                        <option value="maryland (MD)" {{ ($data->state ?? '') == 'maryland (MD)' ? 'selected' : '' }}>Maryland (MD)</option>
                        <option value="massachusetts (MA)" {{ ($data->state ?? '') == 'massachusetts (MA)' ? 'selected' : '' }}>Massachusetts (MA)</option>
                        <option value="michigan (MI)" {{ ($data->state ?? '') == 'michigan (MI)' ? 'selected' : '' }}>Michigan (MI)</option>
                        <option value="minnesota (MN)" {{ ($data->state ?? '') == 'minnesota (MN)' ? 'selected' : '' }}>Minnesota (MN)</option>
                        <option value="mississippi (MS)" {{ ($data->state ?? '') == 'mississippi (MS)' ? 'selected' : '' }}>Mississippi (MS)</option>
                        <option value="missouri (MO)" {{ ($data->state ?? '') == 'missouri (MO)' ? 'selected' : '' }}>Missouri (MO)</option>
                        <option value="montana (MT)" {{ ($data->state ?? '') == 'montana (MT)' ? 'selected' : '' }}>Montana (MT)</option>
                        <option value="nebraska (NE)" {{ ($data->state ?? '') == 'nebraska (NE)' ? 'selected' : '' }}>Nebraska (NE)</option>
                        <option value="nevada (NV)" {{ ($data->state ?? '') == 'nevada (NV)' ? 'selected' : '' }}>Nevada (NV)</option>
                        <option value="new hampshire (NH)" {{ ($data->state ?? '') == 'new hampshire (NH)' ? 'selected' : '' }}>New Hampshire (NH)</option>
                        <option value="new jersey (NJ)" {{ ($data->state ?? '') == 'new jersey (NJ)' ? 'selected' : '' }}>New Jersey (NJ)</option>
                        <option value="new mexico (NM)" {{ ($data->state ?? '') == 'new mexico (NM)' ? 'selected' : '' }}>New Mexico (NM)</option>
                        <option value="new york (NY)" {{ ($data->state ?? '') == 'new york (NY)' ? 'selected' : '' }}>New York (NY)</option>
                        <option value="north carolina (NC)" {{ ($data->state ?? '') == 'north carolina (NC)' ? 'selected' : '' }}>North Carolina (NC)</option>
                        <option value="north dakota (ND)" {{ ($data->state ?? '') == 'north dakota (ND)' ? 'selected' : '' }}>North Dakota (ND)</option>
                        <option value="ohio (OH)" {{ ($data->state ?? '') == 'ohio (OH)' ? 'selected' : '' }}>Ohio (OH)</option>
                        <option value="oklahoma (OK)" {{ ($data->state ?? '') == 'oklahoma (OK)' ? 'selected' : '' }}>Oklahoma (OK)</option>
                        <option value="oregon (OR)" {{ ($data->state ?? '') == 'oregon (OR)' ? 'selected' : '' }}>Oregon (OR)</option>
                        <option value="pennsylvania (PA)" {{ ($data->state ?? '') == 'pennsylvania (PA)' ? 'selected' : '' }}>Pennsylvania (PA)</option>
                        <option value="rhode island (RI)" {{ ($data->state ?? '') == 'rhode island (RI)' ? 'selected' : '' }}>Rhode Island (RI)</option>
                        <option value="south carolina (SC)" {{ ($data->state ?? '') == 'south carolina (SC)' ? 'selected' : '' }}>South Carolina (SC)</option>
                        <option value="south dakota (SD)" {{ ($data->state ?? '') == 'south dakota (SD)' ? 'selected' : '' }}>South Dakota (SD)</option>
                        <option value="tennessee (TN)" {{ ($data->state ?? '') == 'tennessee (TN)' ? 'selected' : '' }}>Tennessee (TN)</option>
                        <option value="texas (TX)" {{ ($data->state ?? '') == 'texas (TX)' ? 'selected' : '' }}>Texas (TX)</option>
                        <option value="utah (UT)" {{ ($data->state ?? '') == 'utah (UT)' ? 'selected' : '' }}>Utah (UT)</option>
                        <option value="vermont (VT)" {{ ($data->state ?? '') == 'vermont (VT)' ? 'selected' : '' }}>Vermont (VT)</option>
                        <option value="virginia (VA)" {{ ($data->state ?? '') == 'virginia (VA)' ? 'selected' : '' }}>Virginia (VA)</option>
                        <option value="washington (WA)" {{ ($data->state ?? '') == 'washington (WA)' ? 'selected' : '' }}>Washington (WA)</option>
                        <option value="west virginia (WV)" {{ ($data->state ?? '') == 'west virginia (WV)' ? 'selected' : '' }}>West Virginia (WV)</option>
                        <option value="wisconsin (WI)" {{ ($data->state ?? '') == 'wisconsin (WI)' ? 'selected' : '' }}>Wisconsin (WI)</option>
                        <option value="wyoming (WY)" {{ ($data->state ?? '') == 'wyoming (WY)' ? 'selected' : '' }}>Wyoming (WY)</option>
                     </select>
                  </div>
               </div>
               <div class="col-4">
                   <h3 class="mb-2">Zip Code<span class="asterisk">*</span></h3>
                  <input class="form-control gen_input mb-3" type="text" name="zip_code" value="{{ $data->zip_code }}" placeholder="Enter Town" />
               </div>
            </div>
            {{-- 
            <div class="border_box_one mb-3">
               --}}
               {{-- 
               <h3 class="mb-2">Location <span class="asterisk">*</span> <small class="text-muted">(town,state, US based only)</small></h3>
               <h4 class="mb-3"><small class="text-muted">(Kindly provide your address to include your business in our map feature, which will assist potential clients in locating your
                  services more easily.)</small>
               </h4>
               --}}
               {{-- 
               <div class="row">
                  {{-- 
                  <div class="col-6"><input class="form-control gen_input mb-3" type="text" name="Address" value="{{ $data->Address }}" placeholder="Enter Your Town" /></div>
                  <div class="col-6">
                     <select class="form-control gen_input mb-3" name="state">
                        <option value="">Select your State</option>
                        <option value="alabama" {{ $data->state == 'alabama' ? 'selected' : '' }}>Alabama</option>
                        <option value="alaska" {{ $data->state == 'alaska' ? 'selected' : '' }}>Alaska</option>
                        <option value="arizona" {{ $data->state == 'arizona' ? 'selected' : '' }}>Arizona</option>
                        <option value="arkansas" {{ $data->state == 'arkansas' ? 'selected' : '' }}>Arkansas</option>
                        <option value="california" {{ $data->state == 'california' ? 'selected' : '' }}>California</option>
                        <option value="colorado" {{ $data->state == 'colorado' ? 'selected' : '' }}>Colorado</option>
                        <option value="connecticut" {{ $data->state == 'connecticut' ? 'selected' : '' }}>Connecticut</option>
                        <option value="delaware" {{ $data->state == 'delaware' ? 'selected' : '' }}>Delaware</option>
                        <option value="florida" {{ $data->state == 'florida' ? 'selected' : '' }}>Florida</option>
                        <option value="georgia" {{ $data->state == 'georgia' ? 'selected' : '' }}>Georgia</option>
                        <option value="hawaii" {{ $data->state == 'hawaii' ? 'selected' : '' }}>Hawaii</option>
                        <option value="idaho" {{ $data->state == 'idaho' ? 'selected' : '' }}>Idaho</option>
                        <option value="illinois" {{ $data->state == 'illinois' ? 'selected' : '' }}>Illinois</option>
                        <option value="indiana" {{ $data->state == 'indiana' ? 'selected' : '' }}>Indiana</option>
                        <option value="iowa" {{ $data->state == 'iowa' ? 'selected' : '' }}>Iowa</option>
                        <option value="kansas" {{ $data->state == 'kansas' ? 'selected' : '' }}>Kansas</option>
                        <option value="kentucky" {{ $data->state == 'kentucky' ? 'selected' : '' }}>Kentucky</option>
                        <option value="louisiana" {{ $data->state == 'louisiana' ? 'selected' : '' }}>Louisiana</option>
                        <option value="maine" {{ $data->state == 'maine' ? 'selected' : '' }}>Maine</option>
                        <option value="maryland" {{ $data->state == 'maryland' ? 'selected' : '' }}>Maryland</option>
                        <option value="massachusetts" {{ $data->state == 'massachusetts' ? 'selected' : '' }}>Massachusetts</option>
                        <option value="michigan" {{ $data->state == 'michigan' ? 'selected' : '' }}>Michigan</option>
                        <option value="minnesota" {{ $data->state == 'minnesota' ? 'selected' : '' }}>Minnesota</option>
                        <option value="mississippi" {{ $data->state == 'mississippi' ? 'selected' : '' }}>Mississippi</option>
                        <option value="missouri" {{ $data->state == 'missouri' ? 'selected' : '' }}>Missouri</option>
                        <option value="montana" {{ $data->state == 'montana' ? 'selected' : '' }}>Montana</option>
                        <option value="nebraska" {{ $data->state == 'nebraska' ? 'selected' : '' }}>Nebraska</option>
                        <option value="nevada" {{ $data->state == 'nevada' ? 'selected' : '' }}>Nevada</option>
                        <option value="new_hampshire" {{ $data->state == 'new_hampshire' ? 'selected' : '' }}>New Hampshire</option>
                        <option value="new_jersey" {{ $data->state == 'new_jersey' ? 'selected' : '' }}>New Jersey</option>
                        <option value="new_mexico" {{ $data->state == 'new_mexico' ? 'selected' : '' }}>New Mexico</option>
                        <option value="new_york" {{ $data->state == 'new_york' ? 'selected' : '' }}>New York</option>
                        <option value="north_carolina" {{ $data->state == 'north_carolina' ? 'selected' : '' }}>North Carolina</option>
                        <option value="north_dakota" {{ $data->state == 'north_dakota' ? 'selected' : '' }}>North Dakota</option>
                        <option value="ohio" {{ $data->state == 'ohio' ? 'selected' : '' }}>Ohio</option>
                        <option value="oklahoma" {{ $data->state == 'oklahoma' ? 'selected' : '' }}>Oklahoma</option>
                        <option value="oregon" {{ $data->state == 'oregon' ? 'selected' : '' }}>Oregon</option>
                        <option value="pennsylvania" {{ $data->state == 'pennsylvania' ? 'selected' : '' }}>Pennsylvania</option>
                        <option value="rhode_island" {{ $data->state == 'rhode_island' ? 'selected' : '' }}>Rhode Island</option>
                        <option value="south_carolina" {{ $data->state == 'south_carolina' ? 'selected' : '' }}>South Carolina</option>
                        <option value="south_dakota" {{ $data->state == 'south_dakota' ? 'selected' : '' }}>South Dakota</option>
                        <option value="tennessee" {{ $data->state == 'tennessee' ? 'selected' : '' }}>Tennessee</option>
                        <option value="texas" {{ $data->state == 'texas' ? 'selected' : '' }}>Texas</option>
                        <option value="utah" {{ $data->state == 'utah' ? 'selected' : '' }}>Utah</option>
                        <option value="vermont" {{ $data->state == 'vermont' ? 'selected' : '' }}>Vermont</option>
                        <option value="virginia" {{ $data->state == 'virginia' ? 'selected' : '' }}>Virginia</option>
                        <option value="washington" {{ $data->state == 'washington' ? 'selected' : '' }}>Washington</option>
                        <option value="west_virginia" {{ $data->state == 'west_virginia' ? 'selected' : '' }}>West Virginia</option>
                        <option value="wisconsin" {{ $data->state == 'wisconsin' ? 'selected' : '' }}>Wisconsin</option>
                        <option value="wyoming" {{ $data->state == 'wyoming' ? 'selected' : '' }}>Wyoming</option>
                     </select>
                  </div>
                  --}}
                  {{-- 
                  <h3 class="mb-2">Business Name & Physical Location<span class="asterisk">*</span></h3>
                  <div class="col-6"><input class="form-control gen_input mb-3" type="text" name="business_name1" value="{{ $data->business_name1 }}"
                     placeholder="Enter Business Name" /></div>
                  <div class="col-6"><input class="form-control gen_input mb-3" type="text" name="business_location1"  value="{{ $data->business_location1 }}"
                     placeholder="Enter Business Location" /></div>
               </div>
            </div>
            --}}
            <!--<div class="row">
               <div class="col-6"><input class="form-control gen_input mb-3" type="text" name="Address" value="{{ $data->Address }}" placeholder="Enter Your Town" /></div>
               <div class="col-6">
                   @php
                       $states = [
                           'alabama' => 'Alabama',
                           'alaska' => 'Alaska',
                           'arizona' => 'Arizona',
                           'arkansas' => 'Arkansas',
                           'california' => 'California',
                           'colorado' => 'Colorado',
                           'connecticut' => 'Connecticut',
                           'delaware' => 'Delaware',
                           'florida' => 'Florida',
                           'georgia' => 'Georgia',
                           'hawaii' => 'Hawaii',
                           'idaho' => 'Idaho',
                           'illinois' => 'Illinois',
                           'indiana' => 'Indiana',
                           'iowa' => 'Iowa',
                           'kansas' => 'Kansas',
                           'kentucky' => 'Kentucky',
                           'louisiana' => 'Louisiana',
                           'maine' => 'Maine',
                           'maryland' => 'Maryland',
                           'massachusetts' => 'Massachusetts',
                           'michigan' => 'Michigan',
                           'minnesota' => 'Minnesota',
                           'mississippi' => 'Mississippi',
                           'missouri' => 'Missouri',
                           'montana' => 'Montana',
                           'nebraska' => 'Nebraska',
                           'nevada' => 'Nevada',
                           'new_hampshire' => 'New Hampshire',
                           'new_jersey' => 'New Jersey',
                           'new_mexico' => 'New Mexico',
                           'new_york' => 'New York',
                           'north_carolina' => 'North Carolina',
                           'north_dakota' => 'North Dakota',
                           'ohio' => 'Ohio',
                           'oklahoma' => 'Oklahoma',
                           'oregon' => 'Oregon',
                           'pennsylvania' => 'Pennsylvania',
                           'rhode_island' => 'Rhode Island',
                           'south_carolina' => 'South Carolina',
                           'south_dakota' => 'South Dakota',
                           'tennessee' => 'Tennessee',
                           'texas' => 'Texas',
                           'utah' => 'Utah',
                           'vermont' => 'Vermont',
                           'virginia' => 'Virginia',
                           'washington' => 'Washington',
                           'west_virginia' => 'West Virginia',
                           'wisconsin' => 'Wisconsin',
                           'wyoming' => 'Wyoming',
                       ];
                   @endphp
               
                   <select class="form-control gen_input mb-3" name="state" required>
                       <option value="" disabled {{ empty($data->state) ? 'selected' : '' }}>Select your State</option>
                       @foreach ($states as $key => $state)
               <option value="{{ $key }}" {{ $data->state == $key ? 'selected' : '' }}>{{ $state }}</option>
               @endforeach
                   </select>
               </div>
               </div>-->
         </div>
      </div>
      @php
      $selected = explode(',', $data->service_location);
      @endphp
      <div class="col-12">
         <div class="border_box_one mb-3">
            <div class="row">
               <div class="col-3">
                  <h4 class="mb-3">Service Location</h4>
                  <div class="form-check">
                     <label>
                     <input class="form-check-input" type="checkbox" name="service_location[]" value="At Provider’s Facility" @if (in_array('At Provider’s Facility', $selected)) checked @endif>
                     At Provider’s Facility
                     </label>
                  </div>
                  <div class="form-check">
                     <label>
                     <input class="form-check-input" type="checkbox" name="service_location[]" value="Mobile (I travel to client)" @if (in_array('Mobile (I travel to client)', $selected)) checked @endif>
                     Mobile (I travel to client)
                     </label>
                  </div>
                  <div class="form-check">
                     <label>
                     <input class="form-check-input" type="checkbox" name="service_location[]" value="Virtual / Online" @if (in_array('Virtual / Online', $selected)) checked @endif>
                     Virtual / Online Coaching
                     </label>
                  </div>
               </div>
               <div class="col-9">
                  <h4 class="mb-0">Service Areas's Coverd</h4>
                  <p>Enters upto 10 areas to cover. You may enters towns, counties and states:</p>
                  <div class="row gy-3 mt-2">
                     @php
                     $features = is_array($data->features) ? $data->features : ( $data->features ? json_decode($data->features, true) : [] );
                     @endphp
                     @for($i = 0; $i < 10; $i++)
                     <div class="col-3">
                        <input class="form-control gen_input" type="text" name="features[]"
                           value="{{ old('features.'.$i, $features[$i] ?? '') }}" placeholder="Type Here" />
                     </div>
                     @endfor
                     {{-- @for($i = 0; $i < 10; $i++)
                     <div class="col-3">
                        <input class="form-control gen_input"
                           type="text"
                           name="features[]"
                           value="{{ $data->features[$i] ?? '' }}"
                           placeholder="Type Here" />
                     </div>
                     @endfor --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12">
         <div class="border_box_one mb-3">
            <h3 class="mb-3">About</h3>
            <div class="col-12">
               <div class="mb-3">
                  <h5 class="mb-3">Short Bio / Introduction <small class="text-muted">(150–300 words to talk about experience, passion, certifications, etc.) </small></h5>
                  <textarea class="textarea summernote" name="per_bio" maxlength="300" style="width: 100%; height: 15rem;" placeholder="Tell your potential clients about you or your company">{{ $data->per_bio }}</textarea>
               </div>
            </div>
         </div>
         <div class="col-12">
            <div class="row mb-4">
               <div class="col-3">
                  <div class="border_box_one">
                     <div class="">
                        <h4 class="mb-3">Experience</h4>
                        <div class="gen_flex_box">
                           <input class="form-control gen_input text-center experience-input" type="tel" name="experience" value="{{ $data->experience }}"
                              placeholder="---" />
                           <h5 class="experience-label">Years Experience</h5>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-9">
                  <div class="border_box_one">
                     <input type="hidden" id="selectedInput_languages" name="Languages[]" value="{{ $data->Languages }}">
                     <div class="dropdown-container" data-dropdown-name="languages">
                        <h4 class="mb-3">Languages Spoken</h4>
                        <div class="dropdown-header"></div>
                        <div class="dropdown-list">
                           <div onclick="selectOption(this)" data-value="English">English</div>
                           <div onclick="selectOption(this)" data-value="Spanish">Spanish</div>
                           <div onclick="selectOption(this)" data-value="Chinese (Mandarin)">Chinese (Mandarin)</div>
                           <div onclick="selectOption(this)" data-value="Hindi">Hindi</div>
                           <div onclick="selectOption(this)" data-value="Arabic">Arabic</div>
                           <div onclick="selectOption(this)" data-value="Portuguese">Portuguese</div>
                           <div onclick="selectOption(this)" data-value="Russian">Russian</div>
                           <div onclick="selectOption(this)" data-value="Japanese">Japanese</div>
                           <div onclick="selectOption(this)" data-value="French">French</div>
                           <div onclick="selectOption(this)" data-value="German">German</div>
                           <div onclick="selectOption(this)" data-value="Korean">Korean</div>
                           <div onclick="selectOption(this)" data-value="Italian">Italian</div>
                           <div onclick="selectOption(this)" data-value="Turkish">Turkish</div>
                           <div onclick="selectOption(this)" data-value="Bengali">Bengali</div>
                           <div onclick="selectOption(this)" data-value="Vietnamese">Vietnamese</div>
                           <div onclick="selectOption(this)" data-value="Tagalog">Tagalog</div>
                           <div onclick="selectOption(this)" data-value="Polish">Polish</div>
                           <div onclick="selectOption(this)" data-value="Persian (Farsi)">Persian (Farsi)</div>
                           <div onclick="selectOption(this)" data-value="Gujarati">Gujarati</div>
                           <div onclick="selectOption(this)" data-value="Greek">Greek</div>
                           <div onclick="selectOption(this)" data-value="Hebrew">Hebrew</div>
                           <div onclick="selectOption(this)" data-value="Ukrainian">Ukrainian</div>
                           <div onclick="selectOption(this)" data-value="Hmong">Hmong</div>
                           <div onclick="selectOption(this)" data-value="Tamil">Tamil</div>
                           <div onclick="selectOption(this)" data-value="Dutch">Dutch</div>
                           <div onclick="selectOption(this)" data-value="Thai">Thai</div>
                           <div onclick="selectOption(this)" data-value="Armenian">Armenian</div>
                           <div onclick="selectOption(this)" data-value="Navajo">Navajo</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12">
            <div class="col-12">
               <div class="border_box_one">
                  <h4 class="mb-3">Certifications / Accreditations</h4>
                  <div class="upload__box">
                     <div class="col-12">
                        <div class="custom-upload__btn-box mb-3">
                           <label class="custom-upload__btn">
                              <p>Drag your File here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                              <input type="file" id="certFilesInput" name="certifications[]" class="custom-upload__inputfile" multiple>
                           </label>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="custom-upload-images-flex" id="certFilesContainer">
                           @php
                           $certs = json_decode($data->certifications, true) ?? [];
                           @endphp
                           @for ($i = 0; $i < 10; $i++)
                           <div class="custom-upload-img-box">
                              @if (isset($certs[$i]))
                              <img src="{{ asset('certification_images/' . $certs[$i]) }}" class="img-fluid uploaded existing" data-index="{{ $i }}" alt="Existing cert">
                              <span class="custom-remove-btn" onclick="removeExistingCert({{ $i }}, this)">&times;</span>
                              @else
                              <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="Add file">
                              <span class="custom-remove-btn" style="display:none">&times;</span>
                              @endif
                           </div>
                           @endfor
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {{-- 
      <div class="col-12 mb-4">
         <div class="border_box_one">
            <h3 class="mb-3">Type of Services Offered <span class="asterisk">*</span></h3>
            @php
            $selected_services = explode(',', $data->services_offered);
            function checked($value, $selected_services)
            {
            return in_array($value, $selected_services) ? 'checked' : '';
            }
            @endphp
            <div class="row custom_form_checks">
               @php
               $services = [
               'accountants' => 'Accountants',
               'ai_services' => 'AI Services',
               'arena_builder' => 'Arena Builder',
               'auctions' => 'Auctions',
               'barn_builders' => 'Barn Builders',
               'barn_hand' => 'Barn Hand',
               'blanket_cleaning' => 'Blanket Cleaning',
               'boarding' => 'Boarding',
               'breeders' => 'Breeders',
               'brokers' => 'Brokers',
               'broodmare_manager' => 'Broodmare Manager',
               'burial_services' => 'Burial Services',
               'caretaking' => 'Caretaking & Sitters',
               'carriage_hire' => 'Carriage Hire',
               'childrens_camp' => 'Children’s Camp',
               'chiropractor' => 'Chiropractor / Acupuncture / MagnaWave',
               'clubs' => 'Clubs',
               'construction' => 'Construction',
               'cremation_service' => 'Cremation Service',
               'dentists' => 'Dentists',
               'education' => 'Education',
               'employment' => 'Employment',
               'entertainment' => 'Entertainment',
               'equine_artist' => 'Equine Artist',
               'equine_nutrition' => 'Equine Nutrition',
               'equipment' => 'Equipment',
               'event_coordinator' => 'Event Coordinator',
               'events' => 'Events',
               'exercise_riders' => 'Exercise Riders',
               'farm_lenders' => 'Farm Lenders',
               'farriers' => 'Farriers',
               'feed_supply' => 'Feed Supply',
               'produce_supplier' => 'Feed / Produce Supplier',
               'fencing_contractors' => 'Fencing Contractors / Suppliers',
               'general_services' => 'General Services',
               'giftware' => 'Giftware',
               'grooming' => 'Grooming / Clipping',
               'hay_delivery' => 'Hay Delivery',
               'horse_transport' => 'Horse Transport',
               'instructors' => 'Instructors / Coaches',
               'insurance' => 'Insurance',
               'jewelry' => 'Jewelry',
               'lawyers' => 'Lawyers',
               'manure_removal' => 'Manure Removal',
               'marketing' => 'Marketing',
               'message_therapy' => 'Message Therapy',
               'parties' => 'Parties',
               'photography' => 'Photography',
               'physical_therapy' => 'Physical Therapy',
               'pony_parties' => 'Pony Parties',
               'property_care' => 'Property Care',
               'real_estate' => 'Real Estate',
               'registries' => 'Registries',
               'rehabilitation_therapist' => 'Rehabilitation Therapist',
               'rescues' => 'Rescues',
               'riding_centers' => 'Riding Centers',
               'saddle_fitters' => 'Saddle Fitters',
               'saddlery' => 'Saddlery',
               'saddlery_repairs' => 'Saddlery Repairs',
               'shipping' => 'Shipping',
               'show_judges' => 'Show Judges',
               'sponsors' => 'Sponsors',
               'stables' => 'Stables',
               'stallion_manager' => 'Stallion Manager',
               ];
               $chunks = array_chunk($services, ceil(count($services) / 4), true);
               @endphp
               @foreach ($chunks as $chunk)
               <div class="col-md-3">
                  @foreach ($chunk as $value => $label)
                  <div class="form-check">
                     <label>
                     <input class="form-check-input" type="checkbox" name="services_offered[]" value="{{ $value }}"
                     {{ checked($value, $selected_services) }}>
                     {{ $label }}
                     </label>
                  </div>
                  @endforeach
               </div>
               @endforeach
            </div>
         </div>
      </div>
      --}}
      <div class="col-12 pb-4">
         <div class="border_box_one">
            <h3 class="mb-3">Type of Services Offered <span class="asterisk">*</span></h3>
            <div class="row custom_form_checks">
               <!-- Veterinary & Health Services -->
               <div class="col-md-4 ">
                  @php
                  $csv = $data->services_offered;
                  $values = explode(',', $csv);
                  @endphp
                  <div class="service-category">
                    <h5 class="category-title">Veterinary & Health</h5>
                    
                    <!-- Existing Items -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('acupuncture', $values) ? 'checked' : '' }} value="acupuncture" id="acupuncture">
                        <label class="form-check-label" for="acupuncture">Acupuncture</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('anhydrosis_treatment', $values) ? 'checked' : '' }} value="anhydrosis_treatment" id="anhydrosis_treatment">
                        <label class="form-check-label" for="anhydrosis_treatment">Anhydrosis diagnosis & treatment</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('blood_transfusion', $values) ? 'checked' : '' }} value="blood_transfusion" id="blood_transfusion">
                        <label class="form-check-label" for="blood_transfusion">Blood transfusion services</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('cardiac_telemetry', $values) ? 'checked' : '' }} value="cardiac_telemetry" id="cardiac_telemetry">
                        <label class="form-check-label" for="cardiac_telemetry">Cardiac telemetry</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('chiropractic_care', $values) ? 'checked' : '' }} value="chiropractic_care" id="chiropractic_care">
                        <label class="form-check-label" for="chiropractic_care">Chiropractic care</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('clinical_trials', $values) ? 'checked' : '' }} value="clinical_trials" id="clinical_trials">
                        <label class="form-check-label" for="clinical_trials">Clinical trials / research participation</label>
                    </div>
                
                    <!-- UPDATED: Value changed from 'dentistry' to 'equine_dentistry' to match Add form -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equine_dentistry', $values) ? 'checked' : '' }} value="equine_dentistry" id="equine_dentistry">
                        <label class="form-check-label" for="equine_dentistry">Equine Dentistry</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('dermatology', $values) ? 'checked' : '' }} value="dermatology" id="dermatology">
                        <label class="form-check-label" for="dermatology">Dermatology</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('deworming_programs', $values) ? 'checked' : '' }} value="deworming_programs" id="deworming_programs">
                        <label class="form-check-label" for="deworming_programs">Deworming programs</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('diagnostic_imaging', $values) ? 'checked' : '' }} value="diagnostic_imaging" id="diagnostic_imaging">
                        <label class="form-check-label" for="diagnostic_imaging">Diagnostic imaging</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('dynamic_endoscopy', $values) ? 'checked' : '' }} value="dynamic_endoscopy" id="dynamic_endoscopy">
                        <label class="form-check-label" for="dynamic_endoscopy">Dynamic endoscopy</label>
                    </div>
                
                    <!-- NEW: Emergency on-call vet services -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('emergency_on_call_vet', $values) ? 'checked' : '' }} value="emergency_on_call_vet" id="emergency_on_call_vet">
                        <label class="form-check-label" for="emergency_on_call_vet">Emergency on-call vet services</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('emergency_vet_care', $values) ? 'checked' : '' }} value="emergency_vet_care" id="emergency_vet_care">
                        <label class="form-check-label" for="emergency_vet_care">Emergency vet care</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('endoscopy_gastroscopy', $values) ? 'checked' : '' }} value="endoscopy_gastroscopy" id="endoscopy_gastroscopy">
                        <label class="form-check-label" for="endoscopy_gastroscopy">Endoscopy & gastroscopy</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equine_hospice', $values) ? 'checked' : '' }} value="equine_hospice" id="equine_hospice">
                        <label class="form-check-label" for="equine_hospice">Equine hospice / end-of-life care</label>
                    </div>
                
                    <!-- NEW: Export health documentation -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('export_health_documentation', $values) ? 'checked' : '' }} value="export_health_documentation" id="export_health_documentation">
                        <label class="form-check-label" for="export_health_documentation">Export health documentation</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('shock_wave_therapy', $values) ? 'checked' : '' }} value="shock_wave_therapy" id="shock_wave_therapy">
                        <label class="form-check-label" for="shock_wave_therapy">Extra-corporeal shock wave therapy</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('fracture_repair', $values) ? 'checked' : '' }} value="fracture_repair" id="fracture_repair">
                        <label class="form-check-label" for="fracture_repair">Fracture repair surgery</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('gait_analysis', $values) ? 'checked' : '' }} value="gait_analysis" id="gait_analysis">
                        <label class="form-check-label" for="gait_analysis">Gait analysis and biomechanics</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('general_veterinary', $values) ? 'checked' : '' }} value="general_veterinary" id="general_veterinary">
                        <label class="form-check-label" for="general_veterinary">General veterinary care</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('genetic_testing', $values) ? 'checked' : '' }} value="genetic_testing" id="genetic_testing">
                        <label class="form-check-label" for="genetic_testing">Genetic testing & disease screening</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('hyperbaric_oxygen', $values) ? 'checked' : '' }} value="hyperbaric_oxygen" id="hyperbaric_oxygen">
                        <label class="form-check-label" for="hyperbaric_oxygen">Hyperbaric oxygen therapy</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('iv_fluid_therapy', $values) ? 'checked' : '' }} value="iv_fluid_therapy" id="iv_fluid_therapy">
                        <label class="form-check-label" for="iv_fluid_therapy">IV fluid therapy for hydration/illness</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('interspinous_desmotomy', $values) ? 'checked' : '' }} value="interspinous_desmotomy" id="interspinous_desmotomy">
                        <label class="form-check-label" for="interspinous_desmotomy">Inter-spinous ligament desmotomy</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('internal_medicine', $values) ? 'checked' : '' }} value="internal_medicine" id="internal_medicine">
                        <label class="form-check-label" for="internal_medicine">Internal medicine specialty consults</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('joint_fusion', $values) ? 'checked' : '' }} value="joint_fusion" id="joint_fusion">
                        <label class="form-check-label" for="joint_fusion">Joint fusion</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('joint_lavage', $values) ? 'checked' : '' }} value="joint_lavage" id="joint_lavage">
                        <label class="form-check-label" for="joint_lavage">Joint lavage</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('lameness_evaluation', $values) ? 'checked' : '' }} value="lameness_evaluation" id="lameness_evaluation">
                        <label class="form-check-label" for="lameness_evaluation">Lameness evaluation and treatment</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('lung_function_testing', $values) ? 'checked' : '' }} value="lung_function_testing" id="lung_function_testing">
                        <label class="form-check-label" for="lung_function_testing">Lung function testing</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('mesotherapy', $values) ? 'checked' : '' }} value="mesotherapy" id="mesotherapy">
                        <label class="form-check-label" for="mesotherapy">Mesotherapy</label>
                    </div>
                
                    <!-- NEW: Mobile veterinary services -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('mobile_veterinary_services', $values) ? 'checked' : '' }} value="mobile_veterinary_services" id="mobile_veterinary_services">
                        <label class="form-check-label" for="mobile_veterinary_services">Mobile veterinary services</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('neurectomy', $values) ? 'checked' : '' }} value="neurectomy" id="neurectomy">
                        <label class="form-check-label" for="neurectomy">Neurectomy</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('neurological_evaluation', $values) ? 'checked' : '' }} value="neurological_evaluation" id="neurological_evaluation">
                        <label class="form-check-label" for="neurological_evaluation">Neurological evaluation</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('nuclear_medicine', $values) ? 'checked' : '' }} value="nuclear_medicine" id="nuclear_medicine">
                        <label class="form-check-label" for="nuclear_medicine">Nuclear medicine</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('oncology', $values) ? 'checked' : '' }} value="oncology" id="oncology">
                        <label class="form-check-label" for="oncology">Oncology</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('podiatry', $values) ? 'checked' : '' }} value="podiatry" id="podiatry">
                        <label class="form-check-label" for="podiatry">Podiatry (advanced hoof care)</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('post_surgical_rehab', $values) ? 'checked' : '' }} value="post_surgical_rehab" id="post_surgical_rehab">
                        <label class="form-check-label" for="post_surgical_rehab">Post-surgical rehab programs</label>
                    </div>
                
                    <!-- NEW: Pre-purchase exams (PPEs) -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('pre_purchase_exams', $values) ? 'checked' : '' }} value="pre_purchase_exams" id="pre_purchase_exams">
                        <label class="form-check-label" for="pre_purchase_exams">Pre-purchase exams (PPEs)</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('prp_irap_stem_cell', $values) ? 'checked' : '' }} value="prp_irap_stem_cell" id="prp_irap_stem_cell">
                        <label class="form-check-label" for="prp_irap_stem_cell">PRP / IRAP / stem cell therapies</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('radiology_mri', $values) ? 'checked' : '' }} value="radiology_mri" id="radiology_mri">
                        <label class="form-check-label" for="radiology_mri">Radiology/CT/MRI/High-field MRI</label>
                    </div>
                
                    <!-- NEW: Regenerative medicine -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('regenerative_medicine', $values) ? 'checked' : '' }} value="regenerative_medicine" id="regenerative_medicine">
                        <label class="form-check-label" for="regenerative_medicine">Regenerative medicine</label>
                    </div>
                
                    <!-- NEW: Rehabilitation therapy -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('rehabilitation_therapy', $values) ? 'checked' : '' }} value="rehabilitation_therapy" id="rehabilitation_therapy">
                        <label class="form-check-label" for="rehabilitation_therapy">Rehabilitation therapy</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('reproductive_services', $values) ? 'checked' : '' }} value="reproductive_services" id="reproductive_services">
                        <label class="form-check-label" for="reproductive_services">Reproductive services</label>
                    </div>
                
                    <!-- NEW: Reproductive ultrasounds -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('reproductive_ultrasounds', $values) ? 'checked' : '' }} value="reproductive_ultrasounds" id="reproductive_ultrasounds">
                        <label class="form-check-label" for="reproductive_ultrasounds">Reproductive ultrasounds</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('respiratory_evaluations', $values) ? 'checked' : '' }} value="respiratory_evaluations" id="respiratory_evaluations">
                        <label class="form-check-label" for="respiratory_evaluations">Respiratory evaluations and sinus surgery</label>
                    </div>
                
                    <!-- NEW: Sports medicine -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('sports_medicine', $values) ? 'checked' : '' }} value="sports_medicine" id="sports_medicine">
                        <label class="form-check-label" for="sports_medicine">Sports medicine</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('telemetric_diagnostics', $values) ? 'checked' : '' }} value="telemetric_diagnostics" id="telemetric_diagnostics">
                        <label class="form-check-label" for="telemetric_diagnostics">Telemetric diagnostics</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('vaccination_programs', $values) ? 'checked' : '' }} value="vaccination_programs" id="vaccination_programs">
                        <label class="form-check-label" for="vaccination_programs">Vaccination programs</label>
                    </div>
                </div>
                  <div class="service-category">
                     <h5 class="category-title">Alternative & Holistic</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('aromatherapy', $values) ? 'checked' : '' }} value="aromatherapy"
                        id="aromatherapy">
                        <label class="form-check-label" for="aromatherapy">Aromatherapy</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('bioresonance_therapy', $values) ? 'checked' : '' }}
                        value="bioresonance_therapy" id="bioresonance_therapy">
                        <label class="form-check-label" for="bioresonance_therapy">Bioresonance therapy</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('herbal_homeopathic', $values) ? 'checked' : '' }}
                        value="herbal_homeopathic" id="herbal_homeopathic">
                        <label class="form-check-label" for="herbal_homeopathic">Herbal/homeopathic therapies</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('magnet_therapy', $values) ? 'checked' : '' }}
                        value="magnet_therapy" id="magnet_therapy">
                        <label class="form-check-label" for="magnet_therapy">Magnet therapy</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('pemf', $values) ? 'checked' : '' }} value="pemf" id="pemf">
                        <label class="form-check-label" for="pemf">PEMF</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('red_light_laser', $values) ? 'checked' : '' }}
                        value="red_light_laser" id="red_light_laser">
                        <label class="form-check-label" for="red_light_laser">Red light/laser therapy</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('sound_vibration', $values) ? 'checked' : '' }}
                        value="sound_vibration" id="sound_vibration">
                        <label class="form-check-label" for="sound_vibration">Sound/vibration therapy</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('thermography', $values) ? 'checked' : '' }} value="thermography"
                        id="thermography">
                        <label class="form-check-label" for="thermography">Thermography</label>
                     </div>
                  </div>
                  <div class="service-category">
                     <h5 class="category-title">Breeding & Foaling</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('artificial_insemination', $values) ? 'checked' : '' }}
                        value="artificial_insemination" id="artificial_insemination">
                        <label class="form-check-label" for="artificial_insemination">Artificial insemination</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('breeding_soundness', $values) ? 'checked' : '' }}
                        value="breeding_soundness" id="breeding_soundness">
                        <label class="form-check-label" for="breeding_soundness">Breeding soundness exams</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('foal_handling', $values) ? 'checked' : '' }} value="foal_handling"
                        id="foal_handling">
                        <label class="form-check-label" for="foal_handling">Foal handling/imprinting</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('foaling_assistance', $values) ? 'checked' : '' }}
                        value="foaling_assistance" id="foaling_assistance">
                        <label class="form-check-label" for="foaling_assistance">Foaling assistance</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('mare_management', $values) ? 'checked' : '' }}
                        value="mare_management" id="mare_management">
                        <label class="form-check-label" for="mare_management">Mare management</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('stallion_services', $values) ? 'checked' : '' }}
                        value="stallion_services" id="stallion_services">
                        <label class="form-check-label" for="stallion_services">Stallion services (stud)</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('stallion_promotion', $values) ? 'checked' : '' }}
                        value="stallion_promotion" id="stallion_promotion">
                        <label class="form-check-label" for="stallion_promotion">Stallion promotion and stud marketing</label>
                     </div>
                  </div>
                  <div class="service-category">
                     <h5 class="category-title">Sales, Leasing & Auction</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('auction_online', $values) ? 'checked' : '' }}
                        value="auction_online" id="auction_online">
                        <label class="form-check-label" for="auction_online">Auction - On-line</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('auction_live', $values) ? 'checked' : '' }} value="auction_live"
                        id="auction_live">
                        <label class="form-check-label" for="auction_live">Auction - Live</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('consignment_sales', $values) ? 'checked' : '' }}
                        value="consignment_sales" id="consignment_sales">
                        <label class="form-check-label" for="consignment_sales">Consignment sales</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_leasing_services', $values) ? 'checked' : '' }}
                        value="horse_leasing_services" id="horse_leasing_services">
                        <label class="form-check-label" for="horse_leasing_services">Horse leasing services</label>
                     </div>
                  </div>
                  <div class="service-category">
                     <h5 class="category-title">Transport & Travel</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('emergency_evacuation', $values) ? 'checked' : '' }}
                        value="emergency_evacuation" id="emergency_evacuation">
                        <label class="form-check-label" for="emergency_evacuation">Emergency evacuation (natural disasters)</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('gate_training', $values) ? 'checked' : '' }} value="gate_training"
                        id="gate_training">
                        <label class="form-check-label" for="gate_training">Gate training</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('hauling_services', $values) ? 'checked' : '' }}
                        value="hauling_services" id="hauling_services">
                        <label class="form-check-label" for="hauling_services">Hauling services</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_international_shipping', $values) ? 'checked' : '' }}
                        value="horse_international_shipping" id="horse_international_shipping">
                        <label class="form-check-label" for="horse_international_shipping">Horse international shipping</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_local_transport', $values) ? 'checked' : '' }}
                        value="horse_local_transport" id="horse_local_transport">
                        <label class="form-check-label" for="horse_local_transport">Horse local transport</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('travel_management_show_horses', $values) ? 'checked' : '' }}
                        value="travel_management_show_horses" id="travel_management_show_horses">
                        <label class="form-check-label" for="travel_management_show_horses">Travel management for show horses</label>
                     </div>
                  </div>
                  <div class="service-category">
                    <h5 class="category-title">Grooming & Presentation</h5>
                    
                    <!-- Existing Items -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('bathing', $values) ? 'checked' : '' }} value="bathing" id="bathing">
                        <label class="form-check-label" for="bathing">Bathing</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('body_clipping', $values) ? 'checked' : '' }} value="body_clipping" id="body_clipping">
                        <label class="form-check-label" for="body_clipping">Body clipping</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('braiding', $values) ? 'checked' : '' }} value="braiding" id="braiding">
                        <label class="form-check-label" for="braiding">Braiding</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('grooming_services', $values) ? 'checked' : '' }} value="grooming_services" id="grooming_services">
                        <label class="form-check-label" for="grooming_services">Grooming services</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('mane_tail_care', $values) ? 'checked' : '' }} value="mane_tail_care" id="mane_tail_care">
                        <label class="form-check-label" for="mane_tail_care">Mane & tail care</label>
                    </div>
                
                    <!-- NEW: Pulling manes -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('pulling_manes', $values) ? 'checked' : '' }} value="pulling_manes" id="pulling_manes">
                        <label class="form-check-label" for="pulling_manes">Pulling manes</label>
                    </div>
                
                    <!-- NEW: Quarter mark clipping -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('quarter_mark_clipping', $values) ? 'checked' : '' }} value="quarter_mark_clipping" id="quarter_mark_clipping">
                        <label class="form-check-label" for="quarter_mark_clipping">Quarter mark clipping</label>
                    </div>
                
                    <!-- NEW: Sales prep grooming -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('sales_prep_grooming', $values) ? 'checked' : '' }} value="sales_prep_grooming" id="sales_prep_grooming">
                        <label class="form-check-label" for="sales_prep_grooming">Sales prep grooming</label>
                    </div>
                
                    <!-- NEW: Sheath cleaning -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('sheath_cleaning', $values) ? 'checked' : '' }} value="sheath_cleaning" id="sheath_cleaning">
                        <label class="form-check-label" for="sheath_cleaning">Sheath cleaning</label>
                    </div>
                
                    <!-- NEW: Show grooming -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('show_grooming', $values) ? 'checked' : '' }} value="show_grooming" id="show_grooming">
                        <label class="form-check-label" for="show_grooming">Show grooming</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('show_prep', $values) ? 'checked' : '' }} value="show_prep" id="show_prep">
                        <label class="form-check-label" for="show_prep">Show prep</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('tack_cleaning', $values) ? 'checked' : '' }} value="tack_cleaning" id="tack_cleaning">
                        <label class="form-check-label" for="tack_cleaning">Tack cleaning</label>
                    </div>
                
                    <!-- NEW: Turnout preparation -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('turnout_preparation', $values) ? 'checked' : '' }} value="turnout_preparation" id="turnout_preparation">
                        <label class="form-check-label" for="turnout_preparation">Turnout preparation</label>
                    </div>
                </div>
                  <div class="service-category">
                     <h5 class="category-title">Recreational & Community</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('4h_ffa_support', $values) ? 'checked' : '' }}
                        value="4h_ffa_support" id="4h_ffa_support">
                        <label class="form-check-label" for="4h_ffa_support">4-H/FFA horse program support</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horsemanship_camps', $values) ? 'checked' : '' }}
                        value="horsemanship_camps" id="horsemanship_camps">
                        <label class="form-check-label" for="horsemanship_camps">Horsemanship camps</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('junior_mounted_patrol', $values) ? 'checked' : '' }}
                        value="junior_mounted_patrol" id="junior_mounted_patrol">
                        <label class="form-check-label" for="junior_mounted_patrol">Junior mounted patrol units</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('pony_parties', $values) ? 'checked' : '' }} value="pony_parties"
                        id="pony_parties">
                        <label class="form-check-label" for="pony_parties">Pony parties</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('school_visits', $values) ? 'checked' : '' }} value="school_visits"
                        id="school_visits">
                        <label class="form-check-label" for="school_visits">School visits or public education</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equine_assisted_therapy', $values) ? 'checked' : '' }}
                        value="equine_assisted_therapy" id="equine_assisted_therapy">
                        <label class="form-check-label" for="equine_assisted_therapy">Equine-Assisted Therapy Programs</label>
                     </div>
                     <!--<div class="form-check">-->
                     <!--   <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('vocational_therapies', $values) ? 'checked' : '' }}-->
                     <!--   value="vocational_therapies" id="vocational_therapies">-->
                     <!--   <label class="form-check-label" for="vocational_therapies">Vocational therapies</label>-->
                     <!--</div>-->
                  </div>
               </div>
               <!-- Performance, Training & Riding -->
               <div class="col-md-4">
                  <div class="service-category">
                    <h5 class="category-title">Performance, Training & Riding</h5>
                    
                    <!-- Existing Items -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('behavior_correction', $values) ? 'checked' : '' }} value="behavior_correction" id="behavior_correction">
                        <label class="form-check-label" for="behavior_correction">Behavior correction</label>
                    </div>
                
                    <!-- NEW: Catch riding -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('catch_riding', $values) ? 'checked' : '' }} value="catch_riding" id="catch_riding">
                        <label class="form-check-label" for="catch_riding">Catch riding</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('colt_starting', $values) ? 'checked' : '' }} value="colt_starting" id="colt_starting">
                        <label class="form-check-label" for="colt_starting">Colt starting / breaking</label>
                    </div>
                
                    <!-- NEW: Conditioning rides -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('conditioning_rides', $values) ? 'checked' : '' }} value="conditioning_rides" id="conditioning_rides">
                        <label class="form-check-label" for="conditioning_rides">Conditioning rides</label>
                    </div>
                
                    <!-- NEW: Confidence building for horses -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('confidence_building_horses', $values) ? 'checked' : '' }} value="confidence_building_horses" id="confidence_building_horses">
                        <label class="form-check-label" for="confidence_building_horses">Confidence building for horses</label>
                    </div>
                
                    <!-- NEW: Confidence coaching for riders -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('confidence_coaching_riders', $values) ? 'checked' : '' }} value="confidence_coaching_riders" id="confidence_coaching_riders">
                        <label class="form-check-label" for="confidence_coaching_riders">Confidence coaching for riders</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('desensitization_training', $values) ? 'checked' : '' }} value="desensitization_training" id="desensitization_training">
                        <label class="form-check-label" for="desensitization_training">Desensitization training</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('eventing_preparation', $values) ? 'checked' : '' }} value="eventing_preparation" id="eventing_preparation">
                        <label class="form-check-label" for="eventing_preparation">Eventing preparation</label>
                    </div>
                
                    <!-- NEW: Exercise riding -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('exercise_riding', $values) ? 'checked' : '' }} value="exercise_riding" id="exercise_riding">
                        <label class="form-check-label" for="exercise_riding">Exercise riding</label>
                    </div>
                
                    <!-- NEW: Finishing programs -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('finishing_programs', $values) ? 'checked' : '' }} value="finishing_programs" id="finishing_programs">
                        <label class="form-check-label" for="finishing_programs">Finishing programs</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('foal_training', $values) ? 'checked' : '' }} value="foal_training" id="foal_training">
                        <label class="form-check-label" for="foal_training">Foal training</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('groundwork_horsemanship', $values) ? 'checked' : '' }} value="groundwork_horsemanship" id="groundwork_horsemanship">
                        <label class="form-check-label" for="groundwork_horsemanship">Groundwork and horsemanship</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_conditioning', $values) ? 'checked' : '' }} value="horse_conditioning" id="horse_conditioning">
                        <label class="form-check-label" for="horse_conditioning">Horse conditioning & fitness</label>
                    </div>
                
                    <!-- NEW: Horse evaluation services -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_evaluation_services', $values) ? 'checked' : '' }} value="horse_evaluation_services" id="horse_evaluation_services">
                        <label class="form-check-label" for="horse_evaluation_services">Horse evaluation services</label>
                    </div>
                
                    <!-- UPDATED: horse_sales_consignment (Was just horse_sales before) -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_sales_consignment', $values) ? 'checked' : '' }} value="horse_sales_consignment" id="horse_sales_consignment">
                        <label class="form-check-label" for="horse_sales_consignment">Horse Sale Consignment</label>
                    </div>
                
                    <!-- UPDATED: general_horse_training (Was just horse_training before) -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('general_horse_training', $values) ? 'checked' : '' }} value="general_horse_training" id="general_horse_training">
                        <label class="form-check-label" for="general_horse_training">General Horse training</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('jockey_services', $values) ? 'checked' : '' }} value="jockey_services" id="jockey_services">
                        <label class="form-check-label" for="jockey_services">Jockey services</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('jumping_training', $values) ? 'checked' : '' }} value="jumping_training" id="jumping_training">
                        <label class="form-check-label" for="jumping_training">Jumping training</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('liberty_training', $values) ? 'checked' : '' }} value="liberty_training" id="liberty_training">
                        <label class="form-check-label" for="liberty_training">Liberty training</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('mounted_archery', $values) ? 'checked' : '' }} value="mounted_archery" id="mounted_archery">
                        <label class="form-check-label" for="mounted_archery">Mounted archery or games training</label>
                    </div>
                
                    <!-- NEW: Ponying services -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('ponying_services', $values) ? 'checked' : '' }} value="ponying_services" id="ponying_services">
                        <label class="form-check-label" for="ponying_services">Ponying services</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('problem_horse_retraining', $values) ? 'checked' : '' }} value="problem_horse_retraining" id="problem_horse_retraining">
                        <label class="form-check-label" for="problem_horse_retraining">Problem horse retraining</label>
                    </div>
                
                    <!-- NEW: Problem loading / trailer training -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('problem_loading_trailer', $values) ? 'checked' : '' }} value="problem_loading_trailer" id="problem_loading_trailer">
                        <label class="form-check-label" for="problem_loading_trailer">Problem loading / trailer training</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('racehorse_conditioning', $values) ? 'checked' : '' }} value="racehorse_conditioning" id="racehorse_conditioning">
                        <label class="form-check-label" for="racehorse_conditioning">Racehorse conditioning & prep</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('rider_coaching', $values) ? 'checked' : '' }} value="rider_coaching" id="rider_coaching">
                        <label class="form-check-label" for="rider_coaching">Rider coaching</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('riding_lessons', $values) ? 'checked' : '' }} value="riding_lessons" id="riding_lessons">
                        <label class="form-check-label" for="riding_lessons">Riding lessons</label>
                    </div>
                
                    <!-- NEW: Sale prep training -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('sale_prep_training', $values) ? 'checked' : '' }} value="sale_prep_training" id="sale_prep_training">
                        <label class="form-check-label" for="sale_prep_training">Sale prep training</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('show_coaching', $values) ? 'checked' : '' }} value="show_coaching" id="show_coaching">
                        <label class="form-check-label" for="show_coaching">Show coaching</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('therapeutic_riding_instruction', $values) ? 'checked' : '' }} value="therapeutic_riding_instruction" id="therapeutic_riding_instruction">
                        <label class="form-check-label" for="therapeutic_riding_instruction">Therapeutic riding instruction</label>
                    </div>
                
                    <!-- NEW: Trail obstacle training -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('trail_obstacle_training', $values) ? 'checked' : '' }} value="trail_obstacle_training" id="trail_obstacle_training">
                        <label class="form-check-label" for="trail_obstacle_training">Trail obstacle training</label>
                    </div>
                
                    <!-- NEW: Tune-ups / refresher training -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('tune_ups_refresher', $values) ? 'checked' : '' }} value="tune_ups_refresher" id="tune_ups_refresher">
                        <label class="form-check-label" for="tune_ups_refresher">Tune-ups / refresher training</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('virtual_training', $values) ? 'checked' : '' }} value="virtual_training" id="virtual_training">
                        <label class="form-check-label" for="virtual_training">Virtual training/coaching</label>
                    </div>
                
                    <!-- NEW: Young horse development -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('young_horse_development', $values) ? 'checked' : '' }} value="young_horse_development" id="young_horse_development">
                        <label class="form-check-label" for="young_horse_development">Young horse development</label>
                    </div>
                </div>
                  <div class="service-category">
                     <h5 class="category-title">Barn, Facility & Property</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('arena_construction', $values) ? 'checked' : '' }}
                        value="arena_construction" id="arena_construction">
                        <label class="form-check-label" for="arena_construction">Arena construction & maintenance</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('arena_footing', $values) ? 'checked' : '' }}
                        value="arena_footing" id="arena_footing">
                        <label class="form-check-label" for="arena_footing">Arena footing consulting</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('barn_cleaning', $values) ? 'checked' : '' }}
                        value="barn_cleaning" id="barn_cleaning">
                        <label class="form-check-label" for="barn_cleaning">Barn cleaning & mucking</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('fence_installation', $values) ? 'checked' : '' }}
                        value="fence_installation" id="fence_installation">
                        <label class="form-check-label" for="fence_installation">Fence installation & repair</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('pasture_management', $values) ? 'checked' : '' }}
                        value="pasture_management" id="pasture_management">
                        <label class="form-check-label" for="pasture_management">Pasture management</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('portable_stall_setup', $values) ? 'checked' : '' }}
                        value="portable_stall_setup" id="portable_stall_setup">
                        <label class="form-check-label" for="portable_stall_setup">Portable stall setup for events</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('stall_rental', $values) ? 'checked' : '' }}
                        value="stall_rental" id="stall_rental">
                        <label class="form-check-label" for="stall_rental">Stall rental</label>
                     </div>
                  </div>
                  <div class="service-category">
                        <h5 class="category-title">Boarding & Stabling</h5>
                        
                        <!-- NEW: Broodmare boarding -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('broodmare_boarding', $values) ? 'checked' : '' }} value="broodmare_boarding" id="broodmare_boarding">
                            <label class="form-check-label" for="broodmare_boarding">Broodmare boarding</label>
                        </div>
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('coop_boarding', $values) ? 'checked' : '' }} value="coop_boarding" id="coop_boarding">
                            <label class="form-check-label" for="coop_boarding">Co-op boarding</label>
                        </div>
                    
                        <!-- NEW: Foaling stalls -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('foaling_stalls', $values) ? 'checked' : '' }} value="foaling_stalls" id="foaling_stalls">
                            <label class="form-check-label" for="foaling_stalls">Foaling stalls</label>
                        </div>
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('full_care_boarding', $values) ? 'checked' : '' }} value="full_care_boarding" id="full_care_boarding">
                            <label class="form-check-label" for="full_care_boarding">Full-care boarding</label>
                        </div>
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('layup_rehab_boarding', $values) ? 'checked' : '' }} value="layup_rehab_boarding" id="layup_rehab_boarding">
                            <label class="form-check-label" for="layup_rehab_boarding">Layup and rehab boarding</label>
                        </div>
                    
                        <!-- NEW: Medical layup -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('medical_layup', $values) ? 'checked' : '' }} value="medical_layup" id="medical_layup">
                            <label class="form-check-label" for="medical_layup">Medical layup</label>
                        </div>
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('pasture_boarding', $values) ? 'checked' : '' }} value="pasture_boarding" id="pasture_boarding">
                            <label class="form-check-label" for="pasture_boarding">Pasture boarding</label>
                        </div>
                    
                        <!-- NEW: Quarantine boarding -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('quarantine_boarding', $values) ? 'checked' : '' }} value="quarantine_boarding" id="quarantine_boarding">
                            <label class="form-check-label" for="quarantine_boarding">Quarantine boarding</label>
                        </div>
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('retirement_boarding', $values) ? 'checked' : '' }} value="retirement_boarding" id="retirement_boarding">
                            <label class="form-check-label" for="retirement_boarding">Retirement boarding</label>
                        </div>
                    
                        <!-- NEW: Sales consignment boarding -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('sales_consignment_boarding', $values) ? 'checked' : '' }} value="sales_consignment_boarding" id="sales_consignment_boarding">
                            <label class="form-check-label" for="sales_consignment_boarding">Sales consignment boarding</label>
                        </div>
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('self_care_boarding', $values) ? 'checked' : '' }} value="self_care_boarding" id="self_care_boarding">
                            <label class="form-check-label" for="self_care_boarding">Self-care boarding</label>
                        </div>
                    
                        <!-- NEW: Stallion boarding -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('stallion_boarding', $values) ? 'checked' : '' }} value="stallion_boarding" id="stallion_boarding">
                            <label class="form-check-label" for="stallion_boarding">Stallion boarding</label>
                        </div>
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('temporary_event_stabling', $values) ? 'checked' : '' }} value="temporary_event_stabling" id="temporary_event_stabling">
                            <label class="form-check-label" for="temporary_event_stabling">Temporary event stabling</label>
                        </div>
                    
                        <!-- NEW: Training board -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('training_board', $values) ? 'checked' : '' }} value="training_board" id="training_board">
                            <label class="form-check-label" for="training_board">Training board</label>
                        </div>
                    </div>
                  <div class="service-category">
                    <h5 class="category-title">Farrier & Hoof</h5>
                    
                    <!-- Existing Items -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('applied_equine_podiatry', $values) ? 'checked' : '' }} value="applied_equine_podiatry" id="applied_equine_podiatry">
                        <label class="form-check-label" for="applied_equine_podiatry">Applied equine podiatry</label>
                    </div>
                
                    <!-- NEW: Barefoot trimming -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('barefoot_trimming', $values) ? 'checked' : '' }} value="barefoot_trimming" id="barefoot_trimming">
                        <label class="form-check-label" for="barefoot_trimming">Barefoot trimming</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('corrective_therapeutic_shoeing', $values) ? 'checked' : '' }} value="corrective_therapeutic_shoeing" id="corrective_therapeutic_shoeing">
                        <label class="form-check-label" for="corrective_therapeutic_shoeing">Corrective/therapeutic shoeing</label>
                    </div>
                
                    <!-- NEW: Corrective trimming -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('corrective_trimming', $values) ? 'checked' : '' }} value="corrective_trimming" id="corrective_trimming">
                        <label class="form-check-label" for="corrective_trimming">Corrective trimming</label>
                    </div>
                
                    <!-- NEW: Draft horse shoeing -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('draft_horse_shoeing', $values) ? 'checked' : '' }} value="draft_horse_shoeing" id="draft_horse_shoeing">
                        <label class="form-check-label" for="draft_horse_shoeing">Draft horse shoeing</label>
                    </div>
                
                    <!-- NEW: Gaited horse shoeing -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('gaited_horse_shoeing', $values) ? 'checked' : '' }} value="gaited_horse_shoeing" id="gaited_horse_shoeing">
                        <label class="form-check-label" for="gaited_horse_shoeing">Gaited horse shoeing</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('glue_on_shoes', $values) ? 'checked' : '' }} value="glue_on_shoes" id="glue_on_shoes">
                        <label class="form-check-label" for="glue_on_shoes">Glue-on shoe application</label>
                    </div>
                
                    <!-- NEW: Hoof boot fitting -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('hoof_boot_fitting', $values) ? 'checked' : '' }} value="hoof_boot_fitting" id="hoof_boot_fitting">
                        <label class="form-check-label" for="hoof_boot_fitting">Hoof boot fitting</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('hoof_casting', $values) ? 'checked' : '' }} value="hoof_casting" id="hoof_casting">
                        <label class="form-check-label" for="hoof_casting">Hoof casting for injuries</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('hoof_reconstruction', $values) ? 'checked' : '' }} value="hoof_reconstruction" id="hoof_reconstruction">
                        <label class="form-check-label" for="hoof_reconstruction">Hoof reconstruction/resin fill</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('hoof_resections', $values) ? 'checked' : '' }} value="hoof_resections" id="hoof_resections">
                        <label class="form-check-label" for="hoof_resections">Hoof resections</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('integrated_podiatry', $values) ? 'checked' : '' }} value="integrated_podiatry" id="integrated_podiatry">
                        <label class="form-check-label" for="integrated_podiatry">Integrated podiatry</label>
                    </div>
                
                    <!-- NEW: Laminitis/founder care -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('laminitis_founder_care', $values) ? 'checked' : '' }} value="laminitis_founder_care" id="laminitis_founder_care">
                        <label class="form-check-label" for="laminitis_founder_care">Laminitis/founder care</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('natural_hoof_care', $values) ? 'checked' : '' }} value="natural_hoof_care" id="natural_hoof_care">
                        <label class="form-check-label" for="natural_hoof_care">Natural hoof care</label>
                    </div>
                
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('performance_shoeing', $values) ? 'checked' : '' }} value="performance_shoeing" id="performance_shoeing">
                        <label class="form-check-label" for="performance_shoeing">Performance shoeing</label>
                    </div>
                </div>
                  <div class="service-category">
                     <h5 class="category-title">Professional, Educational & Consulting</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('business_planning', $values) ? 'checked' : '' }}
                        value="business_planning" id="business_planning">
                        <label class="form-check-label" for="business_planning">Business planning (equine-specific)</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('continuing_education', $values) ? 'checked' : '' }}
                        value="continuing_education" id="continuing_education">
                        <label class="form-check-label" for="continuing_education">Continuing education for equine pros</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equine_appraisals', $values) ? 'checked' : '' }}
                        value="equine_appraisals" id="equine_appraisals">
                        <label class="form-check-label" for="equine_appraisals">Equine appraisals</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equine_behavior_consulting', $values) ? 'checked' : '' }}
                        value="equine_behavior_consulting" id="equine_behavior_consulting">
                        <label class="form-check-label" for="equine_behavior_consulting">Equine behavior consulting</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equine_branding_marketing', $values) ? 'checked' : '' }}
                        value="equine_branding_marketing" id="equine_branding_marketing">
                        <label class="form-check-label" for="equine_branding_marketing">Equine branding & marketing services</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equine_insurance_brokerage', $values) ? 'checked' : '' }}
                        value="equine_insurance_brokerage" id="equine_insurance_brokerage">
                        <label class="form-check-label" for="equine_insurance_brokerage">Equine insurance brokerage</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('farm_ranch_bookkeeping', $values) ? 'checked' : '' }}
                        value="farm_ranch_bookkeeping" id="farm_ranch_bookkeeping">
                        <label class="form-check-label" for="farm_ranch_bookkeeping">Farm & ranch bookkeeping</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('grant_writing', $values) ? 'checked' : '' }}
                        value="grant_writing" id="grant_writing">
                        <label class="form-check-label" for="grant_writing">Grant writing</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_ownership_consulting', $values) ? 'checked' : '' }}
                        value="horse_ownership_consulting" id="horse_ownership_consulting">
                        <label class="form-check-label" for="horse_ownership_consulting">Horse ownership consulting</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('legal_consulting', $values) ? 'checked' : '' }}
                        value="legal_consulting" id="legal_consulting">
                        <label class="form-check-label" for="legal_consulting">Legal consulting</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('nutritional_consulting', $values) ? 'checked' : '' }}
                        value="nutritional_consulting" id="nutritional_consulting">
                        <label class="form-check-label" for="nutritional_consulting">Nutritional consulting</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('public_relations', $values) ? 'checked' : '' }}
                        value="public_relations" id="public_relations">
                        <label class="form-check-label" for="public_relations">Public relations for equestrian athletes/facilities</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('risk_management', $values) ? 'checked' : '' }}
                        value="risk_management" id="risk_management">
                        <label class="form-check-label" for="risk_management">Risk management assessment</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('tech_software_training', $values) ? 'checked' : '' }}
                        value="tech_software_training" id="tech_software_training">
                        <label class="form-check-label" for="tech_software_training">Tech & software training for equine businesses</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('trademark_copyright', $values) ? 'checked' : '' }}
                        value="trademark_copyright" id="trademark_copyright">
                        <label class="form-check-label" for="trademark_copyright">Trademark and copyright help</label>
                     </div>
                  </div>
                  <div class="service-category">
                     <h5 class="category-title">Retail, Feed & Mobile</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('bit_fitting', $values) ? 'checked' : '' }} value="bit_fitting"
                        id="bit_fitting">
                        <label class="form-check-label" for="bit_fitting">Bit fitting services</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('blanket_washing_repair', $values) ? 'checked' : '' }}
                        value="blanket_washing_repair" id="blanket_washing_repair">
                        <label class="form-check-label" for="blanket_washing_repair">Blanket washing and repair</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('custom_leatherwork', $values) ? 'checked' : '' }}
                        value="custom_leatherwork" id="custom_leatherwork">
                        <label class="form-check-label" for="custom_leatherwork">Custom leatherwork or repairs</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('customized_feeding_plans', $values) ? 'checked' : '' }}
                        value="customized_feeding_plans" id="customized_feeding_plans">
                        <label class="form-check-label" for="customized_feeding_plans">Customized feeding plans and consulting</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equestrian_subscription_boxes', $values) ? 'checked' : '' }}
                        value="equestrian_subscription_boxes" id="equestrian_subscription_boxes">
                        <label class="form-check-label" for="equestrian_subscription_boxes">Equestrian subscription boxes</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('mobile_feed_delivery', $values) ? 'checked' : '' }}
                        value="mobile_feed_delivery" id="mobile_feed_delivery">
                        <label class="form-check-label" for="mobile_feed_delivery">Mobile feed delivery / subscription boxes</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('mobile_saddle_tack', $values) ? 'checked' : '' }}
                        value="mobile_saddle_tack" id="mobile_saddle_tack">
                        <label class="form-check-label" for="mobile_saddle_tack">Mobile saddle and tack shops</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('mobile_veterinary_pharmacy', $values) ? 'checked' : '' }}
                        value="mobile_veterinary_pharmacy" id="mobile_veterinary_pharmacy">
                        <label class="form-check-label" for="mobile_veterinary_pharmacy">Mobile veterinary pharmacy delivery</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('organic_feed_supplement', $values) ? 'checked' : '' }}
                        value="organic_feed_supplement" id="organic_feed_supplement">
                        <label class="form-check-label" for="organic_feed_supplement">Organic feed/supplement production</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('saddle_fitting_consulting', $values) ? 'checked' : '' }}
                        value="saddle_fitting_consulting" id="saddle_fitting_consulting">
                        <label class="form-check-label" for="saddle_fitting_consulting">Saddle fitting consulting</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('specialized_horse_feed', $values) ? 'checked' : '' }}
                        value="specialized_horse_feed" id="specialized_horse_feed">
                        <label class="form-check-label" for="specialized_horse_feed">Specialized horse feed manufacturing</label>
                     </div>
                  </div>
                  <div class="service-category">
                     <h5 class="category-title">Media, Events & Promotion</h5>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('equine_photography_videography', $values) ? 'checked' : '' }}
                        value="equine_photography_videography" id="equine_photography_videography">
                        <label class="form-check-label" for="equine_photography_videography">Equine photography & videography</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_show_announcing', $values) ? 'checked' : '' }}
                        value="horse_show_announcing" id="horse_show_announcing">
                        <label class="form-check-label" for="horse_show_announcing">Horse show announcing & judging</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_show_entry_management', $values) ? 'checked' : '' }}
                        value="horse_show_entry_management" id="horse_show_entry_management">
                        <label class="form-check-label" for="horse_show_entry_management">Horse show entry management</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('horse_show_management', $values) ? 'checked' : '' }}
                        value="horse_show_management" id="horse_show_management">
                        <label class="form-check-label" for="horse_show_management">Horse show management</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('live_streaming', $values) ? 'checked' : '' }}
                        value="live_streaming" id="live_streaming">
                        <label class="form-check-label" for="live_streaming">Live streaming / online show coverage</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('marketing_horses_farms', $values) ? 'checked' : '' }}
                        value="marketing_horses_farms" id="marketing_horses_farms">
                        <label class="form-check-label" for="marketing_horses_farms">Marketing for horses or farms</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('prize_procurement', $values) ? 'checked' : '' }}
                        value="prize_procurement" id="prize_procurement">
                        <label class="form-check-label" for="prize_procurement">Prize procurement and sponsor outreach</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('sales_video_editing', $values) ? 'checked' : '' }}
                        value="sales_video_editing" id="sales_video_editing">
                        <label class="form-check-label" for="sales_video_editing">Sales video editing</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('show_steward', $values) ? 'checked' : '' }}
                        value="show_steward" id="show_steward">
                        <label class="form-check-label" for="show_steward">Show steward or technical delegate</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" {{ in_array('stabling_grounds_crew', $values) ? 'checked' : '' }}
                        value="stabling_grounds_crew" id="stabling_grounds_crew">
                        <label class="form-check-label" for="stabling_grounds_crew">Stabling and grounds crew</label>
                     </div>
                     
                  </div>
               </div>
               <div class="col-md-4">
                @php
                    // Parse the saved services string into an array for easy checking
                    $savedServices = explode(',', $data->services_offered);
                @endphp
            
                <div class="service-category">
                    <h5 class="category-title">Barn & Property Services</h5>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="arena_dragging" id="arena_dragging" {{ in_array('arena_dragging', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="arena_dragging">Arena dragging</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="arena_lighting_installation" id="arena_lighting_installation" {{ in_array('arena_lighting_installation', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="arena_lighting_installation">Arena lighting installation</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="barn_design_planning" id="barn_design_planning" {{ in_array('barn_design_planning', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="barn_design_planning">Barn Design & Planning</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="barn_kits_prefab_barns" id="barn_kits_prefab_barns" {{ in_array('barn_kits_prefab_barns', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="barn_kits_prefab_barns">Barn Kits / Prefab Barns</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="barn_renovations_expansions" id="barn_renovations_expansions" {{ in_array('barn_renovations_expansions', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="barn_renovations_expansions">Barn Renovations / Expansions</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="bush_hogging_field_mowing" id="bush_hogging_field_mowing" {{ in_array('bush_hogging_field_mowing', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="bush_hogging_field_mowing">Bush hogging / field mowing</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="custom_barn_construction" id="custom_barn_construction" {{ in_array('custom_barn_construction', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="custom_barn_construction">Custom Barn Construction</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="drainage_fixes" id="drainage_fixes" {{ in_array('drainage_fixes', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="drainage_fixes">Drainage Fixes</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="dust_control_systems" id="dust_control_systems" {{ in_array('dust_control_systems', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="dust_control_systems">Dust control systems</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="electrical_work" id="electrical_work" {{ in_array('electrical_work', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="electrical_work">Electrical Work</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="excavation_grading" id="excavation_grading" {{ in_array('excavation_grading', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="excavation_grading">Excavation / grading</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="fence_repair_installation" id="fence_repair_installation" {{ in_array('fence_repair_installation', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="fence_repair_installation">Fence Repair & Installation</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="footing_watering_systems" id="footing_watering_systems" {{ in_array('footing_watering_systems', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="footing_watering_systems">Footing watering systems</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="general_property_maintenance" id="general_property_maintenance" {{ in_array('general_property_maintenance', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="general_property_maintenance">General Property Maintenance</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_fencing_consultation" id="horse_fencing_consultation" {{ in_array('horse_fencing_consultation', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="horse_fencing_consultation">Horse fencing consultation</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="indoor_arenas" id="indoor_arenas" {{ in_array('indoor_arenas', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="indoor_arenas">Indoor Arenas</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="manure_removal" id="manure_removal" {{ in_array('manure_removal', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="manure_removal">Manure removal</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="minor_barn_renovations" id="minor_barn_renovations" {{ in_array('minor_barn_renovations', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="minor_barn_renovations">Minor Barn Renovations</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="outdoor_arenas" id="outdoor_arenas" {{ in_array('outdoor_arenas', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="outdoor_arenas">Outdoor Arenas</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="paddock_design" id="paddock_design" {{ in_array('paddock_design', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="paddock_design">Paddock design</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="pole_barns_post_frame" id="pole_barns_post_frame" {{ in_array('pole_barns_post_frame', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="pole_barns_post_frame">Pole Barns / Post Frame</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="run_in_sheds" id="run_in_sheds" {{ in_array('run_in_sheds', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="run_in_sheds">Run-in Sheds</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="stall_installation" id="stall_installation" {{ in_array('stall_installation', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="stall_installation">Stall Installation</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="stall_repairs" id="stall_repairs" {{ in_array('stall_repairs', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="stall_repairs">Stall Repairs</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="tractor_services" id="tractor_services" {{ in_array('tractor_services', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tractor_services">Tractor services</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="wash_stall_installation_repairs" id="wash_stall_installation_repairs" {{ in_array('wash_stall_installation_repairs', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="wash_stall_installation_repairs">Wash Stall Installation / Repairs</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="water_systems" id="water_systems" {{ in_array('water_systems', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="water_systems">Water Systems (automatic waterers, hydrants)</label>
                    </div>
                </div>
            
                <div class="service-category">
                    <h5 class="category-title">Tack, Equipment & Saddle Services</h5>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="bit_fitting" id="bit_fitting" {{ in_array('bit_fitting', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="bit_fitting">Bit fitting</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="bridle_fitting" id="bridle_fitting" {{ in_array('bridle_fitting', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="bridle_fitting">Bridle fitting</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="custom_saddles" id="custom_saddles" {{ in_array('custom_saddles', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="custom_saddles">Custom saddles</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="horse_trailer_rentals" id="horse_trailer_rentals" {{ in_array('horse_trailer_rentals', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="horse_trailer_rentals">Horse trailer rentals</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="saddle_cleaning_conditioning" id="saddle_cleaning_conditioning" {{ in_array('saddle_cleaning_conditioning', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="saddle_cleaning_conditioning">Saddle cleaning/conditioning</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="saddle_fitting" id="saddle_fitting" {{ in_array('saddle_fitting', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="saddle_fitting">Saddle fitting</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="saddle_flocking" id="saddle_flocking" {{ in_array('saddle_flocking', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="saddle_flocking">Saddle flocking</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="tack_consignment" id="tack_consignment" {{ in_array('tack_consignment', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tack_consignment">Tack consignment</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="tack_repair" id="tack_repair" {{ in_array('tack_repair', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tack_repair">Tack repair</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="trailer_inspections" id="trailer_inspections" {{ in_array('trailer_inspections', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="trailer_inspections">Trailer inspections</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="trailer_repair" id="trailer_repair" {{ in_array('trailer_repair', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="trailer_repair">Trailer repair</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="trailer_sales" id="trailer_sales" {{ in_array('trailer_sales', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="trailer_sales">Trailer sales</label>
                    </div>
                </div>
            
            
                <div class="service-category">
                    <h5 class="category-title">Real Estate & Farm Services</h5>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="equine_real_estate_agent" id="equine_real_estate_agent" {{ in_array('equine_real_estate_agent', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="equine_real_estate_agent">Equine real estate agent</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="facility_leasing" id="facility_leasing" {{ in_array('facility_leasing', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="facility_leasing">Facility leasing</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="farm_appraisals" id="farm_appraisals" {{ in_array('farm_appraisals', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="farm_appraisals">Farm appraisals</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="farm_management_consulting" id="farm_management_consulting" {{ in_array('farm_management_consulting', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="farm_management_consulting">Farm management consulting</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="investment_consulting" id="investment_consulting" {{ in_array('investment_consulting', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="investment_consulting">Investment consulting</label>
                    </div>
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="property_staging_horse_farms" id="property_staging_horse_farms" {{ in_array('property_staging_horse_farms', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="property_staging_horse_farms">Property staging for horse farms</label>
                    </div>
                </div>
            
                <div class="service-category">
                    <h5 class="category-title">Other Services</h5>
                    
                    <!-- Custom Service 1 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="other_custom1" id="other_custom1" {{ in_array('other_custom1', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="other_custom1">
                            <input type="text" class="form-control form-control-sm d-inline" style="width: 200px;" placeholder="Specify service..." name="custom_service_1" value="{{ $data->custom_service_1 ?? '' }}">
                        </label>
                    </div>
            
                    <!-- Custom Service 2 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="other_custom2" id="other_custom2" {{ in_array('other_custom2', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="other_custom2">
                            <input type="text" class="form-control form-control-sm d-inline" style="width: 200px;" placeholder="Specify service..." name="custom_service_2" value="{{ $data->custom_service_2 ?? '' }}">
                        </label>
                    </div>
            
                    <!-- Custom Service 3 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="other_custom3" id="other_custom3" {{ in_array('other_custom3', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="other_custom3">
                            <input type="text" class="form-control form-control-sm d-inline" style="width: 200px;" placeholder="Specify service..." name="custom_service_3" value="{{ $data->custom_service_3 ?? '' }}">
                        </label>
                    </div>
            
                    <!-- Custom Service 4 -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="services_offered[]" value="other_custom4" id="other_custom4" {{ in_array('other_custom4', $savedServices) ? 'checked' : '' }}>
                        <label class="form-check-label" for="other_custom4">
                            <input type="text" class="form-control form-control-sm d-inline" style="width: 200px;" placeholder="Specify service..." name="custom_service_4" value="{{ $data->custom_service_4 ?? '' }}">
                        </label>
                    </div>
                </div>
            </div>
            </div>
         </div>
      </div>
      <div class="col-12">
         <div class="border_box_one">
            <h3 class="mb-3">Service Details <small class="text-muted"> (What you offer, how it works, who's it for, etc.) </small></h3>
            <div class="">
               <textarea class="textarea summernote" name="service_desc" maxlength="300" style="width: 100%; height: 15rem;" placeholder="Write description here....">{{ $data->service_desc }}</textarea>
            </div>
         </div>
      </div>
      {{-- 
      <div class="col-12 pb-4">
         <div class="border_box_one">
            <h4 class="mb-3">Service Location</h4>
            @php
            $service_location = explode(',', $data->service_location);
            @endphp
            <div class="form-check">
               <label>
               <input class="form-check-input" type="checkbox" name="service_location[]" value="At Provider's Facility"
               {{ in_array("At Provider's Facility", $service_location) ? 'checked' : '' }}>
               At Provider’s Facility
               </label>
            </div>
            <div class="form-check">
               <label>
               <input class="form-check-input" type="checkbox" name="service_location[]" value="Mobile (I travel to client)"
               {{ in_array('Mobile (I travel to client)', $service_location) ? 'checked' : '' }}>
               Mobile (I travel to client)
               </label>
            </div>
            <div class="form-check">
               <label>
               <input class="form-check-input" type="checkbox" name="service_location[]" value="Virtual / Online Coaching"
               {{ in_array('Virtual / Online Coaching', $service_location) ? 'checked' : '' }}>
               Virtual / Online Coaching
               </label>
            </div>
         </div>
      </div>
      --}}
      <div class="col-12">
         <!-- <h5 class="mb-3">Price Per Hour / Session / Package</h5>-->
         <div class="row mb-4 align-items-cennter">
            <div class="col-6">
               <div class="border_box_one">
                  <h3 class="mb-3">Price [$] <span class="asterisk">*</span></h3>
                  @php
                  $pricing_type = $data->pricing_type ?? '';
                  @endphp
                  <div class="row align-items-center mb-3">
                     <div class="col-12">
                        <div class="d-flex gap-3">
                           <div class="form-check">
                              <input class="form-check-input" name="pricing_type" type="checkbox" value="Per Hour" id="ph_p"
                              {{ $pricing_type == 'Per Hour' ? 'checked' : '' }}>
                              <label class="form-check-label" for="ph_p">
                              Per Hour
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" name="pricing_type" type="checkbox" value="Per Session" id="ps_p"
                              {{ $pricing_type == 'Per Session' ? 'checked' : '' }}>
                              <label class="form-check-label" for="ps_p">
                              Per Session
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" name="pricing_type" type="checkbox" value="Per Package" id="pp_p"
                              {{ $pricing_type == 'Per Package' ? 'checked' : '' }}>
                              <label class="form-check-label" for="pp_p">
                              Per Package
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="d-flex gap-3">
                           <div class="form-check">
                              <input class="form-check-input" name="pricing_type" type="checkbox" value="Per Month" id="pm_p"
                              {{ $pricing_type == 'Per Month' ? 'checked' : '' }}>
                              <label class="form-check-label" for="pm_p">
                              Per Month
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" name="pricing_type" type="checkbox" value="Varying Price per Service" id="vpps_p"
                              {{ $pricing_type == 'Varying Price per Service' ? 'checked' : '' }}>
                              <label class="form-check-label" for="vpps_p">
                              Varying Price per Service
                              </label>
                           </div>
                        </div>
                     </div>
                     <!-- Inputs for each option -->
                     {{-- 
                     <div class="col-12 mt-3">
                        <div class="price-input-box" id="input_ph_p" style="display: none;">
                           <input class="form-control gen_input thousand-separator" type="text" placeholder="Per Hour" />
                           <button type="button" class="remove-btn">&times;</button>
                        </div>
                        <div class="price-input-box" id="input_ps_p" style="display: none;">
                           <input class="form-control gen_input thousand-separator" type="text" placeholder="Per Session" />
                           <button type="button" class="remove-btn">&times;</button>
                        </div>
                        <div class="price-input-box" id="input_pp_p" style="display: none;">
                           <input class="form-control gen_input thousand-separator" type="text" placeholder="Per Package" />
                           <button type="button" class="remove-btn">&times;</button>
                        </div>
                        <div class="price-input-box" id="input_pm_p" style="display: none;">
                           <input class="form-control gen_input thousand-separator" type="text" placeholder="Per Month" />
                           <button type="button" class="remove-btn">&times;</button>
                        </div>
                        <div class="price-input-box" id="input_vpps_p" style="display: none;">
                           <input class="form-control gen_input thousand-separator" type="text" placeholder="Varying Price per Service" />
                           <button type="button" class="remove-btn">&times;</button>
                        </div>
                     </div>
                     --}}
                  </div>
               </div>
            </div>
            <div class="col-6">
               <div class="border_box_one">
                  <input class="form-control gen_input thousand-separator numbers_limit price-input" name="pkg_price" value="{{ $data->pkg_price }}" type="text"
                     placeholder="Enter price" required />
               </div>
            </div>
         </div>
         <div class="border_box_one">
            <input type="hidden" name="payment_method" id="selectedInput_payments" value="{{ $data->payment_method }}">
            <div class="dropdown-container" data-dropdown-name="payments">
               <h4 class="mb-3">Payment Methods Accepted</h4>
               <div class="dropdown-header"></div>
               <div class="dropdown-list">
                  <div data-value="Cash">Cash</div>
                  <div data-value="Card">Card</div>
                  <div data-value="PayPal">PayPal</div>
                  <div data-value="Venmo">Venmo</div>
                  <div data-value="Zelle">Zelle</div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12">
         <!-- GALLERY IMAGE UPLOAD -->
         <div class="border_box_one mb-4">
            <h4 class="mb-3">Gallery</h4>
            <div class="col-12 mb-3">
               <div class="custom-upload__box">
                  <div class="custom-upload__btn-box">
                     <label class="custom-upload__btn">
                        <p>Drag your Image here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                        <input id="customImageInput" name="ser_gallery[]" type="file" class="custom-upload__inputfile" accept="image/*" multiple>
                     </label>
                  </div>
               </div>
               <div class="col-12">
                  <div id="customErrorMsg" style="color:red;margin-top:10px;"></div>
                  <div class="custom-upload-images-flex" id="customUploadImagesContainer">
                     @php
                     $existingImages = json_decode($data->ser_gallery) ?? [];
                     @endphp
                     @for ($i = 0; $i < 20; $i++)
                     <div class="custom-upload-img-box">
                        @if (isset($existingImages[$i]))
                        <img src="{{ asset('storage/uploads/services/' . $existingImages[$i]) }}" class="img-fluid uploaded existing" data-index="{{ $i }}" alt="Existing image">
                        <span class="custom-remove-btn" onclick="removeExistingImage({{ $i }}, this)">&times;</span>
                        @else
                        <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="Add image">
                        <span class="custom-remove-btn" style="display:none">&times;</span>
                        @endif
                     </div>
                     @endfor
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12">
            <div class="border_box_one">
               <div class="row">
                  @php
                  $videoUrls = explode(',', $data->demo_link);
                  @endphp
                  <div class="col-12">
                     <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="">YouTube link introduction (Optional)</h4>
                        <a href="javascript:;" class="add_url_btn">Add another video</a>
                     </div>
                     <div id="video_inputs_wrapper">
                        {{-- 
                        <div class="video_input d-flex align-items-center mb-2">
                           <input class="form-control gen_input" type="url" value="{{ $data->demo_link ?? '' }}" name="demo_link[]"
                              placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                        </div>
                        --}}
                        @if (count($videoUrls) > 0)
                        @foreach ($videoUrls as $url)
                        <div class="video_input d-flex align-items-center mb-2">
                           <input class="form-control gen_input" type="text" name="video_url[]" value="{{ $url }}"
                              placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                           <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">&times;</button>
                        </div>
                        @endforeach
                        @else
                        <div class="video_input d-flex align-items-center mb-2">
                           <input class="form-control gen_input" type="text" name="video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                        </div>
                        @endif
                     </div>
                     <small class="text-muted">
                     Please enter a valid URL starting with https:// (e.g., https://www.youtube.com/)
                     </small>
                     <p id="error_message" style="color: red; display: none;">You can only add up to 5 video URLs.</p>
                  </div>
                  @php
                  $videos = !empty($data->pro_video_url) ? explode(',', $data->pro_video_url) : [];
                  @endphp
                  @foreach ($videos as $video)
                  <div class="mb-3">
                     <video width="200" controls>
                        <source src="{{ asset('service-videos/' . $video) }}" type="video/mp4">
                     </video>
                  </div>
                  @endforeach
                  <!--<div class="col-6">
                     <div class="upload__box">
                         <div class="upload__img-wrap"></div>
                         <div class="upload__btn-box">
                             <label class="upload__btn">
                                 <p>Drag your Video here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                 <input name="pro_video_url[]" type="file" multiple class="upload__inputfile" accept="image/video/*">
                             </label>
                         </div>
                     </div>
                     </div> -->
               </div>
            </div>
         </div>
      </div>
      <h2 class="text-white mb-3">Social Media Links</h2>
      <div class="border_box_one">
         <div class="row gy-3">
            <div class="col-6">
               <h5 class="mb-2">Facebook</h5>
               <div class="web_link_wrap">
                  <span>http://</span>
                  <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->facebook }}" name="facebook" placeholder="Paste link here" />
               </div>
            </div>
            <div class="col-6">
               <h5 class="mb-2">Instagram</h5>
               <div class="web_link_wrap">
                  <span>http://</span>
                  <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->insta }}" name="insta" placeholder="Paste link here" />
               </div>
            </div>
            <div class="col-6">
               <h5 class="mb-2">TikTok</h5>
               <div class="web_link_wrap">
                  <span>http://</span>
                  <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->tiktok }}" name="tiktok" placeholder="Paste link here" />
               </div>
            </div>
            <div class="col-6">
               <h5 class="mb-2">LinkedIn</h5>
               <div class="web_link_wrap">
                  <span>http://</span>
                  <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->linkedin }}" name="linkedin" placeholder="Paste link here" />
               </div>
            </div>
            <div class="col-6">
               <h5 class="mb-2">YouTube</h5>
               <div class="web_link_wrap">
                  <span>http://</span>
                  <input class="form-control gen_input_one mb-3 websiteInput" type="text" name="youtube" value="{{ $data->youtube }}" placeholder="Paste link here" />
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 d-flex justify-content-end">
         <div class="col-auto  d-flex justify-content-center gap-3">
            <div class="col-auto  d-flex justify-content-center gap-3">
               @if (Auth::user()->usertype == 1)
               <a href="{{ url('manage_service') }} }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Go Back</a>
               @else
               <a href="{{ url('service-listing') }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Go Back</a>
               @endif
               <button class="btn submit_btn_one" type="submit">Update</button>
               {{-- <a href="#!" class="btn submit_btn_one">Preview</a> --}}
            </div>
         </div>
      </div>
</form>
@endforeach
</div>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
   $(document).ready(function() {
       // $("#summernote").summernote();
   
      $('.summernote').each(function() {
            $(this).summernote({
                placeholder: 'Type your Description',
                height: 300,
               callbacks: {
                   onEnter: function(e) {
                       e.preventDefault();
                       document.execCommand('insertLineBreak');
                   }
               }
            });
        });
       
       $('.dropdown-toggle').dropdown();
   });
</script>
<script>
   $(document).ready(function() {
       $('input[name="ser_profile"]').on('change', function() {
           readURL(this, $('.file-wrapper')); // Change the image
       });
   
       $('.close-btn').on('click', function() { // Unset the image
           let file = $('input[name="ser_profile"]');
           $('.file-wrapper').css('background-image', 'unset');
           $('.file-wrapper').removeClass('file-set');
           file.replaceWith(file.clone(true));
       });
   
       // FILE
       function readURL(input, obj) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                   obj.css('background-image', 'url(' + e.target.result + ')');
                   obj.addClass('file-set');
               }
               reader.readAsDataURL(input.files[0]);
           }
       };
   });
</script>
<script>
   jQuery(document).ready(function() {
       ImgUpload();
   });
   
   function ImgUpload() {
       var imgArray = [];
   
       $('.upload__inputfile').each(function() {
           $(this).on('change', function(e) {
               var imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
               var maxLength = $(this).attr('data-max_length') || 10;
               var files = e.target.files;
               var filesArr = Array.prototype.slice.call(files);
   
               filesArr.forEach(function(f) {
                   if (
                       !f.type.match('image.*') &&
                       !f.type.match('application/pdf') &&
                       !f.type.match('application/vnd.openxmlformats-officedocument.wordprocessingml.document') &&
                       !f.type.match('video.*')
                   ) {
                       return;
                   }
   
                   if (imgArray.length >= maxLength) return;
   
                   imgArray.push(f);
                   var reader = new FileReader();
   
                   reader.onload = function(e) {
                       var iconClass = "";
                       var iconContent = "";
                       var style = "";
   
                       if (f.type.match('image.*')) {
                           iconClass = "img-bg";
                           style = `background-image: url(${e.target.result})`;
                       } else if (f.type.match('application/pdf')) {
                           iconClass = "pdf-icon";
                           iconContent = "📄";
                       } else if (f.type.match('application/vnd.openxmlformats-officedocument.wordprocessingml.document')) {
                           iconClass = "docx-icon";
                           iconContent = "📃";
                       } else if (f.type.match('video.*')) {
                           iconClass = "video-icon";
                           iconContent = "🎥";
                       }
   
                       var html = `
       <div class='upload__img-box'>
         <div class='${iconClass}' style='${style}' data-number='${$(".upload__img-close").length}' data-file='${f.name}'>
           ${iconContent ? `<div class='file-icon-text'>${iconContent}</div>` : ""}
           <div class='upload__img-close'>×</div>
         </div>
       </div>
     `;
                       imgWrap.append(html);
                   };
   
                   if (f.type.match('image.*')) {
                       reader.readAsDataURL(f);
                   } else {
                       reader.onload(); // Manually trigger for non-image files
                   }
               });
           });
       });
   
       $('body').on('click', ".upload__img-close", function(e) {
           var file = $(this).parent().data("file");
           for (var i = 0; i < imgArray.length; i++) {
               if (imgArray[i].name === file) {
                   imgArray.splice(i, 1);
                   break;
               }
           }
           $(this).closest('.upload__img-box').remove();
       });
   }
   // ===== PROFILE IMAGE UPLOAD =====
   const profileInput = document.getElementById('profileUploadInput');
   const profilePreview = document.getElementById('profilePreviewImg');
   const profileHiddenInput = document.getElementById('profile_image_url');
   const profileRemoveBtn = document.getElementById('removeProfileBtn');
   const profileDefaultImg = "https://img.icons8.com/m_rounded/512/plus.png";
   
   profileInput.addEventListener('change', function() {
       const file = this.files[0];
       if (file) {
           const reader = new FileReader();
           reader.onload = function(e) {
               profilePreview.src = e.target.result;
               profileHiddenInput.value = e.target.result;
               profileRemoveBtn.style.display = 'flex';
           };
           reader.readAsDataURL(file);
       }
   });
   
   profileRemoveBtn.addEventListener('click', function() {
       profilePreview.src = profileDefaultImg;
       profileHiddenInput.value = '';
       profileInput.value = '';
       profileRemoveBtn.style.display = 'none';
   });
   
</script>
{{-- <script>
   const selectedValuesMap = {};
   
   document.querySelectorAll(".dropdown-container").forEach(container => {
       const dropdownName = container.getAttribute("data-dropdown-name");
       const dropdownHeader = container.querySelector(".dropdown-header");
       const dropdownList = container.querySelector(".dropdown-list");
   
       selectedValuesMap[dropdownName] = [];
   
       // Toggle dropdown
       dropdownHeader.addEventListener("click", () => {
           dropdownList.classList.toggle("active");
       });
   
       // Select option
       dropdownList.querySelectorAll("div").forEach(option => {
           option.addEventListener("click", () => {
               const value = option.getAttribute("data-value");
               if (selectedValuesMap[dropdownName].includes(value)) return;
   
               if (selectedValuesMap[dropdownName].length < 5) {
                   selectedValuesMap[dropdownName].push(value);
                   renderTags(dropdownName, container);
                   updateOptionsState(dropdownName, container);
               } else {
                   alert("Only 5 options can be selected.");
               }
           });
       });
   
       renderTags(dropdownName, container);
   });
   
   function removeTag(value, dropdownName, container) {
       selectedValuesMap[dropdownName] = selectedValuesMap[dropdownName].filter(v => v !== value);
       renderTags(dropdownName, container);
       updateOptionsState(dropdownName, container);
   }
   
   function renderTags(dropdownName, container) {
       const dropdownHeader = container.querySelector(".dropdown-header");
       dropdownHeader.innerHTML = "";
   
       if (window.selectedValuesMap[dropdownName].length === 0) {
           const placeholder = document.createElement("span");
           placeholder.className = "placeholder_new";
           placeholder.textContent = "Select Options";
           dropdownHeader.appendChild(placeholder);
       } else {
           window.selectedValuesMap[dropdownName].forEach(value => {
               const tag = document.createElement("div");
               tag.className = "tag";
               tag.innerHTML = `${value} <button onclick="removeTag('${value}', '${dropdownName}', this.closest('.dropdown-container'))">✕</button>`;
               dropdownHeader.appendChild(tag);
           });
       }
   
       const hiddenInput = document.getElementById(`selectedInput_${dropdownName}`);
       if (hiddenInput) {
           hiddenInput.value = window.selectedValuesMap[dropdownName].join(',');
       }
   }
   
   function updateOptionsState(dropdownName, container) {
       const dropdownList = container.querySelector(".dropdown-list");
       const options = dropdownList.querySelectorAll("div");
       options.forEach(option => {
           const value = option.getAttribute("data-value");
           const isSelected = window.selectedValuesMap[dropdownName].includes(value);
           const isLimitReached = window.selectedValuesMap[dropdownName].length >= 5;
   
           option.classList.toggle("selected", isSelected);
   
           option.style.pointerEvents = (!isSelected && isLimitReached) ? "none" : "auto";
           option.style.opacity = (!isSelected && isLimitReached) ? "0.5" : "1";
       });
   }
   
   // Close dropdown when clicking outside
   document.addEventListener("click", (e) => {
       // document.querySelectorAll(".dropdown-container").forEach(container => {
       //     if (!container.contains(e.target)) {
       //         container.querySelector(".dropdown-list").classList.remove("active");
       //     }
       // });
       document.querySelectorAll(".dropdown-container").forEach(container => {
           const dropdownName = container.getAttribute("data-dropdown-name");
           const dropdownHeader = container.querySelector(".dropdown-header");
           const dropdownList = container.querySelector(".dropdown-list");
   
           // *** Yahan hidden input se selected values load karo ***
           const hiddenInput = document.getElementById(`selectedInput_${dropdownName}`);
           let selectedValues = [];
           if (hiddenInput && hiddenInput.value.trim().length > 0) {
               selectedValues = hiddenInput.value.split(',').map(v => v.trim());
           }
   
           // Initialize selectedValuesMap globally if not defined
           if (!window.selectedValuesMap) {
               window.selectedValuesMap = {};
           }
           window.selectedValuesMap[dropdownName] = selectedValues;
   
           // Render selected tags and update option states
           renderTags(dropdownName, container);
           updateOptionsState(dropdownName, container);
   
           // Your existing event listeners for toggling dropdown and selecting options
           dropdownHeader.addEventListener("click", () => {
               dropdownList.classList.toggle("active");
           });
   
           dropdownList.querySelectorAll("div").forEach(option => {
               option.addEventListener("click", () => {
                   const value = option.getAttribute("data-value");
                   if (window.selectedValuesMap[dropdownName].includes(value)) return;
   
                   if (window.selectedValuesMap[dropdownName].length < 5) {
                       window.selectedValuesMap[dropdownName].push(value);
                       renderTags(dropdownName, container);
                       updateOptionsState(dropdownName, container);
                   } else {
                       alert("Only 5 options can be selected.");
                   }
               });
           });
       });
   
   });
</script> --}}
<script>
   const selectedValuesMap = {};
   
   document.querySelectorAll(".dropdown-container").forEach(container => {
       const dropdownName = container.getAttribute("data-dropdown-name");
       const dropdownHeader = container.querySelector(".dropdown-header");
       const dropdownList = container.querySelector(".dropdown-list");
       const hiddenInput = document.getElementById(`selectedInput_${dropdownName}`);
   
       // Initialize selected values from the input field
       if (hiddenInput && hiddenInput.value) {
           selectedValuesMap[dropdownName] = hiddenInput.value
               .split(',')
               .map(v => v.trim())
               .filter(v => v !== '');
       } else {
           selectedValuesMap[dropdownName] = [];
       }
   
       // Toggle dropdown
       dropdownHeader.addEventListener("click", () => {
           dropdownList.classList.toggle("active");
       });
   
       // Handle option selection
       dropdownList.querySelectorAll("div").forEach(option => {
           option.addEventListener("click", () => {
               const value = option.getAttribute("data-value");
               if (selectedValuesMap[dropdownName].includes(value)) return;
   
               if (selectedValuesMap[dropdownName].length < 5) {
                   selectedValuesMap[dropdownName].push(value);
                   renderTags(dropdownName, container);
                   updateOptionsState(dropdownName, container);
               } else {
                   alert("Only 5 options can be selected.");
               }
           });
       });
   
       // Initial render
       renderTags(dropdownName, container);
       updateOptionsState(dropdownName, container);
   });
   
   function removeTag(value, dropdownName, container) {
       selectedValuesMap[dropdownName] = selectedValuesMap[dropdownName].filter(v => v !== value);
       renderTags(dropdownName, container);
       updateOptionsState(dropdownName, container);
   }
   
   function renderTags(dropdownName, container) {
       const dropdownHeader = container.querySelector(".dropdown-header");
       const hiddenInput = document.getElementById(`selectedInput_${dropdownName}`);
   
       dropdownHeader.innerHTML = "";
   
       if (selectedValuesMap[dropdownName].length === 0) {
           const placeholder = document.createElement("span");
           placeholder.className = "placeholder_new";
           placeholder.textContent = "Select Options";
           dropdownHeader.appendChild(placeholder);
       } else {
           selectedValuesMap[dropdownName].forEach(value => {
               const tag = document.createElement("div");
               tag.className = "tag";
               tag.innerHTML = `${value} <button onclick="removeTag('${value}', '${dropdownName}', this.closest('.dropdown-container'))">✕</button>`;
               dropdownHeader.appendChild(tag);
           });
       }
   
       if (hiddenInput) {
           hiddenInput.value = selectedValuesMap[dropdownName].join(',');
       }
   }
   
   function updateOptionsState(dropdownName, container) {
       const dropdownList = container.querySelector(".dropdown-list");
       const options = dropdownList.querySelectorAll("div");
       const isLimitReached = selectedValuesMap[dropdownName].length >= 5;
   
       options.forEach(option => {
           const value = option.getAttribute("data-value");
           const isSelected = selectedValuesMap[dropdownName].includes(value);
   
           if (isSelected) {
               option.style.pointerEvents = "none";
               option.style.opacity = "0.7";
               option.style.backgroundColor = "#e0e0e0"; // Optional: visual feedback
           } else {
               option.style.pointerEvents = isLimitReached ? "none" : "auto";
               option.style.opacity = isLimitReached ? "0.5" : "1";
               option.style.backgroundColor = ""; // Reset
           }
       });
   }
   
   // Close dropdown when clicking outside
   document.addEventListener("click", (e) => {
       document.querySelectorAll(".dropdown-container").forEach(container => {
           if (!container.contains(e.target)) {
               container.querySelector(".dropdown-list").classList.remove("active");
           }
       });
   });
</script>
<script>
   const addBtn = document.querySelector('.add_url_btn');
   const wrapper = document.getElementById('video_inputs_wrapper');
   const errorMsg = document.getElementById('error_message');
   
   addBtn.addEventListener('click', function(e) {
       e.preventDefault();
   
       const inputs = wrapper.querySelectorAll('.video_input');
   
       if (inputs.length >= 5) {
           errorMsg.style.display = 'block';
           return;
       } else {
           errorMsg.style.display = 'none';
       }
   
       const newInputDiv = document.createElement('div');
       newInputDiv.className = 'video_input d-flex align-items-center mb-2';
   
       newInputDiv.innerHTML = `
           <input class="form-control gen_input" type="text" name="video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
           <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">&times;</button>
       `;
   
       wrapper.appendChild(newInputDiv);
   });
   
   // ✅ EVENT DELEGATION (important part)
   wrapper.addEventListener('click', function(e) {
       if (e.target.classList.contains('remove_btn')) {
           e.target.closest('.video_input').remove();
           errorMsg.style.display = 'none';
       }
   });
</script>
{{-- <script>
   const addBtn = document.querySelector('.add_url_btn');
   const wrapper = document.getElementById('video_inputs_wrapper');
   const errorMsg = document.getElementById('error_message');
   
   addBtn.addEventListener('click', function(e) {
       e.preventDefault();
       const inputs = wrapper.querySelectorAll('.video_input');
   
       if (inputs.length >= 5) {
           errorMsg.style.display = 'block';
           return;
       } else {
           errorMsg.style.display = 'none';
       }
   
       const newInputDiv = document.createElement('div');
       newInputDiv.className = 'video_input d-flex align-items-center mb-2';
   
       newInputDiv.innerHTML = `
           <input class="form-control gen_input" type="url" name="video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
           <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">&times;</button>
           `;
   
       wrapper.appendChild(newInputDiv);
   
       newInputDiv.querySelector('.remove_btn').addEventListener('click', () => {
           newInputDiv.remove();
           errorMsg.style.display = 'none';
       });
   });
</script> --}}
<script>
   document.querySelectorAll('.numbers_limit').forEach(function(input) {
       input.addEventListener('input', function(e) {
           // Get digits only, no commas or non-numeric
           let value = e.target.value.replace(/\D/g, '');
   
           // Limit to 6 digits
           if (value.length > 6) {
               value = value.substring(0, 6);
           }
   
           // Format with thousand separator
           e.target.value = value ? Number(value).toLocaleString() : '';
       });
   });
</script>
<script>
   document.querySelectorAll('.thousand-separator').forEach(function(input) {
       input.addEventListener('input', function(e) {
           let raw = e.target.value.replace(/[^0-9]/g, ''); // Strip non-numeric
           if (raw) {
               e.target.value = '$' + Number(raw).toLocaleString();
           } else {
               e.target.value = '';
           }
       });
   });
</script>
<script>
   document.querySelectorAll('.price-input').forEach(function(input) {
       input.addEventListener('focus', function() {
           this.value = this.value.replace(/[^0-9]/g, ''); // remove $ and commas
       });
   
       input.addEventListener('blur', function() {
           let raw = this.value.replace(/[^0-9]/g, '');
           if (raw) {
               this.value = '$' + Number(raw).toLocaleString();
           } else {
               this.value = '';
           }
       });
   });
</script>
<script>
   document.querySelectorAll('.experience-input').forEach(input => {
       input.addEventListener('input', function() {
           const value = parseInt(this.value.replace(/^0+/, '')) || 0; // Remove leading 0s and parse number
           const label = this.parentElement.querySelector('.experience-label');
   
           if (value === 1) {
               label.textContent = "Year Experience";
           } else {
               label.textContent = "Years Experience";
           }
       });
   });
</script>
<script>
   function formatPhoneNumber(input) {
       let value = input.value.replace(/\D/g, "");
   
       if (value.length > 10) {
           value = value.slice(0, 10);
       }
   
       let formatted = "";
       if (value.length > 0) {
           formatted += "(" + value.substring(0, 3);
       }
       if (value.length >= 4) {
           formatted += ") " + value.substring(3, 6);
       }
       if (value.length >= 7) {
           formatted += "-" + value.substring(6, 10);
       }
   
       input.value = formatted;
   }
   
   // Attach to all inputs with class 'phone-input'
   document.querySelectorAll('.phone-input').forEach(input => {
       input.addEventListener('input', function() {
           formatPhoneNumber(this);
       });
   });
</script>
<script>
   let imagesToDelete = [];
   let certsToDelete = [];
   
   function removeExistingImage(index, btn) {
       if (confirm('Are you sure you want to remove this image?')) {
           imagesToDelete.push(index);
           document.getElementById('images_to_delete').value = JSON.stringify(imagesToDelete);
           $(btn).closest('.custom-upload-img-box').fadeOut(300, function() {
               $(this).remove();
               // Append an empty box to maintain grid if needed, or just leave it
           });
       }
   }
   
   function removeExistingCert(index, btn) {
       if (confirm('Are you sure you want to remove this file?')) {
           certsToDelete.push(index);
           document.getElementById('certifications_to_delete').value = JSON.stringify(certsToDelete);
           $(btn).closest('.custom-upload-img-box').fadeOut(300, function() {
               $(this).remove();
           });
       }
   }
   
   jQuery(document).ready(function() {
       initCustomImageUpload();
       initCertificationFileUpload();
   });
   
   function initCustomImageUpload() {
       let imgDataTransfer = new DataTransfer();
   
       $('#customImageInput').on('change', function(e) {
           const files = e.target.files;
           const container = $('#customUploadImagesContainer');
           const emptyBoxes = container.find('.custom-upload-img-box').not(':has(img.uploaded)');
   
           Array.from(files).forEach((file, index) => {
               if (imgDataTransfer.items.length >= 20) return;
   
               imgDataTransfer.items.add(file);
               const reader = new FileReader();
               reader.onload = function(e) {
                   const targetBox = emptyBoxes.eq(index);
                   if (targetBox.length) {
                       const img = targetBox.find('img');
                       img.attr('src', e.target.result).addClass('uploaded new-upload');
                       targetBox.find('.custom-remove-btn').show().attr('onclick', '').off('click').on('click', function() {
                           removeNewFile(file, 'image');
                           targetBox.remove();
                       });
                   }
               };
               reader.readAsDataURL(file);
           });
           this.files = imgDataTransfer.files;
       });
   
       function removeNewFile(fileToRemove, type) {
           const dt = type === 'image' ? imgDataTransfer : certDataTransfer;
           const input = type === 'image' ? document.getElementById('customImageInput') : document.getElementById('certFilesInput');
           
           for (let i = 0; i < dt.items.length; i++) {
               if (dt.items[i].getAsFile() === fileToRemove) {
                   dt.items.remove(i);
                   break;
               }
           }
           input.files = dt.files;
       }
   }
   
   let certDataTransfer = new DataTransfer();

function initCertificationFileUpload() {
    $('#certFilesInput').on('change', function(e) {
        const files = e.target.files;
        const container = $('#certFilesContainer');
        // Un boxes ko dhundo jisme abhi tak koi file upload nahi hui
        const emptyBoxes = container.find('.custom-upload-img-box').not(':has(img.uploaded)');

        Array.from(files).forEach((file, index) => {
            if (certDataTransfer.items.length >= 10) return;
            
            certDataTransfer.items.add(file);
            
            const targetBox = emptyBoxes.eq(index);
            
            if (targetBox.length) {
                const imgTag = targetBox.find('img');
                const removeBtn = targetBox.find('.custom-remove-btn');
                
                // File Type Check Logic
                if (file.type.match('image.*')) {
                    // Agar Image hai to normal preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imgTag.attr('src', e.target.result).addClass('uploaded new-upload');
                        // Purana icon/text agar ho to hatana parega, lekin img tag src change se kaam chal jayega
                    };
                    reader.readAsDataURL(file);
                } else {
                    // Agar PDF ya DOC hai to Icon Show karein
                    let iconHtml = '';
                    if (file.type === 'application/pdf') {
                        iconHtml = '<div class="file-type-icon pdf-icon-style">📄</div>';
                    } else if (file.type.includes('word') || file.type.includes('document')) {
                        iconHtml = '<div class="file-type-icon doc-icon-style">📝</div>';
                    } else {
                        iconHtml = '<div class="file-type-icon">📎</div>'; // Generic file
                    }
                    
                    // Image tag ko hide karke wahan icon div daal dein, 
                    // ya img tag ke andar hi icon set kar dein. 
                    // Behtar hai ke hum img tag ko hide karein aur ek naya div append karein, 
                    // lekin structure maintain rakhne ke liye hum img tag ke baad icon inject kar sakte hain 
                    // ya img tag ko replace kar sakte hain.
                    
                    // Simple approach: Img tag ka src clear karein aur uske baad icon append karein
                    imgTag.hide(); 
                    
                    // Check karein ke pehle se icon to nahi laga hua
                    if(targetBox.find('.file-type-display').length === 0){
                         targetBox.append('<div class="file-type-display" style="position:absolute; top:0; left:0; width:100%; height:100%;">' + iconHtml + '</div>');
                    }
                    
                    imgTag.addClass('uploaded new-upload'); // Mark as uploaded so it doesn't get overwritten
                }

                // Remove button logic
                removeBtn.show().attr('onclick', '').off('click').on('click', function() {
                    // Remove the file from DataTransfer
                    for (let i = 0; i < certDataTransfer.items.length; i++) {
                        if (certDataTransfer.items[i].getAsFile() === file) {
                            certDataTransfer.items.remove(i);
                            break;
                        }
                    }
                    // Update input files
                    document.getElementById('certFilesInput').files = certDataTransfer.files;
                    
                    // UI Cleanup
                    targetBox.find('.file-type-display').remove(); // Remove icon if present
                    imgTag.show().attr('src', 'https://img.icons8.com/m_rounded/512/plus.png').removeClass('uploaded new-upload'); // Reset to plus icon
                    removeBtn.hide();
                });
            }
        });
        
        // Update the actual input files property
        this.files = certDataTransfer.files;
    });
}
</script>
<script>
   // PROFILE UPLOAD
   jQuery(document).ready(function() {
       initProfilePicUploader();
   });
   
   function initProfilePicUploader() {
       let profilePicFile = null;
   
       const input = $('#profilePicInput');
       const preview = $('#profilePicPreview');
       const removeBtn = $('#profileRemoveBtn');
       const errorMsg = $('#profilePicError');
   
       // Open file dialog when image clicked
       $('.profile-pic-wrapper').on('click', function() {
           input.click();
       });
   
       // On file selected
       input.on('change', function(e) {
           const file = e.target.files[0];
           errorMsg.text('');
   
           if (!file) return;
   
           if (!file.type.match('image.*')) {
               errorMsg.text('Please select a valid image.');
               return;
           }
   
           const reader = new FileReader();
           reader.onload = function(e) {
               preview.attr('src', e.target.result);
               profilePicFile = file.name;
               removeBtn.show();
           };
           reader.readAsDataURL(file);
   
           // Reset input so same file can be selected again if needed
           input.val('');
       });
   
       // Remove image
       removeBtn.on('click', function(e) {
           e.stopPropagation(); // prevent triggering file input
           preview.attr('src', 'https://img.icons8.com/ios-glyphs/90/user--v1.png');
           profilePicFile = null;
           removeBtn.hide();
           errorMsg.text('');
       });
   }
</script>
<script>
   const checkboxes = document.querySelectorAll('.form-check-input');
   
   // IDs of checkboxes to disable when Varying Price per Service is checked
   const priceCheckboxes = ['ph_p', 'ps_p', 'pp_p', 'pm_p'];
   const vppsCheckbox = document.getElementById('vpps_p');
   
   // Your additional price input
   const pkgPriceInput = document.querySelector('input[name="pkg_price"]');
   
   checkboxes.forEach(checkbox => {
       checkbox.addEventListener('change', () => {
           const relatedInputBox = document.getElementById('input_' + checkbox.id);
   
           // Handle regular input visibility (except Varying Price per Service)
           if (checkbox.id !== 'vpps_p') {
               if (checkbox.checked) {
                   relatedInputBox && (relatedInputBox.style.display = 'block');
   
                   // If any price checkbox is checked, uncheck Varying Price
                   if (vppsCheckbox.checked) {
                       vppsCheckbox.checked = false;
                       enablePkgPriceInput();
                   }
               } else {
                   relatedInputBox && (relatedInputBox.style.display = 'none');
               }
           }
   
           // Handle "Varying Price per Service"
           if (checkbox.id === 'vpps_p') {
               priceCheckboxes.forEach(id => {
                   const cb = document.getElementById(id);
                   const input = document.getElementById('input_' + id);
                   if (cb) {
                       if (checkbox.checked) {
                           cb.checked = false;
                           cb.disabled = true;
                           if (input) input.style.display = 'none';
                       } else {
                           cb.disabled = false;
                       }
                   }
               });
   
               // Disable or enable pkg_price input
               if (checkbox.checked) {
                   disablePkgPriceInput();
               } else {
                   enablePkgPriceInput();
               }
           }
       });
   });
   
   // Disable / Enable functions
   function disablePkgPriceInput() {
       pkgPriceInput.value = "";
       pkgPriceInput.disabled = true;
       pkgPriceInput.classList.add("disabled");
   }
   
   function enablePkgPriceInput() {
       pkgPriceInput.disabled = false;
       pkgPriceInput.classList.remove("disabled");
   }
   
   // Handle cross buttons (close input + uncheck)
   const removeBtns = document.querySelectorAll('.price-input-box .remove-btn');
   removeBtns.forEach(btn => {
       btn.addEventListener('click', () => {
           const inputBox = btn.parentElement;
           inputBox.style.display = 'none';
           const id = inputBox.id.replace('input_', '');
           document.getElementById(id).checked = false;
       });
   });
</script>
<script>
   document.querySelectorAll('.websiteInput').forEach(function(input) {
       input.addEventListener('input', function () {
           let value = this.value;
   
           // remove http:// or https://
           value = value.replace(/^https?:\/\//, '');
   
           // remove www. (agar nahi chahte to is line ko comment kr dein)
           // value = value.replace(/^www\./, '');
   
           this.value = value;
       });
   });
</script>
@endsection