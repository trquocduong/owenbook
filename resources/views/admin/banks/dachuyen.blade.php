@extends('admin.layout')
@section('titlepage','Quản lí sản phẩm')
@section('admin')
@php
use Illuminate\Support\Str;
@endphp

<main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="">Quản lý chuyển khoản</a>
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
                                        <th>STT</th>
                                        <th>Nội Dung</th>
                                        <th>Giá Tiền</th>

                                        <th class="">
                                            Tên KH</th>
                                        <th>STK Khách Hàng
                                        </th>
                                        <th class="">
                                            Ngày Chuyển</th>

                                    </tr>
                                </thead>
                                @php
                                $index = 1;
                                @endphp
                                <tbody>
                                    @foreach ($allbank as $value)
                                    <tr>
                                        <td>{{$index++}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-3">
                                                    <p class="text-xs text-muted mb-0">{{$value->description}}</p>

                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">

                                                <p class="text-xs text-muted mb-0">
                                                    {{ number_format($value->amount, 0, '.', ',') }}
                                                </p>

                                            </div>
                                        </td>

                                        <td>{{$value->corresponsive_name}}</td>
                                        <td class="align-middle text-center text-sm">
                                            {{$value->corresponsive_account}}
                                        </td>
                                        <td class="text-center">
                                            <span class="text-muted text-xs">{{$value->created_at}}</span>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection