<style>
    .blog_lv_li svg {
        cursor: pointer;
        overflow: visible;
        width: 40px;
        margin: 0;
        display: inline-block;
    }

    .blog_lv_li svg #heart {
        transform-origin: center;
        animation: animateHeartOut .3s linear forwards
    }

    .blog_lv_li svg #main-circ {
        transform-origin: 29.5px 29.5px
    }

    .blog_lv_li .lv_checkbox {
        display: none
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heart {
        transform: scale(0.2);
        fill: url(#like-gradient) #f00;
        animation: animateHeart .3s linear forwards .25s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #main-circ {
        transition: all 2s;
        animation: animateCircle .3s linear forwards;
        opacity: 1
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup1 {
        opacity: 1;
        transition: .1s all .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup1 #heart1 {
        transform: scale(0) translate(0, -30px);
        transform-origin: 0 0 0;
        transition: .5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup1 #heart2 {
        transform: scale(0) translate(10px, -50px);
        transform-origin: 0 0 0;
        transition: 1.5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup2 {
        opacity: 1;
        transition: .1s all .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup2 #heart1 {
        transform: scale(0) translate(30px, -15px);
        transform-origin: 0 0 0;
        transition: .5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup2 #heart2 {
        transform: scale(0) translate(60px, -15px);
        transform-origin: 0 0 0;
        transition: 1.5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup3 {
        opacity: 1;
        transition: .1s all .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup3 #heart1 {
        transform: scale(0) translate(30px, 0px);
        transform-origin: 0 0 0;
        transition: .5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup3 #heart2 {
        transform: scale(0) translate(60px, 10px);
        transform-origin: 0 0 0;
        transition: 1.5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup4 {
        opacity: 1;
        transition: .1s all .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup4 #heart1 {
        transform: scale(0) translate(30px, 15px);
        transform-origin: 0 0 0;
        transition: .5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup4 #heart2 {
        transform: scale(0) translate(40px, 50px);
        transform-origin: 0 0 0;
        transition: 1.5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup5 {
        opacity: 1;
        transition: .1s all .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup5 #heart1 {
        transform: scale(0) translate(-10px, 20px);
        transform-origin: 0 0 0;
        transition: .5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup5 #heart2 {
        transform: scale(0) translate(-60px, 30px);
        transform-origin: 0 0 0;
        transition: 1.5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup6 {
        opacity: 1;
        transition: .1s all .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup6 #heart1 {
        transform: scale(0) translate(-30px, 0px);
        transform-origin: 0 0 0;
        transition: .5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup6 #heart2 {
        transform: scale(0) translate(-60px, -5px);
        transform-origin: 0 0 0;
        transition: 1.5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup7 {
        opacity: 1;
        transition: .1s all .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup7 #heart1 {
        transform: scale(0) translate(-30px, -15px);
        transform-origin: 0 0 0;
        transition: .5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup7 #heart2 {
        transform: scale(0) translate(-55px, -30px);
        transform-origin: 0 0 0;
        transition: 1.5s transform .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup2 {
        opacity: 1;
        transition: .1s opacity .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup3 {
        opacity: 1;
        transition: .1s opacity .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup4 {
        opacity: 1;
        transition: .1s opacity .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup5 {
        opacity: 1;
        transition: .1s opacity .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup6 {
        opacity: 1;
        transition: .1s opacity .3s
    }

    .blog_lv_li .lv_checkbox:checked+label svg #heartgroup7 {
        opacity: 1;
        transition: .1s opacity .3s
    }

    @keyframes animateCircle {
        40% {
            transform: scale(10);
            opacity: 1;
            fill: #DD4688
        }

        55% {
            transform: scale(11);
            opacity: 1;
            fill: #D46ABF
        }

        65% {
            transform: scale(12);
            opacity: 1;
            fill: #CC8EF5
        }

        75% {
            transform: scale(13);
            opacity: 1;
            fill: transparent;
            stroke: #CC8EF5;
            stroke-width: .5
        }

        85% {
            transform: scale(17);
            opacity: 1;
            fill: transparent;
            stroke: #CC8EF5;
            stroke-width: .2
        }

        95% {
            transform: scale(18);
            opacity: 1;
            fill: transparent;
            stroke: #CC8EF5;
            stroke-width: .1
        }

        100% {
            transform: scale(19);
            opacity: 1;
            fill: transparent;
            stroke: #CC8EF5;
            stroke-width: 0
        }
    }

    @keyframes animateHeart {
        0% {
            transform: scale(0.2)
        }

        40% {
            transform: scale(1.2)
        }

        100% {
            transform: scale(1)
        }
    }

    @keyframes animateHeartOut {
        0% {
            transform: scale(1.4)
        }

        100% {
            transform: scale(1)
        }
    }

    ._25_uYi {
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 15px;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 1px solid var(--color-grey-grade1);
        box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .1);
        /* padding: 5px 5px; */
        background: var(--color-white-bg);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    ._25_uYi label {
        margin: 0;
    }
</style>



<div class="container single-product" style="background-color: white;padding: 0px 0px 116px 0px;">
    <form action="{{ url('/shipping') }}" method="POST">
        @csrf
        @foreach ($data as $data)
            <div class="row">
                <div class="col-xl-6 col-xs-11 "align="center">
                    <img src="" width="100%" id="ProductImg">
                    <div class="small-img-row">
                        <div style="padding:30px 14px">
                            <div class="small-img-col " style="border:1px solid #f0f0f0;padding:30px 50px">
                                <div class="row">
                                    <div class="col-10">
                                        <img style="width: auto" src="/ItemImage/{{ $data->Image }}" class=" drift-demo-trigger small-img"
                                            data-zoom="/ItemImage/{{ $data->Image }}">
                                    </div>
                                    <div class="col-2">
                                        <div class="heartlabel blog_lv_li _25_uYi" title="add to wishlist">
                                            <input type="checkbox" class="lv_checkbox" id="lv_checkbox10"
                                                onclick="wishlist( '{{ $data->uuid }}'); openNav"
                                                @if ($WishlistData) checked @endif>
                                            <label for="lv_checkbox10">
                                                <svg id="heart-svg" viewBox="467 392 58 57"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <linearGradient id="like-gradient" x2="1" y2="1">
                                                        <stop offset="0%" stop-color="#ff1a03"></stop>
                                                        <stop offset="100%" stop-color="#ffd004"></stop>
                                                    </linearGradient>
                                                    <g id="Group" fill="none" fill-rule="evenodd"
                                                        transform="translate(467 392)">
                                                        <path
                                                            d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z"
                                                            id="heart" fill="#858585"></path>
                                                        <circle id="main-circ" fill="#E2264D" opacity="0"
                                                            cx="29.5" cy="29.5" r="1.5">
                                                        </circle>
                                                        <g id="heartgroup7" opacity="0" transform="translate(7 6)">
                                                            <circle id="heart1" fill="#9CD8C3" cx="2"
                                                                cy="6" r="2"></circle>
                                                            <circle id="heart2" fill="#8CE8C3" cx="5"
                                                                cy="2" r="2"></circle>
                                                        </g>
                                                        <g id="heartgroup6" opacity="0" transform="translate(0 28)">
                                                            <circle id="heart1" fill="#CC8EF5" cx="2"
                                                                cy="7" r="2"></circle>
                                                            <circle id="heart2" fill="#91D2FA" cx="3"
                                                                cy="2" r="2"></circle>
                                                        </g>
                                                        <g id="heartgroup3" opacity="0" transform="translate(52 28)">
                                                            <circle id="heart2" fill="#9CD8C3" cx="2"
                                                                cy="7" r="2"></circle>
                                                            <circle id="heart1" fill="#8CE8C3" cx="4"
                                                                cy="2" r="2"></circle>
                                                        </g>
                                                        <g id="heartgroup2" opacity="0" transform="translate(44 6)">
                                                            <circle id="heart2" fill="#CC8EF5" cx="5"
                                                                cy="6" r="2"></circle>
                                                            <circle id="heart1" fill="#CC8EF5" cx="2"
                                                                cy="2" r="2"></circle>
                                                        </g>
                                                        <g id="heartgroup5" opacity="0"
                                                            transform="translate(14 50)">
                                                            <circle id="heart1" fill="#91D2FA" cx="6"
                                                                cy="5" r="2"></circle>
                                                            <circle id="heart2" fill="#91D2FA" cx="2"
                                                                cy="2" r="2"></circle>
                                                        </g>
                                                        <g id="heartgroup4" opacity="0"
                                                            transform="translate(35 50)">
                                                            <circle id="heart1" fill="#F48EA7" cx="6"
                                                                cy="5" r="2"></circle>
                                                            <circle id="heart2" fill="#F48EA7" cx="2"
                                                                cy="2" r="2"></circle>
                                                        </g>
                                                        <g id="heartgroup1" opacity="0" transform="translate(24)">
                                                            <circle id="heart1" fill="#9FC7FA" cx="2.5"
                                                                cy="3" r="2"></circle>
                                                            <circle id="heart2" fill="#9FC7FA" cx="7.5"
                                                                cy="2" r="2"></circle>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="hidden_uuid[]" value="{{ $data->uuid }}" />
                        @if ($data->quantity > 0)
                            <div class="btn_main container Buy_Now_btn" style="width: 100%">
                                <button class="_2KpZ6l _2U9uOA _3v1-ww" style="font-size: 15px"> <i
                                        class="fa fa-bolt" type="submit" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                                    Buy Now</button>
                                @if (in_array($data->uuid, $CartData))
                                    <a href="{{ url('showcart') }}" class="Go_to_Cart" style="width:100%">
                                        <div class="_2KpZ6l _2U9uOA ihZ75k _3AWRsL" id="{{ $data->uuid }}_remove"
                                            style="font-size: 15px">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Go
                                            to
                                            Cart

                                        </div>
                                    </a>
                                @else
                                    <div onclick="addtocart( '{{ $data->uuid }}')"
                                        class="_2KpZ6l _2U9uOA ihZ75k _3AWRsL" id="{{ $data->uuid }}_addCart"
                                        style="font-size: 15px">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<input
                                            type="button" value="Add to cart">
                                    </div>
                                    <a id="{{ $data->uuid }}_remove" href="{{ url('showcart') }}"
                                        class="Go_to_Cart" style="width:100%;display:none">
                                        <div class="_2KpZ6l _2U9uOA ihZ75k _3AWRsL" id="{{ $data->uuid }}_remove"
                                            style="font-size: 15px">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Go
                                            to
                                            Cart

                                        </div>
                                    </a>
                                @endif

                            </div>
                        @else
                            <div class="btn_main container Buy_Now_btn" style="width: 100%">
                                <a href="javascript:void(0)" class="_2KpZ6l _2U9uOA _3v1-ww" style="font-size: 15px">
                                    <i class="fa fa-warning" style="color:RED"
                                        aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                                    OUT OF STOCK</a>
                            </div>
                        @endif
                        @if ($data->quantity < 1)
                            <div class="modal fade NotifyModal" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Notify Me</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="#emailforNotify">Email:</label>
                                            <input type="email" name="emailforNotify" id="emailforNotify"
                                                placeholder="Enter Your Email" required>
                                        </div>
                                        <div class="modal-footer">


                                            <button type="button" class="closeNot btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" onclick="notify('{{ $data->uuid }}')"
                                                class="Savenot btn btn-primary">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container notify_container" style="width: 100%;padding-top:30px"
                                align="center">
                                <h1 class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="color: #ca4747;background-color: #ffb2b2;border-color: #ffb2b2;">
                                    <b>Notify
                                        Me</b>
                                </h1>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6 col-xs-11 px-3   details"  >
                    <h1 style="font-size: 2.5rem">{{ $data->Name }}</h1>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star—o"></i>
                    </div>
                    <input type="hidden" name="price[]" value="{{ $data->Price }}">
                    <h6 style="font-size: 1.2rem;color:#f26522">Rs.{{ $data->Price }}</h6>
                    @if ($data->size)
                        <select name="ItemSize[]" id="itemSize">
                            <option>Select Size</option>
                            @foreach ($size1 as $size1)
                                <option value="{{ $size1 }}">{{ $size1 }}</option>
                            @endforeach
                        </select><br>
                    @else
                        <input type="hidden" value="Fixed Size" name="ItemSize[]" id="itemSize" />
                    @endif
                    <div>
                        @if ($data->quantity > 0)
                            <input type="number"class="item_qty" id="{{ $data->uuid }}" name="quantity[]"
                                min="1" max="{{ $data->quantity }}" value="1">
                        @else
                            <input type="hidden"class="item_qty" id="{{ $data->uuid }}" name="quantity[]"
                                value="0">
                            <br>
                            <h1 style="color:#bb970d"><b>OUT OF STOCK</b></h1>
                        @endif
                    </div>
                    <br>
                    <h3>Product Details <i class="fa fa-indent"></i></h3>
                    <p>Give your summer wardrobe a style upgrade with the HRX
                        Men's Active T-shirt. Team it with a pair of shorts for
                        your morning workout or a denims for an evening out with
                        the guys. </p>
                    <br>

                    @auth
                        <button type="button" class="Review_but btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1">
                            Give Your Reviews
                        </button>
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ url('reviews') }}" method="POST">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Rating & Review</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1>Reviews:</h1>
                                            <textarea name="Review" id="Your_rev_id" style="width:95%" placeholder="Give Your Reviews"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="Review_but btn btn-primary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" onclick="Review_but( '{{ $data->Category }}')"
                                                class="Review_but btn btn-primary" onclick="RefreshREv()">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <a href="login">
                            <button type="button" class="Review_but btn btn-primary">
                                Give Your Reviews
                            </button>
                        </a>
                    @endguest
                </div>
            </div>
            @include('CustomerReview')
        @endforeach
    </form>
</div>
<script src='https://awik.io/demo/webshop-zoom/Drift.min.js'></script>
<script>
    new Drift(document.querySelector('.drift-demo-trigger'), {
        paneContainer: document.querySelector('.details'),
        inlinePane: 769,
        inlineOffsetY: -85,
        containInline: true,
        hoverBoundingBox: true,

    });
</script>
<!-- CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script>
    function notify(id) {
        var formData = new FormData();
        var NotifyD = document.getElementById('emailforNotify').value;
        formData.append('email', NotifyD);
        formData.append('items_id', id);
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            type: "post",
            url: "/notify",
            contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                if (response.error || response.error1) {
                    error1 = response.error1;
                    if (error1) {
                        toastr.error(error1);
                    } else {
                        $.each(response.error, function(name, error) {
                            toastr.error(error);
                        })
                    }
                } else {
                    $('.NotifyModal').modal('hide');
                    toastr.success(response.success);
                }
            }
        });
    }
</script>

<script>
    function Review_but($cat_id) {
        var formData = new FormData();
        var category_id = $cat_id;
        var items_review = document.getElementById('Your_rev_id').value;
        formData.append('items_review', items_review);
        formData.append('category_id', category_id);
        $.ajax({
            type: "post",
            url: "/reviews",
            contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                if (response.status) {
                    location.reload();
                }
            }
        });
    }
</script>
<script>
    function removefromwish(id) {
        var formData = new FormData();
        var items_add = document.getElementById(id + "_addwishlist");
        var items_remove = document.getElementById(id + "_removewish");
        formData.append('items_id', id);
        $.ajax({
            type: "post",
            url: "/removefromwish",
            contentType: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                $('.heartlabel').html(response.htm);
                toastr.success(response.status);
            }
        });
    }
</script>
