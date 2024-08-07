@extends('admin.layout')
@section('admin')

<main class="main-content position-relative border-radius-lg ">
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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Chỉnh Sửa Sản Phẩm</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-3">
                            <form class="align-items-center mb-0" action="/admin/editproduct/{{$product->id}}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3  ">
                                        <label for="name" class="form-label">Tên sách</label>
                                        <input type="text" class="form-control " id="name" name="name"
                                            value="{{$product->name}}" placeholder="Nhập tên sách" required>
                                    </div>
                                    <div class="col-md-6 mb-3  ">
                                        <label for="author" class="form-label">Tên tác giả</label>
                                        <input type="text" class="form-control " id="name" name="author"
                                            value="{{$product->author}}" placeholder="Nhập tên tác giả" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="id_category">Tên Danh Mục <span class="text-danger">*</span></label>

                                        <select class="form-control" name="categories_id" id="categories_id">
                                            <option value="{{$product->categories_id}}">Chọn Danh Mục</option>
                                            @foreach($optioncat as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach

                                        </select>
                                        <span class="err" id="categoryErr"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="0">Đang bán</option>
                                            <option value="1">Ngưng kinh doanh</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="img" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" id="img" name="img"
                                            placeholder="Chọn ảnh">
                                        <img src="{{asset('uploads/'.$product->img)}}" width="70px">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="gallery" class="form-label">Hình ảnh khác <span
                                                class="text-danger">(* 4 ảnh)</span> </label>
                                        <input type="file" class="form-control" id="gallery" name="gallery[]" multiple
                                            placeholder="Chọn 4 ảnh khác">
                                        @foreach(json_decode($product->gallery) as $image)
                                        <img src="{{ asset('img/' . $image) }}" width="70px" alt="Gallery Image">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="body" class="form-label">Ngoại hình <span class="text-danger">(*
                                                %)</span> </label>
                                        <input type="text" class="form-control" id="body" name="body"
                                            value="{{$product->body}}" placeholder="Nhập % ngoại hình" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">Giá <span class="text-danger">(*
                                                VND)</span> </label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            value="{{$product->price}}" placeholder="Nhập giá VND" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="sale" class="form-label">Giảm giá <span class="text-danger">(*
                                                %)</span> </label>
                                        <input type="text" class="form-control" id="sale" name="sale"
                                            value="{{$product->sale}}" placeholder="Nhập % giảm giá" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="quantity" class="form-label">Số lượng <span class="text-danger">(*
                                                )</span> </label>
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                            value="{{$product->quantity}}" placeholder="Nhập số lượng" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô tả chi tiết <span
                                            class="text-danger">(*
                                            )</span> </label>
                                    <textarea class="form-control" id="description" name="description"
                                        placeholder="Viết mô tả" required>{{$product->description}}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

@endsection