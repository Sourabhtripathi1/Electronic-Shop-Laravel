<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Picture;
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


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $br = Brand::all()->toArray();
        $pictures = Picture::all()->toArray();
        $data = compact('br', 'pictures');



        return view('admin.Brands')->with($data);
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
    public function store(Request $req)
    {
        $br = new Brand;
        $pic = new Picture;

        $br->Brand_Name = $req->brand_name;
        $br->Brand_id = getID(10);

        $pic_id = getID(15);

        $pic->Picture_id = $pic_id;

        $br->Brand_Pic = $pic_id;
        $na = getID(35) . "." . $req->file('brand_pic')->extension();

        $pic->source = $na;
        $pic->save();
        $br->save();

        $req->file('brand_pic')->storeAs('/public/site-assets', $na);

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
    public function update(Request $request, string $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $br = Brand::where("Brand_id", "=", $id)->get();
        $brand = $br->toArray();

        $p = Picture::where("Picture_id", "=", $brand[0]['Brand_Pic'])->get();

        $pic = $p->toArray();

        // unlink(public_path("/storage/site-assets/" . $pic[0]['Source']));

        DB::table('brands')->where('Brand_id', $id)->delete();
        DB::table('pictures')->where('Picture_id', $brand[0]['Brand_Pic'])->delete();

        return redirect()->back();
    }
}
