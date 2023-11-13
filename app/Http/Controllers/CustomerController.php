<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order_details;
use App\Models\Orders;
use App\Models\Variants;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

function getID($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $id = '';
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $id .= $characters[$randomIndex];
    }
    return $id;
}

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function Customer_signup(Request $req)
    {
        // echo "<pre>";
        // print_r($req->all());

        $req->validate([
            'email' => 'required|email',
            'Uname' => 'required',
            'name' => 'required',
            'password' => 'required',
            'cnf_password' => 'required|same:password'
        ]);

        $x = Customer::where('Email', $req->email)->orWhere('Username', $req->Uname)->get();

        print_r($x);

        echo count($x);

        if (count($x) == 0) {
            $cus = new Customer;

            $cus->User_id = getID(15);
            $cus->Username = $req->Uname;
            $cus->Password = $req->password;
            $cus->Name = $req->name;
            $cus->Email = $req->email;

            $cus->save();
            return redirect('/user/login')->with('msg', 'User Successfully Saved');
        } else {
            return redirect('/user/login')->with('msg', 'Username or Email Already Exists !');
        }
    }

    public function Customer_login(Request $req)
    {
        $x = Customer::where('Email', $req->Uname)->orWhere('Username', $req->Uname)->get()->toArray();

        if (count($x) > 0) {

            if ($x[0]['Username'] == $req->Uname || $x[0]['Email'] == $req->Uname) {
                if ($x[0]['Password'] == $req->pswd) {
                    echo $x[0]['Password'];

                    session()->put('user_id', $x[0]['User_id']);

                    return redirect('/');
                } else {
                    return redirect('/user/login')->with('msg', 'Invalid Password !');
                }
            } else {
                return redirect('/user/login')->with('msg', 'Invalid Username or Email !');
            }
        } else {
            return redirect('/user/login')->with('msg', 'Invalid Username or Email !');
        }
    }

    public function add_wishlist(string $id, $var)
    {

        $wishlist = Wishlist::where("Product_id", $id)->where('User_id', session("user_id"))->get()->toArray();

        if (count($wishlist) == 0) {
            $wish = new Wishlist;

            $wish->Product_id = $id;
            $wish->Variant_id = $var;
            $wish->User_id = session("user_id");


            $wish->save();

            return ["result" => "success", "msg" => "Item added in wishlist"];
        } else {
            return ["result" => "error", "msg" => "Item Already exists"];
        }
    }

    public function remove_wishlist(string $id)
    {
        DB::table('wishlists')->where('Sno', $id)->delete();
        return ["result" => "success", "msg" => "Item Removed From wishlist"];
    }

    public function add_to_cart(Request $req)
    {

        $carts = Cart::where('User_id', session("user_id"))->where("variant_id", $req->var_id)->get()->toArray();

        if (count($carts) > 0) {
            return redirect()->back()->with('error', "already exists on cart");
        } else {
            $var = Variants::where("variant_id", $req->var_id)->first()->toArray();


            $cart = new Cart;

            $cart->User_id = session('user_id');
            $cart->Product_id = $req->prod_id;
            $cart->Variant_id = $req->var_id;
            $cart->Quantity = $req->qty;
            $cart->Price = $var['Price'];

            $cart->save();

            return redirect()->back()->with('success', "added to cart");
        }
    }

    public function add_to_cart2(string $id, $var)
    {
        $variants = Variants::all()->toArray();
        echo $var . "<br>";
        $a = getVariantPrice($var, $variants);


        $carts = Cart::where('User_id', session("user_id"))->where("variant_id", $var)->get()->toArray();

        if (count($carts) > 0) {
            return redirect()->back()->with('error', "already exists on cart");
        } else {
            $vars = Variants::where("variant_id", $var)->first()->toArray();

            $cart = new Cart;

            $cart->User_id = session('user_id');
            $cart->Product_id = $id;
            $cart->Variant_id = $var;
            $cart->Quantity = 1;
            $cart->Price = getVariantPrice($var, $variants);

            $cart->save();


            return redirect()->back()->with('success', "added to cart");
        }
    }


    public function remove_to_cart(string $id)
    {
        DB::table('carts')->where('Sno', $id)->delete();
        return redirect()->back()->with('success', "Item Removed From Cart !");
    }

    public function inc_to_cart(string $id)
    {
        $qty = Cart::where('Sno', $id)->first()->toArray()['Quantity'];
        DB::table('carts')->where('Sno', $id)->update(['Quantity' => ++$qty]);

        return ["result" => "success", "msg" => "added"];
    }

    public function dec_to_cart(string $id)
    {
        $qty = Cart::where('Sno', $id)->first()->toArray()['Quantity'];
        DB::table('carts')->where('Sno', $id)->update(['Quantity' => --$qty]);

        return ["result" => "success", "msg" => "removed"];
    }

    public function userCheckout(Request $req)
    {
        $user = Customer::where('User_id', session('user_id'))->first()->toArray();
        $cart = Cart::where('User_id', session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $products = Product::all()->toArray();

        echo "<pre>";
        if ($req['payment'] == "COD") {
            $order_id = getID('15');

            $order = new Orders;

            $order->Order_id = $order_id;
            $order->Order_Date = date("y-m-d");
            $order->User_id = $user['User_id'];
            $order->Username = $user['Username'];
            $order->name = $req['name'];
            $order->email = $req['email'];
            $order->Hno = $req['Hno'];
            $order->Address = $req['area'] . ", " . $req['city'] . ", " . $req['state'] . ", " . $req['country'];
            $order->Payment_Method = $req['payment'];
            $order->contact = $req['tel'];
            $order->PINCODE = $req['zip'];
            $order->Status = "Placed";

            $order->save();

            foreach ($cart as $item) {
                $ordet = new Order_details;

                $ordet->Order_id = $order_id;
                $ordet->Product_id = $item['Product_id'];
                $ordet->Variant_id = $item['Variant_id'];
                $ordet->Product_name = getProductNameFromVariant($item['Variant_id'], $variants, $products);
                $ordet->Price = $item['Price'];
                $ordet->Quantity = $item['Quantity'];

                $ordet->save();

                DB::table('carts')->where('Sno', $item['Sno'])->delete();
            };
        }

        return redirect()->back();
    }

    public function UpdateUser()
    {
        DB::table('customers')->where('User_id', session('user_id'))->update([
            'Name' =>  request()->input('name'),
            'Username' =>  request()->input('uname'),
            'Email' => request()->input('email'),
        ]);
        $user = Customer::where('User_id', session('user_id'))->first()->toArray();

        return response()->json(['message' => $user]);
    }
}
