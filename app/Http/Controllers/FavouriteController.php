<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorites;
use App\Models\Products;

class FavouriteController extends Controller
{
    public function heart(){
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }
        $id_user = auth()->id();
        $favorites = Favorites::where('id_user', $id_user)->get();
        return view('users.pages.heart', compact('favorites'));
    }
    public function addToFavorites(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào danh sách yêu thích.');
        }
        $id_user = auth()->id();
        $id_product = $request->input('id');
        $favoriteItem = Favorites::where('id_user', $id_user)
            ->where('id_product', $id_product)
            ->first();
    
        if ($favoriteItem) {
            return redirect()->back()->with('message', 'Sản phẩm này đã có trong danh sách yêu thích của bạn.');
        } else {
            Favorites::create([
                'id_user' => $id_user,
                'id_product' => $request->id,
                'name_product' => $request->name,
                'img' => $request->img,
                'price' => $request->price,
            ]);
        }
        $product = Products::findOrFail($request->id);
        $favorites = Favorites::where('id_user', $id_user)->get();
        return redirect()->route('heart');
    }
    public function removeFavarites(Request $request){
        $id = $request->input('id');
        $id_user = $request->input('id_user');
        $cartItem = Favorites::where('id', $id)
            ->where('id_user', $id_user)
            ->first();
    
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('heart')->with('success', 'Sản phẩm đã được xóa khỏi yêu thích!');
        }
        return redirect()->route('heart')->with('error', 'Không tìm thấy sản phẩm trong yêu thích.');
    }
    public function removeAllFavarites(Request $request)
    {
        $id_user = $request->input('id_user');
    
        // Xóa tất cả các sản phẩm trong giỏ hàng của người dùng
        $deleted = Favorites::where('id_user', $id_user)->delete();
    
        if ($deleted) {
            return redirect()->route('heart')->with('success', 'Đã xóa tất cả sản phẩm khỏi yêu thích!');
        } else {
            return redirect()->route('heart')->with('error', 'Không thể xóa sản phẩm khỏi giỏ hàng. Vui lòng thử lại sau.');
        }
    }
    
    }
    

