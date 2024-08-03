@extends('users.layout')
@section('content')

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="{{route('')}}">Hồ sơ</a>
        <a class="nav-link" href="{{route('')}}">Đơn hàng</a>
    </nav>
    <hr class="mt-0 mb-4">
    <form action="{{route('')}}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Hình ảnh đại diện</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="{{ asset('uploads/') }}" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG/PNG không lớn hơn 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" name="img" class="form-control mb-2">
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Chi tiết tài khoản</div>
                <div class="card-body">
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Tên người dùng</label>
                        <input class="form-control" name="name" id="inputUsername" type="text" placeholder="Nhập tên người dùng" value="">
                    </div>
                    <!-- Form Row        -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputOrgName">Tên đăng nhập</label>
                            <input class="form-control" name="username" id="inputOrgName" type="text" placeholder="Nhập tên đăng nhập" value="">
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                            <input class="form-control" name="address" id="inputLocation" type="text" placeholder="Nhập địa chỉ" value="">
                        </div>
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Địa chỉ Email</label>
                        <input class="form-control" name="email" id="inputEmailAddress" type="email" placeholder="Nhập địa chỉ Email" value="">
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                            <input class="form-control" name="phone" id="inputPhone" type="tel" placeholder="Nhập số điện thoại" value="">
                        </div>
                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" style="background-color: #e10f44; border:none;" type="submit">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection