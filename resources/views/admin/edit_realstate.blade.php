@extends('layouts.admin_app')
@section('content')
<style>
   .asterisk {
   color: red;
   }
   .bid_box {
   background: #f5eeee;
   padding: 30px;
   border-radius: 20px;
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
   height: 140px!important;
   width: 140px!important;
   }
   .dropzone.dropzone-multiple .dz-image {
   height: 100%;
   width: 100%;
   -o-object-fit: cover;
   object-fit: cover;
   border-radius: 0;
   }
   .dropzone .dz-preview .dz-remove {
   color: red!important;
   }

   .input {width: 100%;font-size: 14px;padding: 15px 15px;margin-bottom: 0px;border: none;border-radius: 5px;}	
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

.pdf-icon, .docx-icon, .video-icon {
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
</style>
@foreach($data as $data)
<div class="content">
   <div class="pb-5">
      <div class="box_top">
            <h2 class="mb-2 main_heading_dashboard">Edit <br/> Real Estate Ad Property Information</h2>
            <!-- <h5 class="text-700 fw-semi-bold">Here’s what’s going on at your business right now</h5> -->
      </div>
      <form method="POST" action="{{url('/update_property')}}" enctype="multipart/form-data" class="row g-3 mb-6">
          @csrf
		  <input type="hidden" value="{{$data->id}}" name="id">
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
                              <input class="form-check-input" name="ad_type" type="radio" value="Sale"
                                    {{ $ad_type == 'Sale' ? 'checked' : '' }} /> Sale
                           </label>
                        </div>
                        <div class="form-check">
                           <label>
                              <input class="form-check-input" name="ad_type" type="radio" value="Auction"
                                    {{ $ad_type == 'Auction' ? 'checked' : '' }} /> Auction
                           </label>
                        </div>
                        <div class="form-check">
                           <label>
                              <input class="form-check-input" name="ad_type" type="radio" value="Rent"
                                    {{ $ad_type == 'Rent' ? 'checked' : '' }} /> Rent
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
                        <input class="form-control gen_input thousand-separator price-input" type="text" name="bid_amount" value="{{ $data->bid_amount }}" placeholder="Start bid" required />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Reserve Amount (Optional) </h5>
                        <input class="form-control gen_input thousand-separator price-input" type="text" name="reserve_amount" value="{{ $data->reserve_amount }}" placeholder="Reserve Amount" />
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Start Date</h5>
                        <input class="form-control gen_input" type="date" name="start_date" placeholder="Start bid" value="{{ $data->start_date }}" required/>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">End Date</h5>
                        <input class="form-control gen_input" type="date" name="end_date" placeholder="Reserve Amount" value="{{ $data->end_date }}" required/>
                     </div>
                     <div class="col-12">
                        <h5 class="mb-3">Auction Link</h5>
                        <input class="form-control gen_input" type="url" name="auc_link" value="{{ $data->auc_link }}" placeholder="please past the link to your horses ad on the auction"/>
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
                        <input class="form-control gen_input mb-3 thousand-separator price-input" type="text" name="real_price" value="{{ $data->real_price }}" placeholder="Enter Price" required />
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
                           <input class="form-control gen_input mb-3" type="text" name="num_spaces" value="{{ $data->num_spaces }}" placeholder="# of spaces" required/>
                           @php
                              $garage_type = explode(',', $data->garage_type ?? '');
                           @endphp

                           <div class="row">
                              <div class="col-3">
                                 <div class="d-flex gap-1 flex-column">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Detached" id="detached" name="garage_type[]" {{ in_array('Detached', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="detached">Detached</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Attached" id="attached" name="garage_type[]" {{ in_array('Attached', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="attached">Attached</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Tandem" id="tandem" name="garage_type[]" {{ in_array('Tandem', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="tandem">Tandem</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="oversized" id="oversized" name="garage_type[]" {{ in_array('oversized', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="oversized">Oversized</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-3">
                                 <div class="d-flex gap-1 flex-column">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Breezeway" id="breezeway" name="garage_type[]" {{ in_array('Breezeway', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="breezeway">Breezeway</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Garage Workshop" id="garage_ws" name="garage_type[]" {{ in_array('Garage Workshop', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="garage_ws">Garage Workshop</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Garage Apartment" id="garage_a" name="garage_type[]" {{ in_array('Garage Apartment', $garage_type) ? 'checked' : '' }}>
                                       <label class="form-check-label" for="garage_a">Garage Apartment</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="Carport" id="carport" name="garage_type[]" {{ in_array('Carport', $garage_type) ? 'checked' : '' }}>
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
                  </div>
               </div>
            </div>
            <div class="col-12">
               <div class="border_box_one">
                  <div class="row gy-4">
                     <div class="col-6">
                        <h5 class="mb-3">Barn flooring </h5>
                        @php
                           $barn_flooring = $data->barn_flooring ?? '';
                           $predefined_floorings = ['Rubber', 'Concrete', 'Dirt'];
                           $is_other = !in_array($barn_flooring, $predefined_floorings);
                        @endphp

                        <div class="d-flex gap-1 flex-column">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="Rubber" id="rubber_flooring" name="barn_flooring" {{ $barn_flooring == 'Rubber' ? 'checked' : '' }} />
                              <label class="form-check-label" for="rubber_flooring">Rubber</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="Concrete" id="concrete_flooring" name="barn_flooring" {{ $barn_flooring == 'Concrete' ? 'checked' : '' }} />
                              <label class="form-check-label" for="concrete_flooring">Concrete</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="Dirt" id="dirt_flooring" name="barn_flooring" {{ $barn_flooring == 'Dirt' ? 'checked' : '' }} />
                              <label class="form-check-label" for="dirt_flooring">Dirt</label>
                           </div>
                           <div class="form-check other_flooring_box">
                              <input class="form-check-input" type="radio" name="barn_flooring" value="{{ $is_other ? $barn_flooring : '' }}" {{ $is_other ? 'checked' : '' }}>
                              <input class="form-control gen_input_one" type="text" name="barn_flooring_other" value="{{ $is_other ? $barn_flooring : '' }}" placeholder="Other Flooring">
                           </div>
                        </div>

                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Rubber Mats in stalls</h5>
                        <div class="d-flex gap-1 flex-column">
                           @php
                           $rubber_matts = $data->rubber_matts ?? '';
                           @endphp

                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="rubber_matt_yes" name="rubber_matts" {{ $rubber_matts === 'yes' ? 'checked' : '' }} />
                              <label class="form-check-label" for="rubber_matt_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="rubber_matt_no" name="rubber_matts" {{ $rubber_matts === 'no' ? 'checked' : '' }} />
                              <label class="form-check-label" for="rubber_matt_no">No</label>
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
                                       <input class="form-check-input" type="radio" value="yes" id="indoor_two_yes" name="tack_room" {{ $tack_room === 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="indoor_two_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="no" id="indoor_two_no" name="tack_room" {{ $tack_room === 'no' ? 'checked' : '' }}>
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
                                       <input class="form-check-input" type="radio" value="yes" id="heated_yes" name="heated_not" {{ $heated_not === 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="heated_yes">Heated</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="no" id="heated_no" name="heated_not" {{ $heated_not === 'no' ? 'checked' : '' }}>
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
                                    <input class="form-check-input" type="radio" value="Hay loft" id="wash_stall_yes" name="wash_stall" {{ $wash_stall === 'Hay loft' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="wash_stall_yes">Yes</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Hay room" id="wash_stall_no" name="wash_stall" {{ $wash_stall === 'Hay room' ? 'checked' : '' }}>
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
                                       <input class="form-check-input" type="radio" value="yes" id="hot_water_yes" name="hot_water" {{ $hot_water === 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="hot_water_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="no" id="hot_water_no" name="hot_water" {{ $hot_water === 'no' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="hot_water_no">No</label>
                                    </div>
                                 </div>
                                 <h6 class="mb-3">Cold Water </h6>
                                 <div class="d-flex gap-1 flex-column">
                                    @php
                                       $cold_water = $data->cold_water ?? '';
                                    @endphp

                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="yes" id="cold_water_yes" name="cold_water" {{ $cold_water === 'yes' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="cold_water_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="no" id="cold_water_no" name="cold_water" {{ $cold_water === 'no' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="cold_water_no">No</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6">
                              <h5 class="mb-3">Hay Storage  </h5>
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
                              {{ (isset($data->heated_barn) && $data->heated_barn == 'yes') ? 'checked' : '' }} />
                              <label class="form-check-label" for="barn_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="barn_no" name="heated_barn" 
                              {{ (isset($data->heated_barn) && $data->heated_barn == 'no') ? 'checked' : '' }} />
                              <label class="form-check-label" for="barn_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Air Conditions Barn</h5>
                        <div class="d-flex gap-1 flex-column">
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="yes" id="air_con_yes" name="air_condition_barn"
                              {{ (isset($data->air_condition_barn) && $data->air_condition_barn == 'yes') ? 'checked' : '' }} />
                              <label class="form-check-label" for="air_con_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="air_con_no" name="air_condition_barn"
                              {{ (isset($data->air_condition_barn) && $data->air_condition_barn == 'no') ? 'checked' : '' }} />
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
                                 {{ (isset($data->dry_lots) && $data->dry_lots == 'yes') ? 'checked' : '' }} />
                                 <label class="form-check-label" for="dry_lots_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="no" id="dry_lots_no" name="dry_lots"
                                 {{ (isset($data->dry_lots) && $data->dry_lots == 'no') ? 'checked' : '' }} />
                                 <label class="form-check-label" for="dry_lots_no">No</label>
                              </div>
                           </div>
                           <div class="hidden_box_seven w-25"><input class="form-control gen_input mb-3" type="text" name="num_lots" value="{{ $data->num_lots }}" placeholder="# of dry lots" /></div>
                        </div>
                     </div>
                     <div class="col-6">
                        <h5 class="mb-3">Fenced Grass Pastures <span class="asterisk">*</span></h5>
                        <div class="d-flex gap-5">
                           <div class="d-flex gap-1 flex-column">
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="yes" id="fgp_yes" name="fenced_grass"
                                 {{ (isset($data->fenced_grass) && $data->fenced_grass == 'yes') ? 'checked' : '' }} />
                                 <label class="form-check-label" for="fgp_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="no" id="fgp_no" name="fenced_grass"
                                 {{ (isset($data->fenced_grass) && $data->fenced_grass == 'no') ? 'checked' : '' }} />
                                 <label class="form-check-label" for="fgp_no">No</label>
                              </div>
                           </div>
                           <div class="hidden_box_eight w-25"><input class="form-control gen_input mb-3" type="text" name="num_fenced_grass" value="{{ $data->num_fenced_grass }}" placeholder="# of fenced grass pastures" /></div>
                        </div>
                     </div>
                     <div class="col-12">
                        @php
                           $selectedFencing = isset($data->fencing) ? (is_array($data->fencing) ? $data->fencing : explode(',', $data->fencing)) : [];
                           // Define the known fencing options
                           $knownFencing = ['electric', 'vinyl', 'wood', 'metal'];
                           // Check if there's any "Other" fencing value not in known options
                           $otherFencing = collect($selectedFencing)->first(function($val) use ($knownFencing) {
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
                                       <input class="form-check-input" type="checkbox" name="fencing[]" value="vinyl"
                                       {{ in_array('vinyl', $selectedFencing) ? 'checked' : '' }}>
                                       Vinyl
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <label class="form-check-label">
                                       <input class="form-check-input" type="checkbox" name="fencing[]" value="wood"
                                       {{ in_array('wood', $selectedFencing) ? 'checked' : '' }}>
                                       Wood
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <label class="form-check-label">
                                       <input class="form-check-input" type="checkbox" name="fencing[]" value="metal"
                                       {{ in_array('metal', $selectedFencing) ? 'checked' : '' }}>
                                       Metal
                                    </label>
                                 </div>
                                 <div class="form-check other_flooring_box ms-1 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="fencing_other_checkbox" name="fencing[]" value="{{ $otherFencing ?? '' }}"
                                    {{ $otherFencing ? 'checked' : '' }}>
                                    <input class="form-control gen_input_one ms-2" type="text" name="fencing_other_text" 
                                    value="{{ $otherFencing ?? '' }}" placeholder="Other" style="max-width: 150px;">
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
                              {{ (isset($data->out_ride_ring) && $data->out_ride_ring == 'yes') ? 'checked' : '' }} />
                              <label class="form-check-label" for="outdoor_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="outdoor_no" name="out_ride_ring"
                              {{ (isset($data->out_ride_ring) && $data->out_ride_ring == 'no') ? 'checked' : '' }} />
                              <label class="form-check-label" for="outdoor_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="hidden_box_three mt-2">
                           <h5  class="mb-2">Add Dimensions </h5  >
                           @php
                              $dimensions = isset($data->out_dimensions) ? explode(',', $data->out_dimensions) : ['', ''];
                           @endphp

                           <div class="hidden_box_four_flex mb-3">
                              <input class="form-control gen_input text-center" type="text" name="out_dimensions[]" placeholder="100" value="{{ $dimensions[0] ?? '' }}">
                              <p class="mb-0">x</p>
                              <input class="form-control gen_input text-center" type="text" name="out_dimensions[]" placeholder="90" value="{{ $dimensions[1] ?? '' }}">
                           </div>
                           <h5  class="mb-2">Watering System</h5  >
                           <div class="d-flex gap-1 flex-column">
                              @php
                                 $out_water_system = $data->out_water_system ?? '';  // jo value aapke paas hai
                              @endphp

                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="yes" id="w_sys_yes" name="out_water_system" {{ $out_water_system == 'yes' ? 'checked' : '' }}/>
                                 <label class="form-check-label" for="w_sys_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="no" id="w_sys_no" name="out_water_system" {{ $out_water_system == 'no' ? 'checked' : '' }}/>
                                 <label class="form-check-label" for="w_sys_no">No</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-3">
                        <h5 class="mb-3">Indoor Riding Ring <span class="asterisk">*</span></h5>
                        <div class="d-flex gap-1 flex-column">
                           @php
                              $in_ride_ring = $data->in_ride_ring ?? '';  // Stored value
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
                           <h5  class="mb-2">Add Dimensions </h5 >
                           @php
                              $dimensions = isset($data->in_dimensions) ? explode(',', $data->in_dimensions) : ['', ''];
                           @endphp

                           <div class="hidden_box_four_flex mb-3">
                              <input class="form-control gen_input text-center" type="text" name="in_dimensions[]" placeholder="100" value="{{ $dimensions[0] ?? '' }}">
                              <p class="mb-0">x</p>
                              <input class="form-control gen_input text-center" type="text" name="in_dimensions[]" placeholder="90" value="{{ $dimensions[1] ?? '' }}">
                           </div>
                           <h5  class="mb-2">Watering System</h5  >
                           <div class="d-flex gap-1 flex-column">
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="yes" id="w_sys_two_yes" name="in_water_system"
                                    {{ (isset($data->in_water_system) && $data->in_water_system === 'yes') ? 'checked' : '' }} />
                                 <label class="form-check-label" for="w_sys_two_yes">Yes</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" type="radio" value="no" id="w_sys_two_no" name="in_water_system"
                                    {{ (isset($data->in_water_system) && $data->in_water_system === 'no') ? 'checked' : '' }} />
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
                                 {{ (isset($data->round_pen) && $data->round_pen === 'yes') ? 'checked' : '' }} />
                              <label class="form-check-label" for="rounnd_yes">Yes</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" type="radio" value="no" id="rounnd_no" name="round_pen"
                                 {{ (isset($data->round_pen) && $data->round_pen === 'no') ? 'checked' : '' }} />
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
                  <h4><small class="text-muted mb-3">( This area is for describing the property ONLY. Do not enter emails, website addresses, contact information, HTML, etc. All text not describing property will be removed.)</small></h4>
                  <textarea class="textarea" name="property_overview" maxlength="300" style="width: 100%; height: 15rem;" placeholder="Write property overview...">{{ $data->property_overview }}</textarea>
               </div>
            </div>
            <div class="col-12">
               <div class="border_box_one mb-0">
                  <h4 class="mb-2">Additional Write up</h4>
                  <h4><small class="text-muted mb-3">( Please include anything additional you want  to add)</small></h4>
                  <textarea class="textarea" name="ad_write_up" maxlength="300" style="width: 100%; height: 15rem;" placeholder="Additional Write up">{{ $data->ad_write_up }}</textarea>
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
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="pool"
                                    {{ in_array('pool', $features) ? 'checked' : '' }}> Pool
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
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="pond"
                                    {{ in_array('pond', $features) ? 'checked' : '' }}> Pond
                                 </label>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="river"
                                    {{ in_array('river', $features) ? 'checked' : '' }}> River
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-check">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="checkbox" name="property_features[]" value="trails"
                                    {{ in_array('trails', $features) ? 'checked' : '' }}> Trails
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
                  <h4 class="mb-2">Documents </h4>
                  <h4 class="mb-3"><small class="text-muted mb-3">Please upload any relevant documents you want to provide to prospective buyers. This includes surveys, disclosures, and any other important documents. </small></h4>
                  <div class="col-12">
                     <div class="upload__box">
                           <div class="upload__img-wrap"></div>
                           <div class="upload__btn-box">
                           <label class="upload__btn">
                           <p>Drag your file here<span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                           <input name="property_document[]" type="file" multiple="multiple" class="upload__inputfile">
                           </label>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <h3 class="text-white">Media Uploads</h3>
            </div>
            <div class="col-12 mt-3">
               <div class="border_box_one">
                  <h5 class="mb-2">Image Gallery</h5>
                  <div class="col-12">
                     <div class="upload__box">
                        <div class="upload__img-wrap"></div>
                        <div class="upload__btn-box">
                           <label class="upload__btn">
                              <p>Drag your Image here<span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                              <input name="gallery_imgs[]" type="file" multiple="multiple" class="upload__inputfile" data-max_length="20">
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <div class="border_box_one">
                     <div class="row">
                     <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                           <h5 class="">Video URL:</h5>
                           <a href="#!" class="add_url_btn">Add another video</a>
                        </div>
                        <div id="video_inputs_wrapper">
                           <div class="video_input d-flex align-items-center mb-2">
                              <input class="form-control gen_input" type="url" name="video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
                           </div>
                        </div>
                        <p id="error_message" style="color: red; display: none;">You can only add up to 3 video URLs.</p>
                     </div> 
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
                                    <input 
                                       name="pro_video_url[]" 
                                       type="file" 
                                       multiple 
                                       class="upload__inputfile"
                                       accept="video/*"
                                    >
                                 </label>
                              </div>
                           </div>
                        </div>
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
                        <input class="form-control gen_input_one mb-3 phone-input" type="tel" name="number" value="{{ $data->number }}" placeholder="Type Phone Number" required />
                     </div>

                     <div class="col-6">
                        <h5 class="mb-3">Website Link <small class="text-muted">(Optional)</small></h5>
                        <input class="form-control gen_input_one mb-3" type="url" name="website_link" value="{{ $data->website_link }}" placeholder="example@abcd.com" />
                     </div>
                     </div>

                  <h5 class="mb-3">Upload Your Photo  <small class="text-muted mb-3">(Optional) </small></h5>
                  <div class="upload__box">
                        <div class="upload__img-wrap"></div>
                        <div class="upload__btn-box">
                           <label class="upload__btn">
                           <p>Drag your file here<span class="or">OR</span> <span class="browse_option">Browse from device</span></p>
                           <input name="per_pic[]" type="file" multiple="multiple" class="upload__inputfile">
                           </label>
                        </div>
                  </div>
               </div>


               <h2 class="text-white mb-3">Social Media Links</h2>
               <div class="border_box_one">
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
               </div>
               

            </div>
            <div class="col-6">
            </div>
            <div class="col-6 ">
               <div class="col-auto d-flex justify-content-end gap-3">
                  <a href="javascript:;" class="submit_btn_one btn px-5 mb-2 mb-sm-0">Discard</a>
                  <button class="btn submit_btn_one" type="submit">Submit</button>
                  <a href="#!" class="btn submit_btn_one" >Preview</a>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
@endforeach
<style>
   img.f_img_preview {width: 60px;height: 60px;margin-bottom: 10px;border-radius: 7px;border: 1px solid #00000036;}
   .prodict_Color {width: 30px; height: 30px; border-radius: 50%; }
   .removeBtn svg {color: red; }
   .checkbox_wrap {display: flex; flex-wrap: wrap; gap: 5px; } 
   .category_check {display: block;position: relative;/* padding-left: 35px; *//* margin-bottom: 12px; */cursor: pointer;/* font-size: 22px; */-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
   .category_check input {position: absolute; opacity: 0; cursor: pointer; height: 0; width: 0; } 
   .categoryMark {/* position: absolute; */top: 0;left: 0;/* height: 25px; *//* width: 25px; */background-color: #ccc;transition: .5s;color: #fff;font-size: 13px;text-transform: capitalize;padding: 10px 10px;display: inline-block;border-radius: 8px;}
   .category_check:hover input ~ .categoryMark {background-color: #ccc; } 
   .category_check input:checked ~ .categoryMark {background-color: #b22033;}    
   .formWrapper form {width: 50%;position: relative;}
   .formWrapper .fields__clm {width: 100%;background-color: #00000012;padding: 10px;border-radius: 10px;margin-bottom: 25px;}
   .formWrapper .inputField {width: 100%;margin: 0 0 15px 0;border: 1px solid #0000001a;padding: 15px 15px;border-radius: 6px;box-sizing: border-box;outline: none !important;}
   .formWrapper .inputField:last-child {margin-bottom: 0; }
   .formWrapper textarea.inputField {height: 150px; }
   .addBtn {background-color: #00d600;width: 30px;height: 30px;display: flex;justify-content: center;align-items: center;font-size: 25px;font-weight: 700;border-radius: 50%;cursor: pointer;color: #fff;} 
   .minusBtn {background-color: red;width: 30px;height: 30px;font-size: 32px;font-weight: 100;border-radius: 50%;cursor: pointer;color: #fff;line-height: 23px;text-align: center;} 
   .btnWrapper {display: flex; column-gap: 7px; margin-top: 15px; }
   .choose_color {padding: 0; overflow: hidden; height: 37px; }
</style>

<script>
   $(document).ready(function () {
       $(".variant_btn input[type='checkbox']").on("change", function () {
           let listItem = $(this).closest("li");
           let imgSrc = listItem.find("img").attr("src");
   
           if ($(this).is(":checked")) {
               listItem.find("input[type='hidden']").val(imgSrc);
           } else {
               listItem.find("input[type='hidden']").val("");
           }
       });
   });
   
   jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      var imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length') || 10;
      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);

      filesArr.forEach(function (f) {
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

        reader.onload = function (e) {
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

  $('body').on('click', ".upload__img-close", function (e) {
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
   
   addBtn.addEventListener('click', function (e) {
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
      <input class="form-control gen_input" type="url" name="pro_video_url[]" placeholder="e.g: https://www.youtube.com/watch?v=CjDbSzhmF2M" />
      <button type="button" class="remove_btn btn btn-sm btn-danger ms-2">&times;</button>
    `;
   
    wrapper.appendChild(newInputDiv);
   
    newInputDiv.querySelector('.remove_btn').addEventListener('click', () => {
      newInputDiv.remove();
      errorMsg.style.display = 'none';
    });
   });
   
</script>

<script>
   document.querySelectorAll('.thousand-separator').forEach(function (input) {
     input.addEventListener('input', function (e) {
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
   document.querySelectorAll('.price-input').forEach(function (input) {
     input.addEventListener('focus', function () {
       this.value = this.value.replace(/[^0-9]/g, ''); // remove $ and commas
     });
   
     input.addEventListener('blur', function () {
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

   $(document).ready(function () {
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
   
     // Bind the change events correctly
     $('input[name="tack_room"]').on('change', toggleHiddenBox);
     $('input[name="wash_stall"]').on('change', toggleHiddenBoxTwo);
     $('input[name="out_ride_ring"]').on('change', toggleHiddenBoxThree  );
     $('input[name="w_system"]').on('change', toggleHiddenBoxFour  );
     $('input[name="in_ride_ring"]').on('change', toggleHiddenBoxFive  );
     $('input[name="indoor_w_system"]').on('change', toggleHiddenBoxSix  );
     $('input[name="dry_lots"]').on('change', toggleHiddenBoxSeven  );
     $('input[name="fenced_grass"]').on('change', toggleHiddenBoxEight  );
     $('input[name="real_garage"]').on('change', toggleHiddenBoxNine  );
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
     input.addEventListener('input', function () {
       formatPhoneNumber(this);
     });
   });
</script>
@endsection