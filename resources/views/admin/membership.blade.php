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
                                {{ $plans[0]->package_name ?? 'No active subscription yet' }}
                            </div>
                            <div class="detail-row">
                                <strong>Price:</strong> ${{ isset($plans[0]->package_price) ? number_format($plans[0]->package_price, 2) : '0.00' }} per month
                            </div>
                            <div class="detail-row">
                                <strong>Status:</strong> <span class="status-badge">
                                    @if (isset($plans[0]->status) && $plans[0]->status == 1)
                                        Active
                                    @else
                                        Not Active
                                    @endif

                                </span>
                            </div>
                            <div class="detail-row">
                                <strong>Remaining Ads:</strong> {{ $plans[0]->remaining_token ?? 'No ads available' }} Ads
                            </div>
                            <div class="detail-row">
                                <strong>Active Ads:</strong>
                                {{-- {{ optional($plans[0])->created_at ? \Carbon\Carbon::parse($plans[0]->created_at)->format('F d, Y') : 'Not started yet' }} --}}
                                {{ optional($plans[0] ?? null)->created_at ? \Carbon\Carbon::parse($plans[0]->created_at)->format('F d, Y') : 'Not started yet' }}

                            </div>
                            <div class="detail-row">
                                <strong>Next Billing:</strong>
                                {{-- {{ optional($plans[0])->created_at ? \Carbon\Carbon::parse($plans[0]->created_at)->addMonth()->format('F d, Y') : 'Billing will start after subscription' }} --}}
                                {{ optional($plans[0] ?? null)->created_at ? \Carbon\Carbon::parse(data_get($plans, '0.created_at'))->addMonth()->format('F d, Y') : 'Billing will start after subscription' }}
                            </div>
                        </div>
                    </div>

                    <div class="payment-info-box">
                        <h2>Payment</h2>
                        <div class="payment-info-content" style="margin-top: 20px;">
                            <div class="payment-amount">{{ isset($plans[0]->package_price) ? '$' . number_format($plans[0]->package_price, 2) : 'No payment' }}
                                <span>due</span>
                            </div>
                            <div class="payment-date">
                                {{ optional($plans[0] ?? null)->created_at ? \Carbon\Carbon::parse(data_get($plans, '0.created_at'))->addMonth()->format('F d, Y') : 'No payment due' }}
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
                            @forelse ($plans as $item)
                                <tr>
                                    <td class="history-table-cell">
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}
                                    </td>
                                    <td class="history-table-cell">
                                        Monthly Subscription -
                                        {{ $item->package_usage ?? 'N/A' }} Ads
                                    </td>
                                    <td class="history-table-cell">
                                        ${{ number_format($item->package_price ?? 0, 2) }}
                                    </td>
                                    <td class="history-table-cell"><strong>Paid</strong></td>
                                    <td class="history-table-cell">
                                        <a href="{{ url('subscription/download/' . encrypt($item->id)) }}" target="_blank" class="receipt-download-link">Download Receipt</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        You don’t have any payment history yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
