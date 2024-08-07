@extends('admin.layout')
@section('titlepage','Quản lí danh mục')
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
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Chỉnh Sửa Danh Mục</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            <form class="align-items-center mb-0" action="{{$cate->id}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3  ">
                                    <label for="name" class="form-label">Tên danh mục</label>
                                    <input type="text" class="form-control " id="name" name="name"
                                        value="{{$cate->name}}" placeholder="Nhập tên danh mục" required>
                                </div>
                                <div class="row">
                                    <div class=" col mb-3">
                                        <label for="img" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder=""
                                            value="{{$cate->image}}">
                                        <img src="{{asset('uploads/'.$cate->image)}}" width="70px">
                                    </div>
                                    <div class="col form-group mb-3">
                                        <label for="status">Trạng thái:</label>
                                        <select class="form-control" name="status" id="status"
                                            value="{{$cate->status}}">
                                            <option value="0">Đang kinh doanh
                                            </option>
                                            <option value="1">Ngừng kinh doanh
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô tả </label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Mô tả ">
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