<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
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
        $user = Customer::all();
        $orders = Orders::orderBy('Order_Date', 'desc')->get()->toArray();
        $order_details = Order_details::all()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('variants', 'pictures', 'products', 'user', 'orders', 'order_details');

        return view('admin.ViewOrders')->with($data);
    }

    public function todayOrders()
    {
        $user = Customer::all();
        $orders = Orders::orderBy('Order_Date', 'desc')->where('Order_Date', date('Y-m-d'))->get()->toArray();
        $order_details = Order_details::all()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('variants', 'pictures', 'products', 'user', 'orders', 'order_details');

        return view('admin.TodayOrders')->with($data);
    }



    public function CustomerList()
    {
        $users = Customer::all();
        $orders = Orders::all()->toArray();
        $data = compact('users', 'orders');

        return view('admin.ViewCustomers')->with($data);
    }

    public function adminIndex()
    {
        $user = Customer::all()->toArray();
        $products = Product::all()->toArray();
        $categories = Category::all()->toArray();
        $brands = Brand::all()->toArray();
        $today_order = Orders::where('Order_Date', date("Y-m-d"))->get()->toArray();

        $data = compact('user', 'products', 'categories', 'brands', 'today_order');

        return view('admin.admin-index')->with($data);
    }

    public function adminLogin()
    {
        return view('admin.adminLogin');
    }

    public function login(Request $req)
    {

        try {
            $x = Admin::where('Username', $req->Uname)->get()->toArray();

            if ($req->Uname == $x[0]['Username']) {
                if ($req->pswd == $x[0]['password']) {

                    session()->put('admin_id', $x[0]['id']);

                    return redirect('/admins-index');
                } else {
                    return redirect('/admins/validate/admin')->with('msg', 'Invalid Password !');
                }
            } else {
                return redirect('/admins/validate/admin')->with('msg', 'Invalid Username !');
            }
        } catch (\Throwable $th) {
            return redirect('/admins/validate/admin')->with('msg', 'Invalid Username !');
        }
    }

    public function logout()
    {
        session()->remove('admin_id');

        return redirect('/');
    }
}
