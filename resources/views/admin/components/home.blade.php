@extends('admin.layout')
@section('admin')
@php
use Illuminate\Support\Str;
@endphp
<main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Trang
                            chủ</a></li>
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
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold">Danh Mục Sản Phẩm</p>
                                    <h5 class="font-weight-bolder">
                                        {{$categories}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">13/7-30/7</span>

                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <img src="{{asset('img/4.png')}}" alt="" width="70px" height="70px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0  font-weight-bold">Tổng Số Tài Khoản</p>
                                    <h5 class="font-weight-bolder">
                                        {{$user}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">13/7-30/7</span>

                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <img src="{{asset('img/2.png')}}" alt="" width="80px" height="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold">Số Lượng Sản Phẩm</p>
                                    <h5 class="font-weight-bolder">
                                        {{$products}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder">13/7-30/7</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle mt-2">
                                    <img src="{{asset('img/1.png')}}" alt="" width="60px" height="60px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 font-weight-bold">Số Lượng Đơn Hàng</p>
                                    <h5 class="font-weight-bolder">
                                        {{$bills}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">13/7-30/7</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle mt-2">
                                    <img src="{{asset('img/3.png')}}" alt="" width="60px" height="60px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Thống kê đơn hàng</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">Trong năm 2024</span>
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-5">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1500">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/6.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/7.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/8.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Đơn Hàng Cần Duyệt</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">MDH
                                        </th>
                                        <th
                                            class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tên</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Trạng thái</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Đơn
                                            ngày</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billadd as $needs)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <div>{{ Str::limit($needs->id_bill, 5)}}</div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{$needs->name}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge bg-danger text-white">{{$needs->status}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$needs->created_at}}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-link text-danger px-3 mb-0" href="#"><i
                                                    class="fa-solid fa-plus p-2"></i>Duyệt</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card ">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Mặc Hàng Cần Nhập</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Ảnh
                                            và tên </th>
                                        <th
                                            class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Giá</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Số
                                            lượng</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            Thao tác</th>
                                    </tr>
                                </thead>

                                @foreach ($needadd as $need)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{asset('uploads/'.$need->img)}}"
                                                        class="avatar avatar-sm me-3" alt="user1" width="50px"
                                                        height="50px">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ Str::limit($need->name, 5)}}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{$need->categories_id}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$need->price}}</p>
                                        </td>
                                        <td class="text-center mt-2">
                                            <span class="bg-danger p-2 text-light"
                                                style="border-radius: 100%">{{$need->quantity}}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                href="javascript:;"><i class="fa-solid fa-plus p-2"></i>Nhập</a>
                                            <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                                    class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Chi
                                                tiết</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script>
// var billsCount = {
//   {
//     $bills
//   }
// };
</script>
@endsection