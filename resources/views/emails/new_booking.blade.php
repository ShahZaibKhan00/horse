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
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img class="logo" src="{{ getenv('APP_URL') }}/assets/images/{{$logo}}" alt="Your Logo">
            <h2>Thank you ! <br> Your Booking Number is <span>{{ $BNcode }}</span></h2>
            <p style="margin-bottom: 20px;">Your Booking has been created successfully in your dashboard.</p>

            <table>
                <thead>
                    <tr>
                        <th>Attribute</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataquery as $data)
                        <tr>
                            <td>Customer Name</td>
                            <td>{{ $data->customer_name }}</td>
                        </tr>
                        <tr>
                            <td>Customer Email</td>
                            <td>{{ $data->customer_email }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $data->customer_num }}</td>
                        </tr>
                        <tr>
                            <td>Number of Luggage</td>
                            <td>{{ $data->luggage_count }}</td>
                        </tr>
                        <tr>
                            <td>Number of Passanger</td>
                            <td>{{ $data->num_travellers }}</td>
                        </tr>
                        <tr>
                            <td>Pickup Date</td>
                            <td>{{ $data->pickup_date }}</td>
                        </tr>
                        <tr>
                            <td>Pickup Time</td>
                            <td>{{ $data->pickup_time }}</td>
                        </tr>
                        @if($data->to_from == 'airport-to-city')
                        <tr>
                            <td>From</td>
                            <td>{{ $data->Airport }} ( {{ $data->Airport_Sname }} )</td>
                        </tr>
                        <tr>
                            <td>To</td>
                            <td>{{ $data->City }}</td>
                        </tr>
                        @endif
                        @if($data->to_from == 'city-to-airport')
                        <tr>
                            <td>From</td>
                            <td>{{ $data->City }}</td>
                        </tr>
                        <tr>
                            <td>To</td>
                            <td>{{ $data->Airport }} <span style="font-size: 10px;">( {{ $data->Airport_Sname }} )</span></td>
                        </tr>
                        @endif
                        <tr>
                            <td>Customer Address</td>
                            <td>{{ $data->customer_address }}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>${{ $data->Amount }}</td>
                        </tr>
                        <tr>
                            <td>Extra Charges <span style="font-size: 10px;">(Above 5 Passangers Charges)</span></td>
                            <td>{{ $data->extra_charges }}</td>
                        </tr>
                        <tr>
                            <td>Late Night Charges <span style="font-size: 10px;">(10pm to 5am Charges)</span></td>
                            <td>{{ $data->LateNight_charges }}</td>
                        </tr>
                        <tr>
                            <td>Driver Tip</td>
                            @if($data->driver_tip)
                            <td>${{ $data->driver_tip }}</td>
                            @else
                            <td>$0.00</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Spacial Seat Name</td>
                            @if($data->spacial_seat_name)
                            <td>{{ $data->spacial_seat_name }}</td>
                            @else
                            <td>Customer Not filled</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Spacial Seat Quantity</td>
                            @if($data->spacial_seat_quantity)
                            <td>{{ $data->spacial_seat_quantity }}</td>
                            @else
                            <td>Customer Not filled</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Car Name</td>
                            <td>{{ $data->Car_name }}</td>
                        </tr>
                        @if($data->airline_name)
                        <tr>
                            <td class="text-800">Airline Name</td>
                            <td class="text-800">{{ $data->airline_name }}</td>
                        </tr>
                        <tr>
                            <td class="text-800">Flight Number</td>
                            <td class="text-800">{{ $data->airline_number }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td class="text-800">Payment Type</td>
                            <td class="text-800">{{ $data->Payment_type }}</td>
                        </tr>
                        <tr>
                            <td class="text-800">Booking Number</td>
                            <td class="text-800">{{ $data->booking_num }}</td>
                        </tr>
                        @if ($data->booking_status == "unpaid")
                        <tr>
                            <td>Booking Status</td>
                            <td>Unpaid</td>
                        </tr>
                        @endif
                        @if ($data->booking_status == "paid")
                        <tr>
                            <td>Booking Status</td>
                            <td>Paid</td>
                        </tr>
                        @endif
                        <tr>
                            <td class="text-800">Total Amount</td>
                            <td class="text-800">${{ $data->Total_Amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="button2" href="{{ getenv('APP_URL') }}/booking">Return Booking</a>
            <a class="button" href="{{ getenv('APP_URL') }}/booking_queries">Go to Dashboard</a>
            <!-- <p class="disclaimer"><span>disclaimer </span>
            -The information transmitted in this e-mail message and attachments, if any, may be  information, including matter that is privileged and/or confidential. The information transmitted herein is intended only for the use of the individual or entity named above and/or to whom it is addressed.  Distribution to, or review by, unauthorized persons is strictly prohibited.  If you have received this transmission in error, please notify us immediately by responsive email or at (tel) (661)346-9915 and permanently delete this transmission a
            nd attachments, if any.
            </p> -->
        </div>
    </body>
</html>