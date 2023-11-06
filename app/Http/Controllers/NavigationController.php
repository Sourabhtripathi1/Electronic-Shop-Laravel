<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order_details;
use App\Models\Orders;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Variants;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function indexPage()
    {

        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();
        $products = Product::all()->toArray();
        $variants = Variants::all()->toArray();
        $images = Picture::all()->toArray();
        $category = Category::all()->toArray();
        $brands = Brand::all()->toArray();

        $data = compact('products', 'variants', 'images', 'brands', 'category', 'cart');

        return view('frontend.index')->with($data);
    }

    public function shopPage(Request $req)
    {

        if ($req->input('query')) {

            $category = Category::all()->toArray();
            $brands = Brand::all()->toArray();
            $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();
            $products_all = Product::all()->toArray();
            $products = Product::all()->toArray();
            $variants = Variants::all()->toArray();
            $images = Picture::all()->toArray();

            $arr = $req->input('query');
            $data = json_decode(base64_decode($arr));

            $cat = count($data->category)>0?$data->category:getAllCat($category);
            $brnd = count($data->brand)>0?$data->brand: getAllBrand($brands);
            $price = $data->price;

            // print_r($cat);
            // echo "<br>";
            // print_r($brnd);
            // echo "<br>";
            // print_r($price);




            $products = array_filter($products_all, function ($item) use ($brnd, $cat, $price, $variants) {

                return (in_array($item['Category'], $cat) && in_array($item['Brand'], $brnd)) && (getPrice($item['Product_id'], $variants) > $price->min && getPrice($item['Product_id'], $variants) < $price->max);

            });

            $data = compact('products', 'variants', 'images', 'brands', 'category', 'cart', 'products_all');

            //  print_r($products);
            return view('frontend.Shop')->with($data);

        } else {

            $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();
            $products = Product::all()->toArray();
            $products_all = Product::all()->toArray();
            $variants = Variants::all()->toArray();
            $images = Picture::all()->toArray();
            $category = Category::all()->toArray();
            $brands = Brand::all()->toArray();

            $data = compact('products', 'variants', 'images', 'brands', 'category', 'cart', 'products_all');

            return view('frontend.Shop')->with($data);
        }
    }

    public function about()
    {
        return view('frontend.about');
    }
















    public function userDashboard()
    {

        return view('frontend.UserDashboard');
    }

    public function userAllOrders()
    {
        $orders = Orders::where('User_id', session('user_id'))->where('Status', 'Dilevered')->get()->toArray();
        $order_details = Order_details::all()->toArray();

        $data = compact('orders', 'order_details');

        return view('frontend.UserAllOrders')->with($data);
    }

    public function userActiveOrders()
    {
        $orders = Orders::where('User_id', session('user_id'))->where('Status', '!=', 'Dilevered')->get()->toArray();
        $order_details = Order_details::all()->toArray();

        $data = compact('orders', 'order_details');
        return view('frontend.UserActiveOrders')->with($data);
    }

    public function userProfile()
    {


        return view('frontend.UserProfile');
    }

    public function userLogin()
    {

        return view('frontend.LoginPage');
    }

    public function userLogout()
    {
        session()->remove('user_id');

        return redirect("/");
    }

    public function userCart()
    {
        $cart = Cart::where("User_id", session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('cart', 'variants', 'pictures', 'products');
        return view('frontend.UserCart')->with($data);
    }

    public function userWishlist()
    {

        $wishlist = Wishlist::where("User_id", session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('wishlist', 'variants', 'pictures', 'products');
        return view('frontend.UserWishlist')->with($data);
    }

    public function userCheckout()
    {
        $user = Customer::where('User_id', session('user_id'))->first()->toArray();
        $cart = Cart::where('User_id', session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('variants', 'pictures', 'products', 'cart', 'user');
        return view('frontend.checkout')->with($data);
    }
}
