@extends('admin.layout')
@section('titlepage','Hàng tồn kho ')
@section('titlepage2','Hàng cần nhập')
@php
use Illuminate\Support\Str;
@endphp
@section('admin')

<main class="main-content position-relative border-radius-lg" style="height: 800px">
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
                @php
                $hasItems = false;
                @endphp
                @if($hasItems=false)
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class=" text-secondary text-xxs font-weight-bolder opacity-7">Ảnh và tên </th>
                      <th class=" text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá</th>
                      <th class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">Số lượng</th>
                      <th class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">Ngày nhập</th>
                      <th class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                    </tr>
                  </thead>
                  @else
                  @endif
              @foreach ($inventory as $in)
                @if ($diffDaysArray[$in->id] >= 60)
                  @php
                  $hasItems = true;
                  @endphp
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('uploads/' . $in->img) }}" class="avatar avatar-sm me-3" alt="user1" width="50px" height="50px">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ Str::limit($in->name, 15) }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $in->categories_id }}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $in->price }}</p>
                        {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                      </td>
                      <td class="align-middle text-center text-sm p-2">
                        <span class="text-danger">{{ $in->quantity }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $in->created_at }}</span>
                      </td>
                      <td class="align-middle">
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                        <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('import_pro', ['id' => $in->id]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                      </td>
                    </tr>
                  </tbody>
                @endif
              @endforeach
              
              @if (!$hasItems)
                <p class="text-center text-danger mb-5 mt-5">Không có sản phẩm tồn kho nào !</p>
              @endif
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>@yield('titlepage2')</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ảnh và tên </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày nhập</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                    </tr>
                  </thead>
                 
                    @foreach ($needadd as $need)
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="{{asset('uploads/'.$need->img)}}" class="avatar avatar-sm me-3" alt="user1" width="50px" height="50px">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ Str::limit($need->name, 15)}}</h6>
                              <p class="text-xs text-secondary mb-0">Danh mục:{{$need->categories_id}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$need->price}}</p>
                          {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-danger">{{$need->quantity}}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{$need->created_at}}</span>
                        </td>
                        <td class="align-middle">
                          <a class="btn btn-link text-danger text-gradient px-3 mb-0"  href="{{route('import_pro',['id' => $need->id])}}"><i class="fa-solid fa-plus p-2"></i>Nhập</a>
                          <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Chi tiết</a>
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
    </div>
  </main>
@endsection
    