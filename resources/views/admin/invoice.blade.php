<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 40px;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
        }

        .amount {
            font-size: 22px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="invoice-box">
        <div class="header">
            <div>
                <div class="title">{{ getenv('APP_NAME') }}</div>
                <p>
                    Invoice Date: {{ \Carbon\Carbon::parse($plan->created_at)->format('F d, Y') }}<br>
                    Due Date: {{ \Carbon\Carbon::parse($plan->created_at)->addMonth()->format('F d, Y') ?? 'N/A' }}<br>
                    {{-- Invoice #: INV-2026-0209 --}}
                </p>
            </div>
            <div class="amount">
                @if (is_numeric($plan->package_price ?? null))
                    {{ number_format((float) $plan->package_price, 2) }} Due
                @else
                    {{ $plan->package_price ?? '0.00' }}
                @endif
                {{-- {{ number_format($plan->package_price, 2) ?? 'N/A' }} Due --}}
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Billing Period</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $plan->package_name ?? 'N/A' }}</td>
                    <td>Monthly</td>
                    <td>
                        {{-- ${{ number_format($plan->package_price, 2) ?? 'N/A' }} --}}
                        @if (is_numeric($plan->package_price ?? null))
                            ${{ number_format((float) $plan->package_price, 2) }}
                        @else
                            {{ $plan->package_price ?? '0.00' }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            Total Due: $
            {{-- {{ number_format($plan->package_price, 2) ?? 'N/A' }}  --}}
            @if (is_numeric($plan->package_price ?? null))
                ${{ number_format((float) $plan->package_price, 2) }} USD
            @else
                {{ $plan->package_price ?? '0.00' }}
            @endif
        </div>

        <div class="footer">
            This invoice reflects your active subscription. Payment is due by the date listed above.
        </div>
    </div>

</body>

</html>
