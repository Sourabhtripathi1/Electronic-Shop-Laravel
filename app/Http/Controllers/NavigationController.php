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
use Ixudra\Curl\Facades\Curl;
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

        $lap = Category::where('Category_Name', 'Laptop')->first()->toArray()['Category_id'];
        $con = Category::where('Category_Name', 'Smart Phone')->first()->toArray()['Category_id'];

        $laptop_products = Product::where('Category', $lap)->get()->toArray();
        $con_products = Product::where('Category', $con)->get()->toArray();

        $data = compact('products', 'variants', 'images', 'brands', 'category', 'cart', 'laptop_products', 'con_products');

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

            $cat = count($data->category) > 0 ? $data->category : getAllCat($category);
            $brnd = count($data->brand) > 0 ? $data->brand : getAllBrand($brands);
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

    public function contactUsPage()
    {
        return view('frontend.ContactUs');
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
        $user = Customer::where('User_id', session('user_id'))->first()->toArray();

        $data = compact('user');
        return view('frontend.UserProfile')->with($data);
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

    public function postQuery(Request $req)
    {
        echo "<pre>";
    }








    public function managePayment(Request $req)
    {
        echo "<pre>";


        $cart = Cart::where('User_id', session('user_id'))->get()->toArray();

        $price=0;

        foreach ($cart as $value) {
            $price+=$value['Price']*$value['Quantity'];
        }



        $data = array(
            "merchantId" => "PGTESTPAYUAT",
            "merchantTransactionId" => "MT78507788068188104",
            "merchantUserId" => "MUID123",
            "amount" => ($price+50)*100,
            "redirectUrl" => env('APP_URL') . "/payment/response?user=" . session('user_id') . "&udata=" . base64_encode(json_encode(session('payment_data'))),
            "redirectMode" => "POST",
            "callbackUrl" => env('APP_URL') . "/payment/response?user=" . session('user_id') . "&udata=" . base64_encode(json_encode(session('payment_data'))),
            "mobileNumber" => "9999999999",
            "paymentInstrument" => array(
                "type" => "PAY_PAGE"
            )
        );


        print_r($data);

        $encode = base64_encode(json_encode($data));

        $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;

        $string = $encode . '/pg/v1/pay' . $saltKey;
        $sha256 = hash('sha256', $string);

        $finalXHeader = $sha256 . '###' . $saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay')
            ->withHeader('Content-Type:application/json')
            ->withHeader('X-VERIFY:' . $finalXHeader)
            ->withData(json_encode(['request' => $encode]))
            ->post();

        $rData = json_decode($response);

        // print_r($rData);

       return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
    }

    public function PaymentResponse(Request $request)
    {
        $input = $request->all();

        $user_data=json_decode(base64_decode($request->input('udata')));

         //dd($user_data);

        $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;

        $finalXHeader = hash('sha256', '/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'] . $saltKey) . '###' . $saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'])
            ->withHeader('Content-Type:application/json')
            ->withHeader('accept:application/json')
            ->withHeader('X-VERIFY:' . $finalXHeader)
            ->withHeader('X-MERCHANT-ID:' . $input['transactionId'])
            ->get();

        $rData = json_decode($response);

        //dd($rData);

        if (json_decode($response)->success == true) {
            session()->put('user_id', $request->input('user'));

            $user = Customer::where('User_id', session('user_id'))->first()->toArray();
            $cart = Cart::where('User_id', session('user_id'))->get()->toArray();
            $variants = Variants::all()->toArray();
            $products = Product::all()->toArray();

            echo "<pre>";

            $order_id = getID('15');

            $order = new Orders;

            $order->Order_id = $order_id;
            $order->Order_Date = date("y-m-d");
            $order->User_id = $user['User_id'];
            $order->Username = $user['Username'];
            $order->name = $user_data->name;
            $order->email = $user_data->email;
            $order->Hno = $user_data->Hno;
            $order->Address = $user_data->area . ", " . $user_data->city . ", " . $user_data->state . ", " . $user_data->country;
            $order->Payment_Method = $user_data->payment;
            $order->contact = $user_data->tel;
            $order->PINCODE = $user_data->zip;
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

            return redirect('/user/checkout');
        } else {
            echo 'Payment Unsuccessful';
        }
    }
}
