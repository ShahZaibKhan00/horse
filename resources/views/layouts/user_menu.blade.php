<aside>
    <div>
        <a href="{{ url('/') }}" class="user_logo"><img src="{{ url('/') }}/assets/images/user_logo.png" alt class="img-fluid"></a>
        <ul class="side_menu_navs">
            <li>
                <a href="{{ url('dashboard') }}">Dashboard</a>
            </li>
            {{-- <li>
                <a href="{{ url('list-management') }}" class="dropdown_btnn">LISTING MANAGAMENT</a>
            </li>
            <li class="dropdown_oone ms-3">
                <a href="{{route('horse-listing')}}">Horse Listings</a>
                <a href="{{route('service-listing')}}">Service Listings</a>
                <a href="{{route('realstate-listing')}}">Real Estate Listings</a>
            </li> --}}
            <li>
                <a href="javascript:;" class="dropdown_btnn">
                    LISTING MANAGEMENT
                    <span class="arrow"><i class="fa-solid fa-caret-down"></i></span>
                </a>
            </li>
            <li class="dropdown_menu">
                <a href="{{ route('horse-listing') }}">Horse Listings</a>
                <a href="{{ route('service-listing') }}">Service Listings</a>
                <a href="{{ route('realstate-listing') }}">Real Estate Listings</a>
            </li>
            <li>
                <a href="javascript:;">FAVORITES</a>
            </li>
            <li>
                <a href="javascript:;">SAVED SEARCHES</a>
            </li>
            <li>
                <a href="javascript:;">CHATS</a>
            </li>
            <li class="{{ request()->routeIs('package') ? 'active' : '' }}">
                <a href="{{ route('package') }}">MY WALLET / BILLING</a>
            </li>
            {{-- <li class="{{ request()->routeIs('package') ? 'active' : '' }}">
                    <a href="{{ route('package') }}">MY WALLET / BILLING</a>
                    <a href="{{ route('package') }}">SUBSCRIPTION</a>
                </li> --}}
            <li class="{{ request()->is('list-management.*') ? 'active' : '' }}">
                <a href="{{ url('list-management') }}">Packages</a>
            </li>
            <li>
                <a href="javascript:;">ACCOUNT DETAILS</a>
                {{-- <a href="account-detail.php">ACCOUNT DETAILS</a> --}}
            </li>
        </ul>
    </div>

    <div class="logout_box">
        <div class="user_name_min mb-3">
            <img src="{{ url('/') }}/assets/images/welcome_img.png" alt="">
            <p> {{ $username }}</p>
        </div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="status__bar">
            <p>Omni Status: <span><img src="{{ url('/') }}/assets/images/dot.png" alt="img" class="me-1">Online</span></p>
        </div>
    </div>
</aside>

<script>
    document.querySelector(".dropdown_btnn").addEventListener("click", function() {
        this.classList.toggle("active");
        document.querySelector(".dropdown_menu").classList.toggle("open");
    });
</script>
