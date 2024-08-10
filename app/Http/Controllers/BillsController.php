<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Carts;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BillsController extends Controller
{
    //
    public function bill_index(Request $request)
    {
        $tab = $request->input('tab', '1'); // Get the current tab, default to '1'
        $bills = Bills::where('status', 1)->orderBy('id', 'desc')->get();
        $bill_received = Bills::where('status', 2)->get();
        $bill_deliver = Bills::where('status', 3)->get();
        $close = Bills::where('status', 4)->get();
        return view('admin.bills.confirm_bills', [
            'bills' => $bills,
            'bill_received' => $bill_received,
            'bill_deliver' => $bill_deliver,
            'close' => $close,
            'currentTab' => $tab,
        ]);
    }
    //duyệt
    public function approve($id)
    {
        $bill = Bills::find($id);
        if ($bill) {
            $bill->status += 1;
            $bill->save();
            return redirect()->back()->with('success', 'Đơn hàng đã được duyệt!');
        }

        return redirect()->back()->with('error', 'Đơn hàng không tìm thấy!');
    }
    //hủy đơn
    public function cancel($id)
    {
        $bill = Bills::find($id);

        if ($bill) {
            $bill->status = 4;
            $bill->save();

            return redirect()->back()->with('status', 'Đơn hàng đã được huỷ!');
        }

        return redirect()->back()->with('error', 'Đơn hàng không tìm thấy!');
    }
    //xoá đơn
    public function destroy($id)
    {
        $bill = Bills::find($id);

        if ($bill) {
            $bill->delete();
            return redirect()->back()->with('status', 'Đơn hàng đã được xoá!');
        }

        return redirect()->back()->with('error', 'Đơn hàng không tìm thấy!');
    }
    //show bill admin
    public function showBilladmin(Request $request, int $id)
    {
        $tab = $request->input('tab', '1'); // Get the current tab, default to '1'
        $bills = Bills::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        $bill_received = Bills::where('status', 2)->paginate(5);
        $bill_deliver = Bills::where('status', 3)->paginate(5);
        $close = Bills::where('status', 4)->paginate(5);
        $bill = Bills::findOrFail($id);

        return view('admin.bills.showbill', [
            'bills' => $bills,
            'bill_received' => $bill_received,
            'bill_deliver' => $bill_deliver,
            'close' => $close,
            'currentTab' => $tab,
            'bill' => $bill
        ]);
    }
    public function order_bill()
    {
        $id_user = Session::get('user')->id;
        $user = Session::get('user');
        $cart = Carts::where('id_user', $id_user)->get();
        return view('users.pages.order.bill', compact('user', 'cart'));
    }
    public function createBill(Request $request)
    {
        $userId = Session::get('user')->id;
        $idBill = 'DH' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $mavandon = random_int(10000000, 99999999);
        $requestData = $request->all();


        $totalfinal = $request->input('totalfinal');
        $productsData = [];
        foreach ($requestData['products'] as $product) {
            $productData = [
                'id' => $product['id'],
                'name' => $product['name'],
                'img' => $product['img'],
                'quantity' => $product['quantity'],
                'total' => $product['total'],
            ];
            $productsData[] = $productData;
        }

        $billData = [
            'id_user' => $userId,
            'id_bill' => $idBill,
            'product' => json_encode($productsData),
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'phone' => $requestData['phone'],
            'address' => $requestData['full_address'],
            'totalfinal' => $totalfinal,
            'mavandon' => $mavandon,
            'payment_methods' => $requestData['payment_methods'],
            'ship' => $requestData['ship'],
        ];

        $createdBill = Bills::create($billData);
        Carts::where('id_user', $userId)->delete();
        return redirect()->route('bill.show', ['id' => $createdBill->id]);
    }


    public function showBill($id)
    {
        $bill = Bills::findOrFail($id);
        return view('users.pages.order.sessionbill', compact('bill'));
    }
}