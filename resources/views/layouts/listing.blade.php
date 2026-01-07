@extends('layouts.user_app')

@section('content')
    <section class="user_dashboard">
        <div class="user_main_content">
            <div class="inner_content_wrapper">
                <div class="horse_list_info_box mb-4">
                    <h2 class="text-center mb-2">YOU DON’T HAVE ANY {{ Str::upper(Request::get('label')) }} LISTINGS YET.</h2>
                    <h4 class="text-center mb-2">Start creating your ad today!</h4>
                    <h2 class="text-center fst-italic mb-5">Once you add a listing, it will appear in this section.</h2>
                    <h2 class="mb-2">YOU DON’T HAVE ANY {{ Str::upper(Request::get('label')) }} LISTINGS YET.</h2>
                    <p>Show Points are your all-access pass to listing on Horse Action Network. Each Show Point gives you one active ad for 30 days—whether it's a horse, service, or property. Buy a
                        monthly package, and your Show Points are added to your wallet automatically. Use them as you need, and any unused points roll over for up to 6 months. When your package renews
                        each month, you get fresh Show Points to keep your ads running. It's simple, ßexible, and built to grow with you.</p>
                </div>
                <div class="dashboard_container_wrapper">
                    <div class="dashboard-container mb-5 p-4">
                        <h2 class="h_heading">How Show Points Work</h2>
                        <div class="dashboard-grid dashboard-grid-one">
                            <div class="dashboard-item">
                                <div class="icon-wrapper mb-4">
                                    <img src="{{ getenv('APP_URL') }}/assets/images/show_points_icon_1.png" alt="" class="img-fluid">
                                </div>
                                <div class="label">1 show Point = 1 Ad</div>
                                <div class="value" style="font-size: 16px; font-weight: 600; margin-top: 8px;">
                                    for 30 Days
                                </div>
                            </div>
                            <div class="dashboard-item">
                                <div class="icon-wrapper mb-4">
                                    <img src="{{ getenv('APP_URL') }}/assets/images/show_points_icon_2.png" alt="" class="img-fluid">
                                </div>
                                <div class="label">Use for Horses,</div>
                                <div class="value" style="font-size: 16px; font-weight: 600; margin-top: 8px;">
                                    Services, or Propoerties
                                </div>
                            </div>
                            <div class="dashboard-item">
                                <div class="icon-wrapper mb-4">
                                    <img src="{{ getenv('APP_URL') }}/assets/images/show_points_icon_3.png" alt="" class="img-fluid">
                                </div>
                                <div class="label">Points Roll Over</div>
                                <div class="value" style="font-size: 16px; font-weight: 600; margin-top: 8px;">
                                    for 6 Months
                                </div>
                            </div>
                            <div class="dashboard-item">
                                <div class="icon-wrapper mb-4">
                                    <img src="{{ getenv('APP_URL') }}/assets/images/show_points_icon_4.png" alt="" class="img-fluid">
                                </div>
                                <div class="label">Auto-Renew</div>
                                <div class="value" style="font-size: 16px; font-weight: 600; margin-top: 8px;">
                                    Monthly
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($plans as $item)
                            <div class="col-md-3">
                                <div class="user_pkg_card">
                                    <h2>{{ $item->name }}</h2>
                                    <h3>{{ $item->quantity }} show Point</h3>
                                    <h5><span>${{ $item->price }}</span>/month</h5>
                                    <h3>{{ $item->description }}</h3>
                                    <a href="{{ route('payment.link', Crypt::encrypt($item->id)) }}">Buy Now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bottom_blue_bar">
                <h2>All-Inclusive. Hassle-Free. Listing Made Simple.</h2>
            </div>
        </div>
    </section>
@endsection
