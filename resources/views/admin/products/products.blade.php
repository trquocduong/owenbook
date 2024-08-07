@extends('admin.layout')
@section('titlepage','Quản lí sản phẩm')
@section('admin')
@php
use Illuminate\Support\Str;
@endphp

<main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="">Quản lý tài khoản</a></li>
            </ol>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Tìm kiếm ở đây ...">
              </div>
            </div>
          </div>
        </div>
      </nav>
    <!-- End Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>@yield('titlepage')</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-10">Sản Phẩm</th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-10">Danh mục</th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-10">Lượt bán</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-10">Trạng thái</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-10">Ngày đăng</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-10">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allitem as $value)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <img src="{{asset('uploads/'.$value->img)}}" class="avatar avatar-sm" alt="product" width="50px" height="50px">
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-0 text-sm">{{ Str::limit($value->name, 15)}}</h6>
                                                    <p class="text-xs text-muted mb-0">{{$value->price}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $value->category->name}}
                                        </td>
                                        <td>{{$value->sold}}</td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($value->status == 0)

                                            <form action="" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    Đang bán
                                                </button>
                                            </form>
                                            @elseif ($value->status == 1)
                                            <form action="" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-warning btn-sm">
                                                    Ngưng bán
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span class="text-muted text-xs">23/04/18</span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                href="remove/{{$value->id}}"><i class="far fa-trash-alt me-2"></i>Xóa
                                                sản phẩm</a>
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="formeditproduct/{{$value->id}}"><i
                                                    class="fas fa-pencil-alt text-dark me-2"
                                                    aria-hidden="true"></i>Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3 d-flex justify-content-center">
                                {{$allitem->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Thêm Sản Phẩm</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 p-2">
                        <div class="table-responsive p-3">
                            <form action="{{ route('admin/addproduct') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Tên sách</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sách" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="author" class="form-label">Tên tác giả</label>
                                        <input type="text" class="form-control" id="author" name="author" placeholder="Nhập tên tác giả" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="categories_id">Tên Danh Mục <span class="text-danger">*</span></label>
                                        <select class="form-select" name="categories_id" id="categories_id" required>
                                            <option value="">Chọn Danh Mục</option>
                                            @foreach($optioncat as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select class="form-select" name="status" id="status" required>
                                            <option value="0">Đang bán</option>
                                            <option value="1">Ngưng kinh doanh</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="img" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" id="img" name="img" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="gallery" class="form-label">Hình ảnh khác <span class="text-danger">(* 4 ảnh)</span></label>
                                        <input type="file" class="form-control" id="gallery" name="gallery[]" multiple required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="body" class="form-label">Ngoại hình <span class="text-danger">(* %)</span></label>
                                        <input type="text" class="form-control" id="body" name="body" placeholder="Nhập % ngoại hình" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">Giá <span class="text-danger">(* VND)</span></label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá VND" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="sale" class="form-label">Giảm giá <span class="text-danger">(* %)</span></label>
                                        <input type="text" class="form-control" id="sale" name="sale" placeholder="Nhập % giảm giá" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="quantity" class="form-label">Số lượng <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô tả chi tiết <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Viết mô tả" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
