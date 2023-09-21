<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
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

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Categories = Category::all()->toArray();
        $pictures = Picture::all()->toArray();

        $data = compact('Categories', 'pictures');

        return view('admin.Categories')->with($data);
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
        $cat = new Category;
        $pic = new Picture;

        $cat->Category_id = getID(10);
        $cat->Category_Name = $req->Category_name;

        $pic_id = getID(15);

        $pic->Picture_id = $pic_id;

        $cat->category_pic = $pic_id;
        $na = getID(35) . "." . $req->file('category_pic')->extension();

        $pic->source = $na;
        $pic->save();
        $cat->save();

        $req->file('category_pic')->storeAs('/public/site-assets', $na);

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
        $c = Category::where("Category_id", "=", $id)->get();
        $cat = $c->toArray();

        $p = Picture::where("Picture_id", "=", $cat[0]['Category_Pic'])->get();

        $pic = $p->toArray();

        unlink(public_path("/storage/site-assets/" . $pic[0]['Source']));

        DB::table('categories')->where('Category_id', $id)->delete();
        DB::table('pictures')->where('Picture_id', $cat[0]['Category_Pic'])->delete();

        return redirect()->back();
    }
}
