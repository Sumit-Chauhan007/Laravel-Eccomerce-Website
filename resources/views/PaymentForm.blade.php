<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
            color: #242424;
            font-weight: 600;
        }

        #wrapper {
            display: table;
            table-layout: fixed;
            width: 100%;
            height: 100vh;
        }

        .container1 {
            float: none;
            display: table-cell;
            vertical-align: top;
            width: 33.333%;
            color: white !important;
        }

        .banner_bg_main {
            width: 100%;
            float: left;
            background: linear-gradient(to right, #ffbf5a, #ff9422);
            height: auto;
        }

        .checkout p,
        .checkout i {
            margin-top: 1% !important;
        }

        .container2 {
            float: none;
            display: table-cell;
            vertical-align: top;
            width: 66.666%;
        }

        .order {
            width: 100%;
            height: auto;
            margin: 0 auto;

        }

        .order h2 {
            font-size: 22px;
            text-align: center;
            margin-bottom: 10px;
        }

        h4.ship {
            margin: 20px 0 0;
            /* background-color: #fff695;
            padding: 6px 10px; */
        }

        .item {
            width: 100%;
            height: auto;
            background-color: white;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
            overflow: hidden;
            position: relative;
            padding: 10px;
            display: flex;
        }

        .item:last-of-type {
            margin-bottom: 0;
        }

        .item img {
            float: left;
            margin-right: 3%;
        }

        .item .info {
            padding: 10px;
        }

        .item .quantity {
            font-size: 0.8em;
        }

        .item .price {
            background-color: #3FB158;
            position: absolute;
            padding: 1% 2%;
            color: white;
            bottom: 10px;
            right: 10px;
        }

        hr {
            border-top: 1px solid #0000003b;
        }

        .ship,
        .total {
            text-align: right;
        }

        .total {
            font-size: 1.5em;
            margin: 20px 0 0;
        }

        .checkout {
            width: 100%;
            margin: 0 auto;
        }

        .checkout p {
            display: inline-flex;
            flex-direction: row;
            margin-right: 4%;
        }

        .checkout p,
        .checkout i {
            font-size: 1.6em;
        }

        .checkout i {
            margin-right: 4%;
        }

        .checkout .tab_box p:last-child,
        .checkout .tab_box p:nth-last-child(2) {
            opacity: 0.5;
        }

        .payment {
            background-color: white;
            width: 100%;
            height: auto;
            border: 1px solid #ccc;
            margin-top: 3.8%;
        }

        .infos {
            width: 50%;
            padding: 3% 5% 0 5%;
        }

        .infos h2 {
            color: #ea6153;
            font-size: 1.8em;
            margin-bottom: 10%;
        }

        .visa,
        .mastercard,
        .paypal {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            width: 25%;
            height: auto;
            background-color: white;
            cursor: pointer;
            margin-right: 5%;
            margin-bottom: 10%;
        }

        .mastercard,
        .paypal {
            opacity: 0.5;
            transition: 0.3s ease-in-out;
        }

        .mastercard:hover,
        .paypal:hover {
            opacity: 1;
        }

        .paypal {
            margin-right: 0;
        }

        .title {
            color: #242424 !important;
            opacity: 1 !important;
            font-size: 1em !important;
        }

        input,
        select {
            border: none;
            padding: 2%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            margin-top: 2%;
        }

        input:focus,
        select:focus {
            outline: none;
        }

        .number {
            width: 20%;
            margin-right: 5.3%;
            margin-bottom: 10%;
        }

        .number:last-of-type {
            margin-right: 0;
        }

        .cardHolderName {
            margin-bottom: 10%;
        }

        .cardHolderName input {
            width: 100%;
        }

        select {
            margin-right: 2%;
        }

        select:last-of-type {
            margin-right: 0;
        }

        .expiration,
        .security {
            margin-bottom: 10%;
        }

        .security input {
            width: 25%;
        }



        button:hover {
            background-color: #C64F46;
            color: white;
        }

        .Paymenttabs {
            color: grey;
        }

        /*Form  *************************************************************************************/
        .field {
            width: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid var(--color-lighter-gray);
            padding: .5rem;
            border-radius: .25rem;
        }

        .field__label {
            color: var(--color-gray);
            font-size: 0.6rem;
            font-weight: 300;
            text-transform: uppercase;
            margin-bottom: 0.25rem
        }

        .field__input {
            padding: 0;
            margin: 0;
            border: 0;
            outline: 0;
            font-weight: bold;
            font-size: 1rem;
            width: 100%;
            -webkit-appearance: none;
            appearance: none;
            background-color: transparent;
        }


        .fields {
            display: grid;
            grid-gap: 1rem;
        }

        .content {
            /* background-image: url(https://image.freepik.com/free-photo/credit-finance-business-girl-debit-female-card_121-15721.jpg);
            background-repeat: no-repeat;
            background-size: contain;
            background-origin: content-box;
            background-position: right bottom;
            background-size: 50%; */
        }

        .content_payment {
            background-image: url('boy.png');
            background-repeat: no-repeat;
            background-size: contain;
            background-origin: content-box;
            background-position: left bottom;
            background-size: 301px;
            text-align: right;
        }

        .content_payment #payment-form {
            width: 68%;
            display: inline-flex;
            padding: 20px;
            min-height: 225px;
            flex-direction: column;
            justify-content: center;
        }

        .content_payment #payment-form .card-body {
            flex: inherit;
        }

        .content_payment #payment-form .card-body {
            flex: inherit;
        }

        .fields--2 {
            grid-template-columns: 1fr 1fr;
        }

        .fields--3 {
            grid-template-columns: 1fr 1fr 1fr;
        }

        button {
            background-color: #000;
            text-transform: uppercase;
            font-size: 0.8rem;
            font-weight: 600;
            display: block;
            color: #fff;
            width: 100%;
            padding: 1rem;
            border-radius: 0.25rem;
            border: 0;
            cursor: pointer;
            outline: 0;
        }

        button:focus-visible {
            background-color: #333;
        }

        .calculator_box {
            padding: 30px;
            border-radius: 10px;
            position: sticky;
            top: 20px;
            background-image: radial-gradient(#f1bc56 50%, #c39605);
        }

        .shippingForm_box .checkout form .payment {
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fcfcfc;
        }

        body {
            overflow-x: unset;
        }
    </style>
</head>

<body>


    <div id="wrapper" class="shipping_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-xs-12">
                    <div class="calculator_box">
                        <div class="order">
                            <h2>Your order summary</h2>

                            @foreach ($itemData as $Data)
                                <div class="item">
                                    <?php
                                    $record = DB::table('items')
                                        ->select('*')
                                        ->where('uuid', $Data['uuid'])
                                        ->first();
                                    ?>
                                    {{-- @foreach ($record as $Records) --}}
                                    <a href="/BuyNow/{{ $Data['uuid'] }}">
                                        <img width="80" src='ItemImage/{{ $record->Image }}' alt=''>
                                        <div class="info">
                                    </a>

                                    <h4>{{ $record->Name }}</h4>
                                    <p class="quantity">Quantity: {{ $Data['quantity'] }}</p>
                                    @if ($Data['item_size'] != ' ')
                                        <p class="quantity">Size: {{ $Data['item_size'] }}</p>
                                    @else
                                        <p class="quantity"> </p>
                                    @endif
                                    <p class="price">Rs.{{ $record->Price }}</p>
                                    {{-- @endforeach --}}
                                </div> <!-- .info -->
                        </div> <!-- .item -->
                        @endforeach
                        <h4 class="ship">Shipping: FREE</h4>
                        <hr>
                        <h3 class="total">TOTAL: {{ $total }}</h3>
                    </div> <!-- .order -->
                </div>
            </div> <!-- .container1 -->

            <div class="col-xl-8 col-xs-12">
                <div class="shippingForm_box">
                    <div class="checkout">
                        <div class="tab_box">
                            <p><i class="fa fa-check-circle"></i>Shipping</p>
                            <p><i class="fa fa-check-circle"></i>Checkout</p>
                            <p><i class="fa fa-check-circle"></i>Confirmation</p>

                            <div class="payment">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link Paymenttabs active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home-tab-pane" type="button" role="tab"
                                            aria-controls="home-tab-pane" aria-selected="true">Cash On Delivery</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link Paymenttabs" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                                            aria-controls="profile-tab-pane" aria-selected="false">Online</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                        aria-labelledby="home-tab" tabindex="0">
                                        <div class="payment-option" style="padding: 10px 30px 0">
                                            <div class="payment-details">
                                                <p><strong>Payment Terms and Conditions:</strong></p>
                                                <ul>
                                                    <li>Payment amount: <span class="payment-amount">$50</span></li>
                                                    <li>Payment due date: <span class="payment-due-date">On
                                                            delivery</span>
                                                    </li>
                                                    <li>Late payment fees: <span class="late-payment-fees">None</span>
                                                    </li>
                                                </ul>
                                                <p><strong>Delivery Information:</strong></p>
                                                <ul>
                                                    <li>Expected delivery time: <span class="delivery-time">3-5 business
                                                            days</span>
                                                    </li>
                                                    <li>Delivery charges: <span class="delivery-charges">Free</span>
                                                    </li>
                                                    <li>Delivery restrictions: <span
                                                            class="delivery-restrictions">None</span></li>
                                                </ul>
                                                <p><strong>Payment Confirmation:</strong></p>
                                                <ul>
                                                    <li>Confirmation message: <span class="confirmation-message">We will
                                                            send you a
                                                            confirmation message when your payment is received and
                                                            processed.</span>
                                                    </li>
                                                </ul>
                                                <p><strong>Contact Information:</strong></p>
                                                <ul>
                                                    <li>Email: <a
                                                            href="mailto:sumitchn007@gmail.com">sumitchn007@gmail.com</a>
                                                    </li>
                                                    <li>Phone: <a href="tel:+8278862195">+91 8278862195</a></li>
                                                </ul>
                                                <p><strong>Refund Policy:</strong></p>
                                                <ul>
                                                    <li>Refund processing time: <span class="refund-processing-time">3-5
                                                            business
                                                            days</span></li>
                                                    <li>Conditions for refunds: <span class="refund-conditions">Refunds
                                                            will
                                                            be issued
                                                            for defective products only.</span></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div align="center"> <a href="/OrderPlace" align="center"><button
                                                    class="button " style="margin-top: 30px ">checkout</button></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                        aria-labelledby="profile-tab" tabindex="0">
                                        <div class="content_payment">
                                            {{-- sttripe --}}
                                            @php
                                                $stripe_key = 'pk_test_51N4Ia5SJ1UYNZRihdQIIfzZb05pMLX1ezs0n2umyWxHxiKcsK2GLUTdl36Bp8exdpzZT6KaLILHw3MSeI5UxcTfi00D6MkmhIE';
                                            @endphp
                                            <form action="{{ url('payment-done') }}" method="post" id="payment-form">
                                                @csrf
                                                <input type="hidden" name="trans_id" value="{{ $trans_id }}"
                                                    id="">
                                                <div class="card-body">
                                                    <div id="card-element">
                                                        <input type="text" name="HolderName" id="">
                                                    </div>
                                                    <!-- Used to display form errors. -->
                                                    <div id="card-errors" role="alert"></div>
                                                    <input type="hidden" name="plan" value="" />
                                                </div>

                                                <div class="card-footer">
                                                    <button id="card-button" class="button"
                                                        data-secret="{{ $intent }}"> Pay
                                                    </button>
                                                </div>
                                            </form>

                                            <script src="https://js.stripe.com/v3/"></script>
                                            <script>
                                                // Custom styling can be passed to options when creating an Element.
                                                // (Note that this demo uses a wider set of styles than the guide below.)

                                                var style = {
                                                    base: {
                                                        color: '#32325d',
                                                        lineHeight: '18px',
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

                                                const stripe = Stripe('{{ $stripe_key }}', {
                                                    locale: 'en'
                                                }); // Create a Stripe client.
                                                const elements = stripe.elements(); // Create an instance of Elements.
                                                const cardElement = elements.create('card', {
                                                    style: style
                                                }); // Create an instance of the card Element.
                                                const cardButton = document.getElementById('card-button');
                                                const clientSecret = cardButton.dataset.secret;

                                                cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

                                                // Handle real-time validation errors from the card Element.
                                                cardElement.addEventListener('change', function(event) {
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

                                                    stripe.handleCardPayment(clientSecret, cardElement, {
                                                            payment_method_data: {
                                                                //billing_details: { name: cardHolderName.value }
                                                            }
                                                        })
                                                        .then(function(result) {
                                                            console.log(result);
                                                            if (result.error) {
                                                                // Inform the user if there was an error.
                                                                var errorElement = document.getElementById('card-errors');
                                                                errorElement.textContent = result.error.message;
                                                            } else {
                                                                console.log(result);
                                                                form.submit();
                                                            }
                                                        });
                                                });
                                            </script>
                                            {{-- sttripe code ends --}}
                                            {{-- <div class="infos">
                                                <div class="method">
                                                    <h2>Choose a payment method</h2>
                                                    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/visa.png'
                                                        alt='' class="visa">
                                                    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/mastercard.png'
                                                        alt='' class="mastercard">
                                                    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1978060/paypal.png'
                                                        alt='' class="paypal">
                                                </div> <!-- .method -->
                                                <div class="cardNumber">
                                                    <p class="title">Credit card number</p><br>
                                                    <input type="text" class="number">
                                                    <input type="text" class="number">
                                                    <input type="text" class="number">
                                                    <input type="text" class="number">
                                                </div> <!-- .cardNumber -->
                                                <div class="cardHolderName">
                                                    <p class="title">Card holder name</p>
                                                    <input type="text">
                                                </div> <!-- cardHolderName -->
                                                <div class="expiration">
                                                    <p class="title">Expiration date</p>
                                                    <select style="padding-right: 37px;">
                                                        <option>Month</option>
                                                        <option>01</option>
                                                        <option>02</option>
                                                        <option>03</option>
                                                    </select>
                                                    <select style="padding-right: 37px;">
                                                        <option>Year</option>
                                                        <option>2019</option>
                                                        <option>2020</option>
                                                        <option>2021</option>
                                                    </select>
                                                </div> <!-- .expiration -->
                                                <div class="security">
                                                    <p class="title">Security</p>
                                                    <input type="text">
                                                </div><!-- .security -->
                                                <button  class="button">Checkout</button>
                                            </div><!-- .infos --> --}}
                                        </div> <!-- .content -->
                                    </div>
                                </div>
                            </div> <!-- .payment -->
                        </div> <!-- .checkout -->
                    </div> <!-- .container2 -->
                </div> <!-- #wrapper -->
            </div>
        </div>
    </div>
</body>

</html>
