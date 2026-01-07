@extends('layouts.user_app')

@section('content')
    <div class="user_main_content">
        <div class="dark_bar">
            <h2>Horse Listings</h2>
            <a href="#!" class="points_btn">
                <img src="assets/front/images/points_icon.png" alt="" class="img-fluid mb-2">
                Show Points
            </a>
        </div>
        <div class="inner_content_wrapper">
            <div class="dashboard-container-chat">
                <div class="top-section">
                    <div class="subscription-info-box">
                        <h2>Current Subscription</h2>
                        <div class="subscription-details">
                            <div class="detail-row">
                                <strong>Plan:</strong>
                            </div>
                            <div class="detail-row">
                                {{ $plans[0]->package_name ?? 'N/A' }}
                            </div>
                            <div class="detail-row">
                                <strong>Price:</strong> ${{ isset($plans[0]->package_price) ? number_format($plans[0]->package_price, 2) : 'N/A' }} per month
                            </div>
                            <div class="detail-row">
                                <strong>Status:</strong> <span class="status-badge">
                                    @if (isset($plan[0]->status) == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </span>
                            </div>
                            <div class="detail-row">
                                <strong>Active Ads:</strong>{{ data_get($plans, '0.created_at') ? \Carbon\Carbon::parse(data_get($plans, '0.created_at'))->format('F d, Y') : 'N/A' }}

                            </div>
                            <div class="detail-row">
                                <strong>Next Billing:</strong>
                                {{ data_get($plans, '0.created_at') ? \Carbon\Carbon::parse(data_get($plans, '0.created_at'))->addMonth()->format('F d, Y') : 'N/A' }}
                            </div>
                        </div>
                        {{-- <div class="subscription-action-buttons">
                            <button class="action-button action-button-gold">Change Plan</button>
                            <button class="action-button action-button-dark">Update Payment</button>
                        </div> --}}
                    </div>

                    <div class="payment-info-box">
                        <h2>Next Payment</h2>
                        <div class="payment-info-content" style="margin-top: 20px;">
                            <div class="payment-amount">${{ isset($plans[0]->package_price) ? number_format($plans[0]->package_price, 2) : 'N/A' }} <span>due</span></div>
                            <div class="payment-date">
                                {{ data_get($plans, '0.created_at') ? \Carbon\Carbon::parse(data_get($plans, '0.created_at'))->addMonth()->format('F d, Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="history-table-container">
                    <h2>Payment History</h2>
                    <table class="history-table">
                        <thead class="history-table-header">
                            <tr>
                                <th class="history-table-header-cell">Date</th>
                                <th class="history-table-header-cell">Description</th>
                                <th class="history-table-header-cell">Amount</th>
                                <th class="history-table-header-cell">Status</th>
                                <th class="history-table-header-cell">Download Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $item)
                                <tr>
                                    <td class="history-table-cell">{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</td>
                                    <td class="history-table-cell">
                                        {{ isset($item->package_usage) ? "Monthly Subscription - $item->package_usage Ads" : "Monthly Subscription - $item->package_usage Not Found Ads" }}</td>
                                    <td class="history-table-cell">${{ isset($plans[0]->package_price) ? number_format($item->package_price, 2) : 'N/A' }}</td>
                                    <td class="history-table-cell">Paid</td>
                                    <td class="history-table-cell"><a href="#" class="receipt-download-link">Download Receipt</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
