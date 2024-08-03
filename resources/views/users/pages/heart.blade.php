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
<h2 class="mt-5">Sản phẩm yêu thích của bạn</h2>
<div class="container py-5">
  <div class="row">
    <div class="col-12">
      <form action="#">
         <div class="table-content table-responsive">
            <table class="table">
                  <thead>
                     <tr>
                        <th class="product-thumbnail">Ảnh</th>
                        <th class="cart-product-name">Tên sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-add-to-cart">Thêm</th>
                        <th class="product-remove">Hành động</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="product-thumbnail">
                           <a href="shop-details.html"><img src="" alt="">
                           </a>
                        </td>
                        <td class="product-name">
                           <a href="shop-details.html"></a>
                        </td>
                        <td class="product-price">
                           <span class="amount"></span>
                        </td>
                        <td class="product-add-to-cart">
                           <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                        </td>
                        <td class="product-remove text-center">
                          <i class="fa-solid fa-trash"></i>
                        </td>
                     </tr>
                  </tbody>
            </table>
         </div>
      </form>
      <div class="p-2 mb-3">
        <button class="btn btn-danger">Xoá tất cả</button>
    </div>
</div>
  </div>
</div>
  
  </div>
    
@endsection