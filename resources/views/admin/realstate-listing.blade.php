@extends('layouts.user_app')

@section('content')
    <style>
        .top__bar {
            padding: 35px 10px 5px 10px;
        }

        .top__bar h2 {
            font-size: 24px;
        }

        .cell {
            font-size: 15px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .bid-panel .button {
            padding: 10px 5px;
            font-size: 14px;
            font-weight: 700;
        }

        .solid-style:hover {
            color: #fff;
        }

        .bid-amount {
            font-size: 30px;
            font-weight: 700;
            text-transform: uppercase;
        }
    </style>
    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Real Estate Listings</h2>
            <a href="#!" class="points_btn">
                <img src="assets/images/points_icon.png" alt="" class="img-fluid mb-2">
                Show Points
            </a>
        </div>
        <div class="inner_content_wrapper">
            <div class="user_search_bar">
                <div class="user_search_box">
                    <input type="search" placeholder="Search by name">
                    <img src="assets/images/search.png" alt="" class="search_icon">
                </div>
                <div class="custom_tabs">
                    @if (!empty($data) && $data->created_at < \Carbon\Carbon::parse($data->created_at)->addMonth())
                        <a href="{{ route('add_realstate') }}" class="custom_tab_btn custom_tab_btn_one">Create New Real Estate AD</a>
                    @else
                        <a href="javascript:;" class="custom_tab_btn custom_tab_btn_one" data-bs-toggle="modal" data-bs-target="#packageWarningModal">Create New Real Estate AD</a>
                    @endif
                    <a href="#!" class="custom_tab_btn_min active" data-tab="all">All</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="active">Active</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="sold">Sold</a>
                    <a href="#!" class="custom_tab_btn_min" data-tab="withdrawn">Withdrawn</a>
                </div>
            </div>
            <div class="tab_content_wrapper">
                <div class="tab_content active" id="all">
                    <div class="row gy-4">
                        @foreach ($plans as $state)
                            <div class="col-md-3">
                                <div class="user_gen_card_one">
                                    <div class="top__bar">
                                        @php
                                            // Original value
                                            $location = $state->real_location;

                                            // Step 1: Agar value me bracket me abbreviation ha, to usko extract kro
                                            if (preg_match('/\(([^)]+)\)/', $location, $match)) {
                                                $displayLocation = trim($match[1]); // sirf bracket ke andar wali value
                                            } else {
                                                $displayLocation = ''; // agar nahi ha to empty
                                            }
                                        @endphp
                                        <h2>{{ $state->real_title }}, {{ $displayLocation }}</h2>
                                        <p class="user_tag">For Sale</p>

                                    </div>
                                    @php
                                        $images = !empty($state->gallery_imgs) ? json_decode($state->gallery_imgs, true) : [];
                                    @endphp
                                    <div class="user_img_box">
                                        <div class="swiper user_card_slider">
                                            <div class="swiper-wrapper">
                                                @foreach ($images as $image)
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('Gallery_imgs/' . $image) }}" alt="" class="img-fluid">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="user_card_slider_arrows">
                                            <button class="user_arrow_left"><img src="assets/images/arrow_lf8.png" alt=""></button>
                                            <button class="user_arrow_right"><img src="assets/images/arrow_ri8.png" alt=""></button>
                                        </div>
                                        {{-- <div class="countdown_user_timer" data-end-time="2025-12-31T23:59:59">
                                            <h5>
                                                <span class="days">1</span> Days |
                                                <span class="hours">0</span> Hrs |
                                                <span class="minutes">0</span> Mins |
                                                <span class="seconds">0</span> Secs
                                            </h5>
                                            <h6>TILL END OF AUCTIONS</h6>
                                        </div> --}}
                                    </div>
                                    <div class="user_card_info_box">
                                        <div class="cell_container">
                                            <div class="cell"><span class="me-3"><img src="assets/images/estate_icon_1.png" alt=""></span>{{ $state->real_acres }} Acres
                                            </div>
                                            <div class="cell"><span class="me-3"><img src="assets/images/estate_icon_2.png" alt=""></span>{{ $state->real_bathroom }} Bathrooms</div>
                                            <div class="cell"><span class="me-3"><img src="assets/images/estate_icon_3.png" alt=""></span>{{ $state->real_bedroom }} Bedrooms
                                            </div>
                                            <div class="cell"><span class="me-3"><img src="assets/images/estate_icon_4.png" alt=""></span>
                                                {{ $state->num_spaces }} Cars{{ $state->garage_type ? ' | ' . explode(',', $state->garage_type)[0] : '' }}
                                                {{-- {{ $state->num_spaces }} {{ implode(' | ', array_slice(explode(',', $state->garage_type), 0, 2)) }} --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bid-panel">
                                        <div class="bid-header">
                                            <div class="bid-amount">PRICE: {{ $state->real_price }}</div>
                                        </div>
                                        {{-- <button class="button button-full">VIEW ALL DETAILS</button> --}}
                                        <button class="button mb-0">SHARE</button> {{-- second created --}}

                                        <div class="button-row">
                                            {{-- <button class="button">SELLER PROFILE</button>
                                            <button class="button">CHAT WITH SELLER</button> --}}
                                        </div>
                                        <div class="button-row">
                                            {{-- <button class="button mb-0">SHARE</button> --}}
                                            {{-- <button class="button mb-0">FAVORITE <span style="color: #B69455">❤</span></button> --}}
                                        </div>
                                    </div>
                                    <div class="management-panel">
                                        <div class="control-row">
                                            <a href="{{ route('realstate.detail', Crypt::encrypt($state->id)) }}" class="clickable-box solid-style">VIEW DETAILS</a>
                                            <a href="{{ url('/edit_realstate') }}/{{ $state->id }}" class="clickable-box hollow-style">EDIT <span class="edit-symbol"><img src="assets/images/edit.png"
                                                        alt=""></span></a>
                                        </div>
                                        <div class="control-row">
                                            <button class="clickable-box hollow-style" data-bs-toggle="modal" data-bs-target="#exampleModalSold-{{ $state->id }}">Mark Sold</button>
                                            <button class="clickable-box hollow-style withdraw_btn" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $state->id }}">Mark withdrawn</button>
                                        </div>
                                        <div class="analytics-bar">
                                            <div class="data-point">Views: 250</div>
                                            <div class="data-point">Saves: 25</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModalSold-{{ $state->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal_content">
                                            <div class="horse-form">
                                                <form action="{{ route('real.markAsSold', $state->id) }}" method="POST">
                                                    @csrf
                                                    <div class="horse-container">
                                                        <h1 class="title">Please let us know whether your horse sold or if you are withdrawing it.</h1>

                                                        <div class="info-section">
                                                            <ul>
                                                                <li>If <strong>SOLD</strong>, check <strong>"Horse Sold"</strong> and enter the <strong>sale
                                                                        price</strong>.</li>
                                                            </ul>
                                                        </div>

                                                        <p class="warning-text">Submitting will immediately end your ad subscription and stop future billing.
                                                        </p>

                                                        <p class="description-text">Providing a sale price allows your horse to be used as a comparable on our
                                                            sales page, helping other sellers price their horses accurately. Thank you for choosing Horse Action
                                                            Network!</p>

                                                        <div class="sale-price" id="salePrice">
                                                            <label>Sold Price:</label>
                                                            <input type="text" name="sold_price" placeholder="Enter price" class="thousand_separator" required>
                                                        </div>

                                                        <div class="button-container mt-3">
                                                            <button type="button" class="btn btn-secondary btn-cancel">Cancel</button>
                                                            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- WIdra --}}
                            <div class="modal fade" id="exampleModal-{{ $state->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal_content">
                                            <div class="horse-form">
                                                {{-- <div class="horse-container">
                                                    <h1 class="title">Please let us know whether your horse sold or if you are withdrawing it.</h1>

                                                    <div class="info-section">
                                                        <ul>
                                                            <li>If <strong>SOLD</strong>, check <strong>"Horse Sold"</strong> and enter the <strong>sale
                                                                    price</strong>.</li>
                                                            <li>If <strong>withdrawing</strong>, check <strong>"withdraw"</strong> and ender a reason.</li>
                                                        </ul>
                                                    </div>

                                                    <p class="warning-text">Submitting will immediately end your ad subscription and stop future billing.
                                                    </p>

                                                    <p class="description-text">Providing a sale price allows your horse to be used as a comparable on our
                                                        sales page, helping other sellers price their horses accurately. Thank you for choosing Horse Action
                                                        Network!</p>

                                                    <div class="form-group" id="withdrawReason">
                                                        <label for="reasonSelect">Withdraw Reason:</label>
                                                        <select id="reasonSelect" name="reason" required>
                                                            <option value="" selected disabled>SELECT A REASON FROM DROPDOWN</option>
                                                            <option value=""> Seller decided to keep</option>
                                                            <option value="">Seasonal timing (withdrawing until show record updates, competition season, or
                                                                better market window)</option>
                                                            <option value="">Withdrawn for veterinary reasons (health/soundness concern or needs rest)
                                                            </option>
                                                            <option value="">Withdrawal due to training or conditioning needs</option>
                                                            <option value="">Rather not say</option>
                                                        </select>
                                                    </div>

                                                    <div class="button-container">
                                                        <button class="btn-cancel">Cancel</button>
                                                        <button class="btn-submit">Submit</button>
                                                    </div>
                                                </div> --}}
                                                <form action="{{ route('real.realstateStatus', $state->id) }}" method="POST">
                                                    @csrf

                                                    <div class="horse-container">
                                                        <h1 class="title">Please let us know whether your horse sold or if you are withdrawing it.</h1>

                                                        <div class="info-section">
                                                            <ul>
                                                                <li>If <strong>withdrawing</strong>, check <strong>"Withdraw"</strong> and enter a reason.</li>
                                                            </ul>
                                                        </div>

                                                        <p class="warning-text">
                                                            Submitting will immediately end your ad subscription and stop future billing.
                                                        </p>

                                                        <p class="description-text">
                                                            Providing a sale price allows your horse to be used as a comparable on our sales page, helping other sellers price their horses accurately.
                                                            Thank you for choosing Horse Action Network!
                                                        </p>

                                                        <div class="form-group" id="withdrawReason">
                                                            <label for="reasonSelect">Withdraw Reason:</label>
                                                            <select id="reasonSelect" name="reason" class="form-control" required>
                                                                <option value="" selected disabled>SELECT A REASON FROM DROPDOWN</option>
                                                                <option value="Seller decided to keep">Seller decided to keep</option>
                                                                <option value="Seasonal timing (withdrawing until show record updates, competition season, or better market window)">Seasonal timing
                                                                    (withdrawing until show record updates, competition season, or better market window)
                                                                </option>
                                                                <option value="Withdrawn for veterinary reasons (health/soundness concern or needs rest)">Withdrawn for veterinary reasons
                                                                    (health/soundness concern or needs rest)</option>
                                                                <option value="Withdrawal due to training or conditioning needs">Withdrawal due to training or conditioning needs</option>
                                                                <option value="Rather not say">Rather not say</option>
                                                            </select>
                                                        </div>

                                                        <div class="button-container mt-3">
                                                            <button type="button" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                            <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="custome_popup" id="customModal">
                                <div class="modal_content">
                                    <div class="horse-form">
                                        <div class="horse-container">
                                            <h1 class="title">Please let us know whether your horse sold or if you are withdrawing it.</h1>

                                            <div class="info-section">
                                                <ul>
                                                    <li>If <strong>SOLD</strong>, check <strong>"Horse Sold"</strong> and enter the <strong>sale
                                                            price</strong>.</li>
                                                    <li>If <strong>withdrawing</strong>, check <strong>"withdraw"</strong> and ender a reason.</li>
                                                </ul>
                                            </div>

                                            <p class="warning-text">Submitting will immediately end your ad subscription and stop future billing.
                                            </p>

                                            <p class="description-text">Providing a sale price allows your horse to be used as a comparable on our
                                                sales page, helping other sellers price their horses accurately. Thank you for choosing Horse Action
                                                Network!</p>

                                            <div class="options-container">
                                                <div class="option">
                                                    <label for="horseSold">Horse Sold</label>
                                                    <input type="radio" id="horseSold" name="action" value="sold">
                                                </div>
                                                <div class="option">
                                                    <label for="withdraw">Withdraw</label>
                                                    <input type="radio" id="withdraw" name="action" value="withdraw" checked>
                                                </div>
                                            </div>

                                            <div class="sale-price" id="salePrice">
                                                <label>Sold Price:</label>
                                                <input type="text" placeholder="Enter price" class="thousand_separator">
                                            </div>

                                            <div class="form-group" id="withdrawReason">
                                                <label for="reasonSelect">Withdraw Reason:</label>
                                                <select id="reasonSelect">
                                                    <option value="" selected disabled>SELECT A REASON FROM DROPDOWN</option>
                                                    <option value=""> Seller decided to keep</option>
                                                    <option value="">Seasonal timing (withdrawing until show record updates, competition season, or
                                                        better market window)</option>
                                                    <option value="">Withdrawn for veterinary reasons (health/soundness concern or needs rest)
                                                    </option>
                                                    <option value="">Withdrawal due to training or conditioning needs</option>
                                                    <option value="">Rather not say</option>
                                                </select>
                                            </div>

                                            <div class="button-container">
                                                <button class="btn-cancel">Cancel</button>
                                                <button class="btn-submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
