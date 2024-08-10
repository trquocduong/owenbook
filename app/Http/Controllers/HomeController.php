<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\categories;
use App\Models\Products;

class HomeController extends Controller
{
    //trang chủ
    public function index()
    {
        $category = categories::orderBy('id', 'desc')->limit(6)->get();
        $products = Products::orderBy('created_at', 'desc')->paginate(8);
        $bannersale = Products::orderBy('sale', 'desc')->limit(1)->first();
        $sale = Products::where('sale', '>', 0)
            ->orderBy('sale', 'desc')->limit(4)
            ->paginate(10);
        $response = Http::get('https://blog.minhdev.top/api/news');
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
            'sale' => $sale,
        ]);
    }
    public function products(Request $request)
    {
        $categories = categories::all();
        $categoryId = $request->input('category_id');
        $sort = $request->input('sort', 'price-asc');
        $query = Products::query();
    
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
    
        switch ($sort) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;
        }
        $products = $query->paginate(12); // Paginate products, adjust per page as needed
        return view('users.pages.products', compact('products', 'categories'));
    }
    
    //liên hệ
    public function contact()
    {
        return view('users.pages.contact');
    }
    //tìm kiếm 
    public function search()
    {
        $products = Products::orderBy('created_at', 'desc')->paginate(8); //demo sản phẩm
        return view('users.pages.search', compact('products'));
    }
    //chi tiết danh mục 
    // hiển thị cơ bản vài sản phẩm 
    public function get_products_by_idcategory($category_id)
    {
        // Lấy tất cả các category
        $categories = categories::all();

        // Tìm category dựa trên $category_id
        $categoryProduct = categories::findOrFail($category_id);

        // Lấy các sản phẩm thuộc category cụ thể
        $products = Products::where('categories_id', $category_id)
            ->orderBy('name', 'asc')
            ->get();

        return view('users.pages.detail_category', compact('categories', 'products', 'categoryProduct',));
    }
    //chi tiết sản phẩm
    public function detail_product(Request $request, int $id)
    {
        $getonepro = Products::findOrFail($id);
        $products = Products::orderBy('created_at', 'desc')->limit(6)->get();
        return view('users.pages.detail', compact('getonepro','products'));
    }
}