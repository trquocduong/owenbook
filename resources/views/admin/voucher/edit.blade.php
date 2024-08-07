@extends('admin.layout')
@section('titlepage','Quản lí mã giảm giá')
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
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Thêm Sản Phẩm</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            <form class="align-items-center mb-0" action="{{$voucher->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class=" mb-3  ">
                                        <label for="name" class="form-label">Mã voucher</label>
                                        <input type="text" class="form-control " id="name" name="code" value="{{$voucher->code}}" placeholder="Nhập tên voucher" required>
                                    </div>
                                    <div class=" mb-3  ">
                                        <label for="name" class="form-label">Giá trị (%)</label>
                                        <input type="text" class="form-control " id="name" name="discount" value="{{$voucher->discount}}" placeholder="Nhập % giảm giá" required>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Thời gian bắt đầu</label>
                                    <input type="date" class="form-control" id="time_start" name="time_start" value="{{$voucher->time_start}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Thời gian kết thúc</label>
                                    <input type="date" class="form-control" id="time_end" name="time_end" value="{{$voucher->time_end}}" required>
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