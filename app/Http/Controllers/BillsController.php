<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bills;

class BillsController extends Controller
{
    //
    public function bill_index(Request $request){
        $tab = $request->input('tab', '1'); // Get the current tab, default to '1'
            $bills = Bills::where('status', 1)->paginate(5);
            $bill_received = Bills::where('status', 2)->paginate(5);
            $bill_deliver = Bills::where('status', 3)->paginate(5);
            $close = Bills::where('status', 4)->paginate(5);
        return view('admin.bills.confirm_bills', [
            'bills' => $bills,
            'bill_received'=>$bill_received,
            'bill_deliver'=>$bill_deliver,
            'close'=>$close,
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

}
