@extends('layouts.admin_app')

@section('content')

<div class="content">
    <div class="pb-6">
        <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
        <div class="row g-3 justify-content-between mb-4">
            <div class="col-auto">
                <h2 class="mb-2 text-white main_heading_dashboard">{{count($data)}} Categories</h2>
            </div>
            <div class="col-auto">
                <div class="d-flex">
                    <div class="search-box me-2">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('add_category') }}" class="btn submit_btn_one">Add Category</a>
                   </div>
                </div>
            </div>
        </div>
        <div class="border_box_one">
            <div class="table-responsive scrollbar mx-n1 px-1 border-top">
                <table class="table fs--1 mb-0 leads-table">
                    <thead>
                        <tr>
                            <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                                <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select='{"body":"leal-tables-body"}' /></div>
                            </th>
                            <th class="sort white-space-nowrap border-end align-middle text-uppercase ps-0" scope="col" data-sort="name" style="">Category Name</th>
                            <th class="sort align-middle ps-4 pe-5 text-uppercase" scope="col" data-sort="contact">
                                <div class="d-inline-flex flex-center">
                                <div class="d-flex align-items-center px-1 py-1 bg-info-100 rounded me-2"><span class="text-info-600 dark__text-info-300" data-feather="box"></span></div><span>Category Image</span>
                                </div>
                            </th>
                            <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="leal-tables-body">
                        @foreach ($data as $data)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="fs--1 align-middle">
                                <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Anthoney Michael","designation":"VP Accounting","status":{"label":"new lead","type":"badge-phoenix-primary"}},"email":"anth125@gmail.com","phone":"{{$data->Number}}","contact":"Ally Aagaard","company":"Google.inc","date":"Jan 01, 12:56 PM"}' /></div>
                            </td>
                            <td class="company align-middle white-space-wrap text-600 border-end fw-semi-bold text-1000">{{ $data->cate_name }}</td>
                            <td class="company align-middle white-space-wrap text-600 ps-4 border-start fw-semi-bold text-1000">
                                <img src="{{ getenv('APP_URL') }}/category_images/{{ $data->cate_image }}" alt="" class="img-fluid bookedCar_img">
                            </td>
                            <td class="align-middle white-space-nowrap text-end pe-0 ps-4">
                                <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="{{ url('/edit_category') }}/{{$data->id}}">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <form id="delete_form" method="post" action="{{ url('/delete_cate') }}/{{$data->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="dropdown-item text-danger deleteButton">Delete</button>
                                </form>
                                </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row align-items-center justify-content-end py-4 pe-0 fs--1">
            <div class="col-auto d-flex">
               <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900 text-white" data-list-info="data-list-info"></p><a class="fw-semi-bold text-white" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none text-white" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1 text-white" data-fa-transform="down-1"></span></a>
            </div>
            <div class="col-auto d-flex"><button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="mb-0 pagination"></ul><button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
            </div>
        </div>
        </div>
    </div>

<script>
document.querySelectorAll('.deleteButton').forEach(function(button) {
    button.addEventListener('click', function() {
        var form = button.closest('form');

        var id = form.getAttribute('action').split('/').pop();

        var confirmDelete = confirm("Are you sure you want to delete this Category?");

        if (confirmDelete) {
            form.submit();
        } else {
            alert("Category not deleted.");
        }
    });
});
</script>
@endsection
