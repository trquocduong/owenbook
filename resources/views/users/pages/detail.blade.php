@extends('users.layout')
@section('content')


<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner mb-5">
            <div class="carousel-getonepro active">
                <img src="{{asset('img/bannerphu.png')}}" class="d-block w-100" alt="..." height="200px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sách uy tín hàng đầu</h5>
                    <p>Đảm bảo sách tới tay khách hàng điều như hình ảnh và kh thay đổi gì cả</p>
                </div>
            </div>

        </div>

    </div>
    <div class="row">

        <div class=" col-md-5 mb-4">
            <div class="row">
                <div class="col-md-2">
                    <div class="thumbnail mb-3 active" data-bs-target="#mainImage"
                        data-image="{{asset('uploads/'.$getonepro->img)}}">
                        <img src="{{asset('uploads/'.$getonepro->img)}}" class="rounded" width="70px" alt="Main Image">
                    </div>
                    @if($getonepro->gallery)
                    @foreach(json_decode($getonepro->gallery) as $index => $image)
                    <div class="thumbnail mb-3" data-bs-target="#mainImage" data-image="{{asset('img/'.$image)}}">
                        <img src="{{asset('img/'.$image)}}" class="rounded" width="70px" alt="Gallery Image {{$index}}">
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-md-8 main-image" id="mainImage">
                    <img src="{{asset('uploads/'.$getonepro->img)}}" width="400px">
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <!-- Phần thông tin sản phẩm -->
            <form action="{{asset('addtocart')}}" method="POST" id="cart_form_{{ $getonepro->id }}">
                <h2 class="mb-3">{{$getonepro->name}}</h2>
                <p class="text-muted mb-3">{{ Str::limit($getonepro->description, 50) }}</p>
                <p class="text-muted mb-3">Tác giả:{{$getonepro->author}}</p>
                <h4 class="text-success mb-3">Giá:{{ number_format($getonepro->price) }}VNĐ</h4>
                <div class="quantity flex">
                    <p>Chọn Số Lượng</p>
                    <div class="btn-quantity flex  mb-2">
                        <button id="decrement" class="btn bg-light">-</button>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
                        <button id="increment" class="btn bg-light">+</button>
                    </div>

                    <script>
                    var decrementButton = document.getElementById("decrement");
                    var incrementButton = document.getElementById("increment");
                    var quantityInput = document.getElementById("quantity");

                    decrementButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        var currentQuantity = parseInt(quantityInput.value);
                        if (currentQuantity > 1) {
                            quantityInput.value = currentQuantity - 1;
                        }
                    });

                    incrementButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        var currentQuantity = parseInt(quantityInput.value);
                        quantityInput.value = currentQuantity + 1;
                    });
                    </script>
                </div>
                <a href="#" class="dropdown-item" onclick="event.preventDefault();
            document.getElementById('cart_form_{{ $getonepro->id }}').submit();">
                    <button type="submit" class="btn btn-danger btn-lg mb-3">Thêm vào giỏ hàng</button></a>

                @csrf

                @if(Session::has('users'))
                @php
                $users = Session::get('users');
                @endphp
                <input type="hidden" name="id_user" value="{{ $users->id }}">
                @endif
                <input type="hidden" name="id" value="{{ $getonepro->id }}">
                <input type="hidden" name="name" value="{{ $getonepro->name }}">
                <input type="hidden" name="img" value="{{ $getonepro->img }}">
                <input type="hidden" name="price" value="{{ $getonepro->discounted_price }}">
                <input type="hidden" name="description" value="{{ $getonepro->description }}">
            </form>
            <!-- <button type="submit" class="btn btn-danger btn-lg">Mua ngay</button> -->
        </div>
        <div class="col-2">
            <ul class="list-group">
                <li class="list-group-item d-flex align-items-center bg-light">
                    <i class="fa-solid fa-truck-moving me-3 fs-3"></i>
                    <p class="mb-0">Miễn phí vận chuyển áp dụng cho tất cả đơn hàng trên 500k</p>
                </li>
                <li class="list-group-item d-flex align-items-center bg-light">
                    <i class="fa-solid fa-layer-group me-3 fs-3"></i>
                    <p class="mb-0">Đảm bảo 100% sản phẩm như ảnh</p>
                </li>
                <li class="list-group-item d-flex align-items-center bg-light">
                    <i class="fa-solid fa-hand-holding-heart me-3 fs-3"></i>
                    <p class="mb-0">Hoàn trả 1 ngày nếu bạn thay đổi tâm trí của bạn</p>
                </li>
            </ul>
        </div>
        <div class="container">
            <h3 class="text-center">Mô tả</h3>
            <p>{{$getonepro->description}}</p>
        </div>
        <div class="container">
            <h3 class="mt-5 mb-5">Sản phẩm tương tự</h3>
            <div class="container">
                <div class="row text-center">
                    @foreach ($products as $item)
                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <div class="card shadow-lg d-flex flex-column position-relative">
                            <div class="product-image mt-2">
                                <a href="detail/{{$item->id}}"><img src="{{asset('uploads/'.$item->img)}}"
                                        class=" lazyloaded" alt="Card image"></a>
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
                                <p class="card-text">Giá:{{ number_format($item->price) }}VNĐ</p>
                                <a href="#" class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('cart_form_{{ $item->id }}').submit();">
                                    <i class="fa-solid fa-cart-shopping p-2 btn btn-danger"
                                        style="color: #ffffff;"></i></a>
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
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
    document.querySelectorAll('.thumbnail').forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail').forEach(el => el.classList.remove('active'));

            // Add active class to the clicked thumbnail
            this.classList.add('active');

            // Update the main image
            document.querySelector('#mainImage img').src = this.getAttribute('data-image');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('quantity');
        const decrementBtn = document.getElementById('decrement');
        const incrementBtn = document.getElementById('increment');

        decrementBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value, 10);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });

        incrementBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value, 10);
            quantityInput.value = value + 1;
        });
    });
    </script>
    @endsection