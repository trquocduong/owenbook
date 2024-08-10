@extends('users.layout')
@section('content')
@php
use Illuminate\Support\Str;
@endphp
{{-- banner --}}
<div class="row">
    <div class="col-md-2 d-none d-md-block">
    </div>
    <div class="col-md-7 col-12">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="{{asset('uploads/banner1.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('uploads/banner2.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('uploads/banner3.png')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12 col-6">
                <div class="card mt-2">
                    <img src="{{asset('uploads/banner4.png')}}" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-md-12 col-6">
                <div class="card mt-2">
                    <img src="{{asset('uploads/banner5.png')}}" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- category --}}

<h2 class="mt-3 p-3"><strong>Danh mục</strong> <span class="text-danger">hàng đầu</span></h2>
<div class="container mt-5">
    <div class="row">
        @foreach ($category as $item)
        <div class="col-lg-2 col-md-4 col-sm-6 col-6 mb-4">
            <div class="text-center p-3 border rounded">
                <div>
                    <i class="fa-solid fa-layer-group fa-2x"></i>
                </div>
                <div class="mt-2 fs-5"><a href="{{ route('products.by.category', $item->id) }}"
                        class="nav-link">{{ Str::limit($item->name, 10) }}</a></div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<hr class="text-danger">
<h2 class="mt-3 p-3"><strong>Sản Phẩm</strong> <span class="text-danger">Giảm giá</span></h2>
<div class="container">
    <div class="row text-center">
        @foreach ($sale as $item)
        <div class="col-6 col-md-3 col-lg-2 mb-4">
            <div class="card shadow-lg d-flex flex-column position-relative">
                <div class="product-image mt-2">
                    <a href="detail/{{$item->id}}"><img src="{{asset('uploads/'.$item->img)}}" class=" lazyloaded"
                            alt="Card image"></a>
                </div>
                <div class="icons-overlay">
                    <div>
                        <a href="detail/{{$item->id}}"><i class="fas fa-eye text-white fs-3 p-2"></i></a>
                    </div>
                    <div>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('heart_form_{{ $item->id }}').submit();"> <i
                                class="fas fa-heart text-white fs-3 p-2"></i></a>
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
                <span class="discount-label bg-danger">{{$item->sale}}%</span>
                <div class="card-body">
                    <div style="height: 70px">
                        <a href="" class="nav-link" title="">{{ Str::limit($item->name, 50) }}</a>
                    </div>
                    <p class="card-text text-danger">Giá: {{ number_format($item->price) }}VNĐ</p>
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
                        <input type="hidden" name="quantity" value="1">

                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<hr class="text-danger">
<h2 class="mt-3 p-3"><strong>Sản Phẩm</strong> <span class="text-danger">Mới nhất</span></h2>
<div class="container">
    <div class="row text-center">
        @foreach ($products as $item)
        <div class="col-6 col-md-3 col-lg-2 mb-4">
            <div class="card shadow-lg d-flex flex-column position-relative">
                <div class="product-image mt-2">
                    <a href="detail/{{$item->id}}"><img src="{{asset('uploads/'.$item->img)}}" class=" lazyloaded"
                            alt="Card image"></a>
                </div>
                <div class="icons-overlay">
                    <div>
                        <a href="detail/{{$item->id}}"><i class="fas fa-eye text-white fs-3 p-2"></i></a>
                    </div>
                    <div>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault();
              document.getElementById('heart_form_{{ $item->id }}').submit();"> <i
                                class="fas fa-heart text-white fs-3 p-2"></i></a>
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
                            <input type="hidden" name="quantity" value="1">
                        </form>
                    </div>
                </div>
                <span class="discount-label bg-danger">{{$item->sale}}%</span>
                <div class="card-body">
                    <div style="height: 70px">
                        <a href="" class="nav-link" title="">{{ Str::limit($item->name, 50) }}</a>
                    </div>
                    <p class="card-text text-danger">Giá: {{ number_format($item->price) }}VNĐ</p>
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
                        <input type="hidden" name="description" value="{{ $item->quantity ==1 }}">
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3 container d-flex justify-content-center align-items-center mb-5">
        {{$products->links('pagination::bootstrap-4')}}
    </div>
</div>
<div class=" mt-5 shadow-lg p-5">
    <div class="row align-items-center">
        <div class="col-md-6 col-12">
            <img src="{{ asset('uploads/'.$bannersale->img) }}" alt="Sample Image" width="100%" height="400px">
        </div>
        <div class="col-md-6 custom-text col-12">
            <div>
                @php
                $originalPrice = $bannersale->price;
                $discountPercentage = 10; // Fixed 10% discount
                $discountAmount = ($discountPercentage / 100) * $originalPrice;
                $discountedPrice = $originalPrice - $discountAmount;
                @endphp
                <del>Giá gốc: {{ number_format($originalPrice, 0, ',', '.') }} VNĐ</del><br>
                <h3><span class="text-danger">Giảm còn: {{ number_format($discountedPrice, 0, ',', '.') }} VNĐ</span>
                </h3><br>
                <h2>{{$bannersale->name}}</h2>
                <p>{{ Str::limit($bannersale->description, 305) }}</p>
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0"
                    aria-valuemax="100">
                    <div class="progress-bar bg-danger" style="width: 75%"></div>
                </div>
                <a href="detail/{{$bannersale->id}}" class="btn btn-danger p-2 mt-3">Xem ngay</a>
            </div>
        </div>
    </div>
</div>
<div class="container mb-5 ">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="text-center mb-35">
                <h5 class="">Bài viết chia sẽ kinh nghiệm</h5>
                <h3 class="mb-3 text-danger"><i class="fa-solid fa-earth-americas"></i>Owen Blog</h3>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        @foreach($apiProducts as $item)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card shadow-lg">
                <img src="https://blog.minhdev.top/{{ $item['image'] }}" class="card-img-top" height="250px">
                <div class="card-body">
                    <h5 class="card-title"> {{ Str::limit($item['title'], 50, '...') }}</h5>
                    <p class="card-text text-body-secondary"> {{ Str::limit($item['meta_description'], 50, '...') }}</p>
                    <a href="https://blog.minhdev.top" class="btn btn-danger">Đọc thêm</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection