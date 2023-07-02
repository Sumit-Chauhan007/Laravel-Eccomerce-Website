<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600'); */

        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
            color: #242424;
            font-weight: 600;
        } */

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

        button {
            background-color: #c124a2;
            width: 100%;
            padding: 5%;
            border: none;
            color: white;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            margin-bottom: 4%;
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

        .fields--2 {
            grid-template-columns: 1fr 1fr;
        }

        .fields--3 {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .button {
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

        .button:focus-visible {
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
                            @if ($session=="")
                                <h1>No data is available</h1>
                            @else
                                @foreach ($session as $Data)
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
                                        </a>
                                        <div class="info">

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
                            @endif
                            <h4 class="ship"><i class="fa fa-truck"></i> Shipping: FREE</h4>
                            <hr>
                            <h3 class="total">TOTAL: {{ $total }}</h3>
                        </div> <!-- .order -->
                    </div>
                </div> <!-- .container1 -->

                <div class="col-xl-8 col-xs-12">
                    <div class="shippingForm_box">
                        <div class="checkout">
                            <div class="tab_box ">
                                <p><i class="fa fa-check-circle"  style="color:black "></i>Shipping</p>
                                <p><i class="fa fa-check-circle"></i>Checkout</p>
                                <p><i class="fa fa-check-circle"></i>Confirmation</p>
                            </div>
                            <form method="POST" action="{{ url('/checkout') }}" >
                                @csrf
                                <div class="payment">
                                    <div>
                                        <h1>Shipping</h1>
                                        <p>Please enter your shipping details.</p>
                                        <hr />
                                        <div class="form">

                                            <div class="fields fields--2">
                                                <label class="field">
                                                    <span
                                                        class="field__label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="firstname">First name</span>
                                                    <input name="ShipFirstName"
                                                        class="field__input appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        type="text" id="firstname"
                                                        placeholder="Enter Your First Name " />
                                                </label>
                                                <label class="field">
                                                    <span
                                                        class="field__label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="lastname">Last name</span>
                                                    <input name="ShipLastName"
                                                        class="field__input appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        type="text" id="lastname"
                                                        placeholder="Enter Your Last Name" />
                                                </label>
                                            </div>
                                            <label class="field">
                                                <span
                                                    class="field__label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="address">Address</span>
                                                <input name="ShipAddress"
                                                    class="field__input appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    type="text" id="address" placeholder="Enter Your Address" />
                                            </label>
                                            <label class="field">
                                                <span
                                                    class="field__label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="country">Country</span>
                                                <select name="ShipCountry"
                                                    class="field__input appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    id="country">
                                                    <option value=""></option>
                                                    <option value="unitedstates">United States</option>
                                                </select>
                                            </label>
                                            <div class="fields fields--3">
                                                <label class="field">
                                                    <span
                                                        class="field__label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="zipcode">Zip code</span>
                                                    <input name="ShipZipcode"
                                                        class="field__input appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        type="text" id="zipcode" />
                                                </label>
                                                <label class="field">
                                                    <span
                                                        class="field__label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="city">City</span>
                                                    <input name="ShipCity"
                                                        class="field__input appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        type="text" id="city" />
                                                </label>
                                                <label class="field">
                                                    <span
                                                        class="field__label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                        for="state">State</span>
                                                    <select name="ShipState"
                                                        class="field__input appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        id="state">
                                                        <option value=""></option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="button">Continue</button>
                                    </div>
                                </div>
                            </form><!-- .payment -->
                        </div> <!-- .checkout -->
                    </div>
                </div> <!-- .container2 -->
            </div>
        </div>
    </div> <!-- #wrapper -->
    {{-- <script>
        function onFormSubmit(form){
            var data = {
                "City" = form.ShipCity.value;
            };
            var jsonData = JSON.stringify(data);
            document.cookie = "my_form="+jsonData;
            window.location.href = form.getAttribute("action");
            return false;
        }
    </script> --}}

</body>

</html>
