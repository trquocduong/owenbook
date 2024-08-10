@extends('users.layout')
@section('content')
@php
$discount=0;
@endphp
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
<div class="container py-5">
  <h2 class="mb-4">Giỏ Hàng</h2>
  <div class="row">
      <div class="col-lg-8">
          <div class="card mb-4">
              <div class="card-body">
                  <h5 class="card-title">Sản phẩm trong giỏ hàng</h5>
                  <div class="table-responsive">
                  <table class="table table-hover mt-4">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Đơn Giá</th>
                            <th scope="col">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalPrice = 0;
                        $user = Session::get('user');
                        @endphp
        
                        @foreach($cart as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/'.$item->img) }}" width="70px" style="height: 10%">
                            </td>
                            <td>
                                <a href="/detail/{{ $item->id }}" style="text-decoration: none; color: black;">
                                    <p>{{ $item->name_product }}</p>
                                    <p>
                                        <form action="{{asset('removecart')}}" method="POST">
                                            @csrf
                                            @if(Session::has('user'))
                                            <input type="hidden" name="id_user" value="{{ $user->id }}">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-light">
                                                <i class="fa-solid fa-x"></i> Xóa
                                            </button>
                                            @endif
                                        </form>
                                    </p>
                                </a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <form class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id_user" value="{{ $user->id }}">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="button" class="btn btn-light increaseQuantity">+</button>
                                    </form>
                                    <button class="btn btn-light mx-2 quantity">{{ $item->quantity }}</button>
                                    <form class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id_user" value="{{ $user->id }}">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="button" class="btn btn-light decreaseQuantity">-</button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                
                                <p class="text-danger">{{ number_format($item->price, 0, ',', '.') . ' đ' }}</p>
                            </td>
                            <td>
                                <p class="text-danger subtotal">{{ number_format($item->quantity * $item->price, 0, ',', '.') . ' đ' }}</p>
                            </td>
                        </tr>
                        @php
                        // Tính tổng giá trị của từng sản phẩm và cộng dồn vào tổng giá trị đơn hàng
                        $totalPrice += $item->quantity * $item->price;
                        @endphp
                        @endforeach
        
                    </tbody>
                </table>
                  </div>
              </div>
          </div>
          <div class="p-2 mb-3">
            <form action="{{ route('remove.all.cart') }}" method="POST">
              @csrf
              @if(Session::has('user'))
              <input type="hidden" name="id_user" value="{{ $user->id }}">
              <button type="submit" class="btn btn-danger">
                  Xóa tất cả sản phẩm
              </button>
              @endif
          </form>
        </div>
      </div>

      <div class="col-lg-4">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Tổng quan</h5>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                      Tạm tính:
                          <span class="text-success totalPrice">{{ number_format($totalPrice, 0, ',', '.') . ' đ' }}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                         Giảm giá:
                          <span class="text-success sale">{{ number_format($discount, 0, ',', '.') . ' đ' }}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                          Tổng cộng:
                          <span class="text-success totalPrice1">{{ number_format($totalPrice - $discount, 0, ',', '.') . ' đ' }}</span>
                      </li>
                  </ul>
                  <div class="d-flex justify-content-end">
                    <button class="btn bg-danger text-white m-3">
                        <a  href="" style="color:white;text-decoration: none">
                            Tiếp Tục Thanh toán
                        </a>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
  
  </div>
  <script>
    // Lắng nghe sự kiện khi nút tăng số lượng được click
    document.querySelectorAll('.increaseQuantity').forEach(button => {
        button.addEventListener('click', function () {
            const quantityElement = this.closest('td').querySelector('.quantity');
            const subtotalElement = this.closest('tr').querySelector('.subtotal');
            const totalPriceElement = document.querySelector('.totalPrice');
            const saleElement = document.querySelector('.sale');
            const totalPrice1Element = document.querySelector('.totalPrice1');

            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;

            let price = parseFloat(subtotalElement.textContent.replace(/\D/g, ''));
            let unitPrice = price / (quantity - 1);
            subtotalElement.textContent = numberWithCommas((unitPrice * quantity).toFixed(0)) + ' đ';

            let total = parseFloat(totalPriceElement.textContent.replace(/\D/g, ''));
            total += unitPrice;
            totalPriceElement.textContent = numberWithCommas(total.toFixed(0)) + ' đ';

            // Cập nhật tổng cộng
            totalPrice1Element.textContent = numberWithCommas((total - parseFloat(saleElement.textContent.replace(/\D/g, ''))).toFixed(0)) + ' đ';
        });
    });

    // Lắng nghe sự kiện khi nút giảm số lượng được click
    document.querySelectorAll('.decreaseQuantity').forEach(button => {
        button.addEventListener('click', function () {
            const quantityElement = this.closest('td').querySelector('.quantity');
            const subtotalElement = this.closest('tr').querySelector('.subtotal');
            const totalPriceElement = document.querySelector('.totalPrice');
            const saleElement = document.querySelector('.sale');
            const totalPrice1Element = document.querySelector('.totalPrice1');

            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;

                let price = parseFloat(subtotalElement.textContent.replace(/\D/g, ''));
                let unitPrice = price / (quantity + 1);
                subtotalElement.textContent = numberWithCommas((unitPrice * quantity).toFixed(0)) + ' đ';

                let total = parseFloat(totalPriceElement.textContent.replace(/\D/g, ''));
                total -= unitPrice;
                totalPriceElement.textContent = numberWithCommas(total.toFixed(0)) + ' đ';

                // Cập nhật tổng cộng
                totalPrice1Element.textContent = numberWithCommas((total - parseFloat(saleElement.textContent.replace(/\D/g, ''))).toFixed(0)) + ' đ';
            }
        });
    });

    // Hàm định dạng số có dấu phẩy ngăn cách hàng nghìn
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
    
@endsection