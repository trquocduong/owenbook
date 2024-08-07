@extends('users.layout')
@section('content')
<section class="vh-100 mb-5">
    <div class="container py-5 h-100 mb-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <h3 class="mb-4 text-center">Đăng kí</h3>
                        
                        <form action="{{route('register-post')}}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="text">Tên của bạn:</label>
                                <input type="text" id="text" name="name" class="form-control form-control-lg" required />
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">Email của bạn:</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="password">Mật khẩu của bạn:</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember" />
                                    <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
                                </div>
                                <a href="#" class="nav-link mb-0"><span class="text-danger">Tìm tài khoản</span></a>
                            </div>
                            <a href="{{route('login')}}" class="nav-link mb-3">Bạn đã có tài khoản<span class="text-danger">Đăng nhập ngay</span></a>
                            <button class="btn btn-danger btn-lg btn-block" type="submit">Đăng kí</button>

                            <hr class="my-4">

                            <button class="btn btn-lg btn-block text-white" style="background-color: #dd4b39;" type="button">
                                <i class="fab fa-google me-2"></i> Đăng nhập bằng Google
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@endsection
