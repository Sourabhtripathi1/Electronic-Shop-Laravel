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
use App\Mail\queryMail;
use Mail;



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
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();
        $products = Product::all()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $category = Category::all()->toArray();
        $brands = Brand::all()->toArray();

        $lap = Category::where('Category_Name', 'Laptop')->first()->toArray()['Category_id'];
        $phone = Category::where('Category_Name', 'Smart Phone')->first()->toArray()['Category_id'];
        $camera = Category::where('Category_Name', 'Camera')->first()->toArray()['Category_id'];
        $tv = Category::where('Category_Name', 'Television')->first()->toArray()['Category_id'];
        $headphone = Category::where('Category_Name', 'Headphones')->first()->toArray()['Category_id'];

        $laptop_products = Product::where('Category', $lap)->get()->toArray();
        $phone_products = Product::where('Category', $phone)->get()->toArray();
        $camera_products = Product::where('Category', $camera)->get()->toArray();
        $tv_products = Product::where('Category', $tv)->get()->toArray();
        $headphone_products = Product::where('Category', $headphone)->get()->toArray();


        $data = compact('products', 'variants', 'pictures', 'brands', 'category', 'cart', 'wish_count', 'laptop_products', 'phone_products', 'camera_products', 'tv_products', 'headphone_products');

        return view('frontend.index')->with($data);
    }

    public function shopPage(Request $req)
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();

        if ($req->input('query')) {
// echo "<pre>";
//             print_r(json_decode(base64_decode($req->input('query'))));

            $category = Category::all()->toArray();
            $brands = Brand::all()->toArray();
            $products_all = Product::all()->toArray();
            $products = Product::all()->toArray();
            $variants = Variants::all()->toArray();
            $pictures = Picture::all()->toArray();

            $arr = $req->input('query');
            $data = json_decode(base64_decode($arr));

            $cat = count($data->category) > 0 ? $data->category : getAllCat($category);
            $brnd = count($data->brand) > 0 ? $data->brand : getAllBrand($brands);
            $price = $data->price;

            $products = array_filter($products_all, function ($item) use ($brnd, $cat, $price, $variants) {

                return (in_array($item['Category'], $cat) && in_array($item['Brand'], $brnd)) && (getPrice($item['Product_id'], $variants) > $price->min && getPrice($item['Product_id'], $variants) < $price->max);
            });

            $data = compact('products', 'variants', 'pictures', 'brands', 'category', 'products_all', 'cart', 'wish_count');


            return view('frontend.Shop')->with($data);
        } else {

            $products = Product::all()->toArray();
            $products_all = Product::all()->toArray();
            $variants = Variants::all()->toArray();
            $pictures = Picture::all()->toArray();
            $category = Category::all()->toArray();
            $brands = Brand::all()->toArray();

            $data = compact('products', 'variants', 'pictures', 'brands', 'category', 'products_all', 'cart', 'wish_count');

            return view('frontend.Shop')->with($data);
        }
    }

    public function about()
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('products', 'variants', 'pictures', 'cart', 'wish_count');

        return view('frontend.about')->with($data);
    }

    public function contactUsPage()
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();
        $data = compact('products', 'variants', 'pictures', 'cart', 'wish_count');

        return view('frontend.ContactUs')->with($data);
    }














    public function userDashboard()
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();
        $data = compact('products', 'variants', 'pictures', 'cart', 'wish_count');

        return view('frontend.UserDashboard')->with($data);
    }

    public function userAllOrders()
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();

        $products = Product::all()->toArray();
        $pictures = Picture::all()->toArray();
        $variants = Variants::all()->toArray();
        $orders = Orders::where('User_id', session('user_id'))->get()->toArray();
        $order_details = Order_details::all()->toArray();

        $data = compact('orders', 'order_details', 'variants', 'pictures', 'products', 'cart', 'wish_count');

        return view('frontend.UserAllOrders')->with($data);
    }

    public function userActiveOrders()
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();

        $products = Product::all()->toArray();
        $pictures = Picture::all()->toArray();
        $variants = Variants::all()->toArray();

        $orders = Orders::where('User_id', session('user_id'))->where('Status', '!=', 'Dilevered')->get()->toArray();
        $order_details = Order_details::all()->toArray();

        $data = compact('orders', 'order_details', 'variants', 'pictures', 'products', 'cart', 'wish_count');
        return view('frontend.UserActiveOrders')->with($data);
    }

    public function userProfile()
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();
        $user = Customer::where('User_id', session('user_id'))->first()->toArray();

        $data = compact('products', 'variants', 'pictures', 'user', 'cart', 'wish_count');
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
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();

        $cart = Cart::where("User_id", session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('variants', 'pictures', 'products', 'cart', 'wish_count');
        return view('frontend.UserCart')->with($data);
    }

    public function userWishlist()
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();

        $wishlist = Wishlist::where("User_id", session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $pictures = Picture::all()->toArray();
        $products = Product::all()->toArray();

        $data = compact('wishlist', 'variants', 'pictures', 'products', 'cart', 'wish_count');
        return view('frontend.UserWishlist')->with($data);
    }

    public function userCheckout()
    {
        $cart = Cart::where('User_id', session('user_id'))->get()->toArray();
        $variants = Variants::all()->toArray();
        $products = Product::all()->toArray();
        foreach ($cart as  $item) {
            if(getVariantStock($item['Variant_id'],$variants)<$item['Quantity']){
                return redirect('/user/cart')->with('error','The'.getProductNameFromVariant($item['Variant_id'],$variants,$products).'('.getVariantColor($item['Variant_id'], $variants).')'.'is out of stock, please remove  it from cart. Stock => '.getVariantStock($item['Variant_id'],$variants));
            }
        }

        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;

        $user = Customer::where('User_id', session('user_id'))->first()->toArray();
        $pictures = Picture::all()->toArray();
        $data = compact('variants', 'pictures', 'products', 'cart', 'wish_count', 'user');
        return view('frontend.checkout')->with($data);
    }

    public function postQuery(Request $req)
    {
        $mailData = [
            'title' => $req->subject,
            'Name' => $req->name,
            'mail' => $req->mail,
            'message' => $req->message,
            'contact' => $req->contact,
        ];

        // Mail::to('ganeshprasadtripathi38@gmail.com')->send(new queryMail($mailData));

        return redirect()->back()->with('success', 'Query sent Successfully');
    }








    public function managePayment(Request $req)
    {
        echo "<pre>";


        $cart = Cart::where('User_id', session('user_id'))->get()->toArray();

        $price = 0;

        foreach ($cart as $value) {
            $price += $value['Price'] * $value['Quantity'];
        }



        $data = array(
            "merchantId" => "PGTESTPAYUAT",
            "merchantTransactionId" => "MT78507788068188104",
            "merchantUserId" => "MUID123",
            "amount" => ($price + 50) * 100,
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

        $user_data = json_decode(base64_decode($request->input('udata')));

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
            }
            ;

            return redirect('/user/checkout');
        } else {
            echo 'Payment Unsuccessful';
        }
    }
}
