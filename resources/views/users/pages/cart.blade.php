@extends('users.layout')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('img/bannerphu.png')}}" class="d-block w-100" alt="..." height="200px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Sách uy tín hàng đầu</h5>
          <p>Đảm bảo sách tới tay khách hàng điều như hình ảnh và kh thay đổi gì cả</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bannerphu.png')}}" class="d-block w-100" alt="..." height="200px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Chất lượng tốt nhất</h5>
          <p>Bảo hành 3 ngày nếu sách bị rách trang thì đơi 1 vs 1 </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/bannerphu.png')}}" class="d-block w-100" alt="..." height="200px">
        <div class="carousel-caption d-none d-md-block">
          <h5>Giao hàng tiết kiệm</h5>
          <p>Miễn phí vẫn chuyễn cho đơn 5 quyển và giảm 20% vận chuyển cho đơn 3 quyển</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<div class="container">
<div class="container py-5">
  <h2 class="mb-4">Giỏ Hàng</h2>
  <div class="row">
      <div class="col-lg-8">
          <div class="card mb-4">
              <div class="card-body">
                  <h5 class="card-title">Sản phẩm trong giỏ hàng</h5>
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="d-flex align-items-center">
                          <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid me-3" />
                          <div>
                              <h6 class="mb-1">Sản phẩm 1</h6>
                              <p class="text-muted mb-1">Mô tả sản phẩm 1</p>
                              <span class="text-success">$20.00</span>
                          </div>
                      </div>
                      <div class="d-flex align-items-center">
                          <input type="number" class="form-control me-3" value="1" min="1" style="width: 80px;" />
                          <button class="btn btn-danger btn-sm me-2"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <div class="d-flex align-items-center">
                          <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid me-3" />
                          <div>
                              <h6 class="mb-1">Sản phẩm 2</h6>
                              <p class="text-muted mb-1">Mô tả sản phẩm 2</p>
                              <span class="text-success">$30.00</span>
                          </div>
                      </div>
                      <div class="d-flex align-items-center">
                          <input type="number" class="form-control me-3" value="2" min="1" style="width: 80px;" />
                          <button class="btn btn-danger btn-sm me-2"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>
              </div>
          </div>
          <div class="p-2 mb-3">
            <button class="btn btn-danger">Xoá tất cả</button>
        </div>
      </div>

      <div class="col-lg-4">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Tổng quan</h5>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                          Tổng cộng:
                          <span class="text-success">$50.00</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                          Phí vận chuyển:
                          <span class="text-success">$5.00</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                          Tổng cộng (bao gồm phí vận chuyển):
                          <span class="text-success">$55.00</span>
                      </li>
                  </ul>
                  <a href="#" class="btn btn-danger w-100 mt-3">Thanh toán</a>
              </div>
          </div>
      </div>
  </div>
</div>
  
  </div>
    
@endsection