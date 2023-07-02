<?php
$Items = DB::table('reviews')
    ->select('*')
    ->where('Category_id', $data->Category)
    ->where('Added',true)
    ->get();
?>

<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="sec-heading text-center">
                    <h1 style="font-size:50px;font-weight: 500"><u>Customer Tesimonial</u> </h1>
                </div>
            </div>
        </div>
        @if (count($Items) != 0)
            <div class="container">
                <div class="row">
                    <div class="clients-carousel owl-carousel Review_Caro">
                        @foreach ($Items as $Items)
                            <div class="single-box">
                                <div class="img-area">
                                    @if ($Items->Image)
                                        <img alt="" class="img-fluid" src="images/banner-bg.png">
                                    @else
                                        <img alt="" class="img-fluid" src="UserImage/defaultUser.jpg">
                                    @endif
                                </div>
                                <div class="content">
                                    <p>"{{ $Items->Review }}"</p>
                                    <h4>{{ $Items->username }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div align="center">
                <b style="font-size: 30px">No Reviews</b>
            </div>
        @endif
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script>
    $('.clients-carousel').owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 450,
        margin: 30,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            991: {
                items: 2
            },
            1200: {
                items: 2
            },
            1920: {
                items: 2
            }
        }
    });
</script>
