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

    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">


    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link rel="stylesheet" href="/build/assets/app-509caf60.css">

    @include('home_CSS')
</head>

<body>
    <div class="banner_bg_main">
        @include('header')

        @include('sidenavbar')
        <div class="banner_section layout_padding">
            <div class="container">
                {{-- <div id="my_slider" class="carousel slide" data-ride="carousel"> --}}
                <div class="owl-carousel owl-carousel12 owl-theme">
                    <?php
                    $caroloop = DB::table('categories')->get();
                    ?>
                    @foreach ($caroloop as $carou)
                        <div class="item ">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="car_box">
                                        <h1 class="banner_taital">Get Start <br>with your favourate
                                            {{ $carou->Category }}</h1>
                                        <div class="buynow_bt "><a href="javascript:void(0)"
                                                onclick="ScrollTo('{{ $carou->uuid }}')">Buy Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="item">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="car_box">
                                    <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                    <div class="buynow_bt"><a href="javascript:void(0)" onclick="ScrollTo()">Buy Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="car_box">
                                    <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                    <div class="buynow_bt"><a href="javascript:void(0)" onclick="ScrollTo()">Buy Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @include('Items_Data')
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="footer_logo" > @auth
                    <a href="/redirects" align="center" style="margin: 0;"><img src="finallogos.png" style="width: 115px;" alt="thfhgv">
                    </a>
                @endauth
                @guest
                    <a href="/" align="center" style="margin: 0;"><img src="finallogos.png" style="width: 115px;" alt="jhy">
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
        $('#closesidenav').click(function(e) {
            if ($("#mySidenav").width() > 0) {
                document.getElementById("mySidenav").style.width = "0";
                $('#closesidenav').hide();
            }
        });

        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            // document.getElementById("closesidenav").style.
            $('#closesidenav').show();
        }


        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            $('#closesidenav').hide();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"
        integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="owlcarousel/owl.carousel.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.owl-carousel1').owlCarousel({
                loop: false,
                rewind: true,
                autoplay: true,
                autoplayTimeout: 5000,
                margin: 10,
                responsiveClass: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    500: {
                        items: 2,
                        nav: true
                    },
                    700: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })
        })
        $(document).ready(function() {
            $('.owl-carousel12').owlCarousel({
                loop: false,
                rewind: true,
                autoplay: true,
                autoplayTimeout: 5000,
                margin: 10,
                responsiveClass: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                        loop: false,
                        margin: 20
                    }
                }
            })
        })
    </script>
    <script>
        function addtocart(items_id) {
            var formData = new FormData();
            var items_qty = document.getElementById(items_id).value;
            var items_add = document.getElementById(items_id + "_addCart");
            var items_remove = document.getElementById(items_id + "_remove");
            formData.append('items_id', items_id);
            formData.append('items_qty', items_qty);

            console.log(items_id);
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
                    alert(response.status);
                    alert(items_id);
                    var number = response.count;
                    $('.count').text(number);
                    if (response.status) {
                        $(items_remove).show();
                        $(items_add).hide();
                    } else {
                        $(items_add).show();
                        $(items_remove).hide();
                    }
                }
            });
        }
    </script>

</body>


</html>
