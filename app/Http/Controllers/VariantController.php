<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variants;
use Illuminate\Support\Facades\DB;
use App\Models\Picture;

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

        $p = Variants::where('variant_id', $id)->first();
        $ps = json_decode($p['Picture']);

        echo "<pre>";

        print_r($ps);
    }

    public function delImg($id, $pic)
    {
        echo "<pre>";

        $p = Variants::where('variant_id', $id)->first()->toArray();
        $ps = json_decode($p['Picture']);
        $ps = array_diff($ps, [$pic]);

        $x = Picture::where('Picture_id', $pic)->first()->toArray();

        DB::table('variants')->where('variant_id', $id)->update([
            'Picture' => json_encode($ps)
        ]);
        unlink(public_path("/storage/site-assets/" . $x['Source']));

        DB::table('pictures')->where('Picture_id', $x['Picture_id'])->delete();
    }
}
