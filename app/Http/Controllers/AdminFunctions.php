<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFunctions extends Controller
{
    public function updateCart(Request $req ){

        $stat = $req->input('status');
        $id = $req->input('id');
        DB::table('orders')->where('Order_id',$id)->update([
            'Status'=>$stat
        ]);

        return response()->json(['result' =>'updated']);

    }
}
