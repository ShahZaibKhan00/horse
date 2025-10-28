<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 50px 20px;
                text-align: center;
                background: #edf2f7;
            }
            .logo {
                max-width: 150px;
                margin-bottom: 20px;
            }
            .button {
                background-color: #007bff;
                color: #ffffff !important;
                text-decoration: none;
                padding: 10px 20px;
                display: inline-block;
                border-radius: 5px;
            }
            .button2 {
                background-color: #007bff;
                color: #ffffff !important;
                text-decoration: none;
                padding: 10px 20px;
                display: inline-block;
                border-radius: 5px;
                margin-right: 10px;
            }
            p.disclaimer {
                font-size: 12px;
                margin-top: 30px;
                color: #000;
            }
            p.disclaimer span {
                font-weight: bold;
            }
            h2 span{
                color: #e5bf42;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img class="logo" src="{{ getenv('APP_URL') }}/assets/images/{{$logo}}" alt="Your Logo">
            <h2>Thank you ! <br> Your Booking Number is <span>{{ $BNcode }}</span></h2>
            <p style="margin-bottom: 20px;">Your Booking Confirmation Has Been Send To Your Email.</p>
            <a class="button2" href="{{ getenv('APP_URL') }}/booking">Return Booking</a>
        </div>
    </body>
</html>