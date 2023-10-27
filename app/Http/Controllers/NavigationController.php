<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Variants;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function indexPage()
    {
        $products = Product::all()->toArray();
        $variants = Variants::all()->toArray();
        $images = Picture::all()->toArray();
        $category = Category::all()->toArray();
        $brands = Brand::all()->toArray();

        $data = compact('products', 'variants', 'images', 'brands', 'category');

        return view('frontend.index')->with($data);
    }

    public function userDashboard()
    {


        return view('frontend.UserDashboard');
    }

    public function userAllOrders()
    {


        return view('frontend.UserAllOrders');
    }

    public function userActiveOrders()
    {


        return view('frontend.UserActiveOrders');
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
        $cart = Cart::where("User_id",  session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('cart', 'variants', 'pictures', 'products');
        return view('frontend.UserCart')->with($data);
    }

    public function userWishlist()
    {

        $wishlist = Wishlist::where("User_id",  session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('wishlist', 'variants', 'pictures','products');
        return view('frontend.UserWishlist')->with($data);
    }
}
