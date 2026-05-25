@php
$layout = $usertype == 1 ? 'layouts.admin_app' : 'layouts.user_app';
@endphp
@extends($layout)
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
   .asterisk {
   color: red;
   }
   .bid_box {
   background: #f5eeee;
   padding: 30px;
   border-radius: 20px;
   margin-top: 20px;
   }
   .hidden_box_four_flex {
   display: flex;
   align-items: center;
   gap: 10px;
   }
   .hidden_box_four_flex input {
   width: 70px;
   }
   .textarea {
   font-size: 0.8rem;
   padding: 20px;
   border-radius: 10px;
   border: 1px solid #cbd0dd;
   outline: none;
   }
   img.img-fluid.uploaded.existing {
   width: 100px;
   height: 100px;
   object-fit: cover;
   }
   .garage_box {
   max-width: 800px;
   }
   .garage_box .form-control gen_input {
   width: 300px;
   }
   .other_flooring_box {
   display: flex;
   align-items: center;
   gap: 10px;
   max-width: 260px;
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
   overflow: hidden;
   }
   .upload__img-close {
   width: 18px;
   height: 18px;
   border-radius: 5px;
   background-color: rgba(0, 0, 0, 0.5);
   position: absolute;
   top: 0px;
   right: 0px;
   text-align: center;
   line-height: 16px;
   z-index: 1;
   cursor: pointer;
   }
   .upload__img-close:after {
   content: "✖";
   font-size: 10px;
   color: white;
   opacity: 1;
   position: absolute;
   right: 5px;
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
   .upload__box a {
   color: #000;
   width: 100px;
   height: 100px;
   background-color: #f0f0f0;
   display: flex;
   align-items: center;
   justify-content: center;
   font-size: 32px;
   color: #555;
   position: relative;
   border-radius: 5px;
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
   .test {
   display: flex;
   gap: 10px;
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
   background: #fdfdfd38;
   border-radius: 8px 0 0 8px;
   box-shadow: rgb(204, 219, 232) 4px 3px 18px 3px inset, rgb(255 255 255 / 68%) -3px -3px 11px -8px inset;
   }
   .max-160 {
   max-width: 160px;
   }
   .custom-upload-img-box {
   width: 100px;
   height: 100px;
   margin: 10px;
   border-radius: 10px;
   overflow: hidden;
   position: relative;
   cursor: pointer;
   }
   .custom-upload-img-box img {
   width: 100%;
   height: 100%;
   object-fit: cover;
   }
   span.custom-remove-btn {
   position: absolute;
   top: 5px;
   right: 5px;
   background: #000;
   color: #fff;
   width: 20px;
   height: 20px;
   display: flex;
   justify-content: center;
   align-items: center;
   border-radius: 100%;
   font-size: 13px;
   }
   /* .custom-remove-btn {
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
   } */
   .submit_btn_one, .submit_btn_one:hover {
   width: 200px;
   }
   /* ── Custom Upload System ── */
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
   .custom-upload__btn {
   display: flex;
   justify-content: center;
   align-items: center;
   font-weight: 600;
   color: #ccc;
   text-align: center;
   width: 100%;
   padding: 5px;
   cursor: pointer;
   height: 100%;
   font-size: 14px;
   }
   .custom-upload__btn p {
   margin: 0 !important;
   color: #ccc;
   display: flex;
   flex-direction: column;
   align-items: center;
   }
   .custom-upload__box {
   margin-bottom: 40px;
   }
.custom-upload-images-flex {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    max-width: 1100px;
    margin: 0 auto;
    justify-content: flex-start;
}
   #docFilesContainer .custom-upload-img-box,
   #galleryImgContainer .custom-upload-img-box {
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
   overflow: hidden;
   background: #f0f0f0;
   }
   #docFilesContainer .custom-remove-btn,
   #galleryImgContainer .custom-remove-btn {
   position: absolute;
   top: 2px;
   right: 4px;
   background: rgba(255,0,0,0.9);
   color: white;
   border-radius: 50%;
   width: 20px;
   height: 20px;
   display: none;
   align-items: center;
   justify-content: center;
   cursor: pointer;
   font-size: 14px;
   line-height: 1;
   z-index: 100;
   }
   #docFilesContainer .custom-upload-img-box:hover .custom-remove-btn,
   #galleryImgContainer .custom-upload-img-box:hover .custom-remove-btn {
   display: flex;
   }
   #docFilesContainer .custom-upload-img-box img,
   #galleryImgContainer .custom-upload-img-box img {
   max-width: 100%;
   max-height: 100%;
   object-fit: contain;
   }
   .pdf-icon {
   width: 100%;
   height: 100%;
   display: flex;
   align-items: center;
   justify-content: center;
   background-color: #f0f0f0;
   font-size: 12px !important;
   font-weight: bold;
   text-align: center;
   }
   
    @media only screen and (max-width: 1600px) {
        .custom-upload-images-flex {
            gap: 7px;
            max-width: 830px;
        }
        #docFilesContainer .custom-upload-img-box, #galleryImgContainer .custom-upload-img-box {
            width: 70px;
            height: 70px;
            border: 2px dashed #ccc;
            padding: 3px;
            margin: 0;
        }
    }
        
</style>
@foreach ($data as $data)
<div class="content user_main_content p-5">
   <div class="pb-5">
      <form method="POST" action="{{ url('/update_property') }}" enctype="multipart/form-data" class="row g-3 mb-6">
         <div class="box_top">
            <h2 class="mb-2 main_heading_dashboard">Edit <br /> Real Estate Ad Property Information</h2>
            <!-- <h5 class="text-700 fw-semi-bold">Hereâ€™s whatâ€™s going on at your business right now</h5> -->
         </div>
         @csrf
         <input type="hidden" value="{{ $data->id }}" name="id">
         <input type="hidden" id="images_to_delete" name="images_to_delete" value="[]">
         <div class="row gy-4">
            <div class="col-12">
               <div class="border_box_one">
                  <h4 class="mb-3">Type of Ad <span class="asterisk">*</span></h4>
                  <div class="row mb-2">
                     <div class="col-6 d-flex gap-5">
                        @php
                        $ad_type = $data->ad_type ?? '';
                        @endphp
                        <div class="form-check">
                           <label>
                           <input class="form-check-input" name="ad_type" type="radio" value="Sale" {{ $ad_type == 'Sale' ? 'checked' : '' }} required /> Sale
                           </label>
                        </div>
                        <div class="form-check d-none">
                           <label>
                           <input class="form-check-input" name="ad_type" type="radio" value="Auction" {{ $ad_type == 'Auction' ? 'checked' : '' }} /> Auction
                           </label>
                        </div>
                        <div class="form-check">
                           <label>
                           <input class="form-check-input" name="ad_type" type="radio" value="Rent" {{ $ad_type == 'Rent' ? 'checked' : '' }} /> Rent
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bid_box" style="display: none;">
                  <h4 class="mb-5 text-1000">Will be shown on first picture of ad</h4>
                  <div class="row gy-4">
                     <div class="col-6">
                        <h5 class="mb-3">Starting Bid Amount</h5>
                        <input class="form-control gen_input thousand-separator price-input" type="text" name="bid_amount" value="{{ $data->bid_amount }}" placeholder="Start bid" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Reserve Amount (Optional) </h5>
                        <input class="form-control gen_input thousand-separator price-input" type="text" name="reserve_amount" value="{{ $data->reserve_amount }}"
                           placeholder="Reserve Amount" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Start Date</h5>
                        <input class="form-control gen_input" type="date" name="start_date" placeholder="Start bid" value="{{ $data->start_date }}" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">End Date</h5>
                        <input class="form-control gen_input" type="date" name="end_date" placeholder="Reserve Amount" value="{{ $data->end_date }}" />
                     </div>
                     <div class="col-12">
                        <h5 class="mb-3">Auction Link</h5>
                        <input class="form-control gen_input" type="url" name="auc_link" value="{{ $data->auc_link }}"
                           placeholder="please past the link to your horses ad on the auction" />
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-6">
               <div class="border_box_one">
                  <h4 class="mb-3">Property Type <span class="asterisk">*</span></h4>
                  @php
                  $property_type = $data->property_type ?? '';
                  @endphp
                  <select class="form-control gen_input" name="property_type" required>
                  <option disabled {{ $property_type == '' ? 'selected' : '' }}>Select Property Type:</option>
                  <option value="Home with Acreage" {{ $property_type == 'Home with Acreage' ? 'selected' : '' }}>Home with Acreage</option>
                  <option value="Equestrian Facility" {{ $property_type == 'Equestrian Facility' ? 'selected' : '' }}>Equestrian Facility</option>
                  <option value="Pasture land" {{ $property_type == 'Pasture land' ? 'selected' : '' }}>Pasture land</option>
                  <option value="Raw Land" {{ $property_type == 'Raw Land' ? 'selected' : '' }}>Raw Land</option>
                  <option value="Residential" {{ $property_type == 'Residential' ? 'selected' : '' }}>Residential</option>
                  <option value="Comercial" {{ $property_type == 'Comercial' ? 'selected' : '' }}>Comercial</option>
                  </select>
               </div>
            </div>
            <div class="col-6">
               <div class="border_box_one">
                  <h4 class="mb-3">Location <span class="asterisk">*</span></h4>
                  <input class="form-control gen_input" type="text" name="real_location" value="{{ $data->real_location }}" placeholder="Property address" required />
               </div>
            </div>
            <div class="col-12">
               <div class="border_box_one">
                  <h4 class="mb-3">Basic Information:</h4>
                  <div class="row">
                     <div class="col-6">
                        <h5 class="mb-2">
                           Title <span class="asterisk">*</span>
                           <small class="text-muted">(Attractive title to capture potential buyers)</small>
                        </h5>
                        <input class="form-control gen_input mb-3" type="text" name="real_title" value="{{ $data->real_title }}" placeholder="Enter Title" required />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">Price [$] <span class="asterisk">*</span></h5>
                        <input class="form-control gen_input mb-3 thousand-separator price-input" type="text" name="real_price" value="{{ $data->real_price }}"
                           placeholder="Enter Price" required />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">Acres <span class="asterisk">*</span></h5>
                        <input class="form-control gen_input mb-3" type="text" name="real_acres" value="{{ $data->real_acres }}" placeholder="Enter Acres" required />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2"># of Bedrooms</h5>
                        <input class="form-control gen_input mb-3" type="text" name="real_bedroom" value="{{ $data->real_bedroom }}" placeholder="Enter # of Bedrooms" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2"># of Bathrooms</h5>
                        <input class="form-control gen_input mb-3" type="text" name="real_bathroom" value="{{ $data->real_bathroom }}" placeholder="Enter # of Bathrooms" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">
                           Farm Name <small class="text-muted">(Optional)</small>
                        </h5>
                        <input class="form-control gen_input mb-3" type="text" name="real_farm_name" value="{{ $data->real_farm_name }}" placeholder="Enter Farm Name" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Garage</h5>
                        <div class="d-flex gap-3">
                           @php
                           $real_garage = $data->real_garage ?? '';
                           @endphp
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="garage_yes" name="real_garage" {{ $real_garage == 'yes' ? 'checked' : '' }} />
                              <label class="form-check-label" for="garage_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="garage_no" name="real_garage" {{ $real_garage == 'no' ? 'checked' : '' }} />
                              <label class="form-check-label" for="garage_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="garage_box">
                           <input class="form-control gen_input mb-3" type="text" name="num_spaces" value="{{ $data->num_spaces }}" placeholder="# of spaces" />
                           @php
                           $garage_type = explode(',', $data->garage_type ?? '');
                           @endphp
                           <div class="row">
                              <div class="col-3">
                                 <div class="d-flex gap-1 flex-column">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Detached" id="detached" name="garage_type[]"
                                       {{ in_array('Detached', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="detached">Detached</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Attached" id="attached" name="garage_type[]"
                                       {{ in_array('Attached', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="attached">Attached</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Tandem" id="tandem" name="garage_type[]"
                                       {{ in_array('Tandem', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="tandem">Tandem</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="oversized" id="oversized" name="garage_type[]"
                                       {{ in_array('oversized', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="oversized">Oversized</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-3">
                                 <div class="d-flex gap-1 flex-column">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Breezeway" id="breezeway" name="garage_type[]"
                                       {{ in_array('Breezeway', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="breezeway">Breezeway</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Garage Workshop" id="garage_ws" name="garage_type[]"
                                       {{ in_array('Garage Workshop', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="garage_ws">Garage Workshop</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Garage Apartment" id="garage_a" name="garage_type[]"
                                       {{ in_array('Garage Apartment', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="garage_a">Garage Apartment</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Carport" id="carport" name="garage_type[]"
                                       {{ in_array('Carport', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="carport">Carport</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            {{-- 
            <div class="col-12">
               <div class="border_box_one">
                  <h4 class="mb-3">Stable/Barn Facilities/ Amenities:</h4>
                  <div class="row">
                     <div class="col-6">
                        <input class="form-control gen_input mb-3" type="text" name="barn_type" value="{{ $data->barn_type }}" placeholder="Type of Barn " />
                     </div>
                     <div class="col-6">
                        <input class="form-control gen_input mb-3" type="text" name="num_stalls" value="{{ $data->num_stalls }}" placeholder="# of Stalls" />
                     </div>
                     <div class="col-6">
                        <input class="form-control gen_input" type="text" name="num_barn" value="{{ $data->num_barn }}" placeholder="# of Barns" />
                     </div>
                     <div class="col-6">
                        <input class="form-control gen_input mb-3" type="text" name="num_sheds" value="{{ $data->num_sheds }}" placeholder="# of Run-in Sheds" />
                     </div>
                     <div class="col-6">
                        <input class="form-control gen_input mb-3" type="text" name="amenities" value="{{ $data->amenities }}" placeholder="Enter Amenities" />
                     </div>
                  </div>
               </div>
            </div>
            --}}
            <div class="col-12">
               <div class="border_box_one">
                  <div class="row gy-4">
                     <div class="col-6">
                        <div class="row gy-4">
                           <div class="col-3">
                              <h5 class="mb-3">Stall</h5>
                              <div class="d-flex gap-1 flex-column">
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Yes" id="have_stall_yes" {{ $data->have_stall === 'Yes' ? 'checked' : '' }}
                                    name="have_stall" />
                                    <label class="form-check-label" for="have_stall_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="No" id="have_stall_no" {{ $data->have_stall === 'No' ? 'checked' : '' }}
                                    name="have_stall" />
                                    <label class="form-check-label" for="have_stall_no">No</label>
                                 </div>
                              </div>
                           </div>
                           @php
                           $stall_types = explode(',', $data->stall_types ?? '');
                           @endphp
                           <div class="col-9">
                              <div class="have_stall_box max-160 mt-4">
                                 <div class="d-flex gap-1 flex-column">
                                    <div class="form-check mb-2 ps-0">
                                       <label class="form-check-label mb-2" for="stall_nos">Total # of Stalls</label>
                                       <input class="form-control gen_input_one" type="number" id="stall_nos" name="num_stalls" value="{{ $data->num_stalls ?? '' }}"
                                          placeholder="Enter here...">
                                    </div>
                                 </div>
                                 <div class="d-flex gap-3 flex-row">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Mini" {{ in_array('Mini', $stall_types) ? 'checked' : '' }} id="mini_flooring"
                                       name="stall_types[]" />
                                       <label class="form-check-label" for="mini_flooring">Mini</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Standard" {{ in_array('Standard', $stall_types) ? 'checked' : '' }}
                                       id="standard_flooring" name="stall_types[]" />
                                       <label class="form-check-label" for="standard_flooring">Standard</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Oversized" {{ in_array('Oversized', $stall_types) ? 'checked' : '' }}
                                       id="oversized_flooring" name="stall_types[]" />
                                       <label class="form-check-label" for="oversized_flooring">Oversized</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="row gy-4">
                           <div class="col-3">
                              <h5 class="mb-3">Barn</h5>
                              <div class="d-flex gap-1 flex-column">
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Yes" id="have_barn_yes" {{ $data->have_barn === 'Yes' ? 'checked' : '' }}
                                    name="have_barn" />
                                    <label class="form-check-label" for="have_barn_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="No" id="have_bard_no" {{ $data->have_barn === 'No' ? 'checked' : '' }}
                                    name="have_barn" />
                                    <label class="form-check-label" for="have_bard_no">No</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-9">
                              <div class="have_barn_box max-160  mt-4">
                                 <div class="d-flex gap-1 flex-column">
                                    <div class="form-check mb-2 ps-0">
                                       <label class="form-check-label mb-2" for="barn_nos">Total # of Barns</label>
                                       <input class="form-control gen_input_one" type="number" id="barn_nos" name="num_barn" value="{{ $data->num_barn }}"
                                          placeholder="Enter here...">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Barn flooring </h5>
                        {{-- @php
                        $barn_flooring = $data->barn_flooring ?? '';
                        $predefined_floorings = ['Rubber', 'Concrete', 'Dirt'];
                        $is_other = !in_array($barn_flooring, $predefined_floorings);
                        @endphp --}}
                        @php
                        $barn_flooring = $data->barn_flooring ?? [];
                        // ensure array
                        if (!is_array($barn_flooring)) {
                        $barn_flooring = explode(',', $barn_flooring);
                        }
                        $predefined_floorings = ['Rubber', 'Concrete', 'Dirt'];
                        // other value nikal lo
                        $barn_flooring_other = '';
                        foreach ($barn_flooring as $value) {
                        if (!in_array($value, $predefined_floorings)) {
                        $barn_flooring_other = $value;
                        }
                        }
                        @endphp
                        {{-- @dd($predefined_floorings) --}}
                        <div class="d-flex gap-1 flex-column">
                           {{-- 
                           <div class="form-check">
                              <input class="form-check-input" type="text" id="barn" name="num_barn" {{ $data->num_barn }}>
                              <label class="form-check-label" for="barn">Total Barn</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="text" id="stalls" name="num_stalls" {{ $data->num_stalls }}>
                              <label class="form-check-label" for="stalls">Total Barn</label>
                           </div>
                           --}}
                           {{-- @dd($barn_flooring != 'Rubber' ? 'checked' : '') --}}
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Rubber" name="barn_flooring[]"
                              {{ in_array('Rubber', $barn_flooring) ? 'checked' : '' }}>
                              <label class="form-check-label">Rubber</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Concrete" name="barn_flooring[]"
                              {{ in_array('Concrete', $barn_flooring) ? 'checked' : '' }}>
                              <label class="form-check-label">Concrete</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Dirt" name="barn_flooring[]"
                              {{ in_array('Dirt', $barn_flooring) ? 'checked' : '' }}>
                              <label class="form-check-label">Dirt</label>
                           </div>
                           <div class="form-check other_flooring_box">
                              <input class="form-check-input" type="checkbox"
                              {{ $barn_flooring_other ? 'checked' : '' }}>
                              <input class="form-control gen_input_one"
                                 type="text"
                                 name="barn_flooring[]"
                                 value="{{ $barn_flooring_other }}"
                                 placeholder="Other Flooring">
                           </div>
                           {{-- 
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Rubber" id="rubber_flooring" name="barn_flooring[]"
                              {{ $barn_flooring == 'Rubber' ? 'checked' : '' }} />
                              <label class="form-check-label" for="rubber_flooring">Rubber</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Concrete" id="concrete_flooring" name="barn_flooring[]"
                              {{ $barn_flooring == 'Concrete' ? 'checked' : '' }} />
                              <label class="form-check-label" for="concrete_flooring">Concrete</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="Dirt" id="dirt_flooring" name="barn_flooring[]"
                              {{ $barn_flooring == 'Dirt' ? 'checked' : '' }} />
                              <label class="form-check-label" for="dirt_flooring">Dirt</label>
                           </div>
                           <div class="form-check other_flooring_box">
                              <input class="form-check-input" type="checkbox"
                              {{ $is_other ? 'checked' : '' }}>
                              <input class="form-control gen_input_one"
                                 type="text"
                                 name="barn_flooring[]"
                                 value="{{ $is_other ? $barn_flooring : '' }}"
                                 placeholder="Other Flooring">
                           </div>
                           --}}
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Rubber Mats in stalls</h5>
                        <div class="d-flex gap-1 flex-column">
                           @php
                           $rubber_matts = $data->rubber_matts ?? '';
                           @endphp
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="rubber_matt_yes" name="rubber_matts"
                              {{ $rubber_matts === 'yes' ? 'checked' : '' }} />
                              <label class="form-check-label" for="rubber_matt_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="rubber_matt_no" name="rubber_matts" {{ $rubber_matts === 'no' ? 'checked' : '' }} />
                              <label class="form-check-label" for="rubber_matt_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="row">
                           <div class="col-3">
                              <h5 class="mb-3">Run-In Shed</h5>
                              <div class="d-flex gap-1 flex-column">
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Yes" id="run_shed_yes" {{ $data->run_shed === 'Yes' ? 'checked' : '' }} name="run_shed" />
                                    <label class="form-check-label" for="run_shed_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="No" id="run_shed_no" {{ $data->run_shed === 'No' ? 'checked' : '' }} name="run_shed" />
                                    <label class="form-check-label" for="run_shed_no">No</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-9">
                              <div class="run_shed_box mt-4 max-160">
                                 <div class="d-flex gap-1 flex-column">
                                    <div class="form-check mb-2 ps-0">
                                       <label class="form-check-label mb-2" for="barn_nos">Total #  Run-In Sheds</label>
                                       <input class="form-control gen_input_one" type="number" id="barn_nos"  value="{{ $data->num_sheds ?? ''}}" name="num_sheds" placeholder="Enter here...">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <!-- <h4 class="mb-3">Stable Features </h4> -->
                        <div class="row pb-2">
                           <div class="col-3">
                              <h5 class="mb-3">Tack Room </h5>
                              <div class="col-12 pb-3">
                                 <div class="d-flex gap-1 flex-column">
                                    @php
                                    $tack_room = $data->tack_room ?? '';
                                    @endphp
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="yes" id="indoor_two_yes" name="tack_room"
                                       {{ $tack_room === 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="indoor_two_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="no" id="indoor_two_no" name="tack_room"
                                       {{ $tack_room === 'no' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="indoor_two_no">No</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-3">
                              <div class="hidden_box_one">
                                 <h6 class="mb-3">Heated or not?</h6>
                                 <div class="d-flex gap-1 flex-column">
                                    @php
                                    $heated_not = $data->heated_not ?? '';
                                    @endphp
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="yes" id="heated_yes" name="heated_not"
                                       {{ $heated_not === 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="heated_yes">Heated</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="no" id="heated_no" name="heated_not"
                                       {{ $heated_not === 'no' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="heated_no">Not Heated</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-3">
                              <h5 class="mb-3">Wash Stall </h5>
                              <div class="d-flex gap-1 flex-column mb-3">
                                 @php
                                 $wash_stall = $data->wash_stall ?? '';
                                 @endphp
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="yes" id="wash_stall_yes" name="wash_stall"
                                    {{ $wash_stall === 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="wash_stall_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="no" id="wash_stall_no" name="wash_stall"
                                    {{ $wash_stall === 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="wash_stall_no">No</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-3">
                              <div class="hidden_box_two">
                                 <h6 class="mb-3">Hot Water</h6>
                                 <div class="d-flex gap-1 flex-column pb-3">
                                    @php
                                    $hot_water = $data->hot_water ?? '';
                                    @endphp
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="yes" id="hot_water_yes" name="hot_water"
                                       {{ $hot_water === 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="hot_water_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="no" id="hot_water_no" name="hot_water"
                                       {{ $hot_water === 'no' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="hot_water_no">No</label>
                                    </div>
                                 </div>
                                 <h6 class="mb-3">Cold Water </h6>
                                 <div class="d-flex gap-1 flex-column">
                                    @php
                                    $cold_water = $data->cold_water ?? '';
                                    @endphp
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="yes" id="cold_water_yes" name="cold_water"
                                       {{ $cold_water === 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="cold_water_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="no" id="cold_water_no" name="cold_water"
                                       {{ $cold_water === 'no' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="cold_water_no">No</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6">
                              <h5 class="mb-3">Hay Storage </h5>
                              @php
                              $hay_storage = isset($data->hay_storage) ? explode(',', $data->hay_storage) : [];
                              @endphp
                              <div class="d-flex gap-1 flex-column">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Hay loft" id="hay_loft" name="hay_storage[]"
                                    {{ in_array('Hay loft', $hay_storage) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hay_loft">Hay loft</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Hay room" id="hay_room" name="hay_storage[]"
                                    {{ in_array('Hay room', $hay_storage) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hay_room">Hay room</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Hay stall" id="hay_stall" name="hay_storage[]"
                                    {{ in_array('Hay stall', $hay_storage) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hay_stall">Hay stall</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Additional hay barn" id="ahay_barn" name="hay_storage[]"
                                    {{ in_array('Additional hay barn', $hay_storage) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ahay_barn">Additional hay barn</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Heated barn</h5>
                        <div class="d-flex gap-1 flex-column">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="barn_yes" name="heated_barn"
                              {{ isset($data->heated_barn) && $data->heated_barn == 'yes' ? 'checked' : '' }} />
                              <label class="form-check-label" for="barn_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="barn_no" name="heated_barn"
                              {{ isset($data->heated_barn) && $data->heated_barn == 'no' ? 'checked' : '' }} />
                              <label class="form-check-label" for="barn_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Air Conditions Barn</h5>
                        <div class="d-flex gap-1 flex-column">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="air_con_yes" name="air_condition_barn"
                              {{ isset($data->air_condition_barn) && $data->air_condition_barn == 'yes' ? 'checked' : '' }} />
                              <label class="form-check-label" for="air_con_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="air_con_no" name="air_condition_barn"
                              {{ isset($data->air_condition_barn) && $data->air_condition_barn == 'no' ? 'checked' : '' }} />
                              <label class="form-check-label" for="air_con_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Dry Lots <span class="asterisk">*</span></h5>
                        <div class="d-flex gap-5">
                           <div class="d-flex gap-1 flex-column">
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="yes" id="dry_lots_yes" name="dry_lots"
                                 {{ isset($data->dry_lots) && $data->dry_lots == 'yes' ? 'checked' : '' }} />
                                 <label class="form-check-label" for="dry_lots_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="no" id="dry_lots_no" name="dry_lots"
                                 {{ isset($data->dry_lots) && $data->dry_lots == 'no' ? 'checked' : '' }} />
                                 <label class="form-check-label" for="dry_lots_no">No</label>
                              </div>
                           </div>
                           <div class="hidden_box_seven w-25"><input class="form-control gen_input mb-3" type="text" name="num_lots" value="{{ $data->num_lots }}"
                              placeholder="# of dry lots" /></div>
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Fenced Grass Pastures <span class="asterisk">*</span></h5>
                        <div class="d-flex gap-5">
                           <div class="d-flex gap-1 flex-column">
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="yes" id="fgp_yes" name="fenced_grass"
                                 {{ isset($data->fenced_grass) && $data->fenced_grass == 'yes' ? 'checked' : '' }} />
                                 <label class="form-check-label" for="fgp_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="no" id="fgp_no" name="fenced_grass"
                                 {{ isset($data->fenced_grass) && $data->fenced_grass == 'no' ? 'checked' : '' }} />
                                 <label class="form-check-label" for="fgp_no">No</label>
                              </div>
                           </div>
                           <div class="hidden_box_eight w-25"><input class="form-control gen_input mb-3" type="text" name="num_fenced_grass" value="{{ $data->num_fenced_grass }}"
                              placeholder="# of fenced grass pastures" /></div>
                        </div>
                     </div>
                     <div class="col-12">
                        @php
                        $selectedFencing = isset($data->fencing) ? (is_array($data->fencing) ? $data->fencing : explode(',', $data->fencing)) : [];
                        // Define the known fencing options
                        $knownFencing = ['electric', 'vinyl', 'wood', 'metal'];
                        // Check if there's any "Other" fencing value not in known options
                        $otherFencing = collect($selectedFencing)->first(function ($val) use ($knownFencing) {
                        return !in_array(strtolower($val), $knownFencing);
                        });
                        @endphp
                        <div class="row">
                           <div class="col-3">
                              <div class="form-group">
                                 <h5 class="mb-3">Fencing:</h5>
                                 <div class="form-check">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="fencing[]" value="electric"
                                    {{ in_array('electric', $selectedFencing) ? 'checked' : '' }}>
                                    Electric
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="fencing[]" value="vinyl" {{ in_array('vinyl', $selectedFencing) ? 'checked' : '' }}>
                                    Vinyl
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="fencing[]" value="wood" {{ in_array('wood', $selectedFencing) ? 'checked' : '' }}>
                                    Wood
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="fencing[]" value="metal" {{ in_array('metal', $selectedFencing) ? 'checked' : '' }}>
                                    Metal
                                    </label>
                                 </div>
                                 <div class="form-check other_flooring_box ms-1 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="fencing_other_checkbox" name="fencing[]" value="{{ $otherFencing ?? '' }}"
                                    {{ $otherFencing ? 'checked' : '' }}>
                                    <input class="form-control gen_input_one ms-2" type="text" name="fencing_other_text" value="{{ $otherFencing ?? '' }}" placeholder="Other"
                                       style="max-width: 150px;">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-3">
                        <h5 class="mb-3">Outdoor Riding Ring <span class="asterisk">*</span></h5>
                        <div class="d-flex gap-1 flex-column">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="outdoor_yes" name="out_ride_ring"
                              {{ isset($data->out_ride_ring) && $data->out_ride_ring == 'yes' ? 'checked' : '' }} />
                              <label class="form-check-label" for="outdoor_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="outdoor_no" name="out_ride_ring"
                              {{ isset($data->out_ride_ring) && $data->out_ride_ring == 'no' ? 'checked' : '' }} />
                              <label class="form-check-label" for="outdoor_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="hidden_box_three mt-2">
                           <h5 class="mb-2">Add Dimensions </h5>
                           @php
                           $dimensions = isset($data->out_dimensions) ? explode(',', $data->out_dimensions) : ['', ''];
                           @endphp
                           <div class="hidden_box_four_flex mb-3">
                              <input class="form-control gen_input text-center" type="text" name="out_dimensions[]" placeholder="100" value="{{ $dimensions[0] ?? '' }}">
                              <p class="mb-0">x</p>
                              <input class="form-control gen_input text-center" type="text" name="out_dimensions[]" placeholder="90" value="{{ $dimensions[1] ?? '' }}">
                           </div>
                           <h5 class="mb-2">Watering System</h5>
                           <div class="d-flex gap-1 flex-column">
                              @php
                              $out_water_system = $data->out_water_system ?? ''; // jo value aapke paas hai
                              @endphp
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="yes" id="w_sys_yes" name="out_water_system"
                                 {{ $out_water_system == 'yes' ? 'checked' : '' }} />
                                 <label class="form-check-label" for="w_sys_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="no" id="w_sys_no" name="out_water_system"
                                 {{ $out_water_system == 'no' ? 'checked' : '' }} />
                                 <label class="form-check-label" for="w_sys_no">No</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-3">
                        <h5 class="mb-3">Indoor Riding Ring <span class="asterisk">*</span></h5>
                        <div class="d-flex gap-1 flex-column">
                           @php
                           $in_ride_ring = $data->in_ride_ring ?? ''; // Stored value
                           @endphp
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="indoor_yes" name="in_ride_ring" {{ $in_ride_ring == 'yes' ? 'checked' : '' }} />
                              <label class="form-check-label" for="indoor_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="indoor_no" name="in_ride_ring" {{ $in_ride_ring == 'no' ? 'checked' : '' }} />
                              <label class="form-check-label" for="indoor_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="hidden_box_five">
                           <h5 class="mb-2">Add Dimensions </h5>
                           @php
                           $dimensions = isset($data->in_dimensions) ? explode(',', $data->in_dimensions) : ['', ''];
                           @endphp
                           <div class="hidden_box_four_flex mb-3">
                              <input class="form-control gen_input text-center" type="text" name="in_dimensions[]" placeholder="100" value="{{ $dimensions[0] ?? '' }}">
                              <p class="mb-0">x</p>
                              <input class="form-control gen_input text-center" type="text" name="in_dimensions[]" placeholder="90" value="{{ $dimensions[1] ?? '' }}">
                           </div>
                           <h5 class="mb-2">Watering System</h5>
                           <div class="d-flex gap-1 flex-column">
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="yes" id="w_sys_two_yes" name="in_water_system"
                                 {{ isset($data->in_water_system) && $data->in_water_system === 'yes' ? 'checked' : '' }} />
                                 <label class="form-check-label" for="w_sys_two_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="no" id="w_sys_two_no" name="in_water_system"
                                 {{ isset($data->in_water_system) && $data->in_water_system === 'no' ? 'checked' : '' }} />
                                 <label class="form-check-label" for="w_sys_two_no">No</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <h5 class="mb-3">Round Pen </h5>
                        <div class="d-flex gap-1 flex-column">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="rounnd_yes" name="round_pen"
                              {{ isset($data->round_pen) && $data->round_pen === 'yes' ? 'checked' : '' }} />
                              <label class="form-check-label" for="rounnd_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="rounnd_no" name="round_pen"
                              {{ isset($data->round_pen) && $data->round_pen === 'no' ? 'checked' : '' }} />
                              <label class="form-check-label" for="rounnd_no">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <div class="border_box_one mb-0">
                  <h4 class="mb-2">Property Overview <span class="asterisk">*</span></h4>
                  <h4><small class="text-muted mb-3">( This area is for describing the property ONLY. Do not enter emails, website addresses, contact information, HTML, etc. All text not
                     describing property will be removed.)</small>
                  </h4>
                  <textarea class="textarea summernote" name="property_overview" maxlength="300" style="width: 100%; height: 15rem;" placeholder="Write property overview..." required>{{ $data->property_overview }}</textarea>
               </div>
            </div>
            <div class="col-12">
               <div class="border_box_one mb-0">
                  <h4 class="mb-2">Additional Write up</h4>
                  <h4><small class="text-muted mb-3">( Please include anything additional you want to add)</small></h4>
                  <textarea class="textarea summernote" name="ad_write_up" maxlength="300" style="width: 100%; height: 15rem;" placeholder="Additional Write up">{{ $data->ad_write_up }}</textarea>
               </div>
            </div>
            <div class="col-12 pb-4">
               <div class="border_box_one">
                  <fieldset class="form-group">
                     <h4 class="mb-3">Property Features & Amenities</h4>
                     <div class="col-5">
                        @php
                        $features = isset($data->property_features) ? explode(',', $data->property_features) : [];
                        @endphp
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="pool" {{ in_array('pool', $features) ? 'checked' : '' }}>
                                 Pool
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="hot_tub"
                                 {{ in_array('hot_tub', $features) ? 'checked' : '' }}> Hot Tub
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="pond" {{ in_array('pond', $features) ? 'checked' : '' }}>
                                 Pond
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="river" {{ in_array('river', $features) ? 'checked' : '' }}>
                                 River
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="trails"
                                 {{ in_array('trails', $features) ? 'checked' : '' }}>
                                 Trails
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="trail_access"
                                 {{ in_array('trail_access', $features) ? 'checked' : '' }}> Trail Access
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="hay_fields"
                                 {{ in_array('hay_fields', $features) ? 'checked' : '' }}> Hay Fields
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="extra_housing"
                                 {{ in_array('extra_housing', $features) ? 'checked' : '' }}> Extra Housing
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </fieldset>
               </div>
            </div>
            <div class="col-12">
               <div class="border_box_one">
                  @php
                  $existingDocs = is_string($data->property_document) ? json_decode($data->property_document, true) : (array) $data->property_document;
                  $existingDocs = is_array($existingDocs) ? $existingDocs : [];
                  @endphp
                  <h4 class="mb-2">Documents </h4>
                  <h4 class="mb-3"><small class="text-muted mb-3">Please upload any relevant documents you want to provide to prospective buyers. This includes surveys, disclosures, and any other important documents.</small></h4>
                  <div class="col-12">
                     <div class="custom-upload-images-flex mb-3 m-0" id="docFilesContainer">
                        <input type="hidden" name="doc_files_to_delete" class="doc_files_to_delete_input" value="[]">
                        @foreach ($existingDocs as $index => $fileName)
                        <div class="custom-upload-img-box">
                           @php $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); @endphp
                           @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp']))
                           <img src="{{ asset('Property_documents/' . $fileName) }}" class="img-fluid uploaded existing" data-file-index="{{ $index }}" alt="Document">
                           @elseif($ext == 'pdf')
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight:bold; color:#b22033;">PDF</div>
                           @elseif(in_array($ext, ['doc', 'docx']))
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight:bold; color:#2b5797;">DOCX</div>
                           @else
                           <div class="pdf-icon uploaded existing" data-file-index="{{ $index }}" style="font-size:16px; font-weight:bold;">FILE</div>
                           @endif
                           <span class="custom-remove-btn" style="display:flex;">&times;</span>
                        </div>
                        @endforeach
                     </div>
                     <div class="custom-upload__btn-box mt-3">
                        <label class="custom-upload__btn">
                           <p>Upload Documents <span class="or">OR</span> <span class="browse_option">Browse</span></p>
                           <input id="docFilesInput" name="property_document[]" type="file" multiple class="custom-upload__inputfile" accept="image/*,application/pdf,.doc,.docx">
                        </label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <h3 class="text-white">Media Featured Image</h3>
            </div>
            <div class="col-12 mt-3">
               <div class="border_box_one">
                  {{-- EXISTING IMAGE PREVIEW --}}
                  @if(!empty($data->featured_image))
                  <div class="mb-3">
                     <img src="{{ asset('Featured_imgs/' . $data->featured_image) }}"
                        alt="Featured Image"
                        style="width:100px; height:100px; object-fit:cover; border-radius:10px;">
                  </div>
                  @endif
                  {{-- UPLOAD INPUT --}}
                  <div class="upload__box">
                     <div class="upload__img-wrap"></div>
                     <div class="upload__btn-box">
                        <label class="upload__btn">
                           <p>Drag your Image here<span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                           <input name="featured_image" type="file" class="upload__inputfile" data-max_length="1">
                        </label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <h3 class="text-white">Media Uploads</h3>
            </div>
            @php
            $existingGallery = is_string($data->gallery_imgs) ? json_decode($data->gallery_imgs, true) : (array) $data->gallery_imgs;
            $existingGallery = is_array($existingGallery) ? $existingGallery : [];
            $maxGallery = 20;
            @endphp
            <div class="col-12 mt-3">
               <div class="border_box_one">
                  <h5 class="mb-2">Image Gallery</h5>
                  <div class="col-12">
                     <div class="col-12 mb-3">
                        <div class="custom-upload__box">
                           <div class="custom-upload__btn-box">
                              <label class="custom-upload__btn">
                                 <p>Drag your Image here <span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                                 <input id="galleryImgInput" name="gallery_imgs[]" type="file" class="custom-upload__inputfile" accept="image/*" multiple>
                              </label>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="images_to_delete" class="gallery_images_to_delete_input" value="[]">
                     <div class="custom-upload-images-flex justify-content-center" id="galleryImgContainer">
                        @for ($i = 0; $i < $maxGallery; $i++)
                        <div class="custom-upload-img-box">
                           @if (isset($existingGallery[$i]))
                           <img src="{{ asset('Gallery_imgs/' . $existingGallery[$i]) }}" class="img-fluid uploaded existing" data-image-index="{{ $i }}" alt="Existing image">
                           <label style="display:none; cursor:pointer; width:100%; height:100%; align-items:center; justify-content:center; margin-bottom:0;">
                              <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="Add image">
                           </label>
                           <span class="custom-remove-btn" style="display:flex;">&times;</span>
                           @else
                           <img src="" class="img-fluid" style="display:none;" alt="New image">
                           <label style="cursor:pointer; width:100%; height:100%; display:flex; align-items:center; justify-content:center; margin-bottom:0;">
                              <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="Add image">
                           </label>
                           <span class="custom-remove-btn" style="display:none;">&times;</span>
                           @endif
                        </div>
                        @endfor
                     </div>
                  </div>
               </div>
            </div>
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
                       const emptyBoxes = container.find('.custom-upload-img-box').not(':has(img.uploaded)');
               
                       Array.from(files).forEach((file, index) => {
                           if (certDataTransfer.items.length >= 10) return;
               
                           certDataTransfer.items.add(file);
                           const reader = new FileReader();
                           reader.onload = function(e) {
                               const targetBox = emptyBoxes.eq(index);
                               if (targetBox.length) {
                                   const img = targetBox.find('img');
                                   img.attr('src', e.target.result).addClass('uploaded new-upload');
                                   targetBox.find('.custom-remove-btn').show().attr('onclick', '').off('click').on('click', function() {
                                       removeNewCertFile(file);
                                       targetBox.remove();
                                   });
                               }
                           };
                           reader.readAsDataURL(file);
                       });
                       this.files = certDataTransfer.files;
                   });
               
                   function removeNewCertFile(fileToRemove) {
                       for (let i = 0; i < certDataTransfer.items.length; i++) {
                           if (certDataTransfer.items[i].getAsFile() === fileToRemove) {
                               certDataTransfer.items.remove(i);
                               break;
                           }
                       }
                       document.getElementById('certFilesInput').files = certDataTransfer.files;
                   }
               }
            </script>
            <div class="col-12">
               <div class="border_box_one">
                  <div class="row">
                     <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                           <h5 class="">Video URL:</h5>
                           <a href="javascript:;" class="add_url_btn">Add another video</a>
                        </div>
                        @php
                        $videoUrls = explode(',', $data->video_url);
                        @endphp
                        <div id="video_inputs_wrapper">
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
                     {{-- @php
                     $videos = !empty($data->pro_video_url) ? explode(',', $data->pro_video_url) : [];
                     @endphp
                     @foreach ($videos as $video)
                     <div class="mb-3">
                        <video width="200" controls>
                           <source src="{{ asset('service-videos/' . $video) }}" type="video/mp4">
                        </video>
                     </div>
                     @endforeach
                     <div class="col-6">
                        <div class="upload__box">
                           <div class="upload__img-wrap"></div>
                           <div class="upload__btn-box">
                              <label class="upload__btn">
                                 <p>
                                    Drag your Video here
                                    <span class="text-800 px-1">or</span>
                                    <button class="btn btn-link p-0" type="button">Browse from device</button>
                                 </p>
                                 <input name="pro_video_url[]" type="file" multiple class="upload__inputfile">
                              </label>
                           </div>
                        </div>
                     </div>
                     --}}
                  </div>
               </div>
            </div>
            <div class="col-12 pb-4">
               <h2 class="text-white mb-3">Agent/Seller Information</h2>
               <div class="border_box_one mb-4">
                  <div class="row gy-3">
                     <div class="col-6">
                        <h5 class="mb-2">First Name <span class="asterisk">*</span></h5>
                        <input class="form-control gen_input_one mb-3" type="text" name="first_name" value="{{ $data->first_name }}" placeholder="First Name" required />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">Last Name <span class="asterisk">*</span></h5>
                        <input class="form-control gen_input_one mb-3" type="text" name="last_name" value="{{ $data->last_name }}" placeholder="Last Name" required />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">If Agent - Brokerage Name <small class="text-muted">(Optional)</small></h5>
                        <input class="form-control gen_input_one mb-3" type="text" name="agent_name" value="{{ $data->agent_name }}" placeholder="If Agent - Brokerage Name" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Contact Email <span class="asterisk">*</span></h5>
                        <input class="form-control gen_input_one mb-3" type="email" name="email" value="{{ $data->email }}" placeholder="Type Email" required />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Phone Number <span class="asterisk">*</span></h5>
                        <input class="form-control gen_input_one mb-3 phone-input" type="tel" name="number" value="{{ $data->number }}" placeholder="Type Phone Number"
                           required />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Website Link <small class="text-muted">(Optional)</small></h5>
                        <div class="web_link_wrap">
                           <span>http://</span>
                           <input class="form-control gen_input_one mb-3 websiteInput" type="text"  value="{{ $data->website_link }}"  name="website_link" placeholder="example@abcd.com" />
                        </div>
                     </div>
                  </div>
                  <?php
                     // In your controller
                     $existingImages = json_decode($data->per_pic) ?? [];
                     $maxImages = count($existingImages); // Match your JavaScript limit
                     ?>
                  <h5 class="mb-3">Upload Your Photo <small class="text-muted mb-3">(Optional) </small></h5>
                  <div class="upload__box">
                     @for ($i = 0; $i < $maxImages; $i++)
                     <div class="custom-upload-img-box">
                        @if (isset($existingImages[$i]))
                        <img src="{{ asset('Personal_pictures/' . $existingImages[$i]) }}" class="img-fluid uploaded existing" data-image-index="{{ $i }}"
                           alt="Existing image" width="100" height="100">
                        {{-- <span class="custom-remove-btn">&times;</span> --}}
                        {{-- @else --}}
                        {{-- <img src="https://img.icons8.com/m_rounded/512/plus.png" class="img-fluid" alt="Add image">
                        <span class="custom-remove-btn" style="display: none">&times;</span> --}}
                        @endif
                     </div>
                     @endfor
                     <div class="upload__img-wrap"></div>
                     <div class="upload__btn-box">
                        <label class="upload__btn">
                           <p>Drag your file here<span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                           <input name="per_pic[]" type="file" class="upload__inputfile">
                        </label>
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
                           <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->facebook }}" name="facebook"
                              placeholder="Paste link here" />
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">Instagram</h5>
                        <div class="web_link_wrap">
                           <span>http://</span>
                           <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->insta }}" name="insta"
                              placeholder="Paste link here" />
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">TikTok</h5>
                        <div class="web_link_wrap">
                           <span>http://</span>
                           <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->tiktok }}" name="tiktok"
                              placeholder="Paste link here" />
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">LinkedIn</h5>
                        <div class="web_link_wrap">
                           <span>http://</span>
                           <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->linkedin }}" name="linkedin"
                              placeholder="Paste link here" />
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">YouTube</h5>
                        <div class="web_link_wrap">
                           <span>http://</span>
                           <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->youtube }}" name="youtube"
                              placeholder="Paste link here" />
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">Zillow </h5>
                        <div class="web_link_wrap">
                           <span>http://</span>
                           <input class="form-control gen_input_one mb-3 websiteInput" type="text" value="{{ $data->zillow }}" name="zillow"
                              placeholder="Paste link here" />
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" checked id="tc_agree" required>
                           <label class="form-check-label" for="tc_agree">
                           I have read and agree to the website <a href="#!">terms</a> and <a href="#!">conditons</a>.
                           </label>
                        </div>
                     </div>
                  </div>
                  {{-- 
                  <div class="row gy-3">
                     <div class="col-6">
                        <h5 class="mb-2">Facebook</h5>
                        <input class="form-control gen_input_one mb-3" type="url" name="facebook" value="{{ $data->facebook }}" placeholder="Paste link here" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">Instagram</h5>
                        <input class="form-control gen_input_one mb-3" type="url" name="insta" value="{{ $data->insta }}" placeholder="Paste link here" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">TikTok</h5>
                        <input class="form-control gen_input_one mb-3" type="url" name="tiktok" value="{{ $data->tiktok }}" placeholder="Paste link here" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">LinkedIn</h5>
                        <input class="form-control gen_input_one mb-3" type="url" name="linkedin" value="{{ $data->linkedin }}" placeholder="Paste link here" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">YouTube</h5>
                        <input class="form-control gen_input_one mb-3" type="url" name="youtube" value="{{ $data->youtube }}" placeholder="Paste link here" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-2">Zillow </h5>
                        <input class="form-control gen_input_one mb-3" type="url" name="zillow" value="{{ $data->zillow }}" placeholder="Paste link here" />
                     </div>
                  </div>
                  --}}
               </div>
            </div>
            <div class="col-6">
            </div>
            <div class="col-6 ">
               <div class="col-auto d-flex justify-content-end gap-3">
                  @if (Auth::user()->usertype == 1)
                  <a href="{{ url('manage_realstate') }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Go Back</a>
                  @else
                  <a href="{{ url('realstate-listing') }}" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Go Back</a>
                  @endif
                  <button class="btn submit_btn_one" type="submit">Update</button>
                  {{-- <a href="#!" class="btn submit_btn_one">Preview</a> --}}
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endforeach
<style>
   img.f_img_preview {
   width: 60px;
   height: 60px;
   margin-bottom: 10px;
   border-radius: 7px;
   border: 1px solid #00000036;
   }
   .prodict_Color {
   width: 30px;
   height: 30px;
   border-radius: 50%;
   }
   .removeBtn svg {
   color: red;
   }
   .checkbox_wrap {
   display: flex;
   flex-wrap: wrap;
   gap: 5px;
   }
   .category_check {
   display: block;
   position: relative;
   /* padding-left: 35px; */
   /* margin-bottom: 12px; */
   cursor: pointer;
   /* font-size: 22px; */
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   }
   .category_check input {
   position: absolute;
   opacity: 0;
   cursor: pointer;
   height: 0;
   width: 0;
   }
   .categoryMark {
   /* position: absolute; */
   top: 0;
   left: 0;
   /* height: 25px; */
   /* width: 25px; */
   background-color: #ccc;
   transition: .5s;
   color: #fff;
   font-size: 13px;
   text-transform: capitalize;
   padding: 10px 10px;
   display: inline-block;
   border-radius: 8px;
   }
   .category_check:hover input~.categoryMark {
   background-color: #ccc;
   }
   .category_check input:checked~.categoryMark {
   background-color: #b22033;
   }
   .formWrapper form {
   width: 50%;
   position: relative;
   }
   .formWrapper .fields__clm {
   width: 100%;
   background-color: #00000012;
   padding: 10px;
   border-radius: 10px;
   margin-bottom: 25px;
   }
   .formWrapper .inputField {
   width: 100%;
   margin: 0 0 15px 0;
   border: 1px solid #0000001a;
   padding: 15px 15px;
   border-radius: 6px;
   box-sizing: border-box;
   outline: none !important;
   }
   .formWrapper .inputField:last-child {
   margin-bottom: 0;
   }
   .formWrapper textarea.inputField {
   height: 150px;
   }
   .addBtn {
   background-color: #00d600;
   width: 30px;
   height: 30px;
   display: flex;
   justify-content: center;
   align-items: center;
   font-size: 25px;
   font-weight: 700;
   border-radius: 50%;
   cursor: pointer;
   color: #fff;
   }
   .minusBtn {
   background-color: red;
   width: 30px;
   height: 30px;
   font-size: 32px;
   font-weight: 100;
   border-radius: 50%;
   cursor: pointer;
   color: #fff;
   line-height: 23px;
   text-align: center;
   }
   .btnWrapper {
   display: flex;
   column-gap: 7px;
   margin-top: 15px;
   }
   .choose_color {
   padding: 0;
   overflow: hidden;
   height: 37px;
   }
</style>
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
       $(".variant_btn input[type='checkbox']").on("change", function() {
           let listItem = $(this).closest("li");
           let imgSrc = listItem.find("img").attr("src");
   
           if ($(this).is(":checked")) {
               listItem.find("input[type='hidden']").val(imgSrc);
           } else {
               listItem.find("input[type='hidden']").val("");
           }
       });
   });
   
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
                           iconContent = "ðŸ“„";
                       } else if (f.type.match('application/vnd.openxmlformats-officedocument.wordprocessingml.document')) {
                           iconClass = "docx-icon";
                           iconContent = "ðŸ“ƒ";
                       } else if (f.type.match('video.*')) {
                           iconClass = "video-icon";
                           iconContent = "ðŸŽ¥";
                       }
   
                       var html = `
                           <div class='upload__img-box'>
                             <div class='${iconClass}' style='${style}' data-number='${$(".upload__img-close").length}' data-file='${f.name}'>
                               ${iconContent ? `<div class='file-icon-text'>${iconContent}</div>` : ""}
                               <div class='upload__img-close'></div>
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
</script>
<script>
   function toggleInput(checkboxId, inputDivId) {
       const checkbox = document.getElementById(checkboxId);
       const inputDiv = document.getElementById(inputDivId);
       if (checkbox.checked) {
           inputDiv.style.display = "block";
       } else {
           inputDiv.style.display = "none";
           const inputField = inputDiv.querySelector("input");
           if (inputField) {
               inputField.value = ""; // Clear input if unchecked
           }
       }
   }
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
           <input class="form-control gen_input" type="url" name="video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
           <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">&times;</button>
       `;
   
       wrapper.appendChild(newInputDiv);
   });
   
   // âœ… EVENT DELEGATION (important part)
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
   
       if (inputs.length >= 3) {
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
   
       newInputDiv.querySelector('.remove_btn').addEventListener('click', () => {
           newInputDiv.remove();
           errorMsg.style.display = 'none';
       });
   });
</script> --}}
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
   // Auction Bid Box Toggle
   const auctionRadioButtons = document.querySelectorAll('input[name="ad_type"]');
   const bidBox = document.querySelector('.bid_box');
   
   function toggleBidBox() {
       const selected = document.querySelector('input[name="ad_type"]:checked');
       if (selected && selected.value === "Auction") {
           bidBox.style.display = 'block';
       } else {
           bidBox.style.display = 'none';
       }
   }
   
   auctionRadioButtons.forEach(rb => {
       rb.addEventListener('change', toggleBidBox);
   });
   
   // Initial state
   document.addEventListener("DOMContentLoaded", toggleBidBox);
</script>
<script>
   $(document).ready(function() {
       function toggleHiddenBox() {
           if ($('#indoor_two_yes').is(':checked')) {
               $('.hidden_box_one').show();
           } else {
               $('.hidden_box_one').hide();
           }
       }
   
       function toggleHiddenBoxTwo() {
           if ($('#wash_stall_yes').is(':checked')) {
               $('.hidden_box_two').show();
           } else {
               $('.hidden_box_two').hide();
           }
       }
   
       function toggleHiddenBoxThree() {
           if ($('#outdoor_yes').is(':checked')) {
               $('.hidden_box_three').show();
           } else {
               $('.hidden_box_three').hide();
           }
       }
   
       function toggleHiddenBoxFour() {
           if ($('#w_sys_yes').is(':checked')) {
               $('.hidden_box_four').show();
           } else {
               $('.hidden_box_four').hide();
           }
       }
   
       function toggleHiddenBoxFive() {
           if ($('#indoor_yes').is(':checked')) {
               $('.hidden_box_five').show();
           } else {
               $('.hidden_box_five').hide();
           }
       }
   
       function toggleHiddenBoxSix() {
           if ($('#indoor_w_sys_yes').is(':checked')) {
               $('.hidden_box_six').show();
           } else {
               $('.hidden_box_six').hide();
           }
       }
   
       function toggleHiddenBoxSeven() {
           if ($('#dry_lots_yes').is(':checked')) {
               $('.hidden_box_seven').show();
           } else {
               $('.hidden_box_seven').hide();
           }
       }
   
       function toggleHiddenBoxEight() {
           if ($('#fgp_yes').is(':checked')) {
               $('.hidden_box_eight').show();
           } else {
               $('.hidden_box_eight').hide();
           }
       }
   function toggleHiddenBoxTwelve() {
      if ($('#run_shed_yes').is(':checked')) {
          $('.run_shed_box').show();
      } else {
          $('.run_shed_box').hide();
      }
   }
       function toggleHiddenBoxTen() {
           if ($('#have_stall_yes').is(':checked')) {
               $('.have_stall_box').show();
           } else {
               $('.have_stall_box').hide();
           }
       }
   
       function toggleHiddenBoxEleven() {
           if ($('#have_barn_yes').is(':checked')) {
               $('.have_barn_box').show();
           } else {
               $('.have_barn_box').hide();
           }
       }
   
       function toggleHiddenBoxNine() {
           if ($('#garage_yes').is(':checked')) {
               $('.garage_box').show();
           } else {
               $('.garage_box').hide();
           }
       }
   
       // Initial checks on page load
       toggleHiddenBox();
       toggleHiddenBoxTwo();
       toggleHiddenBoxThree();
       toggleHiddenBoxFour();
       toggleHiddenBoxFive();
       toggleHiddenBoxSix();
       toggleHiddenBoxSeven();
       toggleHiddenBoxEight();
       toggleHiddenBoxNine();
       toggleHiddenBoxTen();
       toggleHiddenBoxTwelve();
       toggleHiddenBoxEleven();
   
       // Bind the change events correctly
       $('input[name="tack_room"]').on('change', toggleHiddenBox);
       $('input[name="wash_stall"]').on('change', toggleHiddenBoxTwo);
       $('input[name="out_ride_ring"]').on('change', toggleHiddenBoxThree);
       $('input[name="w_system"]').on('change', toggleHiddenBoxFour);
       $('input[name="in_ride_ring"]').on('change', toggleHiddenBoxFive);
       $('input[name="indoor_w_system"]').on('change', toggleHiddenBoxSix);
       $('input[name="dry_lots"]').on('change', toggleHiddenBoxSeven);
       $('input[name="fenced_grass"]').on('change', toggleHiddenBoxEight);
       $('input[name="real_garage"]').on('change', toggleHiddenBoxNine);
   $('input[name="run_shed"]').on('change', toggleHiddenBoxTwelve);
   
       $('input[name="have_stall"]').on('change', toggleHiddenBoxTen);
       $('input[name="have_barn"]').on('change', toggleHiddenBoxEleven);
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
<script>
   function initDocFileUpload() {
       const maxFiles = 10;
       let filesToDelete = [];
       let docDataTransfer = new DataTransfer();
   
       $('#docFilesInput').on('change', function(e) {
           const newFiles = Array.from(e.target.files);
           const currentCount = $('#docFilesContainer .uploaded').length;
   
           if (currentCount + newFiles.length > maxFiles) {
               alert(`You can only upload a maximum of ${maxFiles} documents.`);
               $(this).val('');
               return;
           }
   
           newFiles.forEach(file => {
               const reader = new FileReader();
               reader.onload = function(event) {
                   let preview;
                   const fileName = file.name.toLowerCase();
                   if (file.type.includes('image')) {
                       preview = `<img src="${event.target.result}" class="img-fluid uploaded new" data-file-name="${file.name}" alt="New file">`;
                   } else if (fileName.endsWith('.pdf')) {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight:bold; color:#b22033;">PDF</div>`;
                   } else if (fileName.endsWith('.doc') || fileName.endsWith('.docx')) {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight:bold; color:#2b5797;">DOCX</div>`;
                   } else {
                       preview = `<div class="pdf-icon uploaded new" data-file-name="${file.name}" style="font-size:16px; font-weight:bold;">FILE</div>`;
                   }
                   const newBox = $(`<div class="custom-upload-img-box">${preview}<span class="custom-remove-btn" style="display:flex;">&times;</span></div>`);
                   $('#docFilesContainer').append(newBox);
                   docDataTransfer.items.add(file);
                   document.getElementById('docFilesInput').files = docDataTransfer.files;
               };
               reader.readAsDataURL(file);
           });
           $(this).val('');
       });
   
       $('#docFilesContainer').on('click', '.custom-remove-btn', function() {
           const box = $(this).closest('.custom-upload-img-box');
           const item = box.find('.uploaded');
           if (item.hasClass('existing')) {
               const index = item.data('file-index');
               if (index !== undefined && !filesToDelete.includes(index)) {
                   filesToDelete.push(index);
                   box.closest('form').find('.doc_files_to_delete_input').val(JSON.stringify(filesToDelete));
               }
           } else if (item.hasClass('new')) {
               const fileName = item.attr('data-file-name');
               const newDT = new DataTransfer();
               for (let i = 0; i < docDataTransfer.files.length; i++) {
                   if (docDataTransfer.files[i].name !== fileName) newDT.items.add(docDataTransfer.files[i]);
               }
               docDataTransfer = newDT;
               document.getElementById('docFilesInput').files = docDataTransfer.files;
           }
           box.remove();
       });
   }
   
   function initGalleryImgUpload() {
       const maxImages = 20;
       let imagesToDelete = [];
       let galleryDataTransfer = new DataTransfer();
   
       $('#galleryImgInput').on('change', function(e) {
           const newFiles = Array.from(e.target.files);
           const currentUploaderImages = $('#galleryImgContainer img.uploaded').length;
   
           if (currentUploaderImages + newFiles.length > maxImages) {
               alert(`You can only upload a maximum of ${maxImages} images.`);
               $(this).val('');
               return;
           }
   
           newFiles.forEach((file) => {
               const box = $('#galleryImgContainer .custom-upload-img-box:not(:has(img.uploaded))').first();
               if (box.length) {
                   const reader = new FileReader();
                   reader.onload = function(event) {
                       const img = box.find('img').first();
                       img.attr('src', event.target.result).addClass('uploaded new').show();
                       img.attr('data-file-name', file.name);
                       box.find('label').hide();
                       box.find('.custom-remove-btn').css('display', 'flex');
                       galleryDataTransfer.items.add(file);
                       document.getElementById('galleryImgInput').files = galleryDataTransfer.files;
                   };
                   reader.readAsDataURL(file);
               }
           });
           $(this).val('');
       });
   
       $('#galleryImgContainer').on('click', '.custom-remove-btn', function() {
           const box = $(this).closest('.custom-upload-img-box');
           const img = box.find('img');
           if (img.hasClass('existing')) {
               const index = img.data('image-index');
               if (index !== undefined && !imagesToDelete.includes(index)) {
                   imagesToDelete.push(index);
                   box.closest('form').find('.gallery_images_to_delete_input').val(JSON.stringify(imagesToDelete));
               }
           } else if (img.hasClass('new')) {
               const fileName = img.attr('data-file-name');
               const newDT = new DataTransfer();
               for (let i = 0; i < galleryDataTransfer.files.length; i++) {
                   if (galleryDataTransfer.files[i].name !== fileName) newDT.items.add(galleryDataTransfer.files[i]);
               }
               galleryDataTransfer = newDT;
               document.getElementById('galleryImgInput').files = galleryDataTransfer.files;
           }
           img.attr('src', '').removeClass('uploaded new existing').hide();
           img.removeAttr('data-image-index').removeAttr('data-file-name');
           box.find('label').css('display', 'flex');
           $(this).hide();
       });
   
       $('#galleryImgContainer .custom-upload-img-box img.existing').siblings('.custom-remove-btn').show();
   }
   
   jQuery(document).ready(function() {
       initDocFileUpload();
       initGalleryImgUpload();
   });
</script>
@endsection