@extends('layouts.user_app')

@section('content')
<style>
   
</style>
<div class="content">
    <div class="row g-3 justify-content-between mb-4">
        <div class="col-auto">
            <h2 class="mb-2">Order Detail</h2>
        </div>
    </div>
    @foreach($data as $data)
    <div class="row g-5">
        <div class="col-12 col-md-12 mb-3">
            <div class="card h-100">
                <div class="card-body pb-3 img_get">
                    <div class="row">
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <h3 class="mb-4">Customer Address</h3>
                            <h5 class="text-800">Country</h5>
                            <p class="text-800">{{ $data->country }}</p>
                            <h5 class="text-800">City</h5>
                            <p class="text-800">{{ $data->town_city }}</p>
                            <h5 class="text-800">State</h5>
                            <p class="text-800">{{ $data->state }}</p>
                            <h5 class="text-800">Zip Code</h5>
                            <p class="text-800">{{ $data->postalcode }}</p>
                            <!--<h5 class="text-800">Address</h5>-->
                            <!--<p class="text-800">{{ $data->Address }}</p>-->
                            <h5 class="text-800">Street Address</h5>
                            <p class="text-800">{{ $data->st_adress }}</p>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <h3 class="mb-4">Product Detail</h3>
                            <h5 class="text-800">Note</h5>
                            <p class="text-800">{{ $data->order_note }}</p>
                            <!--<h5 class="text-800">Total</h5>-->
                            <!--<p class="text-800">{{ $data->Order_Total }}</p>-->
                            <h5 class="text-800">Order ID</h5>
                            <p class="text-800">{{ $data->order_id }}</p>
                            <h5 class="text-800">Status</h5>
                            <p class="text-800">
                                @if ($data->status == "Processing")
                                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-warning"><span class="badge-label">In Progress</span><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock ms-1" style="height:12.8px;width:12.8px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span></td>
                                @endif
                                @if ($data->status == "Completed")
                                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Completed</span><span class="ms-1" data-feather="check" style="height:12.8px;width:12.8px;"></span></span></td>
                                @endif
                                @if ($data->status == "Reject")
                                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-danger"><span class="badge-label">Reject</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td>
                                @endif
                                @if ($data->status == "Cancel")
                                <td class="align-middle text-start ps-5 status"><span class="badge badge-phoenix fs--2 badge-phoenix-danger"><span class="badge-label">Cancel</span><span class="ms-1" data-feather="x" style="height:12.8px;width:12.8px;"></span></span></td>
                                @endif
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="mb-4">Customer Detail</h3>
                            <h5 class="text-800">Customer Name</h5>
                            <p class="text-800">{{ $data->f_name }} {{ $data->l_name }}</p>
                            <h5 class="text-800">Email</h5>
                            <p class="text-800">{{ $data->email }}</p>
                            <h5 class="text-800">Phone</h5>
                            <p class="text-800">{{ $data->phone }}</p>
                            <h5 class="text-800">Company Name</h5>
                            <p class="text-800">{{ $data->company_name }}</p>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar mx-n1 px-1 border-top">
                        <table class="table fs--1 mb-0 leads-table">
                            <thead>
                                <tr>
                                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Product Name</th>
                                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Color Name</th>
                                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Product Quantity</th>
                                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Patient Name</th>
                                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Tray Number</th>
                                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">PO Number</th>
                                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Upload Prescription</th>
                                </tr>
                            </thead>
                            <tbody class="list" id="leal-tables-body">
                                @foreach ($addondata as $addondata)
                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                    <td class="name align-middle white-space-nowrap ps-0">
                                        <div class="d-flex align-items-center">
                                        <div><a class="fs-0 fw-bold" href="javascript:;">{{$addondata->pro_name}}</a>
                                        </div>
                                        </div>
                                    </td>
                                    <td class="email align-middle white-space-nowrap fw-semi-bold ps-4 border-end" style="{{ $addondata->pro_color }}">{{$addondata->color_name}}</td>
                                    <td class="phone align-middle white-space-nowrap fw-semi-bold ps-4 border-end">{{$addondata->pro_quantity}}</td>
                                    <td class="phone align-middle white-space-nowrap fw-semi-bold ps-4 border-end">{{$addondata->Patient_name}}</td>
                                    <td class="phone align-middle white-space-nowrap fw-semi-bold ps-4 border-end">{{$addondata->tray_number}}</td>
                                    <td class="phone align-middle white-space-nowrap fw-semi-bold ps-4 border-end">{{$addondata->po_number}}</td>
                                    <td class="phone align-middle white-space-nowrap fw-semi-bold ps-4 border-end"><img src="{{ getenv('APP_URL') }}/cart_images/{{$addondata->Upload_Prescription}}" style="width: 100px;"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection