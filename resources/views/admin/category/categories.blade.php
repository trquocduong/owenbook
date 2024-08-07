@extends('admin.layout')
@section('titlepage','Quản lí danh mục')
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
                        <h6>@yield('titlepage')</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class=" text-secondary text-xxs font-weight-bolder opacity-7">
                                            Danh Mục</th>
                                        <th
                                            class=" text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Mô tả</th>
                                        <th
                                            class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                            Trạng thái</th>
                                        <th
                                            class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ngày Nhập</th>
                                        <th
                                            class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                            Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $value)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <p class="text-xs font-weight-bold mb-0">{{($categories->currentPage() - 1) *
                                                $categories->perPage() + $loop->index + 1 }}</p>
                                                    <img src="{{asset('uploads/'.$value->image)}}"
                                                        class="avatar avatar-sm me-3" alt="user1" width="50px" height="50px" style="border-radius: 50%">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$value->name}}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{$value->description}}</p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            @if($value->status == 0)
                                            <span class="bg-success p-2 text-light" style="border-radius: 10px">Đang kinh doanh</span>
                                            @elseif($value->status == 1)
                                            <span class="bg-danger p-2 text-light"  style="border-radius: 10px">Ngừng kinh doanh</span>
                                            @endif
                                        </td>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$value->created_at}}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                href="removecategory/{{$value->id}}"><i
                                                    class="far fa-trash-alt me-2"></i>Xóa</a>
                                            <a class="btn btn-link text-dark px-3 mb-0"
                                                href="editcategory/{{$value->id}}"><i
                                                    class="fas fa-pencil-alt text-dark me-2"
                                                    aria-hidden="true"></i>Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3 container d-flex justify-content-center align-items-center">
                                {{$categories->links('pagination::bootstrap-4')}}
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
                        <h6>Thêm Danh Mục</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-2">
                            <form class="align-items-center mb-0" action="{{route('admin/addcategory')}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3  ">
                                    <label for="name" class="form-label">Tên danh mục</label>
                                    <input type="text" class="form-control " id="name" name="name"
                                        placeholder="Nhập tên danh mục" required>
                                </div>
                                <div class="row">
                                    <div class=" col mb-3">
                                        <label for="img" class="form-label">Hình ảnh</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="">
                                    </div>
                                    <div class="col form-group mb-3">
                                        <label for="status">Trạng thái:</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="0">Đang kinh doanh
                                            </option>
                                            <option value="1">Ngừng kinh doanh
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô tả </label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Mô tả ">
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