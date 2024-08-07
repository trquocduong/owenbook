<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Carts;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users()
    {
        $alluser = User::select('id', 'name', 'email', 'status', 'img', 'address', 'phone', 'role')->orderBy('id', 'desc')->paginate(5);

        return view('admin.users.users', compact('alluser'));
    }
    public function add(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $data['img'] = $imageName;
        }
        $user = User::create($data);
        return redirect()->route('admin/users');
    }
    public function formedit(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function edit(Request $request, int $id)
    {
        $validateData = $request->except('img'); // Exclude image fields from validation
        // Check if the main image was uploaded
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $validateData['img'] = $imageName;
        }
        // Update the product
        $user = User::findOrFail($id);
        $user->update($validateData);

        return redirect()->route('admin/users');
    }

    public function profile()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập xem thông tin người dùng.');
        }
        $user = Auth::user();
        return view('components.profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $validateData = $request->except('img'); // Exclude image fields from validation
        // Check if the main image was uploaded
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $validateData['img'] = $imageName;
        }
        // Update the product
        $user = User::findOrFail(Auth::id());
        $user->update($validateData);
        return redirect()->route('profile')->with('success', 'Sửa thồng tin người dùng thành cồng!');
    }

    public function profile_order()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập xem lịch sử đơn hàng');
        }
        $orders = Bills::where('id_user', Auth::id())
            ->orderBy('status', 'asc')
            ->get();
        return view('components.profile_order', compact('orders'));
    }
    public function detail_order(Request $request, $id)
    {
        $order = Bills::where('id_bill', $id)->first();
        $products = json_decode($order->product, true);
        return view('components.profile_detail_order', compact('order', 'products'));
    }
}
