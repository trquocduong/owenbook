
@extends('admin.Layout')
@section('titlepage','Quản lí sản phẩm')
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
    <div class="container-fluid py-4">

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Nhập hàng</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-2">
                <form class="align-items-center mb-0" action="{{ route('import.product', ['id' => $importpro->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" value="{{ $importpro->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input type="text" class="form-control" id="price" value="{{ $importpro->price }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số Lượng</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $importpro->quantity }}" required min="1" max="50">
                    </div>
                    <button type="submit" class="btn btn-primary">Nhập</button>
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
    