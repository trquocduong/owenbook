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
        <div class="col-md-5">

            <div class="row">

                <div class="col">
                    <strong class="text-danger">Tên sản phẩm</d>
                </div>
                <div class="col">
                    <a href="#"><i class="fas fa-star text-warning"></i></a>
                    <a href="#"><i class="fas fa-star text-warning"></i></a>
                    <a href="#"><i class="fas fa-star text-warning"></i></a>
                </div>
                <div class="col">
                    <a class="">{{$getonepro->view}} Người xem</a>
                </div>
                <div class="col">
                    <h2 class="text-dark">{{$getonepro->name}}</h2>
                </div>
                <div class="col">
                    <h2 class=""><strong>{{$getonepro->price}}</strong></h2>
                </div>
                <div class="col">
                    <div class="counter-container">
                        <div class="d-flex flex-row bd-highlight mb-3">
                            <button class="p-2 bd-highlight">-</button>
                            <button class="p-2 bd-highlight">{{$getonepro->quantity}}</button>
                            <button class="p-2 bd-highlight">+</button>
                            <button type="button" class="btn btn-secondary">Secondary</button>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <p>Uu Đãi</p>
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
    </script>
    @endsection