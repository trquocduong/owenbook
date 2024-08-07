@extends('admin.layout')
@section('admin')
<style>
    /* Ensure the tabs stay in one line */
    .nav-tabs {
        display: flex;
        flex-wrap: nowrap; /* Prevent wrapping */
        overflow-x: auto; /* Allow horizontal scrolling if necessary */
    }
    .nav-item {
        flex: 1; /* Allow tabs to grow/shrink */
    }
</style>
<main class="main-content position-relative border-radius-lg" style="height: 800px">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Quản lý tài khoản</a></li>
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
                <a class="nav-link {{ $currentTab == '1' ? 'active' : '' }}" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="{{ $currentTab == '1' ? 'true' : 'false' }}" data-tab="1">Đơn cần duyệt</a>
            </li>
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link {{ $currentTab == '2' ? 'active' : '' }}" id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="{{ $currentTab == '2' ? 'true' : 'false' }}" data-tab="2">Đang giao</a>
            </li>
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link {{ $currentTab == '3' ? 'active' : '' }}" id="ex1-tab-3" data-bs-toggle="tab" href="#ex1-tabs-3" role="tab" aria-controls="ex1-tabs-3" aria-selected="{{ $currentTab == '3' ? 'true' : 'false' }}" data-tab="3">Đã nhận</a>
            </li>
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link {{ $currentTab == '4' ? 'active' : '' }}" id="ex1-tab-4" data-bs-toggle="tab" href="#ex1-tabs-4" role="tab" aria-controls="ex1-tabs-4" aria-selected="{{ $currentTab == '4' ? 'true' : 'false' }}" data-tab="4">Đã huỷ</a>
            </li>
        </ul>
        <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade {{ $currentTab == '1' ? 'show active' : '' }}" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
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
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">MDH</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Đơn ngày</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($bills as $needs)
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
                                @if($needs->status === 1)
                              <span class="badge bg-danger text-white">Chờ xác nhận</span>
                              @endif
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{$needs->created_at}}</span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('bills.approve', $needs->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-success px-3 mb-0">
                                        <i class="fa-solid fa-check p-2"></i>Duyệt
                                    </button>
                                </form>
                                <form action="{{ route('bills.cancel', $needs->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger px-3 mb-0">
                                        <i class="fa-solid fa-times p-2"></i>Huỷ đơn
                                    </button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="mt-3 d-flex justify-content-center">
                    {{ $bills->appends(['tab' => $currentTab])->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <div class="tab-pane fade {{ $currentTab == '2' ? 'show active' : '' }}" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                      <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Đơn Hàng Đang Giao</h6>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">MDH</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Đơn ngày</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($bill_received as $needs)
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
                                @if($needs->status === 2)
                              <span class="badge bg-warning text-white">Đang giao</span>
                              @endif
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{$needs->created_at}}</span>
                            </td>
                            <td class="text-center">
                              <form action="{{ route('bills.approve', $needs->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-link text-success px-3 mb-0">
                                    <i class="fa-solid fa-check p-2"></i>Đã nhận
                                </button>
                            </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="mt-3 d-flex justify-content-center">
                    {{ $bill_received->appends(['tab' => $currentTab])->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <div class="tab-pane fade {{ $currentTab == '3' ? 'show active' : '' }}" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                      <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Đơn Hàng Đã Nhận</h6>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">MDH</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Đơn ngày</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($bill_deliver as $needs)
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
                                @if($needs->status === 3)
                              <span class="badge bg-success text-white">Đã nhận</span>
                              @endif
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{$needs->created_at}}</span>
                            </td>
                            <td class="align-middle">
                                <form action="{{ route('bills.destroy', $needs->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger px-3 mb-0" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn hàng này?');">
                                        <i class="fa-solid fa-plus p-2"></i>Xoá
                                    </button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="mt-3 d-flex justify-content-center">
                    {{ $bill_deliver->appends(['tab' => $currentTab])->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <div class="tab-pane fade {{ $currentTab == '4' ? 'show active' : '' }}" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                      <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Đơn Hàng Đã Huỷ</h6>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">MDH</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Đơn ngày</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($close as $needs)
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
                                @if($needs->status === 4)
                              <span class="badge bg-danger text-white">Đã huỷ</span>
                              @endif
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold">{{$needs->created_at}}</span>
                            </td>
                            <td class="align-middle">
                                <form action="{{ route('bills.destroy', $needs->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger px-3 mb-0" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn hàng này?');">
                                        <i class="fa-solid fa-plus p-2"></i>Xoá
                                    </button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="mt-3 d-flex justify-content-center">
                    {{ $close->appends(['tab' => $currentTab])->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
