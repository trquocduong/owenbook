<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\NotifyProductOutOfStock;
use App\Models\products;
use Carbon\Carbon;
use App\Models\Bills;


class InventoryController extends Controller
{
   
    public function getInventory(){
        
        $inventory = products::where('quantity','10')->orderBy('id')->get();
        $needadd =products::where('quantity','0')->orderBy('id')->get();
    // Mảng để lưu trữ số ngày chênh lệch của từng sản phẩm
    $diffDaysArray = [];
    // Duyệt qua từng sản phẩm trong $inventory
    foreach ($inventory as $product) {
        $created_at = $product->created_at; // Lấy ngày tạo của sản phẩm hiện tại
        // Chuyển đổi ngày thành đối tượng Carbon
        $targetDate = Carbon::parse($created_at);

        // Lấy ngày hiện tại
        $currentDate = Carbon::now();

        // Tính số ngày chênh lệch
        $diffDays = $currentDate->diffInDays($targetDate);

        // Thêm số ngày chênh lệch vào mảng
        $diffDaysArray[$product->id] = $diffDays; // Lưu theo id của sản phẩm
    }
        return view('admin.inventory.inventory',compact('inventory','diffDaysArray','needadd'));
    }
//     public function checkProductStock()
// {
//     // Lấy các sản phẩm có quantity bằng 0
//     $productsOutOfStock = products::where('quantity', 0)->get();

//     // Duyệt qua từng sản phẩm để gửi email thông báo
//     foreach ($productsOutOfStock as $product) {
//         // Kiểm tra xem sản phẩm đã được thông báo chưa
//         if (!$product->notified_out_of_stock) {
//             // Gửi job vào hàng đợi để xử lý gửi email
//             NotifyProductOutOfStock::dispatch($product)->onQueue('emails');
            
//             // Đánh dấu sản phẩm là đã thông báo để tránh gửi nhiều lần
//             $product->update(['notified_out_of_stock' => true]);
            
//             break; // Chỉ gửi 1 email duy nhất
//         }
//     }
// }
    public function importInventory(Request $request,$id){
        $importpro = products::findOrFail($id);
        return view('admin.inventory.import_product',compact('importpro'));
    }
    public function import_Inventory(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:50',
        ]);
        $importpro = products::findOrFail($id);
        $importpro->quantity = $request->quantity;
        $importpro->save();
        return redirect()->route('inventory')->with('success', 'Cập nhật số lượng thành công.');
    }
    
}
