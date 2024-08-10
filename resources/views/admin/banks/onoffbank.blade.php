@extends('admin.layout')
@section('titlepage', 'Quản lí sản phẩm')
@section('admin')
@php
use Illuminate\Support\Str;
@endphp
<style>
.active {
    background-color: #4CAF50;
    color: white;
}

button {
    margin: 5px;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}
</style>
<script>
let updateIntervalId;
let bankIntervalId;

function startAutoUpdate() {
    if (!updateIntervalId) {
        updateIntervalId = setInterval(() => {
            fetch('{{ route("updateBillStatuses") }}')
                .then(response => response.json())
                .then(data => {
                    console.log('Update successful:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }, 5000); // 5000 ms = 5 seconds

        document.getElementById('start-btn-update').classList.add('active');
        document.getElementById('stop-btn-update').classList.remove('active');
    }
}

function stopAutoUpdate() {
    if (updateIntervalId) {
        clearInterval(updateIntervalId);
        updateIntervalId = null;
    }

    document.getElementById('start-btn-update').classList.remove('active');
    document.getElementById('stop-btn-update').classList.add('active');
}

function startBankAutoUpdate() {
    if (!bankIntervalId) {
        bankIntervalId = setInterval(() => {
            fetch('{{ route("getallbank") }}')
                .then(response => response.json())
                .then(data => {
                    console.log('Bank update successful:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }, 5000); // 5000 ms = 5 seconds

        document.getElementById('start-btn-bank').classList.add('active');
        document.getElementById('stop-btn-bank').classList.remove('active');
    }
}

function stopBankAutoUpdate() {
    if (bankIntervalId) {
        clearInterval(bankIntervalId);
        bankIntervalId = null;
    }

    document.getElementById('start-btn-bank').classList.remove('active');
    document.getElementById('stop-btn-bank').classList.add('active');
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('start-btn-update').addEventListener('click', startAutoUpdate);
    document.getElementById('stop-btn-update').addEventListener('click', stopAutoUpdate);
    document.getElementById('start-btn-bank').addEventListener('click', startBankAutoUpdate);
    document.getElementById('stop-btn-bank').addEventListener('click', stopBankAutoUpdate);
});
</script>
</head>

<main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="">Quản lý Tool</a></li>
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
                        <h6>@yield('titlepage')</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <h3 class="p-5">Quét Đơn Tự Động</h3>
                            <button class="m-4" id="start-btn-update">Bắt đầu</button>
                            <button class="m-4" id="stop-btn-update">Dừng</button>
                            <h3 class="p-5">Quét Đơn Lịch sử giao dịch tự động</h3>
                            <button class="m-4" id="start-btn-bank">Bắt đầu</button>
                            <button class="m-4" id="stop-btn-bank">Dừng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection