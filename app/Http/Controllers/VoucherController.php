<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    //
    public function vouchers()
    {
        $vouchers = Voucher::select('id', 'code', 'time_start', 'time_end', 'discount', 'created_at')->orderBy('id', 'desc')->paginate(5);
        return view('admin.voucher.vouchers', compact('vouchers'));
    }
    public function add(Request $request)
    {
        $data = $request->all();
        $voucher = Voucher::create($data);
        return redirect()->route('admin/vouchers');
    }

    public function formedit(Request $request, int $id)
    {
        $voucher = Voucher::findOrFail($id);
        return view('admin.voucher.edit', compact('voucher'));
    }

    public function edit(Request $request, int $id)
    {
        $data = $request->all();
        $voucher = Voucher::findOrFail($id);
        if ($voucher) {
            $voucher->update($data);
        }

        return redirect()->route('admin/vouchers');
    }
    public function remove(Request $request, int $id)
    {
        $voucher = Voucher::findOrFail($id);
        if ($voucher) {
            $voucher->delete();
            return redirect()->route('admin/vouchers')->with('success', 'Voucher đã được xóa thành công!');
        } else {
            // Nếu không tìm thấy người dùng, hiển thị thông báo lỗi
            return redirect()->route('admin/vouchers')->with('error', 'Không tìm thấy voucher!');
        }
    }
}
