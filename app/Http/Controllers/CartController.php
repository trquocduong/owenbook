<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function heart(){
        return view('users.pages.heart');
    }
    public function cart(){
        return view('users.pages.cart'); 
    }
}
