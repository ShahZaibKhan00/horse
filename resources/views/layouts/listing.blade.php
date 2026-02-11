@extends('layouts.user_app')

@section('content')
    <style>
        .buy-wrapper {
            position: relative;
            width: 100%;
            margin-top: 15px;
        }

        .buy-main-btn {
            width: 100%;
            padding: 14px 18px;
            font-size: 16px;
            font-weight: 600;
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .buy-main-btn .arrow {
            font-size: 12px;
        }

        .buy-options {
            position: absolute;
            top: 110%;
            left: 0;
            width: 100%;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            opacity: 0;
            transform: translateY(-15px);
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .buy-options a {
            display: block;
            padding: 14px 16px;
            font-size: 15px;
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #f1f1f1;
        }

        .buy-options a:last-child {
            border-bottom: none;
        }

        .buy-options a:hover {
            background: #f8f9fa;
        }

        /* Active state */
        .buy-wrapper.active .buy-options {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }
    </style>
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

                                    {{-- @php
                                        $credits = 5;
                                    @endphp
                                    @if ($credits >= 5)
                                        <div class="buy-wrapper">
                                            <button type="button" class="buy-main-btn">
                                                Buy Now
                                                <span class="arrow">▼</span>
                                            </button>

                                            <div class="buy-options">
                                                <a href="{{ route('payment.link', Crypt::encrypt($item->id)) }}">
                                                    💳 Pay with Card
                                                </a>
                                                <a href="#!" class="use-credit">
                                                    ⭐ Use 5 Credits
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('payment.link', Crypt::encrypt($item->id)) }}" class="buy-main-btn">
                                            Buy Now
                                        </a>
                                    @endif --}}
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
    {{-- <script>
        document.querySelectorAll('.buy-main-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const wrapper = this.closest('.buy-wrapper');
                if (wrapper) {
                    wrapper.classList.toggle('active');
                }
            });
        });
    </script> --}}
@endsection
