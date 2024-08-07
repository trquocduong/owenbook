<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\products;
use App\Models\categories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Bills;

class ProductController extends Controller
{
    public function products()
    {
        $bills = bills::count();
        $allitem = Products::with('category') // Eager load the category
        ->select('id', 'name', 'img', 'price', 'sold', 'view', 'created_at', 'body', 'categories_id')
        ->orderBy('id', 'desc')
        ->paginate(5);
        $optioncat = categories::select('id', 'name')->get();
        return view('admin.products.products', compact('allitem', 'optioncat','bills'));
    }

    public function formAddpro()
    {
        return view('admin.products.add');
    }
    public function create(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $data['img'] = $imageName;
        } else {
            return "main image not uploaded";
        }
        if ($request->hasFile('gallery')) {
            $imgGallery = [];
            foreach ($request->file('gallery') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('img'), $name);
                $imgGallery[] = $name;
            }
            $data['gallery'] = json_encode($imgGallery);
        } else {
            return "Galerry images not uploaded";
        }
        $product = products::create($data);
        return redirect()->route('admin/products');
    }
    public function formEdit(Request $request, int  $id)
    {
        $product = products::findOrFail($id);
        $optioncat = categories::select('id', 'name')->get();
        return view('admin.products.edit', compact('product', 'optioncat'));
    }
    public function edit(Request $request, int $id)
    {
        // Validate input data (update this part based on your validation rules)
        $validateData = $request->except(['img', 'gallery']); // Exclude image fields from validation

        // Check if the main image was uploaded
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
            $validateData['img'] = $imageName;
        }

        // Check if gallery images were uploaded
        if ($request->hasFile('gallery')) {
            $imgData = [];

            foreach ($request->file('gallery') as $file) {
                $name = time() . '-' . $file->getClientOriginalName(); // Optional: prefix with timestamp to avoid name conflicts
                $file->move(public_path('uploads'), $name);
                $imgData[] = $name;
            }

            // Save gallery image data to the database
            $validateData['gallery'] = json_encode($imgData);
        }

        // Update the product
        $product = Products::findOrFail($id);
        $product->update($validateData);

        return redirect()->route('admin/products');
    }


    public function remove(Request $request, int $id)
    {
        $product = products::findOrFail($id);

        if ($product) {
            // Xóa tất cả các bản ghi trong bảng carts liên quan đến sản phẩm này
            DB::table('carts')->where('id_product', $id)->delete();
            // Kiểm tra và xóa hình ảnh liên quan nếu tồn tại
            if ($product->img && file_exists(public_path('uploads/' . $product->img))) {
                File::delete(public_path('uploads/' . $product->img));
            }
            // Xóa sản phẩm khỏi cơ sở dữ liệu
            $product->delete();
        } else {
            echo "Không tìm thấy bản ghi!";
            return;
        }
        // Lấy danh sách sản phẩm và phân trang để trả về view
        return redirect()->route('admin/products');
    }
}