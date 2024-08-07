<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class CategoryController extends Controller
{
    //
    public function categories()
    {
        $categories = categories::select('id', 'name', 'image', 'status', 'description', 'category_id', 'created_at')->orderBy('id', 'desc')->paginate(5);
        return view('admin.category.categories', compact('categories'));
    }
    public function add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image
        ]);
    
        $data = $request->except('image'); // Exclude the image field from $data
    
        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = $imageName;
        }
    
        // Create a new category with the data
        categories::create($data);
    
        // Redirect to categories list with a success message
        return redirect()->route('admin/categories')->with('success', 'Category added successfully!');
    }
    
    public function formedit(Request $request, int $id)
    {
        $cate = categories::findOrfail($id);
        return view('admin.category.edit', compact('cate'));
    }
    public function edit(Request $request, int $id)
    {
        $validateData = $request->except('image'); // Exclude image fields from validation
        // Check if the main image was uploaded
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/uploads'), $imageName);
            $validateData['image'] = $imageName;
        }
        // Update the product
        $category = categories::findOrFail($id);
        $category->update($validateData);
        return redirect()->route('admin/categories');
    }
    public function remove(Request $request, int $id)
    {
        // Tìm danh mục theo ID
        $category = categories::findOrFail($id);

        // Kiểm tra số lượng sản phẩm thuộc danh mục này
        $productCount = $category->products()->count(); // Giả sử có quan hệ "products" giữa danh mục và sản phẩm

        if ($productCount > 0) {
            // Nếu có sản phẩm trong danh mục, không cho phép xóa
            return redirect()->route('admin/categories')->with('error', 'Danh Mục có sản phẩm và không thể bị xóa!');
        }

        // Nếu không có sản phẩm, tiến hành xóa danh mục
        $category->delete();

        // Redirect với thông báo thành công
        return redirect()->route('admin/categories')->with('success', 'Danh Mục đã được xóa thành công!');
    }
}