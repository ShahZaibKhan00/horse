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
            <h2>Thank you for Cash Payment! <br> Your Booking Number is <span>{{ $BNcode }}</span></h2>
            <p style="margin-bottom: 20px;">You Pay <span style="color: #e5bf42;">${{ $amount }}</span> To Driver and Now Your Booking Status Updated successfully in your dashboard.</p>
            <a class="button" href="{{ getenv('APP_URL') }}/booking_queries">Go to Dashboard</a>
            <!-- <p class="disclaimer"><span>disclaimer </span>
            -The information transmitted in this e-mail message and attachments, if any, may be  information, including matter that is privileged and/or confidential. The information transmitted herein is intended only for the use of the individual or entity named above and/or to whom it is addressed.  Distribution to, or review by, unauthorized persons is strictly prohibited.  If you have received this transmission in error, please notify us immediately by responsive email or at (tel) (661)346-9915 and permanently delete this transmission a
            nd attachments, if any.
            </p> -->
        </div>
    </body>
</html>