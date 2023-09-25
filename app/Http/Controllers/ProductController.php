<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Variants;
use Illuminate\Http\Request;
use App\Models\Product;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $vars = $req->var_no;

        echo "<pre>";
        // print_r($req->all());


        $prod = new Product;
        $prod_id = getID(15);

        $prod->Product_id = $prod_id;
        $prod->Product_name = $req->pname;
        $prod->Material = $req->material;
        $prod->Dimention = $req->dimention;
        $prod->Brand =  $req->brand;
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
            $var->Picture =   json_encode($pcs);
            $var->Color = $req->Color[$i];
            $var->Price = $req->Price[$i];

            $var->save();
        }

        return redirect('/admins-product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prod = Product::where("Product_id", $id)->first()->toArray();
        $pna=$prod['Product_name'];

        $data=compact('id','prod','pna');

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

        $data = compact('prod',"br", "cat");

        return view('admin.EditProduct')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo "<pre>";
        print_r($request->all());
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
}
