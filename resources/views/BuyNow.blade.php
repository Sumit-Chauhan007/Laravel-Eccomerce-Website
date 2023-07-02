    <!DOCTYPE html>
    <html lang="en">

    <head>
        <base href="/public">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <title>S-Basket</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="icon" href="finallogos-favicon.png" type="image/gif" />
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css"
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
            rel="stylesheet">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesoeet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
            media="screen">
        <link rel="stylesheet" href="/build/assets/app-509caf60.css">

        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <style>
            .sm\:fixed.sm\:top-0.sm\:right-0.p-6.text-right
                top: -26px;

            }

            .btn_main {

                font-family: Figtree, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol, "Noto Color Emoji" !important;

            }

            .sm\:ml-6 {
                margin-left: 1.5rem;
                margin-top: -34px !important;
            }

            .max-w-7xl.mx-auto.px-4.sm\:px-6.lg\:px-8 {
                background-color: #2B2A29;
                height: 1rem;

            }

            .rounded-md.ring-1.ring-black.ring-opacity-5.py-1.bg-white {
                background-color: #2B2A29 !important;
            }

            .Category {

                border-color: rgb(227 231 198) !important;
            }

            ._2KpZ6l._3AWRsL {
                background: #fb641b;
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .2);
                border: none;
                color: #fff;
            }

            .ihZ75k {
                padding: 18px 8px;
                border-radius: 2px;
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .2);
                float: right;
                width: 98%;
            }

            ._2U9uOA {
                text-transform: uppercase;
                width: 100%;
                font-size: 16px;
            }

            ._2KpZ6l:hover {
                box-shadow: 0 4px 6px 0 rgba(0, 0, 0, .12);
            }

            .fonts-loaded body,
            .fonts-loaded button,
            .fonts-loaded input,
            .fonts-loaded select,
            .fonts-loaded textarea {
                font-family: Roboto, Arial, sans-serif;
                letter-spacing: 0;
            }

            form.SearchForm .search_input {
                position: relative;
            }

            form.SearchForm .search_input .search_bar {
                position: absolute;
                left: 0;
                top: 43px;
                z-index: 1;
                transition: none;
            }

            form.SearchForm .search_input .search_bar ul li {
                padding: 3px 0;
                height: 40px;
            }

            form.SearchForm .search_input .search_bar ul li sub {
                display: block;
                bottom: 0;
                line-height: normal;
            }

            ._3v1-ww {
                padding: 18px 8px;
                border-radius: 2px;
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .2);
                width: 98%;
                border: none;
                float: left;
                background: var(--color-yellowish-orange);
                color: var(--color-white-bg);
            }

            ._2U9uOA {
                text-transform: uppercase;
                width: 100%;
                font-size: 16px;
            }

            ._3v1-ww {
                background: #ff9f00;
                color: #fff;
            }

            ._2KpZ6l {
                display: inline-block;
                border-radius: 2px;
                color: #212121;
                padding: 10px 20px;
                font-size: 13px;
                font-weight: 500;
                transition: box-shadow .2s ease;
                vertical-align: super;
                background: #fff;
                cursor: pointer;
                outline: none;
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .1);
                border: 1px solid #e0e0e0;
            }



            .testimonial {
                padding: 80px 0;
            }

            .sec-heading {
                margin-bottom: 60px;
            }

            .sec-heading h6 {
                font-family: allura;
                font-weight: 900;
                font-size: 80px;
            }

            .single-box {
                border: 3px solid #e6f0fa;
                padding: 50px 30px 40px;
                border-radius: 20px;
                background: #fff;
            }

            .img-area {
                margin: 45px 0 20px;
            }

            .single-box img {
                max-width: 100px;
                border-radius: 50%;
                margin: 0 auto
            }

            .single-box h4 {
                font-weight: 600;
                margin: 0;
                font-family: 'Allura', cursive;
                font-size: 35px;
            }

            .single-box {
                overflow: hidden
            }

            .single-box .img-area {
                width: 30%;
                float: left;
                margin: 0
            }

            .single-box .content {
                width: 70%;
                float: left;
                padding-left: 10px
            }

            .single-box p {
                margin: 10px 0 25px;
                /* line-height: 2.3; */
            }

            .testi-carousel-three .single-box {
                border: 0;
                padding: 0 50px;
            }

            .testi-carousel .owl-dots,
            .clients-carousel .owl-dots,
            .testi-carousel-three .owl-dots {
                position: absolute;
                left: 0;
                right: 0;
                bottom: -60px;
                text-align: center;
                width: 100%;
            }

            .testi-carousel .owl-dot,
            .clients-carousel .owl-dot,
            .testi-carousel-three .owl-dot {
                width: 16px;
                height: 16px;
                background-color: #ddd;
                display: inline-block;
                margin: 0 6px;
                text-align: center;
                border-radius: 50%;
            }

            .owl-stage-outer {
                height: 350px;
            }

            .testi-carousel .owl-dot.active,
            .clients-carousel .owl-dot.active,
            .testi-carousel-three .owl-dot.active {
                background-color: blueviolet;
            }

            @media only screen and (min-width: 360px) and (max-width: 479px) {
                .testimonial {
                    padding: 70px 0 130px;
                }
            }

            @media only screen and (min-width: 320px) and (max-width: 359px) {
                .testimonial {
                    padding: 70px 0 130px;
                }

                .single-box {
                    padding: 50px 0 40px;
                }

                .single-box .img-area {
                    width: 100%;
                    float: none;
                }

                .single-box .content {
                    width: 100%;
                    float: none;
                }
            }

            .Review_but {
                color: #0069d9;
            }

            .closeNot {
                color: black;
            }

            .Savenot {
                color: #0069d9;
            }

            .single-product .small-img-row .small-img-col img {
                /* height: 350px; */
            }

            .drift-zoom-pane {
                background: white !important;
            }

            /* Customize the hover bounding box */
            .drift-bounding-box {
                background-color: transparent !important;
                width: 200px;
                height: 150px;
                background-image: url(grid.png);
                background-size: 100%;
                border: 1px solid #5fd0e5;
            }

            .drift-zoom-pane {
                width: 97% !important;
            }

            .modal-backdrop {
                z-index: 0 !important;
            }
        </style>
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css"> --}}
        <link rel="stylesheet" href="https://awik.io/demo/webshop-zoom/drift-basic.min.css">
    </head>

    <body>
        <div class="banner_bg_main">
            @include('header')
            <br><br><br><br><br>
            @include('sidenavbar')
        </div>
        <div class="fashion_section" style="background-color: #f1f3f6;padding-bottom: 0px">

            @include('itemsData')

        </div>

        <div class="footer_section layout_padding">
            <div class="container">
                <div class="footer_logo">
                    @auth
                        <a  href="/redirects" style="margin: 0;"><img src="finallogos.png"
                                style="width: 115px;" alt="thfhgv">
                        </a>
                    @endauth
                    @guest
                        <a  href="/" style="margin: 0;"><img src="finallogos.png"
                                style="width: 115px;" alt="jhy">
                        </a>
                    @endguest
                </div>
                <div class="input_bt">
                    <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
                    <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
                </div>
                <div class="footer_menu">
                    <ul>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">Gift Ideas</a></li>
                        <li><a href="#">New Releases</a></li>
                        <li><a href="#">Today's Deals</a></li>
                        <li><a href="#">Customer Service</a></li>
                    </ul>
                </div>
                <div class="location_main">Help Line Number : <a href="#">+91 1234567890</a></div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <script src="js/plugin.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
            integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous">
        </script>

        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/custom.js"></script>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            $(selector).click(function(e) {
                e.preventDefault();

            });

            function addtocart(items_id) {
                toastr.options = {
                    "closeButton": true,
                    "newestOnTop": true,
                    "positionClass": "toast-top-right"
                };
                var formData = new FormData();
                var items_qty = document.getElementById(items_id).value;
                var items_add = document.getElementById(items_id + "_addCart");
                var items_size = document.getElementById("itemSize").value;
                var items_remove = document.getElementById(items_id + "_remove");
                formData.set('items_id', items_id);
                formData.append('items_qty', items_qty);
                formData.append('items_size', items_size);
                // formData.set('items_size', JSON.stringify(items_size));
                $.ajax({
                    type: "post",
                    url: "/addcart",
                    contentType: 'multipart/form-data',
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response) {

                        var number = response.count;
                        $('.count').text(number);
                        if (response.success) {
                            $(items_remove).show();
                            $(items_add).hide();
                        } else {
                            $(items_add).show();
                            $(items_remove).hide();
                        }
                        if (response.success) {
                            toastr.success(response.success);
                        }
                    }
                });
            }

            function wishlist(id) {
                var formData = new FormData();
                var items_qty = document.getElementById(id).value;
                var items_add = document.getElementById(id + "_addwishlist");
                var items_size = document.getElementById("itemSize").value;
                var items_remove = document.getElementById(id + "_removewish");
                formData.set('items_id', id);
                $.ajax({
                    type: "post",
                    url: "/addwishlist",
                    contentType: 'multipart/form-data',
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response) {
                        // $('.heartlabel').html(response.htm);
                        toastr.success(response.status);
                        var number = response.count;
                        // // $('.count').text(number);
                        // if (response.status) {
                        //     $(items_remove).show();
                        //     $(items_add).hide();
                        // } else {
                        //     $(items_add).show();
                        //     $(items_remove).hide();
                        // }
                    }
                });
            }
        </script>


    </body>


    </html>
