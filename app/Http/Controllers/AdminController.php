<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\products;
use App\Models\categories;
use App\Models\Bills;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function admin(){
        if(Auth::check() && Auth::user()->role == 1){
        $user = User::count();
        $products = products::count();
        $categories = categories::count();
        $bills = bills::count();
        $needadd =products::where('quantity','0')->orderBy('id')->get();
        $billadd =bills::where('status','1')->orderBy('id')->get();
        return view('admin.components.home',compact('user', 'products', 'categories', 'bills','needadd','billadd'));
    }
    return redirect()->route("login");
    }
}
