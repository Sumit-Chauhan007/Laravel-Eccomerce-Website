<div class="fashion_section">
    <div id="electronic_main_slider" class="electronic_carousel carousel slide" data-ride="carousel">
        <div class="container">
            <div class="fashion_section_2">
                <div class="row" id="_scroll">
                    @foreach ($wishlist as $wish)
                    <?php
                    $items = DB::table('items')->where('uuid',$wish->Item_uuid)->get()?>
                        @foreach ($items as $Items)
                        <a href="{{ url('BuyNow', $Items->uuid) }}">
                            <div class="col-lg-4 col-sm-4 mb-4 uuidID">
                                <input type="hidden" value="{{ $Items->uuid }}" class="item_id" id="ItemsId2">
                                <div class="box_main ">
                                    <h4 class="shirt_text">{{ $Items->Name }}</h4>
                                    <p class="price_text">Rs.{{ $Items->Price }}<span style="color: #262626;"></span>
                                    </p>
                                    <div class="tshirt_img"><img src="/ItemImage/{{ $Items->Image }}">
                                    </div>
                                    <div class="btn_main">
                                        <div class="seemore_bt"><a
                                                href="{{ url('SeemoreItems', $Items->Category) }}">See
                                                More</a></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
