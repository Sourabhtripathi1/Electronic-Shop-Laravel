<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Product;
use App\Models\Variants;
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

    public function userDashboard(){


        return view('frontend.UserDashboard');
    }

    public function userAllOrders(){


        return view('frontend.UserAllOrders');
    }

    public function userActiveOrders(){


        return view('frontend.UserActiveOrders');
    }

    public function userProfile(){


        return view('frontend.UserProfile');
    }
}
