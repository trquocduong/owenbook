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
    <div class="row">
        <div class="col-md-3 d-none d-lg-flex">
           
            <div class="accordion" id="accordionExample">
              <h4 class="mt-4 p-2">Danh mục</h4>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Accordion Item #1
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Accordion Item #2
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Accordion Item #3
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-9 col-12">
            <div class="row align-items-center">
                <!-- Phần bên trái -->
                <div class="col-md-8">
                    <h2 class="mt-3 p-3">
                        <strong>Tất cả</strong> <span class="text-danger">Sản Phẩm</span>
                    </h2>
                </div>
                <!-- Phần bên phải -->
                <div class="col-md-4 d-flex justify-content-end">
                    <label for="sort" class="form-label p-2">Sắp xếp:</label>
                    <select id="sort" class="form-select sort-select">
                        <option value="price-asc">Giá: Thấp đến Cao</option>
                        <option value="price-desc">Giá: Cao đến Thấp</option>
                        <option value="name-asc">Tên: A đến Z</option>
                        <option value="name-desc">Tên: Z đến A</option>
                    </select>
                </div>
            </div>
            <div class="row text-center">
                @foreach ($products as $item)
                <div class="col-6 col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-lg d-flex flex-column position-relative">
                        <img src="{{asset('uploads/'.$item->img)}}" class="card-img-top h-50" alt="Card image">
                        <div class="icons-overlay">
                            <div>
                            <i class="fas fa-eye text-white fs-3 p-2"></i>
                        </div> 
                        <div >
                            <i class="fas fa-heart text-white fs-3 p-2"></i>
                        </div>
                        </div>
                        <span class="discount-label bg-danger">New</span>
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($item->name, 15) }}</h5>
                            <p class="card-text">Giá:{{ number_format($item->price) }}VNĐ</p>
                            <a href="#" class="btn btn-danger">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-3 container d-flex justify-content-center align-items-center mb-5">
                {{$products->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
  
  </div>
    
@endsection