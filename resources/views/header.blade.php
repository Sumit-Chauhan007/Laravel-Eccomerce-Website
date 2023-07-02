<style>
    div#navbarNav ul.navbar-nav li.nav-item.active a.nav-link {
        color: #f26522;
    }

    .cssmenu {
        /* justify-content: right; */
        align-self: center;
    }

    .right_navpart ul li {
        padding: 0;
    }

    .right_navpart ul li.profile_drop .sm\:ml-6 {
        margin: 0 !important;
    }

    .right_navpart ul li.profile_drop .px-4 {
        padding: 0 !important;
        height: fit-content !important;
    }

    .right_navpart ul li.nav-item .nav-link {
        padding: 0;
        margin-right: 15px;
    }

    .right_navpart ul li.profile_drop a.block.w-full.px-4.py-2.text-left.text-sm.leading-5 {
        padding: 10px !important;
    }

    /* .cartcolor {
        color: white;
    } */
    .navbar-nav .nav-item a.nav-link:hover .cartcolor {
        color: #f26522;
        transition: all .3s ease-in-out;
    }

    .right_navpart ul li.profile_drop .sm\:ml-6 .ml-3.relative button {
        padding: 0;
        margin: 0;
    }

    .right_navpart ul li.profile_drop .px-4 .flex.justify-between.h-16 {
        height: fit-content;
    }

    @media screen and (min-width: 1024px)  {
        .toggle_icon {
            display: none!important;
        }

    }
    @media screen and (max-width: 1024px)  {
        .toggle_icon {
            display: block!important;
        }
        .header_section_top {
            display: none!important;
        }
        .cat-menu-dis {
            display: none!important;
        }
    }
</style>
<div class="container">
    <div class="header_section_top " style="border-bottom-left-radius: 20px;border-bottom-right-radius:20px ">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: transparent ">
                    <div class="container-fluid custom_menu">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="row cssmenu collapse navbar-collapse" id="navbarNav">
                            <div class="col-2 topleftlogo" style="text-align: center;">
                                @auth
                                    <a class="navbar-brand" href="/redirects" style="margin: 0;"><img src="finallogos.png"
                                            style="width: 115px;" alt="thfhgv">
                                    </a>
                                @endauth
                                @guest
                                    <a class="navbar-brand" href="/" style="margin: 0;"><img src="finallogos.png"
                                            style="width: 115px;" alt="jhy">
                                    </a>
                                @endguest

                            </div>
                            <div class="col-7" align="center">
                                <ul class=" navbar-nav">
                                    @auth
                                        <li class="nav-item active" aria-current="page"> <a class="nav-link"
                                                href="/redirects">Home</a>
                                        </li>
                                    @endauth
                                    @guest
                                        <li class="nav-item active" aria-current="page"> <a class="nav-link"
                                                href="/">Home</a>
                                        </li>
                                    @endguest
                                    <li class="nav-item"> <a class="nav-link" href="#">New
                                            Releases</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Customer
                                            Service</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="/wishlist">My Wishlist</a>
                                    </li>
                                    <li class="nav-item" id="navId1"> <a class="nav-link"
                                            href="{{ url('myOrders') }}">My
                                            Orders</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-3 right_navpart" align="left">
                                <ul class=" navbar-nav">
                                    <li class="nav-item "> <a class="nav-link" href="{{ url('showcart') }}">
                                            <i class="cartcolor fa fa-shopping-cart" aria-hidden="true"></i>
                                            <sub class="cartcolor count">{{ $count }}</sub></a>
                                    </li>
                                    <li class="profile_drop">
                                        @if (Route::has('login'))
                                            <div class="font">
                                                @auth
                                                    <x-app-layout>

                                                    </x-app-layout>
                                                @else
                                                    <a href="{{ route('login') }}"
                                                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                                        in</a>

                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}"
                                                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                                    @endif
                                                @endauth
                                            </div>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        var anchors = document.getElementsByTagName('a');

        for (var i = 0; i < anchors.length; i++) {
            var anchor = anchors[i];
            // console.log(anchor);
            if (anchor.href === window.location.href) {
                anchor.style.transition = 'none';
                var anc = anchor.closest('li');
                $(anc).siblings().removeClass("active");
                console.log($(anc).siblings());
                $(anc).addClass("active");
            } else {
                anchor.style.transition = 'none';
                var anc = anchor.closest('li');
                $(anc).removeClass("active");
            }
        }
    });

    function ScrollTo(id) {
        document.getElementById(id + '_scroll').scrollIntoView({
            behaviors: 'smooth'
        });
    }
</script>
