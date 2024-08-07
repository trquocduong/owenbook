@php
use Illuminate\Support\Str;
@endphp
<nav class="navbar navbar-expand-lg bg-body-light shadow-sm">
    <div class="container-fluid">
        <div class="d-flex align-items-center me-auto">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 100px; height: auto;">
        </div>
        <form class="d-flex mx-auto w-50" role="search">
            <input class="form-control me-2" type="search" placeholder="Tìm kiếm trên 100 sản phẩm...." aria-label="Search">
        </form>
        <div class="d-flex align-items-center ms-auto">
            <div class="d-none d-lg-flex">
                @if(Auth::check())
                <nav class="navbar navbar-expand-lg bg-body-light">
                    <div class="container-fluid">
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item dropdown p-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('uploads/'.Auth::user()->img) }}" width="30px" height="30px" style="border-radius: 50%"/>
                            </a>
                            <ul class="dropdown-menu mt-2">
                              <li><a class="dropdown-item" href="#">Xin chào: {{ Str::limit(Auth::user()->name , 5)}}</a></li>
                              <li><a class="dropdown-item" href="#">Thông tin cá nhân.</a></li>
                              <li><a class="dropdown-item" href="#">Đơn hàng của bạn.</a></li>
                              <li><a class="dropdown-item" href="#">Đỗi mật khẩu.</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a href="#" class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Đăng xuất </a></li>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                @else 
                <a href="{{route('login')}}" class="nav-link p-2 fs-5"><i class="fa-regular fa-user"></i></a>
                @endif
            </div>
            <div>
                <a href="{{route('cart')}}" class="nav-link p-2 fs-5"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <div class="d-none d-lg-flex">
                <a href="{{route('heart')}}" class="nav-link p-2 fs-5"><i class="fa-regular fa-heart"></i></a>
            </div>
            <!-- Button to open the side menu -->
            <button class="btn btn-dark d-lg-none ms-2" id="openMenu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</nav>
<div class="row p-2">
    <div class="col-2">
        <div class="accordion-container d-none d-lg-flex">
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button bg-danger text-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  Top danh mục
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <ul class="navbar-nav mb-2 ">
                        <li><a href="" class="nav-link">Trang chủ</a></li>
                        <li><a href="#" class="nav-link">Sản phẩm</a></li>
                        <li><a href="#" class="nav-link">Bài viết</a></li>
                        <li><a href="#" class="nav-link">Liên hệ</a></li>
                        <li><a href="#" class="nav-link">Danh mục</a></li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-7">
        <nav class="navbar navbar-expand-lg bg-body-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3">
                            <a class="nav-link active" aria-current="page" href="
                            {{route('home')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="{{route('products')}}">Sản phẩm</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="https://blog.owenbook.store">Bài viết</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="{{route('contact')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-3">
        <nav class="navbar navbar-expand-lg bg-body-light d-none d-lg-flex">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3">
                            <i class="fa-solid fa-phone p-2 text-danger"></i>0338542631
                        </li>
                        <li class="nav-item">
                            <i class="fa-solid fa-location-dot text-danger p-2"></i>Tìm cửa hàng
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Side menu overlay -->
<div class="overlay" id="sideMenu">
    <span class="close-btn" id="closeMenu">&times;</span>
    <ul class="mt-3">
        <li class="p-2"></li>
        <li><a href="{{route('home')}}">Trang chủ</a></li>
        <li><a href="{{route('products')}}">Sản phẩm</a></li>
        <li><a href="https://blog.owenbook.store">Bài viết</a></li>
        <li><a href="{{route('contact')}}">Liên hệ</a></li>
    </ul>
</div>
