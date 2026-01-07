<style>
</style>
<nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
    <script>
        var navbarStyle = window.config.config.phoenixNavbarStyle;
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="logo_box pb-3">
            <img src="{{ getenv('APP_URL') }}/assets/images/logo_new.png" alt="" class="img-fluid" />
        </div>
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="{{ route('dashboard') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_1.png" alt="" />
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Dashboard</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="{{ url('manage_category') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_2.png" alt="" />
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Categories</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1" href="{{ route('admin.membership') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_2.png" alt="" />
                                </span>
                                <span class="nav-link-text-wrapper">
                                    <span class="nav-link-text">Membership</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </li>
                <div class="nav-item-wrapper">
                    <a class="nav-link dropdown-indicator label-1" href="#nv-product" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-CRM">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div>
                            <span class="nav-link-icon"><img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_6.png" alt="" /></span><span class="nav-link-text">Listed
                                Products</span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
                        </div>
                    </a>
                    <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-product">
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('products') }}/{{ str_replace(' ', '-', $category->cate_name) }}" data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">{{ $category->cate_name }}</span></div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <li class="nav-item">
                        <!-- parent pages-->
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="{{ route('admin.plan') }}" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_1.png" alt="" />
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">{{ __('Plans') }}</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="{{ url('orders') }}" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_3.png" alt="" />
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Orders</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="{{ url('contacts') }}" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <!-- <span data-feather="git-pull-request"></span> -->
                                        <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_4.png" alt="" />
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Contacts Query</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="#!" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_8.png" alt="" />
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Favorites</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="{{ url('blogs') }}" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_8.png" alt="" />
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Blogs</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="#!" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_5.png" alt="" />
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Chat</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="#!" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_6.png" alt="" />
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Payments</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="{{ url('profile') }}" role="button" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <img class="" src="{{ getenv('APP_URL') }}/assets/images/admin_tab_icon_7.png" alt="" />
                                    </span>
                                    <span class="nav-link-text-wrapper">
                                        <span class="nav-link-text">Account Details</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
               <div class="nav-item-wrapper">
               <a class="nav-link label-1 mb-0" href="#!" role="button" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               								document.getElementById('logout-form').submit();" >
               <div class="d-flex align-items-center">
               <span class="nav-link-icon">


               <i class="fa-solid fa-power-off"></i>

               </span>
               <span class="nav-link-text-wrapper">

               <span class="nav-link-text">Logout</span>

               </span>
               </div>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
               </form>
               </a>
               </div>
               </li> -->
            </ul>
            <div class="user_info_wrapper">
                <div class="user_info_box">
                    <div class="img_box">
                        <img class="rounded-circle " src="{{ getenv('APP_URL') }}/Profile_image/{{ $userprofile }}" alt="" />
                    </div>
                    <h6>{{ $username }}</h6>
                </div>
                <a class="nav-link label-1 mb-0 logout_btn" href="#!" role="button" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <img class="" src="{{ getenv('APP_URL') }}/assets/images/log1.png" alt="" />
                        </span>
                        <span class="nav-link-text-wrapper">
                            <span class="link-text">Logout</span>
                        </span>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
                <div class="status_box">
                    <h6>Omni Status: <span><img class="" src="{{ getenv('APP_URL') }}/assets/images/online.png" alt="" /> Online</span></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-vertical-footer"><button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span class="fs-0"
                data-feather="chevrons-right"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
</nav>
<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="display:none;">
    <div class="collapse navbar-collapse justify-content-center">
        <div class="navbar-logo d-none">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="{{ url('') }}">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ getenv('APP_URL') }}/assets/images/{{ $Logo }}" alt="logo" width="100" />
                    </div>
                </div>
            </a>
        </div>
        <h1 class="main_heading_dashboard">Listing Information</h1>
        <ul class="navbar-nav navbar-nav-icons flex-row d-none">
            <li class="nav-item dropdown">
                <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <img class="rounded-circle " src="{{ getenv('APP_URL') }}/Profile_image/{{ $userprofile }}" alt="" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <img class="rounded-circle " src="{{ getenv('APP_URL') }}/Profile_image/{{ $userprofile }}" alt="" />
                                </div>
                                <h6 class="mt-2 text-black">{{ $username }}</h6>
                            </div>
                            <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3" href="{{ url('profile') }}"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{ url('general') }}"> <span class="me-2 text-900" data-feather="settings"></span>General Settings</a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                            <!--<ul class="nav d-flex flex-column my-3">-->
                            <!--	<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>-->
                            <!--</ul>-->
                            <hr />
                            <div class="px-3">
                                <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                    <span class="me-2" data-feather="log-out"></span>
                                    Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                    href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-top navbar-slim fixed-top navbar-expand" id="topNavSlim" style="display:none;">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand navbar-brand" href="{{ url('') }}">Tres Beautique<span class="text-1000 d-none d-sm-inline"></span></a>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon me-1 d-none d-sm-block" data-feather="moon"></span><span
                            class="fs--1 fw-bold">Dark</span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip"
                        data-bs-placement="left" title="Switch theme"><span class="icon me-1 d-none d-sm-block" data-feather="sun"></span><span class="fs--1 fw-bold">Light</span></label></div>
            </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span data-feather="search"
                        style="height:12px;width:12px;"></span></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside"
                    aria-expanded="false">
                    <svg width="10" height="10" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                    </svg>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    data-bs-auto-close="outside" aria-expanded="false">Olivia <span class="fa-solid fa-chevron-down fs--2"></span></a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <img class="rounded-circle " src="{{ getenv('APP_URL') }}/Profile_image/{{ $userprofile }}" alt="" />
                                </div>
                                <h6 class="mt-2 text-black">{{ $username }}</h6>
                            </div>
                            <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3" href="{{ url('profile') }}"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{ url('general') }}"> <span class="me-2 text-900" data-feather="settings"></span>General Settings</a></li>
                                <!--<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>-->
                                <!--<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>-->
                                <!--<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>-->
                                <!--<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>-->
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                            <!--<ul class="nav d-flex flex-column my-3">-->
                            <!--	<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>-->
                            <!--</ul>-->
                            <hr />
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a>
                            </div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                    href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarTop" style="display:none;">
    <div class="navbar-logo">
        <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse"
            aria-controls="navbarTopCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="{{ url('') }}">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ getenv('APP_URL') }}/assets/images/{{ $Logo }}" alt="logo" width="100" />
                </div>
            </div>
        </a>
    </div>
    <ul class="navbar-nav navbar-nav-icons flex-row">
        <li class="nav-item">
            <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark"
                    id="themeControlToggle" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Switch theme"><span class="icon" data-feather="moon"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                    data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label></div>
        </li>
        <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span data-feather="search"
                    style="height:19px;width:19px;margin-bottom: 2px;"></span></a></li>
        <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">
                <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                    <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                    <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                    <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                    <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                    <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                    <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                    <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                    <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
                <div class="card bg-white position-relative border-0">
                    <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                aria-expanded="false">
                <div class="avatar avatar-l ">
                    <img class="rounded-circle " src="{{ getenv('APP_URL') }}/Profile_image/{{ $userprofile }}" alt="" />
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                    <div class="card-body p-0">
                        <div class="text-center pt-4 pb-3">
                            <div class="avatar avatar-xl ">
                                <img class="rounded-circle " src="{{ getenv('APP_URL') }}/Profile_image/{{ $userprofile }}" alt="" />
                            </div>
                            <h6 class="mt-2 text-black">{{ $username }}</h6>
                        </div>
                        <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /></div>
                    </div>
                    <div class="overflow-auto scrollbar" style="height: 10rem;">
                        <ul class="nav d-flex flex-column mb-2 pb-1">
                            <li class="nav-item"><a class="nav-link px-3" href="{{ url('profile') }}"> <span class="me-2 text-900" data-feather="user"></span><span>Profile</span></a></li>
                            <li class="nav-item"><a class="nav-link px-3" href="{{ url('general') }}"> <span class="me-2 text-900" data-feather="settings"></span>General Settings</a></li>
                            <!--<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>-->
                            <!--<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>-->
                            <!--<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>-->
                            <!--<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>-->
                        </ul>
                    </div>
                    <div class="card-footer p-0 border-top">
                        <!--<ul class="nav d-flex flex-column my-3">-->
                        <!--	<li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li>-->
                        <!--</ul>-->
                        <hr />
                        <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                        <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</nav>
<nav class="navbar navbar-top navbar-slim justify-content-between fixed-top navbar-expand-lg" id="navbarTopSlim" style="display:none;"></nav>
<nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarCombo" data-navbar-top="combo" data-move-target="#navbarVerticalNav" style="display:none;"></nav>
<nav class="navbar navbar-top fixed-top navbar-slim justify-content-between navbar-expand-lg" id="navbarComboSlim" data-navbar-top="combo" data-move-target="#navbarVerticalNav"
    style="display:none;"></nav>
<script>
    let url = window.location.pathname;
    let activePage = url.substring(url.lastIndexOf('/') + 1);
    let activeAnchor = document.querySelectorAll('.navbar-vertical-content ul.navbar-nav a');
    activeAnchor.forEach((item) => {
        let linkPage = item.href.substring(item.href.lastIndexOf('/') + 1);
        if (activePage == linkPage) {
            item.classList.add('active');
        }
    });

    var navbarTopShape = window.config.config.phoenixNavbarTopShape;
    var navbarPosition = window.config.config.phoenixNavbarPosition;
    var body = document.querySelector('body');
    var navbarDefault = document.querySelector('#navbarDefault');
    var navbarTop = document.querySelector('#navbarTop');
    var topNavSlim = document.querySelector('#topNavSlim');
    var navbarTopSlim = document.querySelector('#navbarTopSlim');
    var navbarCombo = document.querySelector('#navbarCombo');
    var navbarComboSlim = document.querySelector('#navbarComboSlim');

    var documentElement = document.documentElement;
    var navbarVertical = document.querySelector('.navbar-vertical');

    if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
        navbarDefault.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        topNavSlim.style.display = 'block';
        navbarVertical.style.display = 'inline-block';
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        navbarVertical.remove();
        navbarTop.remove();
        topNavSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarTopSlim.removeAttribute('style');
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
        navbarDefault.remove();
        //- navbarVertical.remove();
        navbarTop.remove();
        topNavSlim.remove();
        navbarCombo.remove();
        navbarTopSlim.remove();
        navbarComboSlim.removeAttribute('style');
        navbarVertical.removeAttribute('style');
        body.classList.add('nav-slim');
    } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        topNavSlim.remove();
        navbarVertical.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarTop.removeAttribute('style');
        documentElement.classList.add('navbar-horizontal');
    } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
        topNavSlim.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarDefault.remove();
        navbarComboSlim.remove();
        navbarCombo.removeAttribute('style');
        navbarVertical.removeAttribute('style');
        documentElement.classList.add('navbar-combo')

    } else {
        topNavSlim.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarDefault.removeAttribute('style');
        navbarVertical.removeAttribute('style');
    }

    var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
    var navbarTop = document.querySelector('.navbar-top');
    if (navbarTopStyle === 'darker') {
        navbarTop.classList.add('navbar-darker');
    }

    var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
    var navbarVertical = document.querySelector('.navbar-vertical');
    if (navbarVerticalStyle === 'darker') {
        navbarVertical.classList.add('navbar-darker');
    }
</script>
