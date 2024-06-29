<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Include Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <div class="container">
        <h2>Complete Your Purchase</h2>
        <form id="payment-form" action="{{ route('processPayment') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product_id }}">
            <input type="hidden" name="quantity" value="{{ $quantity }}">
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="currency" value="{{ $currency }}">
            <input type="hidden" name="venue_id" value="{{ $venue_id }}">

            <div class="form-row">
                <label for="card-element">
                    Credit or debit card
                </label>
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button type="submit" id="submit-button">Submit Payment</button>
        </form>
    </div>

    <script>
        // Create a Stripe client.
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', { style: style });

        // Add an instance of the card Element into the `card-element` <div>.
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

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // Disable the submit button to prevent multiple submissions
            document.getElementById('submit-button').disabled = true;

            // Create payment intent on the server and get client secret
            fetch('/create-payment-intent', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    amount: '{{ $amount }}', // amount in cents
                    currency: '{{ $currency }}',
                }),
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                var clientSecret = data.clientSecret;

                // Confirm the card payment with Stripe.js
                return stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: 'Customer Name' // Replace with actual customer name if available
                        }
                    }
                });
            })
            .then(function(result) {
                if (result.error) {
                    // Show error to your customer (e.g., insufficient funds)
                    var displayError = document.getElementById('card-errors');
                    displayError.textContent = result.error.message;
                    // Re-enable the submit button
                    document.getElementById('submit-button').disabled = false;
                } else {
                    // The payment has been processed!
                    if (result.paymentIntent.status === 'succeeded') {
                        // Submit the form
                        form.submit();
                    }
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
                // Re-enable the submit button
                document.getElementById('submit-button').disabled = false;
            });
        });
    </script>
</body>
</html>
