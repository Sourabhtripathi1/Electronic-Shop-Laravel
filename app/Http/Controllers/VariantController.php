<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variants;
use Illuminate\Support\Facades\DB;
use App\Models\Picture;

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

class VariantController extends Controller
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
        echo "<pre>";

        $var = new Variants;

        $var->variant_id = getID(10);
        $var->Product_id = $request->product;
        $var->Color = $request->color;
        $var->Stock = $request->stock;
        $var->Price = $request->price;

        $pics = $request->file('pics');

        $pcs = [];

        foreach ($pics as $x) {
            $pic = new Picture;

            $pic_id = getID(10);
            $pic_na = getID(35) . '.' . $x->getClientOriginalExtension();


            $pic->Picture_id = $pic_id;
            $pic->Source = $pic_na;

            $x->storeAs('/public/site-assets', $pic_na);

            $pic->save();

            array_push($pcs, $pic_id);
        }


        $var->Picture = json_encode($pcs);
        print_r($pcs);
        print_r($var->toArray());

        $var->save();

        return redirect()->back();
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
    public function update(Request $req, string $id)
    {

        echo "<pre>";

        $var = Variants::where('variant_id', $id)->first();

        $var->Color = $req->color;
        $var->Stock = $req->stock;
        $var->price = $req->price;

        DB::table('variants')->where('variant_id', $id)->update([
            'Color' => $req->color,
            'Stock' => $req->stock,
            'price' => $req->price,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $p = Variants::where('variant_id', $id)->first();
        $ps = json_decode($p['Picture']);

        echo "<pre>";

        foreach ($ps as $s) {
            $x = Picture::where('Picture_id', $s)->first()->toArray();

            unlink(public_path("/storage/site-assets/" . $x['Source']));
            DB::table('pictures')->where('Picture_id', $x['Picture_id'])->delete();
        }

        DB::table('variants')->where('variant_id', $id)->delete();

        return redirect()->back();
    }

    public function delImg($id, $pic)
    {
        echo "<pre>";

        $p = Variants::where('variant_id', $id)->first()->toArray();
        $ps = json_decode($p['Picture'], true);
        $ps = array_diff($ps, [$pic]);

        $x = Picture::where('Picture_id', $pic)->first()->toArray();


        DB::table('variants')->where('variant_id', $id)->update([
            'Picture' => json_encode($ps)
        ]);
        unlink(public_path("/storage/site-assets/" . $x['Source']));

        DB::table('pictures')->where('Picture_id', $x['Picture_id'])->delete();

        return redirect()->back();
    }

    public function addImg(Request $req, $id)
    {


        $p = Variants::where('variant_id', $id)->first()->toArray();
        $ps = json_decode($p['Picture'], true);


        $x = $req->file('img');

        $pic = new Picture;

        $pic_id = getID(10);
        $pic_na = getID(35) . '.' . $x->getClientOriginalExtension();


        $pic->Picture_id = $pic_id;
        $pic->Source = $pic_na;

        array_push($ps, $pic_id);

        DB::table('variants')->where('variant_id', $id)->update([
            'Picture' => json_encode($ps)
        ]);

        $x->storeAs('/public/site-assets', $pic_na);

        $pic->save();

        return redirect()->back();
    }
}
