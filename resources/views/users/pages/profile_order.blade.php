@extends('users.layout')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
    integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

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

.fa-2x {
    font-size: 2em;
}

.table-billing-history th,
.table-billing-history td {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    padding-left: 1.375rem;
    padding-right: 1.375rem;
}

.table> :not(caption)>*>*,
.dataTable-table> :not(caption)>*>* {
    padding: 0.75rem 0.75rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}

.border-start-primary {
    border-left-color: #e10f44 !important;
}

.border-start-secondary {
    border-left-color: #6900c7 !important;
}

.border-start-success {
    border-left-color: #00ac69 !important;
}

.border-start-lg {
    border-left-width: 0.25rem !important;
}

.h-100 {
    height: 100% !important;
}
</style>

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link ms-0" href="{{route('profile')}}">Hồ sơ</a>
        <a class="nav-link active" href="{{route('profile.order')}}">Đơn hàng</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="card mb-4">
        <div class="card-header">Lịch sử đơn hàng</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">STT</th>

                            <th class="border-gray-200" scope="col">Mã đơn hàng</th>
                            <th class="border-gray-200" scope="col">Ngày đặt</th>
                            <th class="border-gray-200" scope="col">Tổng tiền</th>
                            <th class="border-gray-200" scope="col">Trạng thái</th>
                            <th class="border-gray-200" scope="col">Xem chi tiết đơn</th>
                        </tr>
                    </thead>
                    @php
                    $index = 1; // Khởi tạo biến đếm
                    @endphp

                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{$order->id_bill}}</td>
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                            <td>{{ number_format($order->totalfinal, 0, ',', '.') }} VNĐ</td>
                            @if ($order->status == 1)
                            <td><span class="badge bg-light text-danger">Chờ xác nhận</span></td>
                            @elseif($order->status == 2)
                            <td><span class="badge bg-light text-warning">Đang giao</span></td>
                            @else
                            <td><span class="badge bg-light text-success">Đã nhận hàng</span></td>
                            @endif
                            <td><a class="btn border border-danger text-decoration-none shadow-none"
                                    href="{{route('profile.detail_order', $order->id_bill)}}">Xem</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection