@extends('users.layout')
@section('content')
<style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #e10f44;
        border-bottom-color: #e10f44;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .form-control:focus {
        border-color: #e10f44;
        outline: none;
        box-shadow: none;
    }
</style>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="{{route('profile')}}">Hồ sơ</a>
        <a class="nav-link" href="{{route('profile.order')}}">Đơn hàng</a>
    </nav>
    <hr class="mt-0 mb-4">
    <form action="{{route('profile.update')}}" method="post" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Hình ảnh đại diện</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    @csrf
                    @if(Session::has('users'))
                    @php
                    $users = Session::get('users');
                    @endphp
                    @endif
                    <img class="img-account-profile rounded-circle mb-2" src="{{ asset('uploads/'.$user->img) }}" alt="">
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
                        <input class="form-control" name="name" id="inputUsername" type="text" placeholder="Nhập tên người dùng" value="{{$user->name}}">
                    </div>
                    <!-- Form Row        -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputOrgName">Tên đăng nhập</label>
                            <input class="form-control" name="username" id="inputOrgName" type="text" placeholder="Nhập tên đăng nhập" value="{{$user->username}}">
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLocation">Địa chỉ</label>
                            <input class="form-control" name="address" id="inputLocation" type="text" placeholder="Nhập địa chỉ" value="{{$user->address}}">
                        </div>
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Địa chỉ Email</label>
                        <input class="form-control" name="email" id="inputEmailAddress" type="email" placeholder="Nhập địa chỉ Email" value="{{$user->email}}">
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                            <input class="form-control" name="phone" id="inputPhone" type="tel" placeholder="Nhập số điện thoại" value="{{$user->phone}}">
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