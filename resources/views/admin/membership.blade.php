@extends('layouts.admin_app')
<style>
.top_info_flex {
    background: #fff;
    padding: 20px;
}
.top_img_box {
    max-width: 250px;
    height: 250px;
    border: 2px solid #fff;
}
.top_img_box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.top_info_flex {
    display: flex;
    align-items: center;
    gap: 20px;
}
.dashboard-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 10px;
    overflow: hidden;
}

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #1d2139  0%, #00f2fe 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0;
            margin: -25px -25px 20px -25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
        }

       .horse-listings .card-header {
                    background: #B09240;
    background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 113%);
    padding: 15px;
    color: #1d2139;
    font-size: 20px;
    font-weight: 700;
        }

        .service-listings .card-header {
                 background: #B09240;
    background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 113%);
    padding: 15px;
    color: #1d2139;
    font-size: 20px;
    font-weight: 700;
        }

        .real-estate-listings .card-header {
                background: #B09240;
                background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 113%);
                padding: 15px;
                color: #1d2139;
                font-size: 20px;
                font-weight: 700;
        }

        .newest-ads .card-header {
                 background: #B09240;
    background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 113%);
    padding: 15px;
    color: #1d2139;
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 15px;
        }

        .saved-section .card-header {
                 background: #B09240;
    background: linear-gradient(90deg, rgba(176, 146, 64, 1) 0%, rgba(250, 248, 244, 1) 113%);
    padding: 15px;
    color: #1d2139;
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 15px;
        }

        .stat-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .stat-row:last-child {
            border-bottom: none;
        }

        .stat-label {
            font-weight: 500;
            color: #555;
            font-size: 14px;
        }

        .stat-value {
            font-weight: 700;
            color: #333;
            font-size: 16px;
        }

        .ad-item {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid #1d2139 ;
            transition: all 0.3s ease;
        }

        .ad-item:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateX(5px);
        }

        .ad-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .ad-stats {
            color: #666;
            font-size: 12px;
        }

        .ad-location {
            color: #888;
            font-size: 11px;
            margin-top: 3px;
        }

        .saved-item {
            text-align: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .saved-item:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: scale(1.05);
        }

        .saved-icon {
            font-size: 24px;
            color: #1d2139 ;
            margin-bottom: 8px;
        }

        .saved-count {
            font-weight: 700;
            color: #333;
            font-size: 18px;
        }

        .saved-label {
            color: #666;
            font-size: 12px;
            margin-top: 3px;
        }

        .section-title {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 300;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        .box_top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .box_top_search {
            display: flex;
            align-items: center;
            gap: 20px;
            width: 50%;
            justify-content: flex-end;
        }
       .box_top_search input {
            width: 100%;
            height: 55px;
            padding: 0px 20px 0px 40px;
            border: 0;
            border-radius: 10px;
            
        }
        .search-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
            max-width: 300px;
            }

            .search-wrapper::before {
            content: "🔍";
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            font-size: 16px;
            color: #777;
            }


        .backbtn {
            font-size: 20px;
            margin: 0;
            background: linear-gradient(to right, #ae8e3b 45%, #FFFFFF 70%, #ae8e3b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 400;
            text-transform: uppercase;
            text-align: center;
        }

        @media (max-width: 768px) {
            .dashboard-card {
                padding: 20px;
                margin-bottom: 15px;
            }
            
            .card-header {
                margin: -20px -20px 15px -20px;
                padding: 12px 15px;
                font-size: 13px;
            }
        }
</style>
@section('content')
<div class="content">
<div class="pb-5">
<div class="row g-4">
   <div class="col-12 mb-4">
      <div class="box_top">
         <h2 class="mb-0 main_heading_dashboard">Membership</h2>

         <div class="box_top_search">
            <div class="search-wrapper">
            <input type="search" placeholder="Search by Name">
            </div>
            <a href="#!" class="backbtn">Back to Website</a>
        </div>
      </div>
   </div>

    <div class="top_info_flex mb-4">
        <div class="top_img_box">
            <img src="https://html.kodesolution.com/2016/horeseman-html/demo/images/blog/2.jpg" alt="">
        </div>
        <div class="top_text_box">
            <h2 class="me-1 mb-2">Welcome back, Caitlin! 🌟 🐎</h2>
            <p>We’re so happy to see you again! You've arrived at your stable of tools and insights —
                everything you need is right at your fingertips! Have a blessed day! 😊 🐴</p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-4">
            <a href="{{ url('add_product/New-Ads') }}" class="cat_btn">Horse Listings</a>
        </div>
        <div class="col-4">
            <a href="{{ url('manage_service') }}" class="cat_btn">Service Listings</a>
        </div>
        <div class="col-4">
            <a href="{{ url('manage_realstate') }}" class="cat_btn">Real Estate Listings</a>
        </div>
    </div>

    <div class="row">
            <!-- Horse Listings -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="dashboard-card horse-listings">
                    <div class="card-header">
                        <i class="fas fa-horse me-2"></i>Horse Listings
                    </div>
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
                </div>
            </div>

            <!-- Service Listings -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="dashboard-card service-listings">
                    <div class="card-header">
                        <i class="fas fa-tools me-2"></i>Service Listings
                    </div>
                    <div class="stat-row">
                        <span class="stat-label">Total Listings:</span>
                        <span class="stat-value">1</span>
                    </div>
                    <div class="stat-row">
                        <span class="stat-label">Active Listings:</span>
                        <span class="stat-value">1</span>
                    </div>
                    <div class="stat-row">
                        <span class="stat-label">Removed Listings:</span>
                        <span class="stat-value">1</span>
                    </div>
                </div>
            </div>

            <!-- Real Estate Listings -->
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="dashboard-card real-estate-listings">
                    <div class="card-header">
                        <i class="fas fa-home me-2"></i>Real Estate Listings
                    </div>
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
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Newest Ad Views & Saves -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="dashboard-card newest-ads">
                    <div class="card-header">
                        <i class="fas fa-eye me-2"></i>Newest Ad Views & Saves
                    </div>
                    
                    <div class="ad-item">
                        <div class="ad-title">ZION</div>
                        <div class="ad-stats">400 Views | 7 Saves</div>
                    </div>

                    <div class="ad-item">
                        <div class="ad-title">TAXI</div>
                        <div class="ad-stats">100 Views | 50 Saves</div>
                    </div>

                    <div class="ad-item">
                        <div class="ad-title">GRACE</div>
                        <div class="ad-stats">2,000 Views | 100 Saves</div>
                        <div class="ad-location">123 Main Street | Lafayette, NJ</div>
                        <div class="ad-stats">250 Saves</div>
                    </div>
                </div>
            </div>

            <!-- Your Saved Ads & Searches -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="dashboard-card saved-section">
                    <div class="card-header">
                        <i class="fas fa-bookmark me-2"></i>Your Saved Ads & Searches
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-12 text-center mb-3">
                            <h6 class="text-muted">SAVED ADS</h6>
                        </div>
                        <div class="col-4">
                            <div class="saved-item">
                                <div class="saved-icon">
                                    <i class="fas fa-horse"></i>
                                </div>
                                <div class="saved-count">10</div>
                                <div class="saved-label">Horses</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="saved-item">
                                <div class="saved-icon">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="saved-count">1</div>
                                <div class="saved-label">Services</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="saved-item">
                                <div class="saved-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="saved-count">5</div>
                                <div class="saved-label">Real Estate</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center mb-3">
                            <h6 class="text-muted">SAVED SEARCHES</h6>
                        </div>
                        <div class="col-4">
                            <div class="saved-item">
                                <div class="saved-icon">
                                    <i class="fas fa-horse"></i>
                                </div>
                                <div class="saved-count">10</div>
                                <div class="saved-label">Horses<br>• New Search</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="saved-item">
                                <div class="saved-icon">
                                     <i class="fas fa-tools"></i>
                                </div>
                                <div class="saved-count">1</div>
                                <div class="saved-label">Services<br>• New Search</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="saved-item">
                                <div class="saved-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="saved-count">5</div>
                                <div class="saved-label">Real Estate<br>• New Search</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection