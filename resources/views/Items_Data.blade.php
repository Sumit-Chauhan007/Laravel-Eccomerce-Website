<style>

</style>
@foreach ($Category as $Category)
    <?php
    $Items1 = DB::table('items')
        ->select('*')
        ->where('Category', $Category->uuid)
        ->where('Trend', '1')
        ->get();
    ?>
    <section class="fashion_section  " id="{{$Category->uuid}}_scroll">
        <div class="container">
            <div id="electronic_main_slider " class="mt-5 electronic_carousel">
                <h1 class="fashion_taital">{{ $Category->Name }}</h1>
                <div class="owl-carousel owl-carousel1 owl-theme">
                    @foreach ($Items1 as $Items)
                        <div class="item ">
                            <input type="hidden" value="{{ $Items->uuid }}" class="item_id" id="ItemsId2">
                            <div class="box_main" data-ride="carousel">
                                <a href="{{ url('BuyNow', $Items->uuid) }}">
                                    <h4 class="shirt_text">{{ $Items->Name }}</h4>
                                    <p class="price_text">Rs.{{ $Items->Price }}<span style="color: #262626;"></span>
                                    </p>
                                    <div class="tshirt_img"><img src="/ItemImage/{{ $Items->Image }}">
                                    </div>
                                </a>
                                <div class="btn_main">
                                    <div class="seemore_bt"><a href="{{ url('SeemoreItems', $Items->Category) }}">See
                                            More</a></div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

@endforeach

<script></script>
