@extends('layouts.admin_app')

<style>
   .admin_service_card .heading22px {
        font-size: 22px;
        color: #1d2139;
    }
    .admin_service_card.product_clm p {
        font-size: 20px;
        margin: 0;
        color: #000;
    }
    .admin_service_card.product_clm .webLink {
        font-size: 20px;
        color: #1d2139;
        text-decoration: underline;
    }
    .admin_service_card.product_clm_img_box {
        position: relative;
        overflow: hidden;
    }
    .admin_service_card.product_clm .pro_img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        border: 0;
        padding: 0;
        margin-bottom: 25px;
        transition: .5s;
        border-bottom: 8px solid #1d2139;
    }
    .btn_set {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 10px;
        text-align: center;
    }
    .horse_card_btn {
        width: 120px!important;
        height: 45px!important;
        display: flex!important;
        justify-content: center!important;
        align-items: center!important;
        font-size: 15px!important;
        color: #fff!important;
        background: #1d2139!important;
        border: 0;
    }
    .horse_list_card_btn_flex {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        margin-top: 10px;
        text-align: center;
    }
    .fvrt_btn {
        width: 130px;
        padding: 0px 20px;
        justify-content: center;
        height: 45px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15px;
        font-weight: 500;
        color: #1d2139;
        border: 1px solid #1d2139;
        background: transparent;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s, color 0.3s;
        text-align: center;
    }
    .dlt_btn {
        width: 45px!important;
        height: 45px!important;
        display: flex!important;
        justify-content: center!important;
        align-items: center!important;
        font-size: 15px!important;
        color: #fff!important;
        background: #1d2139!important;
        border: 0;
    }
</style>

@section('content')

<div class="content">
    <div class="pb-6">
        <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
        <div class="row g-3 justify-content-between mb-4">
            <div class="col-auto">
                <h2 class="mb-2 text-white main_heading_dashboard">{{count($data)}} Services</h2>
            </div>
            <div class="col-auto">
                <div class="d-flex">
                    <div class="search-box me-2">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('add_service') }}" class="btn submit_btn_one">Add Service</a>
                   </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($data as $data)
              <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
                <div class="product_clm admin_service_card">
                    <div class="product_clm_img_box">
                        <img src="{{ getenv('APP_URL') }}/service-profile/{{ $data->ser_profile }}"
                            class="pro_img mb-3" width="" height="" alt="" />
                    </div>
                    <h5 class="heading22px primeColor">{{ $data->full_name }}</h5>
                    <p>{{ $data->number }}</p>
                    <a href="#!" class="webLink">{{ $data->website_url }}</a>
                    <div class="btn_set mt-3">
                        <a href="#!" class="horse_card_btn">View Detail</a>
                        <a href="{{ url('edit_service') }}/{{ $data->id }}" class="fvrt_btn">Edit <i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <form id="delete_form" class="m-0" method="post" action="{{ url('/delete_service') }}/{{$data->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="dlt_btn deleteButton"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div> 
            @endforeach 
        </div>
    </div>
</div>  

<script>
document.querySelectorAll('.deleteButton').forEach(function(button) {
    button.addEventListener('click', function() {
        var form = button.closest('form');

        var id = form.getAttribute('action').split('/').pop();

        var confirmDelete = confirm("Are you sure you want to delete this Service Provider?");

        if (confirmDelete) {
            form.submit();
        } else {
            alert("Service not deleted.");
        }
    });
});
</script>
@endsection