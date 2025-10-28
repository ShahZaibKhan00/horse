@extends('layouts.user_app')

@section('content')

<div class="content">
    <div class="pb-6">
        <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
        <div class="row g-3 justify-content-between mb-4">
            <div class="col-auto">
                <h2 class="mb-2">{{count($data)}} Products</h2>
            </div>
            <div class="col-12 col-md-auto">
               <div class="row g-2 gy-3">
               <div class="col-auto flex-1">
                   <div class="search-box">
                   <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" />
                       <span class="fas fa-search search-box-icon"></span>
                   </form>
                   </div>
               </div>
               <div class="col-auto">
                    <a href="{{ url('add_product') }}/{{ str_replace(' ', '-', $cate_name) }}" class="btn btn-sm btn-mmacode-secondary bg-white hover-bg-100 me-2">Add Product</a>
               </div>
               </div>
            </div>
        </div>
        <div class="table-responsive scrollbar mx-n1 px-1 border-top">
            <table class="table fs--1 mb-0">
                <thead>
                    <tr>
                        <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                        <div class="form-check mb-0 fs-0"><input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' /></div>
                        </th>
                        <th class="sort white-space-nowrap align-middle fs--2" scope="col" style="width:70px;"></th>
                        <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:550px;" data-sort="product">PRODUCT NAME</th>
                        <!--<th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">PRICE</th>-->
                        <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:150px;">CATEGORY</th>
                        <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:250px;">Product SKU</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="time" style="width:50px;">Date / Time</th>
                        <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="list" id="products-table-body">
                    @foreach($data as $list)
                    <tr class="position-static">
                        <td class="fs--1 align-middle">
                        <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox" data-bulk-select-row='{"product":"Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management & Skin Temperature Trends, Carbon/Graphite, One Size (S & L Bands...","productImage":"/products/1.png","price":"$39","category":"Plants","tags":["Health","Exercise","Discipline","Lifestyle","Fitness"],"star":false,"vendor":"Blue Olive Plant sellers. Inc","publishedOn":"Nov 12, 10:45 PM"}' /></div>
                        </td>
                        <td class="align-middle white-space-nowrap py-0"><a class="d-block border rounded-2" href="{{url('products_detail')}}/{{$list->pro_sku}}"><img src="{{ getenv('APP_URL') }}/Featured_image/{{$list->pro_Fimg}}" alt="" width="53" /></a></td>
                        <td class="product align-middle ps-4"><a class="fw-semi-bold line-clamp-3 mb-0" href="{{url('products_detail')}}/{{$list->pro_sku}}">{{$list->pro_name}}</a></td>
                        <!--<td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">${{ str_replace(' -- ', ' -- $', $list->pro_reg_price) }}</td>-->
                        <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">{{$cate_name}}</td>
                        <td class="productSKU align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">{{$list->pro_sku}}</td>
                        <td class="tags align-middle review pb-2 ps-3">{{$list->created_at}}</td>
                        <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                        <div class="font-sans-serif btn-reveal-trigger position-static"><button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end py-2">
                                <!--<a class="dropdown-item" href="{{url('view')}}/{{$list->pro_sku}}">View</a>-->
                                <a class="dropdown-item" href="{{url('edit_list')}}/{{$list->id}}/{{ str_replace(' ', '-', $cate_name) }}">Edit List</a>
                            <div class="dropdown-divider"></div>
                            <form id="delete_form" method="post" action="{{ url('/delete_product') }}/{{$list->id}}/{{ str_replace(' ', '-', $cate_name) }}">
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

<script>
document.querySelectorAll('.deleteButton').forEach(function(button) {
    button.addEventListener('click', function() {
        var form = button.closest('form');

        var id = form.getAttribute('action').split('/').pop();

        var confirmDelete = confirm("Are you sure you want to delete this Product?");

        if (confirmDelete) {
            form.submit();
        } else {
            alert("Listed Product not deleted.");
        }
    });
});
</script>
@endsection
