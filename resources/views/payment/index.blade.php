
@extends('layouts.app')

@section('content')

<style>
#card-element {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 4px;
    margin: 2px 0 20px;
}
.form-group {
    margin-bottom: 10px;
}

#card-element input[type="text"],
#card-element input[type="tel"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
#card-element .StripeElement {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
#card-errors {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
}
button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}
button[type="submit"]:hover {
    background-color: #0056b3;
}
.form_wrap {
    padding: 30px;
    box-shadow: 0px 0px 30px 0px #00000014;
    border-radius: 20px;
}
.stripe_logo {
    width: 120px;
}

.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.card-body {
    padding: 0 !important;
}
.form-header span {width: auto;}
.form_wrap ::placeholder {
    font-size: 13px;
    font-weight: 500;
}
.form_wrap label {
    font-size: 14px;
    font-weight: 600;
}
section.stripe_form {
    padding: 5% 0;
}
section.stripe_form .btn-primary {
    font-size: 14px;
    font-weight: 500;
    padding: 9px 15px;
    background: #635bff !important;
}
</style>

<?php $page_title_check = "Home"; ?>
<?php $page_check = "home"; ?>
<section class="stripe_form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form_wrap">
                    <div class="form-header text-center col-12 ">
                        <img src="{{ getenv('APP_URL') }}/assets/images/stripe-logo.png" class="stripe_logo"/>
                        <span class="heading26px">${{ $amount }}</span>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ url('charge') }}" method="POST" class="row">
                            @csrf

                            <div class="form-group  col-lg-6">
                                <input type="text"  name="name" class="form-control" required placeholder="Name on card">
                            </div>

                            <div class="form-group col-lg-6">
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                            </div>
                                                    
                            <div class="form-group mb-0 col-12">
                                <label for="card-element">
                                    Credit or Debit Card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="hidden" value="{{ $amount }}" id="amount" name="amount" class="form-control" required>
                                <input type="hidden" value="{{ $code }}" name="code" class="form-control" required>
                                <button type="submit" class="btn btn-primary">Submit Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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