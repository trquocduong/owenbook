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
  <div class="container mt-5 mb-5">
    <h3 class="text-center mb-5">Liên hệ với chúng tôi </h3>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Liên lạc</h4>
                </div>
                <div class="card-body">
                    <p><i class="fa-solid fa-location-dot"></i>Quận 12, Công viên phần mềm Quang Trung</p>
                    <p><i class="fa-solid fa-phone"></i>0832 57 59 05 <br>
                        trunghau2004318@gmail.com</p>
                    <p><i class="fa-solid fa-clock"></i>Giờ hoạt động: <br>
                        10 am - 10 pm , 7 ngày trong tuần</p>
                </div>
            </div>
            <div class="card mt-4">
                <h6 class="text-center p-3">Nhận hỗ trợ khi gọi</h6>
            </div>
            <div class="card mt-3">
                <h6 class="text-center p-3">Nhận chỉ đường</h6>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4545069023156!2d106.62191297620498!3d10.852993961712382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2sQuang%20Trung%20Software%20City!5e0!3m2!1sen!2sus!4v1722659759023!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

  </div>
    
@endsection