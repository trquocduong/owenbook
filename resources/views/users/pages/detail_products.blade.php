@extends('users.layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <!-- Phần hình ảnh sản phẩm -->
            <div class="row">
                <div class="col-12 mb-3">
                    <!-- Hình ảnh chính -->
                    <div class="position-relative">
                        <img id="mainImage" src="https://via.placeholder.com/500" alt="Main Product Image" class="img-fluid w-100" />
                    </div>
                </div>
                <div class="col-12">
                    <!-- Hình ảnh thu nhỏ -->
                    <div class="d-flex">
                        <img src="https://via.placeholder.com/100" alt="Thumbnail 1" class="img-thumbnail me-2 cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Image 1" />
                        <img src="https://via.placeholder.com/100" alt="Thumbnail 2" class="img-thumbnail me-2 cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Image 2" />
                        <img src="https://via.placeholder.com/100" alt="Thumbnail 3" class="img-thumbnail me-2 cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Image 3" />
                        <img src="https://via.placeholder.com/100" alt="Thumbnail 4" class="img-thumbnail me-2 cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Image 4" />
                        <img src="https://via.placeholder.com/100" alt="Thumbnail 5" class="img-thumbnail cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Image 5" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Phần thông tin sản phẩm -->
            <h2 class="mb-3">Tên Sản Phẩm</h2>
            <p class="text-muted mb-3">Mô tả sản phẩm chi tiết hoặc thông tin thêm.</p>
            <p class="text-muted mb-3">Tác giả:</p>
            <h4 class="text-success mb-3">$99.99</h4>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" id="quantity" name="quantity" class="" value="1" min="1"/>
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Thêm vào giỏ hàng</button>
                <button type="submit" class="btn btn-danger btn-lg">Mua ngay</button>
            </form>
        </div>
    </div>
</div>
<div class="container">
<h3>Mô tả</h3>
<p>Moo tả ở đây</p>
</div>
<div class="container">
    <h3 class="mt-5 mb-5">Sản phẩm tương tự</h3>
    <div class="row text-center">
        @foreach ($products as $item)
        <div class="col-6 col-md-3 col-sm-6 mb-4">
            <div class="card shadow-lg d-flex flex-column position-relative">
                <img src="{{asset('uploads/'.$item->img)}}" class="card-img-top h-50" alt="Card image">
                <div class="icons-overlay">
                    <div>
                    <i class="fas fa-eye text-white fs-3 p-2"></i>
                </div> 
                <div >
                    <i class="fas fa-heart text-white fs-3 p-2"></i>
                </div>
                </div>
                <span class="discount-label bg-danger">New</span>
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($item->name, 15) }}</h5>
                    <p class="card-text">Giá:{{ number_format($item->price) }}VNĐ</p>
                    <a href="#" class="btn btn-danger">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection