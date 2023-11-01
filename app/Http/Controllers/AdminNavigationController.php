<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order_details;
use App\Models\Orders;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Variants;
use Illuminate\Http\Request;

class AdminNavigationController extends Controller
{
    public function OrderList()
    {
        $user = Customer::where('User_id', session('user_id'))->first()->toArray();
        $orders = Orders::all()->toArray();
        $order_details = Order_details::all()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('variants', 'pictures', 'products', 'user', 'orders', 'order_details');

        return view('admin.ViewOrders')->with($data);
    }
}
