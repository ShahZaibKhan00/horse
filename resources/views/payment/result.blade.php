@extends('layouts.app')

@section('content')
<style>
/**********SUCCESS MESSAGE CSS*/
body.payment header {
    position: unset !important;
}
.check_icon {
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin: 0 auto 25px;
}
.check_icon i {
    font-size: 50px;
}
.success_wrap {
    text-align: center;
    background: #fff;
    border-radius: 20px;
    padding: 60px 20px;
    box-shadow: 0px 0px 30px 0px #0000002b;
}
section.stripe_form {
    height: 100vh;
    align-items: center;
    justify-content: center;
    display: flex;
}
section.stripe_form h2 {
    text-transform: capitalize;
    font-weight: 600;
    color: #000;
}
.error_wrap .prime_btn {
    margin-top: 20px;
}
/**********SUCCESS MESSAGE CSS*/
</style>
<?php $page_title_check = "Payment"; ?>
<?php $page_check = "payment"; ?>
<!--<section class="aboutBanner inner_page_banner">
	<div class="container-fluid">
		<div class="title_wrap text-center">
			<span class=" heading60px txtColor">Make a Payment</span>
		</div>
	</div>
</section>-->
<section class="stripe_form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form_wrap">
                    <div class="card-body">
                      @if(session('success'))
                        <div class="success_wrap">
                              <div class="check_icon alert-success"><i class="fa fa-check" aria-hidden="true"></i></div>
                              <h2>{{ session('success') }}</h2>
                              <p>Your Booking History is in your dashboard.</p>
                              <a href="{{url('booking_queries')}}" class="prime_btn">Back to Dashboard</a>
                          </div>    
                      @endif
                      

                      @if(session('error'))
                          <div class="success_wrap error_wrap">
                              <div class="check_icon alert-danger"><i class="fa fa-times" aria-hidden="true"></i></div>
                              <h2>{{ session('error') }}</h2>
                              <a href="{{url('booking_queries')}}" class="prime_btn">Back to Dashboard</a>
                          </div>
                      @endif
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Include Stripe.js and set the Stripe API key -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Set the Stripe API key from .env
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Create an instance of the card Element.
    var card = elements.create('card');

    // Add an instance of the card Element into the `card-element` div.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Create a token when the form is submitted.
    var form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server.
        var form = document.querySelector('form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form.
        form.submit();
    }
</script>
@endsection
