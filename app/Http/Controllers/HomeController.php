<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\categories;
use App\Models\Products;
class HomeController extends Controller
{
    //trang chủ
    public function index(){
        $category = categories::orderBy('id', 'desc')->limit(6)->get();
        $products = Products::orderBy('created_at', 'desc')->paginate(8);
        $bannersale = Products::orderBy('sale', 'desc')->limit(1)->first();
        $sale =Products::where('sale', '>', 0)
        ->orderBy('sale', 'desc')->limit(4)
        ->paginate(10);
        $response = Http::get('https://blog.owenbook.store/api/news');
        if ($response->successful()) {
            $apiData = $response->json();
            $apiProducts = array_slice($apiData, 0, 4);
        } else {
            $apiProducts = [];
        }
        return view('users.components.home', [
            'products' => $products,
            'category' => $category,
            'apiProducts' => $apiProducts,
            'bannersale' => $bannersale,
            'sale'=>$sale,
        ]);
    }
    // tất cả sản phẩm
    public function products(){
        $products = Products::orderBy('created_at', 'desc')->paginate(8);
        return view('users.pages.products',compact('products'));
    }
    //liên hệ
    public function contact(){
        return view ('users.pages.contact');
    }
    //tìm kiếm 
    public function search(){
        $products = Products::orderBy('created_at', 'desc')->paginate(8);//demo sản phẩm
        return view('users.pages.search',compact('products'));
    }
    //chi tiết danh mục 
    // hiển thị cơ bản vài sản phẩm 
    public function detail_category(){
        $products = Products::orderBy('created_at', 'desc')->paginate(8);//demo sản phẩm
        return view('users.pages.detail_category',compact('products'));
    }
    //chi tiết sản phẩm
    public function detail_products(){
        $products = Products::orderBy('created_at', 'desc')->limit(4)->get();
        return view('users.pages.detail_products',compact('products'));
    }
}
