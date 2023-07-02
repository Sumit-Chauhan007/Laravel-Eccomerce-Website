<form action="{{ url('/shipping') }}" method="POST">
    @csrf
    <div class="card_cart_items">
        <div class="row" style="border-radius: 1rem;overflow: hidden;}">
            <div class="col cart">
                <div class="title" align="center">
                    <div class="row">
                        <div class="col-10">
                            <h4 style="font-size:200%"><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col-2 bold">{{ $count }} items</div>
                    </div>
                </div>

                <div class="cartHtml">
                    @foreach ($data as $data)
                        <div class="row border-top border-bottom">
                            <div class="row main align-items-center" style="display: inherit">
                                <div class="col-2"><a href="{{ url('BuyNow', $data->Clothe_id) }}"><img
                                            class="img-fluid" style="width:5.5rem"
                                            src="/ItemImage/{{ $data->Image }}"></a>
                                </div>
                                <input type="hidden" name="hidden_uuid[]" value="{{ $data->uuid }}">
                                <div class="col-2">
                                    <input type="hidden" value="{{ $data->Clothe_id }}" id="ItemsId1" class="ItemsId">
                                    <a href="{{ url('BuyNow', $data->Clothe_id) }}"> <input type="text"
                                            name="foodname[]" value="{{ $data->title }} "hidden>
                                        {{ $data->Name }} </a>
                                </div>
                                <div class="col-2">
                                    <input type="hidden" name="quantity[]"
                                        value="{{ $data->quantity }} ">Quantity:{{ $data->quantity }}
                                </div>
                                <div class="col-2">
                                   @if($data->item_size == " ")
                                   <input type="hidden" value="Fixed Size" name="ItemSize[]" id="itemSize" />
                                   @else
                                   <input type="hidden" value="{{$data->item_size}}" name="ItemSize[]" id="itemSize" />
                                   Size:: {{$data->item_size}}
                                   @endif
                                </div>
                                <div class="col-3" id="removeID">Price:: Rs.{{ $data->Price }}<span class="close"
                                        onclick="getCart('{{ $data->Clothe_id }}')">&#10005;</a></span></div>
                                        <input type="hidden" name="price[]" value="{{$data->Price}}">

                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="cart-Order text-center">
                    @if($total == 0)
                    <h1 class="empty-cart">Your Cart is Empty</h1>
                    @else
                    <button id="order" type="submit" class="basicButton btn btn-primary">Checkout</button>
                    @endif
                </div>

                <div class="back-to-shop"><a href="/">&leftarrow;<span class="text-muted">Back to shop</span></a>
                </div>
            </div>

        </div>

    </div>
</form>
