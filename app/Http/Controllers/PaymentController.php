<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Payment;
use App\Models\Booking;
use Stripe\Stripe;
use Stripe\Customer;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $amount = $request->total_amount;
        $code = $request->id;
        return view('payment.index' , compact('Logo' , 'amount' , 'code' , 'Number' , 'Email' , 'Address'));
    }

    public function responce()
    {
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Number = $logoquery->G_number;
        $Email = $logoquery->G_email;
        $Address = $logoquery->G_address;
        $footer_text = $logoquery->GF_text;
        return view('payment.result' , compact('Logo' , 'Number' , 'Email' , 'Address' , 'footer_text'));
    }
    
    // public function charge(Request $request)
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));

    //     try {
    //         // Create a new customer (test mode)
    //         $customer = Customer::create([
    //             'email' => $request->user()->email, // Assuming the user is authenticated
    //             'source' => 'tok_visa', // Use a test card token (tok_visa) for test mode
    //         ]);

    //         // Charge the customer's default source
    //         $charge = \Stripe\Charge::create([
    //             'amount' => $request->amount * 100, // Convert amount to cents
    //             'currency' => 'usd',
    //             'customer' => $customer->id, // Customer ID from Stripe
    //         ]);

    //         // Payment successful
    //         $pay = new Payment;
    //         $pay->pay_name = $request->name;
    //         $pay->pay_email = $request->email;
    //         $pay->pay_amount = $request->amount;
    //         $pay->req_code = $request->code;
    //         $pay->pay_status = "Paid";
    //         $pay->save();
            
    //         $req = Payment::where('req_code', $request->code)->first();
    //         $req->invoice_status = "Paid";
    //         $req->save();

    //         $to = $request->email;
    //         $adminto = "Service.eliteprocessserve@outlook.com";
    //         $subject = 'Payment Successful';

    //         $message = '
    //             <html>
    //                 <head>
    //                     <style>
    //                         /* Define your CSS styles here */
    //                         body {
    //                             font-family: Arial, sans-serif;
    //                         }
    //                         .container {
    //                             max-width: 600px;
    //                             margin: 0 auto;
    //                             padding: 50px 20px;
    //                             text-align: center;
    //                             background: #edf2f7;
    //                         }
    //                         .logo {
    //                             max-width: 150px;
    //                         }
    //                         .button {
    //                             background-color: #007bff;
    //                             color: #ffffff !important;
    //                             text-decoration: none;
    //                             padding: 10px 20px;
    //                             display: inline-block;
    //                             border-radius: 5px;
    //                         }
    //                     </style>
    //                 </head>
    //                 <body>
    //                     <div class="container">
    //                         <img class="logo" src="https://eliteprocessserve.com/assets/images/profile_1694118640.png" alt="Your Logo">
    //                         <h2>Thank you for successful payment</h2>
    //                         <p>Your Project Invoice has been Paid successfully.</p>
    //                         <a class="button" href="https://eliteprocessserve.com/invoices">Go to Dashboard</a>
    //                     </div>
    //                 </body>
    //             </html>
    //         ';

    //         $adminmessage = '
    //             <html>
    //                 <head>
    //                     <style>
    //                         /* Define your CSS styles here */
    //                         body {
    //                             font-family: Arial, sans-serif;
    //                         }
    //                         .container {
    //                             max-width: 600px;
    //                             margin: 0 auto;
    //                             padding: 50px 20px;
    //                             text-align: center;
    //                             background: #edf2f7;
    //                         }
    //                         .logo {
    //                             max-width: 150px;
    //                         }
    //                         .button {
    //                             background-color: #007bff;
    //                             color: #ffffff !important;
    //                             text-decoration: none;
    //                             padding: 10px 20px;
    //                             display: inline-block;
    //                             border-radius: 5px;
    //                         }
    //                     </style>
    //                 </head>
    //                 <body>
    //                     <div class="container">
    //                         <img class="logo" src="https://eliteprocessserve.com/assets/images/profile_1694118640.png" alt="Your Logo">
    //                         <h2>You Have Recived a New Payment</h2>
    //                         <p>New Project Invoice has been Paid successfully.</p>
    //                         <a class="button" href="https://eliteprocessserve.com/invoices">Go to Dashboard</a>
    //                     </div>
    //                 </body>
    //             </html>
    //         ';

    //         $headers = 'MIME-Version: 1.0' . "\r\n";
    //         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //         $headers .= 'From: no-reply@eliteprocessserve.com' . "\r\n" .
    //                 'Reply-To: no-reply@eliteprocessserve.com' . "\r\n" .
    //                 'X-Mailer: PHP/' . phpversion();

    //         mail($to, $subject, $message, $headers);
    //         mail($adminto, $subject, $adminmessage, $headers);

    //         return redirect('/responce')->with('success', 'Payment successful');
    //     } catch (\Stripe\Exception\CardException $e) {
    //         // Handle card error
    //         return redirect('/responce')->with('error', $e->getMessage());
    //     } catch (\Stripe\Exception\StripeException $e) {
    //         // Handle other Stripe API errors
    //         return redirect('/responce')->with('error', $e->getMessage());
    //     }
    // }

    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a new customer
            $customer = Customer::create([
                'email' => $request->user()->email, // Assuming the user is authenticated
                'source' => $request->stripeToken, // Token generated by Stripe Elements
            ]);

            // Charge the customer's default source
            $charge = \Stripe\Charge::create([
                'amount' => $request->amount * 100, // Convert amount to cents
                'currency' => 'usd',
                'customer' => $customer->id, // Customer ID from Stripe
            ]);

            // Payment successful
            $pay = new Payment;
            $pay->pay_name = $request->name;
            $pay->pay_email = $request->email;
            $pay->pay_amount = $request->amount;
            $pay->booking_id = $request->code;
            $pay->pay_status = "Paid";
            $pay->save();
            
            $req = Booking::where('id', $request->code)->first();
            $req->booking_status = "paid";
            $req->save();

            return redirect('/responce')->with('success', 'Payment successful.');
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card error
            return redirect('/payment')->with('error', $e->getMessage());
        } catch (\Stripe\Exception\StripeException $e) {
            // Handle other Stripe API errors
            return redirect('/payment')->with('error', $e->getMessage());
        }
    }
}
