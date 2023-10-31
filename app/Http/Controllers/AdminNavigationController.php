<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminNavigationController extends Controller
{
    public function OrderList(){
        return view('admin.ViewOrders');
    }
}
