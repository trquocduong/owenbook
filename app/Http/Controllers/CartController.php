<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Products;
class CartController extends Controller
{
    public function cart(){
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }
        $id_user = auth()->id();
        $cart = Carts::where('id_user', $id_user)->get();
        $total = 0;
        foreach ($cart as $item) {
            $item->total = $item->price * $item->quantity;
            $total += $item->total;
        }
        $count = count($cart);
    
        return view('users.pages.cart', compact('cart','count','total')); 
    }
    public function addToCart(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
        $id_user = auth()->id();
        $id_product = $request->input('id');
        $cartItem = Carts::where('id_user', $id_user)
            ->where('id_product', $id_product)
            ->first();
    
        if ($cartItem) {
            $cartItem->increment('quantity');
            $cartItem->total = $cartItem->price * $cartItem->quantity;
            $cartItem->save();
        } else {
            Carts::create([
                'id_user' => $id_user,
                'id_product' => $request->id,
                'name_product' => $request->name,
                'img' => $request->img,
                'price' => $request->price,
                'total' => $request->price,
                'quantity' => 1,
            ]);
        }
        $product = Products::findOrFail($request->id);
        $cart = Carts::where('id_user', $id_user)->get();
        return redirect()->route('home')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function removeCart(Request $request)
{
    $id = $request->input('id');
    $id_user = $request->input('id_user');
    $cartItem = Carts::where('id', $id)
        ->where('id_user', $id_user)
        ->first();
    if ($cartItem) {
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
    return redirect()->route('cart')->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng.');
}
    public function removeCartheader(Request $request)
    {
        $id = $request->input('id');
        $cartItem = Carts::where('id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
        }
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
public function removeAllCart(Request $request)
{
    $id_user = $request->input('id_user');
    $deleted = Carts::where('id_user', $id_user)->delete();

    if ($deleted) {
        return redirect()->route('cart')->with('success', 'Đã xóa tất cả sản phẩm khỏi giỏ hàng!');
    } else {
        return redirect()->route('cart')->with('error', 'Không thể xóa sản phẩm khỏi giỏ hàng. Vui lòng thử lại sau.');
    }
}
}
