@extends('admin.layout')
@section('admin')
<style>
/* Ensure the tabs stay in one line */
.nav-tabs {
    display: flex;
    flex-wrap: nowrap;
    /* Prevent wrapping */
    overflow-x: auto;
    /* Allow horizontal scrolling if necessary */
}

.nav-item {
    flex: 1;
    /* Allow tabs to grow/shrink */
}
</style>
<main class="main-content position-relative border-radius-lg" style="height: 800px">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Quản lý tài khoản</a>
                    </li>
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
        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link {{ $currentTab == '1' ? 'active' : '' }}" id="ex1-tab-1" data-bs-toggle="tab"
                    href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1"
                    aria-selected="{{ $currentTab == '1' ? 'true' : 'false' }}" data-tab="1">Đơn cần duyệt</a>
            </li>
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link {{ $currentTab == '2' ? 'active' : '' }}" id="ex1-tab-2" data-bs-toggle="tab"
                    href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2"
                    aria-selected="{{ $currentTab == '2' ? 'true' : 'false' }}" data-tab="2">Đang giao</a>
            </li>
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link {{ $currentTab == '3' ? 'active' : '' }}" id="ex1-tab-3" data-bs-toggle="tab"
                    href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3"
                    aria-selected="{{ $currentTab == '3' ? 'true' : 'false' }}" data-tab="3">Đã nhận</a>
            </li>
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link {{ $currentTab == '4' ? 'active' : '' }}" id="ex1-tab-4" data-bs-toggle="tab"
                    href="#ex1-tabs-4" role="tab" aria-controls="ex1-tabs-4"
                    aria-selected="{{ $currentTab == '4' ? 'true' : 'false' }}" data-tab="4">Đã huỷ</a>
            </li>
        </ul>
        <div class="tab-content" id="ex1-content">
            @php
            $productData = json_decode($bill->product, true);
            @endphp

            <div class="mt-4 mb-4 d-flex justify-content-center">
                <ul class="list-group card " style="width:30rem">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <img src="{{asset('img/logo.webp')}}" height="70px" alt="">
                                <p>Mã Đơn Hàng: <strong>{{$bill->id_bill}}</strong></p>
                            </div>
                            <div class="col">
                                <p>Mã Vận Đơn: <strong>{{$bill->mavandon}}</strong></p>
                                <p>Đơn Vị Vận Chuyển: <strong>{{$bill->shipping_units}}</strong></p>

                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col"><strong>Từ:</strong>
                                <p>Tên Người Gửi: Mai Lê Quel</p>
                                <p>SDT Người Gửi: 0832575905</p>
                                <p>Dịa Chỉ: 195 Tô Ngọc Vân, Phường Thạnh Xuân, Quận 12, HCM</p>
                            </div>
                            <div class="col"><strong>Đến:</strong>

                                <p>Tên khách hàng: {{ $bill->name }}</p>
                                <p>Email: {{ $bill->email }}</p>
                                <p>Số Điện Thoại: {{ $bill->phone }}</p>
                                <p>Địa chỉ: {{ $bill->address }}</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <table class="table table-show-category show-table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên Sản Phấm</th>
                                    <th>Số Lượng</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($productData as $product)
                                <tr>
                                    <td>
                                        {{ $product['name'] }}
                                    </td>
                                    <td>
                                        {{ $product['quantity'] }}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <p>Tiền Thu Người Nhận:</p>
                                @if($bill->payment_methods == 'cash')
                                <h4 class="text-danger">{{ number_format($bill->totalfinal, 0, ',', '.') . ' đ' }}</h4>
                                @else
                                <h4 class="text-danger">Đã thanh toán </h4>
                                @endif
                                <p>Chỉ Dẫn Giao Hàng:</p>
                                <ul>
                                    <li>Không Đồng Kiểm</li>
                                    <li>Chuyển Hoàn Sau 3 Lần Phát</li>
                                    <li>Lưu Kho Tối Đa 5 Ngày</li>
                                </ul>
                            </div>
                            <div class="col">
                                <p>Khối Lượng Tối Đa: 1250g</p>
                                <p>Phương Thức Thanh Toán: {{$bill->payment_methods}}</p>
                                <p>Mọi Thắc Mắc Liên Hệ Shop SDT/Zalo: 0832575905 </p>


                            </div>
                        </div>
                    </li>

                </ul>
            </div>


            @endsection
            @section('styles')
            <link rel=" stylesheet" href="{{ asset('css/showbill.css') }}">
            @endsection