@extends('users.layout') <!-- Thay đổi với layout của bạn nếu khác -->

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h4>Đổi Mật Khẩu</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <!-- Mật khẩu hiện tại -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Mật Khẩu Hiện Tại</label>
                            <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mật khẩu mới -->
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Mật Khẩu Mới</label>
                            <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Xác nhận mật khẩu mới -->
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Xác Nhận Mật Khẩu Mới</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger">Đổi Mật Khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
