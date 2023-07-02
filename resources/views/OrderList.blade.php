<style>
    .emojis .sad {
        display: block;
        opacity: 9;
        transition: opacity 700ms !important;
    }

    .emojis .smile {
        display: none;
    }

    .emojis {
        width: auto;
        display: flex;
        margin: 50px 0 0;

    }

    .clicktoorder {
        font-size: 20px;
        font-weight: bold;
        padding: 10px 9px;
        background-color: #ffcb66;
        border-radius: 21px;

    }

    .clicktoorder:hover {
        color: #ffcb66 !important;
        background-color: #666;
    }

    .banner_bg_main {
        width: 100%;
        float: left;
        background: linear-gradient(to right, #ffbf5a, #ff9422);
        height: auto;
    }
</style>
@if ($orders->isEmpty())
    <div style="padding: 1xp 2px">
        <div class=" mb-4 mt-3" align="center"
            style="background-color:white;margin:70px auto;border-radius: 40px;width: 50%;height:400px;box-shadow: 17px 15px 24px grey">
            <div class="mainclass" style="height:60vh">
                <div class="orderidtable" style="padding:13px 15px;width:20%">
                    <div class="emojis" style="position: relative;width:400px;margin-left: -132px;">
                        <div id="smileid" class="mx-3 px-3 smile" style="position: absolute;">
                            <div class=" emoji_trn" style="width:20rem;height: 300px;">
                                <img width="170" src="smil.png" alt="">
                            </div>
                        </div>
                        <div id="sadid" class="mx-3 px-3 sad" style="position: absolute;">
                            <div class="emoji_trn" style="width:20rem; height: 300px; ">
                                <img width="140" src="sad.png" alt="">
                                <h1 class="mt-5" style="font-size: 20px;font-weight: bold">No Orders found</h1>
                                <a onclick="emojihide()" class="mt-5 clicktoorder"
                                    style="font-size: 20px;font-weight: bold">Click here to buy
                                    Some Products</a>
                            </div>
                        </div>
                        <script>
                            function emojihide() {
                                var sadid = document.getElementById('sadid');
                                $(sadid).fadeOut(800);
                                var smileid = document.getElementById('smileid');
                                $(smileid).fadeIn(800);
                                setTimeout(() => {
                                    window.location.href = '/redirects';
                                }, 2000);

                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container mb-4 mt-3">
        <div class="mainclass" style="background-color: white;border-radius:10px">
            <div class="orderidtable" style="padding:13px 60px">
                <h1 style="font-size: 40px;font-family: FontAwesome"><b><u>My Order</u></b></h1>
            </div>
        </div>
    </div>
@endif

@foreach ($orders as $order)
    <div class="container mb-4">
        <div class="mainclass" style="background-color: white;box-shadow:0px 0px 70px grey;border-radius:10px">
            <div class="orderidtable" style="padding:30px 50px">
                <div class="row  mb-3">
                    <div class="col-xl-3 col-xs-12">
                        <div style="background-color: #f3f4f3 ;width: 60%;padding:7px 11px;border-radius:20px"><span><b
                                    style="color:black">Order</b>
                                <span style="color: #4b8cdb"><b>#{{ $order->Order_id }}</b></span></span></div>
                    </div>
                </div>
                <?php

                $OrderData = DB::table('orders')
                    ->select('*')
                    ->where('order_id', $order->Order_id)
                    ->get();
                ?>
                <table class="table">
                    <tbody>
                        @foreach ($OrderData as $item)
                            <tr style="font-size: 16px">
                                <td><img width="100"
                                        src="/ItemImage/{{ DB::table('items')->where('uuid', $item->item_uuid)->pluck('Image')->first() }}"
                                        alt=""></td>
                                <td style="vertical-align: top">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <h1 style="font-family:FontAwesome;font-size: 25px">
                                                <b>{{ DB::table('items')->where('uuid', $item->item_uuid)->pluck('Name')->first() }}</b>
                                            </h1>
                                        </div>
                                        <div class="col-2 ">Size:{{ $order->item_size }}</div>
                                        <div class="col-2 ">Qty:{{ $order->item_quantity }}</div>
                                        <div class="col-2 "
                                            style="font-size: 17px;font-weight: 600;font-family: inherit">
                                            <h1>Rs.{{ DB::table('items')->where('uuid', $item->item_uuid)->pluck('Price')->first() }}
                                            </h1>
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle">
                                    <div class="row">
                                        <div class="col-12">Status:</div>
                                        <div class="col-12" style="font-weight:bold;color:#ffbd56;font-size: 20px">
                                            <b>In-transit</b>
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle">
                                    <div class="row">
                                        <div class="col-12">Delivery Expected by:</div>
                                        <div class="col-12" style="font-weight:bold;color:black;font-size: 20px"><b>24
                                                DEC 2023</b></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="total" style="height: 45px">
                <div class="row">
                    <a class="col-xl-2 col-xs-5 pt-2" href="{{ url('cancel_order', $order->Order_id) }}" align="center"
                        style="height:auto;height:45px;font-size:16px;border-right: 1px solid;border-color: inherit ">
                        CANCEL ORDER</a>
                    <div class="col-xl-6 col-xs-1"></div>
                    <div class="col-xl-4 col-xs-4 pt-2" style="height:auto;font-size:16px" align="center">
                        <?php
                        $OrderData = [];
                        $OrderData[] = DB::table('orders')
                            ->join('items', 'items.uuid', '=', 'orders.item_uuid')
                            ->where('order_id', $item->Order_id)
                            ->sum('Price');
                        ?>
                        <h1 style="font-size: 17px;font-weight: 600;font-family: inherit">Rs.<?php echo end($OrderData); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

