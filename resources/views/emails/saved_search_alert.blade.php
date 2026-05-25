<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #e0e0e0;
        }
        .header {
            background-color: #1d2139;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .footer {
            background-color: #f8f9fa;
            color: #777777;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #bf9855;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
        }
        .product-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .details {
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Listing Alert</h1>
        </div>
        <div class="content">
            <p>Dear {{ $user->name }},</p>
            <p>We are excited to inform you that a new horse listing has just been posted that matches your saved search criteria.</p>
            
            @if($product->pro_Fimg)
                <img src="{{ asset('Featured_image/' . $product->pro_Fimg) }}" alt="{{ $product->pro_name }}" class="product-image">
            @endif

            <h2>{{ $product->pro_name }}</h2>
            
            <div class="details">
                <p><strong>Breed:</strong> {{ $product->pro_breed }}</p>
                @if($product->pro_reg_price)
                    <p><strong>Price:</strong> ${{ number_format($product->pro_reg_price) }}</p>
                @endif
                <p><strong>Location:</strong> {{ $product->pro_city }}, {{ $product->pro_state }}</p>
            </div>

            <p style="text-align: center;">
                <a href="{{ url('products_detail/' . $product->pro_sku) }}" class="btn">View Listing Details</a>
            </p>

            <p>Thank you for using Horse Action Network. We hope you find your perfect match!</p>
            <p>Best regards,<br>The Horse Action Network Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Horse Action Network. All rights reserved.</p>
            <p>You are receiving this email because you saved a search on our platform.</p>
        </div>
    </div>
</body>
</html>
