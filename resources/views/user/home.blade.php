@extends('layouts.user_app')
@section('content')
    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Horse Listings</h2>
            <a href="#!" class="points_btn">
                <img src="{{ getenv('APP_URL') }}/assets/images/points_icon.png" alt="" class="img-fluid mb-2">
                Show Points
            </a>
        </div>
        <div class="inner_content_wrapper">
            <div class="welcome-container">
                <div class="welcome-content">
                    <img src="{{ getenv('APP_URL') }}/assets/images/welcome_img.png" alt="Horse" class="horse-image">
                    <div class="text-content">
                        <div class="welcome-title">Welcome back, Caitlin! ✨ 🐎</div>
                        <div class="welcome-message">
                            We're so happy to see you again! You've arrived at your stable of tools and insights —
                            everything you need is right at your fingertips! Have a blessed day! 😊 🔔
                        </div>
                    </div>
                </div>
                <a href="#!" class="saves-bar">YOUR SAVES</a>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-6 pe-4">
                    <div class="data_box">
                        <div class="data_box_top_bar mb-3">
                            <h2>Saved Ads</h2>
                            <a href="#!" class="gold_btn">+ Add New Saved AD</a>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="count_boxs">
                                    <div class="icon_box">
                                        <img src="{{ getenv('APP_URL') }}/assets/images/count_icon_1.png" alt="" class="img-fluid">
                                    </div>
                                    <p>12</p>
                                    <p>Horse</p>
                                    <a href="#!">View All</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="count_boxs">
                                    <div class="icon_box">
                                        <img src="{{ getenv('APP_URL') }}/assets/images/count_icon_2.png" alt="" class="img-fluid">
                                    </div>
                                    <p>5</p>
                                    <p>Services</p>
                                    <a href="#!">View All</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="count_boxs">
                                    <div class="icon_box">
                                        <img src="{{ getenv('APP_URL') }}/assets/images/count_icon_3.png" alt="" class="img-fluid">
                                    </div>
                                    <p>3</p>
                                    <p>Real Estate</p>
                                    <a href="#!">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ps-4">
                    <div class="data_box">
                        <div class="data_box_top_bar mb-3">
                            <h2>Saved Searches </h2>
                            <a href="#!" class="gold_btn">+ Add New Search</a>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="count_boxs">
                                    <div class="icon_box">
                                        <img src="{{ getenv('APP_URL') }}/assets/images/count_icon_4.png" alt="" class="img-fluid">
                                    </div>
                                    <p>12</p>
                                    <p>Horse</p>
                                    <a href="#!">View All</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="count_boxs">
                                    <div class="icon_box">
                                        <img src="{{ getenv('APP_URL') }}/assets/images/count_icon_5.png" alt="" class="img-fluid">
                                    </div>
                                    <p>5</p>
                                    <p>Services</p>
                                    <a href="#!">View All</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="count_boxs">
                                    <div class="icon_box">
                                        <img src="{{ getenv('APP_URL') }}/assets/images/count_icon_6.png" alt="" class="img-fluid">
                                    </div>
                                    <p>3</p>
                                    <p>Real Estate</p>
                                    <a href="#!">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-container mb-4">
                <div class="dashboard-grid">
                    <!-- Show Points Available -->
                    <div class="dashboard-item">
                        <div class="icon-wrapper">
                            <img src="{{ getenv('APP_URL') }}/assets/images/info_icon_1.png" alt="" class="img-fluid">
                        </div>
                        <div class="label">SHOW POINTS AVAILABLE</div>
                        <div class="value">2</div>
                    </div>
                    <!-- Valid For -->
                    <div class="dashboard-item">
                        <div class="icon-wrapper">
                            <img src="{{ getenv('APP_URL') }}/assets/images/info_icon_2.png" alt="" class="img-fluid">
                        </div>
                        <div class="label">VALID FOR</div>
                        <div class="value" style="font-size: 16px; font-weight: 600; margin-top: 8px;">4 MONTHS
                            REMAINING
                        </div>
                    </div>
                    <!-- Current Package -->
                    <div class="dashboard-item">
                        <div class="icon-wrapper">
                            <img src="{{ getenv('APP_URL') }}/assets/images/info_icon_3.png" alt="" class="img-fluid">
                        </div>
                        <div class="label">CURRENT PACKAGE</div>
                        <div class="value" style="font-size: 16px; font-weight: 600; margin-top: 8px;">PADDOCK PASS
                        </div>
                    </div>
                    <!-- Active Listings -->
                    <div class="dashboard-item">
                        <div class="icon-wrapper">
                            <img src="{{ getenv('APP_URL') }}/assets/images/info_icon_4.png" alt="" class="img-fluid">
                        </div>
                        <div class="label">ACTIVE LISTINGS</div>
                        <div class="value">8</div>
                    </div>
                    <!-- Next Billing -->
                    <div class="dashboard-item next-billing">
                        <div class="icon-wrapper">
                            <img src="{{ getenv('APP_URL') }}/assets/images/info_icon_5.png" alt="" class="img-fluid">
                        </div>
                        <div class="label">NEXT BILLING</div>
                        <div class="value" style="font-size: 18px; font-weight: 600; margin-top: 8px;">FEB 15, 2026
                        </div>
                        <div class="sublabel">PADDOCK PASS (5 SHOW POINTS)</div>
                        <div class="sublabel">$65</div>
                    </div>
                </div>
            </div>

            <div class="table_container">
                <!-- Horse Listings Card -->
                <div class="card horse-card">
                    <div class="card-header">
                        <div class="header-left">
                            <img src="{{ getenv('APP_URL') }}/assets/images/table_icon_1.png" alt="Horse" class="icon">
                            <span class="title">Horse Listings</span>
                        </div>
                        <button class="add-btn">+ ADD NEW</button>
                    </div>
                    <div class="stats">
                        <div class="stat-row">
                            <span class="stat-label">Total Listings:</span>
                            <span class="stat-value">5</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Active Listings:</span>
                            <span class="stat-value">5</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Sold Listings:</span>
                            <span class="stat-value">10</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Withdraw Listings:</span>
                            <span class="stat-value">1</span>
                        </div>
                    </div>
                </div>

                <!-- Service Listings Card -->
                <div class="card service-card">
                    <div class="card-header">
                        <div class="header-left">
                            <img src="{{ getenv('APP_URL') }}/assets/images/table_icon_2.png" alt="Service" class="icon">
                            <span class="title">Service Listings</span>
                        </div>
                        <button class="add-btn">+ ADD NEW</button>
                    </div>
                    <div class="stats">
                        <div class="stat-row">
                            <span class="stat-label">Total Listings:</span>
                            <span class="stat-value">1</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Active Listings:</span>
                            <span class="stat-value">1</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Sold Listings:</span>
                            <span class="stat-value">1</span>
                        </div>
                    </div>
                </div>

                <!-- Real Estate Listings Card -->
                <div class="card realestate-card">
                    <div class="card-header">
                        <div class="header-left">
                            <img src="{{ getenv('APP_URL') }}/assets/images/table_icon_3.png" alt="Real Estate" class="icon">
                            <span class="title">Real Estate Listings</span>
                        </div>
                        <button class="add-btn">+ ADD NEW</button>
                    </div>
                    <div class="stats">
                        <div class="stat-row">
                            <span class="stat-label">Total Listings:</span>
                            <span class="stat-value">10</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Active Listings:</span>
                            <span class="stat-value">5</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Sold Listings:</span>
                            <span class="stat-value">5</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Withdraw Listings:</span>
                            <span class="stat-value">1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
