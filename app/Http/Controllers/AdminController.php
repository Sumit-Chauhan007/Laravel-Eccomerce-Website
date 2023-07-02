<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use App\Models\Notify;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function users()
    {
        $data = User::all();
        $AdminItemData = Category::get();
        return view('admin.users', compact('data', 'AdminItemData'));
    }

    public function Get_Category($id)
    {
        $data = Items::where('Category', $id)->get();
        $size = Items::where('Category', $id)->pluck('size')->first();
        $AdminItemData = Category::get();
        $Name = Category::where('uuid', $id)->pluck('Name')->first();
        return view('admin.jewellery', compact('data', 'AdminItemData', 'Name','size'));
    }
    public function outofstock(){
        $OutStock = Items::where('quantity', 0)->get();
        $AdminItemData = Category::get();
        return view('admin.outofstockorder', compact('AdminItemData','OutStock'));
    }
    public function uploadItem(Request $request)
    {
        $data = new Items;
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,gif,jpg|max:200'
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('ItemImage', $imageName);
        $data->Image = $imageName;
        $data->Name = $request->ItemName;
        $data->Price = $request->price;
        $data->quantity = $request->quantity;
        $data2 = $request->vehicle1;
        if ($data2) {
            $data1 = implode(',', $data2);
            $data->size = $data1;
        }
        $data->Category = $request->Category;
        $trend = $request->trending;
        if ($trend) {
            $data->Trend = true;
        }

        $data->save();
        return redirect()->back();
    }
    public function Category(Request $request)
    {
        $data = new Category;
        $data->Category = $request->CategoryName;
        $data->Name = $request->CategoryTitle;
        $data->save();
        return redirect()->back();
    }
    public function deleteUsers($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function deleteClothe($uuid)
    {
        $data = Items::where('uuid', $uuid)->first();

        $data->delete();
        return redirect()->back();
    }
    public function deleteReview($id)
    {
        $data = Review::where('uuid', $id)->first();
        $data->delete();
        return redirect()->back();
    }
    public function updateItem($uuid)
    {
        $data = Items::find($uuid);
        $AdminItemData = Category::get();
        return view('admin.updatedItems', compact('data', 'AdminItemData'));
    }
    public function addReview($uuid)
    {
        $data = Review::where('uuid', $uuid)->first();
        // dd($data1);
        // $data = Review::find($data1);
        // dd($data);
        if ($data->Added == true) {
            Review::where('uuid', $uuid)
                ->update([
                    'Added' => false
                ]);
        } else {
            Review::where('uuid', $uuid)
                ->update([
                    'Added' => true
                ]);
        }
        return redirect()->back();
    }

    public function updatedItems(Request $request, $uuid)
    {
        $quantity_prev = Items::select('quantity')->where('uuid', $uuid)->first();
        // dd($quantity);
        $data = Items::find($uuid);
        $trend = $request->trending;
        if ($trend) {
            $data->Trend = true;
        } else {
            $data->Trend = false;
        }
        $image = $request->Image;
        if ($image) {
            $this->validate($request, [
                'Image' => 'required|image|mimes:jpeg,png,gif,jpg|max:0'
            ]);
            $image = $request->file('Image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->Image->move('ItemImage', $imageName);
            $data->Image = $imageName;
        }
        $data->Name = $request->Name;
        $data->quantity = $request->Quantity;
        $data->Price = $request->Price;
        $data->save();
        if ($quantity_prev->quantity  <= 0 && $request->Quantity > 0) {
            $useremail = Notify::get();
            $wish = Wishlist::where('Item_uuid',$uuid)->get();
            $ItemName = $request->Name;

            foreach( $wish as $wishes){
                $wishes->delete();
            }foreach( $useremail as $email){
            Mail::send('emails.stocksinc', ['name' => $ItemName], function ($message) use ($email){
                $message->to($email->email)->subject('Welcome!');
            });
            $email->delete();
        }
        }
        $cat = Items::select('Category')->where('uuid', $uuid)->first();

        return redirect('/admin/Category/'.$cat->Category);
    }


    public function addItems()
    {
        $AdminItemData = Category::get();
        return view('admin.addItems', compact('AdminItemData'));
    }
    public function Get_Reviews($id)
    {
        $reviewsForAdmin = Review::where('Category_id', $id)->get();
        $AdminItemData = Category::get();
        $Name = Category::where('uuid', $id)->pluck('Name')->first();
        return view('admin.reviewsviews', compact('AdminItemData', 'reviewsForAdmin', 'Name'));
    }
    public function Orders()
    {
        $Orders = Order::get();
        $AdminItemData = Category::get();
        return view('admin.orders', compact('Orders', 'AdminItemData'));
    }
}
