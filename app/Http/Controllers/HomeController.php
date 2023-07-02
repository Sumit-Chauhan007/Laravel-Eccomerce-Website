<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Items;
use App\Models\Notify;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\ZipCode;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL as URL;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;
use Session;
use Stripe\PaymentIntent;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        if ($user_id) {
            return redirect('redirects');
        }
        $deviceId = Cookie::get('deviceId');
        if (!$deviceId) {
            $deviceId = Str::uuid();
            setcookie('deviceId', $deviceId, time() + (86400 * 30));
        }
        $CartData = Cart::where('deviceId', $deviceId)->pluck('Clothe_id')->toArray();
        $Category = Category::all();
        $count = cart::where('deviceId', $deviceId)->count();
        return view('home', compact('user_id', 'Category', 'count', 'CartData'));
    }

    public function redirects()
    {
        $link  = Session::get('intended');
        $userType = Auth::user()->userType;
        $user_id = Auth::id();
        $deviceId = Cookie::get('deviceId');
        DB::table('carts')->where('deviceId', $deviceId)->update(['deviceId' => null, 'user_id' => $user_id]);
        $CartData = Cart::where('user_id', $user_id)->pluck('Clothe_id')->toArray();
        $count = cart::where('user_id', $user_id)->count();
        $Category = Category::all();
        $WishlistShow = Wishlist::where('User_uuid', $user_id)->get();
        $link1  = Session::get('lastLink');
        if ($link1 && $userType != 1) {
            Session::forget('intended');
            Session::forget('lastLink');
            return redirect($link1);
        } else if ($link && $link != url('/') && $userType != 1) {
            Session::forget('intended');
            return redirect($link);
        }
        if ($userType == 1) {
            $AdminItemData = Category::get();
            $count = array("daily" => 0, "weekly" => 0, "monthly" => 0);
            $count['daily'] = User::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('0 days')))->where('userType', 0)->count();
            $count['weekly'] = User::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-7 days')))->where('userType', 0)->count();
            $count['monthly'] = User::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-30 days')))->where('userType', 0)->count();
            $users = Order::select('id', 'created_at')
                ->get()
                ->groupBy(function ($date) {
                    //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                    return Carbon::parse($date->created_at)->format('M'); // grouping by months
                })->toArray();
            // dd($users);
            $usermcount = [];
            $userArr = [];

            foreach ($users as $key => $value) {
                $usermcount[$key] = count($value);
            }
            return view('admin.adminHome', compact('Category', 'AdminItemData', 'count', 'usermcount'));
        } else {
            Session::forget('order_url');
            return view('home', compact('Category', 'user_id', 'count', 'CartData', 'WishlistShow'));
        }
    }

    public function cancel_order($order_id)
    {
        $order = Order::where('order_id', $order_id)->delete();
        return redirect()->back();
    }
    public function reviews(Request $request)
    {
        $user_id = Auth::id();
        $category_id = $request->input('category_id');
        $items_review = $request->input('items_review');
        $User_Name = User::where('id', $user_id)->pluck('name')->first();
        $User_email = User::where('id', $user_id)->pluck('email')->first();
        $review = new Review;
        $review->Category_id = $category_id;
        $review->Review = $items_review;
        $review->username = $User_Name;
        $review->email = $User_email;
        $review->save();
        return response()->json(['status' => "Updated"]);
    }
    public function SearchItems(Request $request)
    {
        $search = $request->Search_name;
        $data = Items::where('Name', 'like', '%' . $search . '%')->get();
        $user_id = Auth::id();
        $CartData = Cart::where('user_id', $user_id)->pluck('Clothe_id')->toArray();
        $WishlistShow = Wishlist::where('User_uuid', $user_id)->get();
        if ($user_id) {
            $count = cart::where('user_id', $user_id)->count();
        } else {
            $deviceId = Cookie::get('deviceId');
            $count = cart::where('deviceId', $deviceId)->count();
        }
        return view('BuyNow', compact('data', 'count', 'CartData', 'WishlistShow'));
    }
    public function search(Request $request)
    {
        $output = "";
        $value = $request->search;
        $products = Items::where('Name', 'LIKE', '%' . $value . "%")->get();
        $prod_data = $products->toArray();
        if ($value != "") {

            foreach ($products as $key => $product) {
                $uuid[] = $product->uuid;
                $output .= '<form action="">' .
                    '<a style="line-height:33px"  href="' . url('BuyNow', $product->uuid) . '"><li id="' . $product->uuid . 'search_output" value="' . $product->uuid . '" onClick=ClicktoSearch("' . $product->uuid . '")>' . $product->Name . '<sub>' . "In " . $product->Name_Categories . '</sub>' . '</li></a>' .
                    '<hr>';
            }
            return response()->json(['output' => $output, 'data' => $uuid]);
        } else {
            $output = " ";
            $uuid[] = null;
            return response()->json(['output' => $output, 'data' => $uuid]);
        }
    }
    public function SeemoreItems($Category)
    {
        $data_Name = Category::where('uuid', $Category)->pluck('Name')->first();
        $data = Items::where('category', $Category)->get();
        $caroloop = Category::where('uuid', $Category)->pluck('uuid')->first();
        $user_id = Auth::id();
        $CartData = Cart::where('user_id', $user_id)->pluck('Clothe_id')->toArray();
        $WishlistShow = Wishlist::where('User_uuid', $user_id)->get();
        if ($user_id) {
            $count = cart::where('user_id', $user_id)->count();
        } else {
            $deviceId = Cookie::get('deviceId');
            $count = cart::where('deviceId', $deviceId)->count();
        }

        return view('SeemoreItems', compact('data', 'count', 'CartData', 'data_Name', 'WishlistShow', 'caroloop'));
    }
    public function BuyNow($uuid)
    {
        $data = Items::where('uuid', $uuid)->get();
        $user_id = Auth::id();
        $CartData = Cart::where('user_id', $user_id)->pluck('Clothe_id')->toArray();
        $WishlistData = Wishlist::where('User_uuid', $user_id)->where('Item_uuid', $uuid)->pluck('Item_uuid')->toArray();
        $WishlistShow = Wishlist::where('User_uuid', $user_id)->get();
        foreach ($data as $item) {
            $size = $item->size;
        }
        $size1 = explode(',', $size);

        if ($user_id) {
            $count = cart::where('user_id', $user_id)->count();
        } else {
            $deviceId = Cookie::get('deviceId');
            $count = cart::where('deviceId', $deviceId)->count();
        }
        return view('BuyNow', compact('data', 'count', 'CartData', 'size1', 'WishlistData', 'WishlistShow'));
    }
    public function addcart(Agent $agent, Request $request)
    {
        $user_id = Auth::id();
        // dd($user_id);
        $ItemId = $request->input('items_id');
        $quantity = $request->input('items_qty');
        $size = $request->input('items_size');
        if (!$user_id) {
            $deviceId = Cookie::get('deviceId');
            if (!$deviceId) {
                $deviceId = Str::uuid();
                setcookie('deviceId', $deviceId, time() + (86400 * 30));
            }
            $MacId = $request->cookie('deviceId');
            $cart = new Cart;
            $cart->deviceId = $MacId;
            $cart->Clothe_id = $ItemId;
            $cart->quantity = $quantity;
            // dd($size);
            if ($size == 'Fixed Size') {
                $cart->item_size = " ";
            } else {
                $cart->item_size = $size;
            }
            $cart->save();

            $count = cart::where('deviceId', $deviceId)->count();
            return response()->json(['success' => "Added Successfully", 'count' => $count]);
        } else {
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->Clothe_id = $ItemId;
            $cart->quantity = $quantity;
            if ($size == 'Fixed Size') {
                $cart->item_size = " ";
            } else {
                $cart->item_size = $size;
            }
            $cart->save();
            $user_id = Auth::id();
            $count = cart::where('user_id', $user_id)->count();
            return response()->json(['success' => "Added Successfully", 'count' => $count]);
        }
    }

    public function wishlist()
    {
        $user_id = Auth::id();
        if ($user_id) {
            $wishlist = Wishlist::where('User_uuid', $user_id)->get();
            $count = cart::where('user_id', $user_id)->count();
            return view('Wishlist', compact('count', 'wishlist'));
        } else {
            $url = 'wishlist';
            Session::put('lastLink', $url);
            return redirect('/login');
        }
    }
    public function showcart(Request $request)
    {
        if (Auth::id()) {
            $id = Auth::id();
            $count = Cart::where('user_id', $id)->count();
            $data = Cart::SELECT(
                'carts.id',
                'items.uuid',
                'items.Image',
                'carts.Clothe_id',
                'carts.quantity',
                'items.Price',
                'items.Name',
                'carts.item_size',
                'items.uuid',
            )->where('user_id', $id)->join('items', 'carts.Clothe_id', '=', 'items.uuid')->get();
            $total = 0;
            foreach ($data as $item) {
                $total += $item->Price;
            }
            $WishlistShow = Wishlist::where('User_uuid', $id)->get();
            return view('cart', compact('count', 'data', 'total', 'WishlistShow'));
        } else {
            $id = Auth::id();
            $deviceId = Cookie::get('deviceId');
            $count = Cart::where('user_id', $id)->where('deviceId', $deviceId)->count();
            $data = Cart::SELECT(
                'carts.id',
                'items.Image',
                'carts.Clothe_id',
                'carts.quantity',
                'items.Price',
                'items.Name',
                'carts.item_size',
                'items.uuid',
            )->where('user_id', $id)->where('deviceId', $deviceId)->join(
                'items',
                'carts.Clothe_id',
                '=',
                'items.uuid'
            )->get();
            $total = 0;
            foreach ($data as $item) {
                $total += $item->Price;
            }
            $WishlistShow = Wishlist::where('User_uuid', $id)->get();
            return view('cart', compact('data', 'count', 'total', 'WishlistShow'));
        }
    }
    public function searchprod(Request $request)
    {
        $Items = $request->searcharr;
        foreach ($Items as $Key => $it) {
            $data = explode(',', $Items[$Key]);
            // dd($array);
        }
        $id = Auth::id();
        if (Auth::id()) {
            $count = Cart::where('user_id', $id)->count();
        } else {
            $id = Auth::id();
            $deviceId = Cookie::get('deviceId');
            $count = Cart::where('user_id', $id)->where('deviceId', $deviceId)->count();
        }
        return view('searchresult', compact('data', 'count'));
    }

    public function shipping(Request $request)
    {

        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        $id = Auth::id();
        $ItemUuid = $request->hidden_uuid;
        $ItemSize = $request->ItemSize;
        $ItemQuantity = $request->quantity;
        $ItemPrice = $request->price;
        $session = Session::get('item_data');
        $cart = Cart::where('user_id', $id)->get();
        $count = cart::where('user_id', $id)->count();
        if ($ItemUuid == null && $session == null && $id && $cart) {
            $total = 0;
            // dd( count($cart));
            $data = [];
            foreach ($cart as $i => $item) {
                $data[$i]['uuid'] = $item->Clothe_id;
                $data[$i]['quantity'] = $item->quantity;

                if (isset($item->item_size[$i])) {
                    $data[$i]['item_size'] = $item->item_size;
                } else {
                    $data[$i]['item_size'] = " ";
                }
                $itemPrice = Items::where('uuid', $item->Clothe_id)->first();
                $data[$i]['price'] = $itemPrice->Price;
            }
            Session::put('item_data', $data);
            $total = 0;
            $session = Session::get('item_data');
            foreach ($session as $items) {
                $total += $items['price'];
            }
            return view('Shipping', compact('session', 'total', 'count'));
        }
        if ($ItemUuid) {
            $data = [];
            for ($i = 0; $i < count($ItemUuid); $i++) {
                $data[$i]['uuid'] = $ItemUuid[$i];
                $data[$i]['quantity'] = $ItemQuantity[$i];
                if ($ItemSize[$i] == 'Fixed Size') {
                    $data[$i]['item_size'] = " ";
                } else {
                    $data[$i]['item_size'] = $ItemSize[$i];
                }
                $data[$i]['price'] = $ItemPrice[$i];
                $getPrice[] = Items::where('uuid', $ItemUuid[$i])->get();
            }
            Session::put('item_data', $data);
            $data = [];
            for ($i = 0; $i < count($ItemUuid); $i++) {
                $CartData = Cart::where('Clothe_id', $ItemUuid)->where('user_id', $id)->get();
                if ($CartData->isEmpty()) {
                    $deviceId = Cookie::get('deviceId');
                    if (!$deviceId) {
                        $deviceId = Str::uuid();
                        setcookie('deviceId', $deviceId, time() + (86400 * 30));
                    }
                    $cart = new Cart;
                    if (!$id) {
                        $MacId = $request->cookie('deviceId');
                        $cart->deviceId = $MacId;
                    } else {
                        $cart->user_id = $id;
                    }
                    $cart->Clothe_id = $ItemUuid[$i];
                    $cart->quantity = $ItemQuantity[$i];
                    if ($ItemSize[$i] == 'Fixed Size') {
                        $cart->item_size = " ";
                    } else {
                        $cart->item_size = $ItemSize[$i];
                    }
                    $cart->save();
                } else {
                    if ($ItemSize == " ") {
                        DB::table('carts')->where('Clothe_id', $ItemUuid)->where('user_id', $id)->update(['quantity' => $ItemQuantity[$i], 'item_size' => " "]);
                    } else {
                        DB::table('carts')->where('Clothe_id', $ItemUuid)->where('user_id', $id)->update(['quantity' => $ItemQuantity[$i], 'item_size' => $ItemSize[$i]]);
                    }
                }
                $getPrice[] = Items::where('uuid', $ItemUuid[$i])->get();
            }
        }
        // dd($total);
        if ($id) {
            $session = Session::get('item_data');

            $total = 0;
            foreach ($session as $items) {
                $total += $items['price'];
            }
            foreach ($session as $item) {
                DB::table('carts')->where('Clothe_id', $item['uuid'])->where('user_id', $id)->delete();
            }
            foreach ($session as $item) {
                $cart = new Cart;
                $cart->user_id = $id;
                $cart->Clothe_id = $item['uuid'];
                $cart->quantity = $item['quantity'];
                if ($item['item_size'] == " ") {
                    $cart->item_size = " ";
                } else {
                    $cart->item_size = $item['item_size'];
                }
                $cart->save();
            }
            $WishlistShow = Wishlist::where('User_uuid', $id)->get();
            $count = cart::where('user_id', $id)->count();
            return view('Shipping', compact('session', 'total', 'WishlistShow', 'count'));
        } else {
            $url = '/shipping';
            Session::put('lastLink', $url);
            return redirect('/login');
        }
    }
    public function checkout(Request $request)
    {
        // $method = \Request::method();
        // dd($method);
        $id = Auth::id();
        $itemData = Session::get('item_data');
        $order_url = Session::get('order_url');
        if ($order_url == "/order") {
            Session::forget('order_url');
            return redirect('/shipping');
        }
        $total = 0;
        $Name = $request->ShipFirstName . ' ' . $request->ShipLastName;
        $Detaildata['name'] = $Name;
        $Detaildata['address'] = $request->ShipAddress;
        $Detaildata['country'] = $request->ShipCountry;
        $Detaildata['Zipcode'] = $request->ShipZipcode;
        $Detaildata['city'] = $request->ShipCity;
        $Detaildata['state'] = $request->ShipState;
        Session::put('detail_data', $Detaildata);
        $total = 0;
        foreach ($itemData as $items) {
            $total += $items['price'];
        }
        $WishlistShow = Wishlist::where('User_uuid', $id)->get();

        \Stripe\Stripe::setApiKey('sk_test_51N4Ia5SJ1UYNZRihzhehW5GJfdAfcg1A8u8msW0ycdgSeAKbg9izUpgueQkg3jpLE1IIAvGTDklSXO3nV8xpAeiT00YJf9gToP');

        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'INR',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        $trans_id = $payment_intent->id;
        // $paymentIntent = PaymentIntent::retrieve($trans_id);
        // dd($paymentIntent);
        if (!$itemData) {
            $itemData = array();
            $count = cart::where('user_id', $id)->count();
            return view('checkout', compact('itemData', 'total', 'WishlistShow', 'intent', 'trans_id', 'count'));
        }
        $count = cart::where('user_id', $id)->count();
        unset($_POST);
        return view('checkout', compact('itemData', 'total', 'WishlistShow', 'intent', 'trans_id', 'count'));
    }
    public function afterPayment(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51N4Ia5SJ1UYNZRihzhehW5GJfdAfcg1A8u8msW0ycdgSeAKbg9izUpgueQkg3jpLE1IIAvGTDklSXO3nV8xpAeiT00YJf9gToP');
        $trans = $request->trans_id;
        $paymentIntent = PaymentIntent::retrieve($trans);
        if ($paymentIntent->status === 'succeeded') {
            Session::put('PayMethod', 'OnlinePayment');
            return redirect('OrderPlace');
        } else {
            // Payment failed, handle the error
            return response()->json(['success' => false]);
        }
    }
    public function removecart(Request $request)
    {
        $ItemId = $request->input('items_id');
        $id = Auth::id();
        if ($id) {
            $data = Cart::where('Clothe_id', $ItemId)->where('user_id', $id);
        } else {
            $deviceId = Cookie::get('deviceId');
            $data = Cart::where('Clothe_id', $ItemId)->where('deviceId', $deviceId)->where('user_id', $id);
        }
        $data->delete();
        if (Auth::id()) {
            $id = Auth::id();
            $count = Cart::where('user_id', $id)->count();
            $data2 = Cart::SELECT(
                'carts.id',
                'items.Image',
                'carts.Clothe_id',
                'carts.quantity',
                'items.Price',
                'items.Name',
                'items.size',
            )->where('user_id', $id)->join('items', 'carts.Clothe_id', '=', 'items.uuid')->get();
        } else {
            $id = Auth::id();
            $deviceId = Cookie::get('deviceId');
            $count = Cart::where('user_id', $id)->where('deviceId', $deviceId)->count();
            $data2 = Cart::SELECT(
                'carts.id',
                'items.Image',
                'carts.Clothe_id',
                'carts.quantity',
                'items.Price',
                'items.Name',
                'items.size',
            )->where('user_id', $id)->where('deviceId', $deviceId)->join(
                'items',
                'carts.Clothe_id',
                '=',
                'items.uuid'
            )->get();
        }
        // $response['data'] = $data2;
        // return $response;
        $html = "";
        $html1 = "";
        foreach ($data2 as $data) {
            $html .= '<div class="row border-top border-bottom">
                <div class="row main align-items-center" style="display: inherit">
                    <div class="col-2"><a href="' . url('BuyNow',  $data->Clothe_id) . '"><img
                                class="img-fluid" style="width:5.5rem"
                                src="/ItemImage/' . $data->Image . '"></a>
                    </div>
                    <div class="col-2">
                        <input type="hidden" name="hidden_uuid[]" value="' . $data->Clothe_id . '" id="ItemsId1"
                            class="ItemsId">
                        <a href="' . url('BuyNow', $data->Clothe_id) . '"> <input type="hidden"
                                name="foodname[]" value="' . $data->title . ' ">
                            ' . $data->Name . ' </a>
                    </div>
                    <div class="col-1">
                        <input type="hidden" name="quantity[]"
                            value="' . $data->quantity . '" >' . $data->quantity . '
                    </div>
                    <div class="col-3">';

            $size = explode(',', $data->size);
            $html .= '<select name="ItemSize[]">
            <option>Select Size</option>';
            foreach ($size as $size1) {
                $html .= '<option value="' . $size1 . '">' . $size1 . '</option>';
            };;

            $html .= '</select>
                    </div>
                    <div class="col-3" id="removeID">Rs.' . $data->Price . '<span class="close"
                                        onclick=getCart("' . $data->Clothe_id . '")>&#10005;</a></span></div>
                </div>
            </div>';
        };
        if ($data2->isEmpty()) {
            $html1 .= '<h1 class="empty-cart">Your Cart is Empty</h1>';
        } else {
            $html1 .= '<button id="order" type="submit" class="basicButton btn btn-primary">Checkout</button>';
        }
        return response()->json([
            'status' => "Removed successfully",
            'ItemId' => $ItemId,
            'Data2' => $data2,
            'Html' => $html,
            'Html1' => $html1,
            'count' => $count
        ]);
    }

    public function OrderPlace()
    {
        $itemData = Session::get('item_data');
        $detail_data = Session::get('detail_data');
        $id = Auth::id();
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $orderId = '';
        for ($i = 0; $i < 7; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $orderId .= $characters[$index];
        }
        $check = Order::where('Order_id', $orderId)->count();
        if ($check > 0) {
            $orderID = $this->OrderPlace();
        }
        $User_uuid = User::where('id', $id)->first();
        Session::put('order_url', '/order');
        $PayMethod = Session::get('PayMethod');
        foreach ($itemData as $data) {
            $Order = new Order;
            $Order->item_uuid = $data['uuid'];
            $Order->user_id = $User_uuid->id;
            $Order->user_name = $detail_data['name'];
            $Order->user_address = $detail_data['address'];
            $Order->user_country = $detail_data['country'];
            $Order->user_zip = $detail_data['Zipcode'];
            $Order->user_city = $detail_data['city'];
            $Order->user_state = $detail_data['state'];
            $Order->Order_id = $orderId;

            if ($PayMethod) {
                $Order->Payment_Method = 'Online Payment';
            } else {
                $Order->Payment_Method = 'COD';
            }
            if ($data['item_size'] != " ") {
                $Order->item_size = $data['item_size'];
            } else {
                $Order->item_size = " ";
            }
            $Order->item_quantity = $data['quantity'];
            $Order->save();
            $data_for_delete = Cart::where('Clothe_id', $data['uuid'])->where('user_id', $User_uuid->id)->first();
            $data_for_delete->delete();
            $quantity_dec = Items::where('uuid', $data['uuid'])->first();
            if ($quantity_dec) {
                $quantity_dec->quantity -= $data['quantity'];
                $quantity_dec->save();
            }
        }
        Session::forget('detail_data');
        Session::forget('item_data');
        $WishlistShow = Wishlist::where('User_uuid', $id)->get();
        $count = cart::where('user_id', $id)->count();
        return view('Confirmation', compact('WishlistShow', 'count'));
    }
    public function MyOrders()
    {
        $id = Auth::id();
        $WishlistShow = Wishlist::where('User_uuid', $id)->get();
        $count = cart::where('user_id', $id)->count();
        // $orders = Order::select('Order_id')->where('user_id', $id)->distinct()->get();
        $orders = Order::select('Order_id')->distinct()->where('user_id', $id)->get();


        if ($id) {
            // foreach($orders as $item){
            //     $OrderData[] = DB::table('orders')->join('items','items.uuid','=','orders.item_uuid')->where('order_id', $item->Order_id)->sum('Price');
            // }
            // dd($OrderData);
            return view('OrderPlace', compact('WishlistShow', 'count', 'orders'));
        } else {
            $url = 'myOrders';
            Session::put('lastLink', $url);
            return redirect('/login');
        }
    }
    public function notify(Request $request)
    {
        $ItemId = $request->input('items_id');
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email:rfc,dns|max:255',
        ]);
        $Useremail = $request->input('email');
        $same = Notify::where('email', $Useremail)->get();
        if (!$same->isEmpty()) {
            return response()->json(['error1' => 'Email already exists']);
        }
        $id = Auth::id();
        if ($validator->passes()) {
            $Notify = new Notify;
            $Notify->User_uuid = $id;
            $Notify->Item_uuid = $ItemId;
            $Notify->email = $Useremail;
            $Notify->save();
            return response()->json(['success' => 'We will notify you ,Thanks For Using']);
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function addwishlist(Request $request)
    {
        $ItemId = $request->input('items_id');
        $id = Auth::id();
        $WishlistShow = Wishlist::where('User_uuid', $id)->get();
        $WishlistData = Wishlist::where('User_uuid', $id)->where('Item_uuid', $ItemId)->pluck('Item_uuid')->toArray();
        if ($WishlistData) {
            $data = Wishlist::where('Item_uuid', $ItemId)->where('User_uuid', $id)->delete();
            return response()->json(['status' => "🥲removed successfully"]);
        } else {
            $Wishlist = new Wishlist;
            $Wishlist->User_uuid = $id;
            $Wishlist->Item_uuid = $ItemId;
            $Wishlist->save();

            return response()->json(['status' => "😊Added to wishlist"]);
        }
    }
    public function removefromwish(Request $request)
    {
        $ItemId = $request->input('items_id');
        $id = Auth::id();

        // $data->delete();
        $WishlistShow = Wishlist::where('User_uuid', $id)->get();
        $WishlistData = Wishlist::where('User_uuid', $id)->where('Item_uuid', $ItemId)->pluck('Item_uuid')->toArray();
        $html = "";
        $html = "";
        $htm = "";
        // $WishItems = DB::table('items')->select('*')->where('uuid', $data->Item_uuid)->get();
        // foreach ($WishItems as $data1) {
        $htm .= ' <input type="checkbox" class="lv_checkbox" id="lv_checkbox10"';
        if ($WishlistData) {
            $htm .= ' checked onclick=removefromwish("' . $ItemId . '")';
        } else {
            $htm .= ' onclick=addtowishlist("' . $ItemId . '")';
        }
        $htm .= '>
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
                                            </label>';
        // }

        if ($WishlistShow->isEmpty()) {
            $html .=  '<a style="color: #000000"><u>Empty</u></a><br>';
        } else {
            foreach ($WishlistShow as $data) {
                $WishItems = DB::table('items')->select('*')->where('uuid', $data->Item_uuid)->get();
                foreach ($WishItems as $item) {
                    $html .= ' <div class="row">
            <div class="col-5"> <a style="width:105px" href="' . url("BuyNow", $item->uuid) . '">
                    <img style="margin-left: -26px;" src="/ItemImage/' . $item->Image . '"
                        alt="">
                </a></div>
            <div class="col-7">
                <div style="color: rgb(0, 0, 0)">' . $item->Name . '</div>
                <div style="color: rgb(0, 0, 0)">Rs.' . $item->Price . '</div>
                <div><a  onclick=removefromwish("' . $item->uuid . '")
                        style="color: rgb(0, 0, 0);font-size:15px">remove</a></div>
            </div>
        </div>
        <hr style="border:1px solid grey">
        <br>';
                };
            };
        }
    }
}
