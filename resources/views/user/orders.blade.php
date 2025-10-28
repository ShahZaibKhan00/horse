@extends('layouts.user_app')

@section('content')

<div class="content">
    <div class="pb-6">
        <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
        <div class="row g-3 justify-content-between mb-4">
            <div class="col-auto">
                <h2 class="mb-2">{{count($data)}} Orders</h2>
            </div>
            <div class="col-auto">
                <div class="d-flex">
                    <div class="search-box me-2">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive scrollbar mx-n1 px-1 border-top">
            <table class="table fs--1 mb-0 leads-table">
                <thead>
                    <tr>
                        <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                            <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select='{"body":"leal-tables-body"}' /></div>
                        </th>
                        <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Name</th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="contact" style="width:15%;">
                            <div class="d-inline-flex flex-center">
                            <div class="d-flex align-items-center px-1 py-1 bg-info-100 rounded me-2"><span class="text-info-600 dark__text-info-300" data-feather="mail"></span></div><span>Email</span>
                            </div>
                        </th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="company" style="width:15%;">
                            <div class="d-inline-flex flex-center">
                            <div class="d-flex align-items-center px-1 py-1 bg-warning-100 rounded me-2"><span class="text-warning-600 dark__text-warning-300" data-feather="phone"></span></div><span>Phone Number</span>
                            </div>
                        </th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="email" style="width:15%;">
                            <div class="d-inline-flex flex-center">
                            <div class="d-flex align-items-center px-1 py-1 bg-success-100 rounded me-2"><span class="text-success-600 dark__text-success-300" data-feather="dollar-sign"></span></div><span>Zip / Postal</span>
                            </div>
                        </th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase" scope="col" data-sort="date" style="width:15%;">Status</th>
                        <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="list" id="leal-tables-body">
                    @foreach ($data as $data)
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle">
                            <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Anthoney Michael","designation":"VP Accounting","status":{"label":"new lead","type":"badge-phoenix-primary"}},"email":"anth125@gmail.com","phone":"{{$data->Number}}","contact":"Ally Aagaard","company":"Google.inc","date":"Jan 01, 12:56 PM"}' /></div>
                        </td>
                        <td class="name align-middle white-space-nowrap ps-0">
                            <div class="d-flex align-items-center">
                            <div><a class="fs-0 fw-bold" href="{{ url('/view') }}/{{$data->id}}">{{$data->f_name}} {{$data->l_name}}</a></div>
                            </div>
                        </td>
                        <td class="contact align-middle white-space-nowrap ps-4 border-end fw-semi-bold text-1000">{{$data->email}}</td>
                        <td class="company align-middle white-space-nowrap text-600 ps-4 border-end fw-semi-bold text-1000">{{$data->phone}}</td>
                        <td class="company align-middle white-space-nowrap text-600 ps-4 border-end fw-semi-bold text-1000">${{$data->postalcode}}</td>
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
                        <td class="align-middle white-space-nowrap text-end pe-0 ps-4">
                            <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="{{ url('/view_order') }}/{{$data->id}}">View</a>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row align-items-center justify-content-end py-4 pe-0 fs--1">
            <div class="col-auto d-flex">
            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
            <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
            </div>
        </div>
        </div>
    </div>
@endsection
