@extends('admin.layout')
@section('titlepage', 'Quản lý user')
@section('admin')

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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class=" text-secondary text-xxs font-weight-bolder opacity-7">
                                            Khách hàng
                                        </th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Thông tin
                                        </th>
                                        <th class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                            Trạng thái
                                        </th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Vai trò
                                        </th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Thao tác
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alluser as $value)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <p class="text-xs font-weight-bold mb-0">{{($alluser->currentPage() - 1) * $alluser->perPage() + $loop->index + 1 }}</p>
                                                    <img src="{{asset('uploads/'.$value->img)}}" class="avatar avatar-sm me-3" alt="user1" width="50px" height="50px" style="border-radius: 50%">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$value->name}}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{$value->email}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$value->address}}</p>
                                            <p class="text-xs text-secondary mb-0">{{$value->phone}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($value->status == 0)
                                            <span class="badge bg-success">Đang hoạt động</span>
                                            @elseif($value->status == 1)
                                            <span class="badge bg-danger">Bị khóa</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            @if($value->role == 0)
                                            <span class="badge bg-info">Khách hàng</span>
                                            @elseif($value->role == 1)
                                            <span class="badge bg-warning">Quản trị viên</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-link text-dark px-3 mb-0" href="edituser/{{$value->id}}"><i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3 container d-flex justify-content-center align-items-center">
                                {{$alluser->links('pagination::bootstrap-4')}}
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
                        <h6>Thêm khách hàng</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            <form class="align-items-center mb-0" action="adduser" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Tên</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của bạn">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="img" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" id="img" name="img">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="role" class="form-label">Vai trò</label>
                                        <select class="form-select" name="role" id="role">
                                            <option value="0">Khách hàng</option>
                                            <option value="1">Quản trị viên</option>
                                        </select>
                                    </div>
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
