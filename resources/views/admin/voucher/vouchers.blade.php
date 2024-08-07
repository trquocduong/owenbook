@extends('admin.layout')
@section('titlepage','Quản lí mã giảm giá')
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
                    <div class="card-header pb-0">
                        <h6>@yield('titlepage')</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-10">
                                            Mã giảm giá
                                        </th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-10 ps-2">
                                            Thời gian bắt đầu
                                        </th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-10">
                                            Thời gian kết thúc
                                        </th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-10">
                                            Giá trị (%)
                                        </th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-10">
                                            Thao tác
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vouchers as $value)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ ($vouchers->currentPage() - 1) * $vouchers->perPage() + $loop->index + 1 }}</p>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $value->code }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $value->time_start }}
                                        </td>
                                        <td class="text-center text-sm">
                                            {{ $value->time_end }}
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $value->discount }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-link text-danger px-3 mb-0" href="removevoucher/{{$value->id}}"><i class="far fa-trash-alt me-2"></i>Xóa</a>
                                            <a class="btn btn-link text-dark px-3 mb-0" href="editvoucher/{{$value->id}}"><i class="fas fa-pencil-alt me-2"></i>Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3 d-flex justify-content-center">
                                {{ $vouchers->links('pagination::bootstrap-4') }}
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
                        <h6>Thêm Sản Phẩm</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            <form class="align-items-center mb-0" action="addvoucher" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Mã voucher</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã voucher" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="discount" class="form-label">Giá trị (%)</label>
                                        <input type="text" class="form-control" id="discount" name="discount" placeholder="Nhập % giảm giá" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="time_start" class="form-label">Thời gian bắt đầu</label>
                                    <input type="date" class="form-control" id="time_start" name="time_start" required>
                                </div>
                                <div class="mb-3">
                                    <label for="time_end" class="form-label">Thời gian kết thúc</label>
                                    <input type="date" class="form-control" id="time_end" name="time_end" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
