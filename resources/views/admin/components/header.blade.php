<div class="card fixed-card ">
    <div class="card-header">
        <h4 class="text-center mb-2 p-2 mt-2">Owen Book</h4>
    </div>
    <div class="card-body">
        <ul class="navbar-nav">
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('admin') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-solid fa-house text-primary"></i>
                    </div>
                    <span class="ms-1">Quản lý thống kê</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('admin/users') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-solid fa-users text-primary"></i>
                    </div>
                    <span class="ms-1">Quản lý tài khoản</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('admin/categories') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-solid fa-layer-group text-primary"></i>
                    </div>
                    <span class="ms-1">Quản lý danh mục</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('admin/products') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-brands fa-codepen text-primary"></i>
                    </div>
                    <span class="ms-1">Quản lý sản phẩm</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('admin/vouchers') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-solid fa-money-bills text-primary"></i>
                    </div>
                    <span class="ms-1">Quản lý giảm giá</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('bill_index') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-solid fa-file-invoice text-primary"></i>
                    </div>
                    <span class="ms-1">Quản lý đơn hàng</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('inventory') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-solid fa-warehouse  text-primary"></i>
                    </div>
                    <span class="ms-1">Quản lý kho hàng</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('getallbank') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-solid fa-warehouse  text-primary"></i>
                    </div>
                    <span class="ms-1">Lịch Sử Chuyển Khoản</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center p-2 rounded" href="{{ route('tool') }}">
                    <div class="d-flex align-items-center justify-content-center me-2 p-2 rounded border"
                        style="background-color: #f0f0f0;">
                        <i class="fa-solid fa-warehouse  text-primary"></i>
                    </div>
                    <span class="ms-1">Tool</span>
                </a>
            </li>
        </ul>
    </div>
</div>