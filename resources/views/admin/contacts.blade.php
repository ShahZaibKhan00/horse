@extends('layouts.admin_app')

@section('content')

<div class="content">
    <div class="pb-6">
        <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
        <div class="row g-3 justify-content-between mb-4">
            <div class="col-auto">
                <h2 class="mb-2 text-white main_heading_dashboard">{{count($contacts)}} {{ request()->segment(1) }}</h2>
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
                        <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Full Name</th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="email" style="width:15%;">
                            <div class="d-inline-flex flex-center">
                            <div class="d-flex align-items-center px-1 py-1 bg-success-100 rounded me-2"><span class="text-success-600 dark__text-success-300" data-feather="mail"></span></div><span>Email</span>
                            </div>
                        </th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="phone" style="width:15%; min-width: 180px;">
                            <div class="d-inline-flex flex-center">
                            <div class="d-flex align-items-center px-1 py-1 bg-primary-100 rounded me-2"><span class="text-primary-600 dark__text-primary-300" data-feather="phone"></span></div><span>Phone</span>
                            </div>
                        </th>
                        <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="contact" style="width:15%;">
                            <div class="d-inline-flex flex-center">
                            <div class="d-flex align-items-center px-1 py-1 bg-info-100 rounded me-2"><span class="text-info-600 dark__text-info-300" data-feather="file-text"></span></div><span>Description</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="list" id="leal-tables-body">
                    @foreach ($contacts as $contacts)
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                        <td class="fs--1 align-middle">
                            <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Anthoney Michael","designation":"VP Accounting","status":{"label":"new lead","type":"badge-phoenix-primary"}},"email":"anth125@gmail.com","phone":"{{$contacts->Number}}","contact":"Ally Aagaard","company":"Google.inc","date":"Jan 01, 12:56 PM"}' /></div>
                        </td>
                        <td class="name align-middle white-space-nowrap ps-0">
                            <div class="d-flex align-items-center"><a href="#!">
                                <!-- <div class="avatar avatar-xl me-3"><img class="rounded-circle" src="{{ getenv('APP_URL') }}/user_admin_asstes/assets/img/team/32.webp" alt="" /></div> -->
                            </a>
                            <div><a class="fs-0 fw-bold" href="javascript:;">{{$contacts->F_Name}} <span>{{$contacts->L_Name}}</span></a>
                            </div>
                            </div>
                        </td>
                        <td class="email align-middle white-space-nowrap fw-semi-bold ps-4 border-end"><a class="text-1000" href="mailto:{{$contacts->Email}}">{{$contacts->Email}}</a></td>
                        <td class="phone align-middle white-space-nowrap fw-semi-bold ps-4 border-end"><a class="text-1000" href="tel:{{$contacts->Number}}">{{$contacts->Number}}</a></td>
                        <td class="white-space-nowrap fw-semi-bold ps-4 border-end align-middle review" style="min-width:350px;">
                            <p class="fw-semi-bold text-1000 mb-0">{{$contacts->Contact_Desc}}</p>
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
