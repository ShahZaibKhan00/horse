<aside>
    <div>
        <a href="{{ url('/') }}" class="user_logo"><img src="{{ url('/') }}/assets/images/user_logo.png" alt class="img-fluid"></a>
        <ul class="side_menu_navs">
            <li>
                <a href="{{ url('dashboard') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ url('list-management') }}" class="dropdown_btnn">LISTING MANAGAMENT</a>
            </li>
            <li class="dropdown_oone ms-3">
                <a href="{{route('horse-listing')}}">Horse Listings</a>
                <a href="{{route('service-listing')}}">Service Listings</a>
                <a href="{{route('realstate-listing')}}">Real Estate Listings</a>
            </li>
            <li>
                <a href="#!">FAVORITES</a>
            </li>
            <li>
                <a href="#!">SAVED SEARCHES</a>
            </li>
            <li>
                <a href="chat.php">CHATS</a>
            </li>
            <li>
                <a href="{{ route('package') }}">SUBSCRIPTION</a>
            </li>
            <li>
                <a href="#!">MY WALLET / BILLING</a>
            </li>
            <li>
                <a href="account-detail.php">ACCOUNT DETAILS</a>
            </li>
        </ul>
    </div>

    <div class="logout_box">
        <div class="user_name_min mb-3">
            <img src="{{ url('/') }}/assets/images/welcome_img.png" alt="">
            <p>Catiline</p>
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
