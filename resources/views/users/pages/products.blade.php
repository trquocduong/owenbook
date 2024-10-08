@extends('users.layout')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <!-- Repeat for each slide -->
        <div class="carousel-item active">
            <img src="{{ asset('img/bannerphu.png') }}" class="d-block w-100" alt="..." height="200px">
            <div class="carousel-caption d-none d-md-block">
                <h5>Sách uy tín hàng đầu</h5>
                <p>Đảm bảo sách tới tay khách hàng điều như hình ảnh và kh thay đổi gì cả</p>
            </div>
        </div>
        <!-- Additional slides -->
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
        <!-- Main Content: Sản phẩm -->
        <div class="col-md-12 col-12">
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
                    <form action="{{ route('products') }}" method="GET" class="d-flex">
                        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                        <select id="sort" name="sort" class="form-select" onchange="this.form.submit()">
                            <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>
                                Giá: Thấp đến Cao
                            </option>
                            <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>
                                Giá: Cao đến Thấp
                            </option>
                            <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>
                                Tên: A đến Z
                            </option>
                            <option value="name-desc" {{ request('sort') == 'name-desc' ? 'selected' : '' }}>
                                Tên: Z đến A
                            </option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="row text-center">
                @foreach ($products as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                    <div class="card shadow-lg d-flex flex-column position-relative">
                        <div class="product-image mt-2" >
                            <a href="detail/{{$item->id}}"><img src="{{asset('uploads/'.$item->img)}}" class=" lazyloaded" alt="Card image"></a>
                          </div>
                          <div class="icons-overlay">
                            <div>
                            <a href="detail/{{$item->id}}"><i class="fas fa-eye text-white fs-3 p-2"></i></a>
                        </div> 
                        <div >
                          <a href="#" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('heart_form_{{ $item->id }}').submit();"> <i class="fas fa-heart text-white fs-3 p-2"></i></a>
                          <form action="/addToFavorites" method="POST" id="heart_form_{{ $item->id }}">
                            @csrf
                            @if(Session::has('users'))
                            @php
                            $users = Session::get('users');
                            @endphp
                            <input type="hidden" name="id_user" value="{{ $users->id }}">
                            @endif
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="hidden" name="name" value="{{ $item->name }}">
                            <input type="hidden" name="img" value="{{ $item->img }}">
                            <input type="hidden" name="price" value="{{ $item->discounted_price }}">
                            <input type="hidden" name="description" value="{{ $item->description }}">
                        </form>
                        </div>
                        </div>
                        <span class="discount-label bg-danger">New</span>
                        <div class="card-body">
                            <div style="height: 70px">
                              <a href="" class="nav-link" title="">{{ Str::limit($item->name, 50) }}</a>
                          </div>
                              <p class="card-text">Giá:{{ number_format($item->price) }}VNĐ</p>
                              <a href="#" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('cart_form_{{ $item->id }}').submit();">
                            <i class="fa-solid fa-cart-shopping p-2 btn btn-danger" style="color: #ffffff;"></i></a>
                              <form action="{{asset('addtocart')}}" method="POST" id="cart_form_{{ $item->id }}">
                                @csrf
          
                                @if(Session::has('users'))
                                @php
                                $users = Session::get('users');
                                @endphp
                                <input type="hidden" name="id_user" value="{{ $users->id }}">
                                @endif
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="name" value="{{ $item->name }}">
                                <input type="hidden" name="img" value="{{ $item->img }}">
                                <input type="hidden" name="price" value="{{ $item->discounted_price }}">
                                <input type="hidden" name="description" value="{{ $item->description }}">
                            </form>
                          </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-3 container d-flex justify-content-center align-items-center mb-5">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
