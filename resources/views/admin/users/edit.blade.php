@extends('admin.layout')
@section('titlepage','Quản lí user')
@section('admin')

<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
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
                        <h6>Chỉnh sửa thông tin khách hàng</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            <form class="align-items-center mb-0" action="/admin/edituser/{{$user->id}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class=" col-md-6 mb-3  ">
                                        <label for="name" class="form-label">Tên</label>
                                        <input type="text" class="form-control " id="name" name="name"
                                            value="{{$user->name}}" placeholder="Nhập tên của bạn">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{$user->email}}" placeholder="Nhập email của bạn" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{$user->password}}" placeholder="Nhập mật khẩu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{$user->address}}" placeholder="Nhập địa chỉ" require>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{$user->phone}}" placeholder="Nhập số điện thoại" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="img" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" id="img" name="img"
                                            value="{{$user->img}}" placeholder="Nhập mật khẩu">
                                        <img src="{{asset('uploads/'.$user->img)}}" width="70px">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="role">Trạng thái:</label>
                                            <select class="form-control" name="status" id="role">
                                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Hoạt Động
                                                </option>
                                                <option value="1" {{ $user->status== 1 ? 'selected' : '' }}>Bị Khóa
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="role">Vai trò:</label>
                                            <select class="form-control" name="role" id="role">
                                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Khách hàng
                                                </option>
                                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Quản trị viên
                                                </option>
                                            </select>
                                        </div>
                                    </div>
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