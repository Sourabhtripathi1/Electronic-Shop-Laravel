<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;


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

class CustomerController extends Controller
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
        //
    }

    public function Customer_signup(Request $req)
    {
        // echo "<pre>";
        // print_r($req->all());

        $req->validate([
            'email' => 'required|email',
            'Uname' => 'required',
            'name' => 'required',
            'password' => 'required',
            'cnf_password' => 'required|same:password'
        ]);

        $x = Customer::where('Email', $req->email)->orWhere('Username', $req->Uname)->get();

        print_r($x);

        echo count($x);

        if (count($x) == 0) {
            $cus = new Customer;

            $cus->User_id = getID(15);
            $cus->Username = $req->Uname;
            $cus->Password = $req->password;
            $cus->Name = $req->name;
            $cus->Email = $req->email;

            $cus->save();
            return redirect('/user/login')->with('msg', 'User Successfully Saved');
        } else {
            return redirect('/user/login')->with('msg', 'Username or Email Already Exists !');
        }



    }

    public function Customer_login(Request $req)
    {
        $x = Customer::where('Email', $req->Uname)->orWhere('Username', $req->Uname)->get()->toArray();

        if (count($x) > 0) {

            if ($x[0]['Username'] == $req->Uname || $x[0]['Email'] == $req->Uname) {
                if ($x[0]['Password'] == $req->pswd) {
                    echo $x[0]['Password'];

                    session()->put('user_id', $x[0]['User_id']);

                    return redirect('/');
                } else {
                    return redirect('/user/login')->with('msg', 'Invalid Password !');
                }

            } else {
                return redirect('/user/login')->with('msg', 'Invalid Username or Email !');
            }
        } else {
            return redirect('/user/login')->with('msg', 'Invalid Username or Email !');
        }

    }
}
