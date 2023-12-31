<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Review;
use App\Models\Variants;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Products = Product::all()->toArray();
        $Variants = Variants::all()->toArray();
        $Brands = Brand::all()->toArray();
        $Category = Category::all()->toArray();

        $data = compact('Products', 'Variants', 'Brands', 'Category');

        return view('admin.ViewProducts')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $br = Brand::all();
        $cat = Category::all();

        $data = compact("br", "cat");

        return view('admin.AddProduct')->with($data);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $req)
    {

        $rules = [
            'pname' => 'required|string|max:200',
            'material' => 'required|string|max:50',
            'category' => 'required|string|max:15',
            'dimention' => 'required|string|max:20',
            'brand' => 'required|string|max:15',
            'desc' => 'required|string|max:2500',
            'Stock.*' => 'required|numeric|max:99999999',
            'Color.*' => 'required|string|max:30',
            'Price.*' => 'required|numeric|max:99999999',
            'Picture.*.*' => 'required|image|mimes:jpeg,jpg,png,gif,webp',
        ];

        $messages = [
            'Stock.*.required' => 'Each element in the Stock field is required.',
            'Price.*.required' => 'Each element in the Price field is required.',
            'Color.*.required' => 'Each element in the Color field is required.',
            'Color.*.string' => 'Each element in the Color field should be string.',
            'Stock.*.numeric' => 'Each element in the Stock field should be numeric.',
            'Price.*.numeric' => 'Each element in the Price field should be numeric.',
            'Stock.*.max' => 'Amount in each element of Stock field should be less than 99999999.',
            'Color.*.max:30' => 'Characters in each element of Color field should be less than 30.',
            'Price.*.max' => 'Amount in each element of Price field should be less than 99999999.',
            'Picture.*.*.image' => 'Submitted files are not of image type.',
            'Picture.*.*.mimes' => 'Submitted files are not of image type.',
        ];

        $req->validate($rules, $messages);

        // return redirect('/admins-product');



        try {
            $vars = $req->var_no;


            $prod = new Product;
            $prod_id = getID(15);

            $prod->Product_id = $prod_id;
            $prod->Product_name = $req->pname;
            $prod->Material = $req->material;
            $prod->Dimention = $req->dimention;
            $prod->Brand = $req->brand;
            $prod->Category = $req->category;
            $prod->Description = $req->desc;

            $prod->save();
            $p = $req->file('Picture');


            for ($i = 0; $i < $vars; $i++) {
                $pcs = [];

                foreach ($p[$i + 1] as $x) {
                    $pic = new Picture;

                    $pic_id = getID(10);
                    $pic_na = getID(35) . '.' . $x->getClientOriginalExtension();


                    $pic->Picture_id = $pic_id;
                    $pic->Source = $pic_na;

                    $x->storeAs('/public/site-assets', $pic_na);

                    $pic->save();

                    array_push($pcs, $pic_id);
                }

                $var = new Variants;
                $var->variant_id = getID(10);
                $var->Product_id = $prod_id;
                $var->Stock = $req->Stock[$i];
                $var->Picture = json_encode($pcs);
                $var->Color = $req->Color[$i];
                $var->Price = $req->Price[$i];

                $var->save();
                return redirect('/admins-product');
            }
        } catch (Exception $e) {

            app(ProductController::class)->destroy($prod_id);

            return redirect()->back()->with('error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wish_count = session('user_id') ? count(Wishlist::where('User_id', session('user_id'))->get()->toArray()) : 0;
        $cart = session('user_id') ? Cart::where('User_id', session('user_id'))->get()->toArray() : Cart::all()->toArray();

        $reviews = Review::where('Product_id', $id)->get()->toArray();

        $variants = Variants::all()->toArray();
        $products = Product::all()->toArray();

        $prod = Product::where("Product_id", $id)->first()->toArray();
        $pna = $prod['Product_name'];

        $pics = Picture::all()->toArray();
        $var = Variants::where("Product_id", $id)->get();
        $cat = Category::where('Category_id', $prod['Category'])->first();
        $br = Brand::where('Brand_id', $prod['Brand'])->first();

        $pictures = Picture::all()->toArray();

        $cat_na = $cat->Category_Name;
        $br_na = $br->Brand_Name;

        $category=Category::all()->toArray();
        $brand=Brand::all()->toArray();

        $similar_Product1=Product::Where("Brand",$prod['Brand'])->get()->toArray();
        $similar_Product2=Product::where("Category",$prod['Category'])->get()->toArray();


        $data = compact('id', 'prod', 'pna', 'var', 'cat_na', 'br_na', 'pics', 'variants', 'pictures', 'products', 'reviews', 'wish_count', 'cart','similar_Product1','similar_Product2','category','brand');

        return view('frontend.ProductPage')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prod = Product::where("Product_id", $id)->first()->toArray();
        $br = Brand::all();
        $cat = Category::all();
        $var = Variants::where("Product_id", "=", $id)->get()->toArray();
        $pics = Picture::all()->toArray();

        $data = compact('prod', "br", "cat", "var", "pics");

        return view('admin.EditProduct')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'pname' => 'required|string|max:200',
            'material' => 'required|string|max:50',
            'category' => 'required|string|max:15',
            'dimention' => 'required|string|max:20',
            'brand' => 'required|string|max:15',
            'desc' => 'required|string|max:2500',

        ]);

        $prod = Product::where("Product_id", $id)->first();

        DB::table('products')->where('Product_id', $id)->update([
            'Product_name' => $request->pname,
            'Material' => $request->material,
            'Dimention' => $request->dimention,
            'Brand' => $request->brand,
            'Category' => $request->category,
            'Description' => $request->desc,

        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo $id;

        $prod = Product::where("Product_id", "=", $id)->get()->toArray();

        $var = Variants::where("Product_id", "=", $id)->get()->toArray();

        $x = [];

        foreach ($var as $v) {
            foreach (json_decode($v['Picture']) as $p) {
                array_push($x, $p);
            }
        }


        $pic = [];

        foreach ($x as $p) {
            if ($a = Picture::where("Picture_id", "=", $p)->get()->toArray()) {
                array_push($pic, $a);
            }
        }

        foreach ($pic as $p) {

            unlink(public_path("/storage/site-assets/" . $p[0]['Source']));

            DB::table('pictures')->where('Picture_id', $p[0]['Picture_id'])->delete();
        }

        DB::table('variants')->where('Product_id', $id)->delete();

        DB::table('products')->where('Product_id', $id)->delete();

        return redirect()->back();
    }

    public function add_review(Request $request, string $id)
    {

        $review = new Review;

        $review->User_id = session('user_id');
        $review->Product_id = $id;

        $review->name = $request->name;
        $review->email = $request->mail;

        $review->content = $request->content;
        $review->Review_Date = date("Y-m-d");

        $review->save();

        return redirect()->back();
    }
}
