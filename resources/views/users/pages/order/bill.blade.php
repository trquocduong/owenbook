@extends('users.layout')
@section('content')
@php
$totalfinal = 0; // Khởi tạo biến tổng giá trị đơn hàng
$totaltemporary = 0; // Khởi tạo biến tổng giá tạm tính
@endphp
<div class="row mt-2 bill">
    <div class="col">

        <div class="card p-4 ">

            <div>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="giohang.html" style="text-decoration: none;">Giỏ hàng</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thông tin giao hàng</li>
                    </ol>
                </nav>
                <p>Thông tin giao hàng</p>
            </div>
            <div>
                <form id="orderForm" action="/createbill" method="POST" class="row">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Họ Và Tên"
                            value="{{ $user->name }}">
                    </div>
                    <div class="mb-3 col-md-8">
                        <input type="email" class="form-control" name="email" placeholder="Email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="mb-3 col-md-4">
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại"
                            value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="full_address" id="full_address"
                            placeholder=" Địa chỉ" value="{{ $user->address }}">
                    </div>

                    <p>Phương Thức Vận Chuyển</p>
                    <div style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);" class="p-3">
                        <div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input type="radio" id="maxspeed" name="ship" value="50000"
                                        {{ old('ship') == '50000' ? 'checked' : '' }}>
                                    <label for="maxspeed">
                                        [Chỉ Nhận Chuyển Khoản]Hỏa Tốc Nhận Trong 2-3H (HCM) <strong> 50.000.đ</strong>
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    <input type="radio" id="normal" name="ship" value="30000"
                                        {{ old('ship') == '30000' ? 'checked' : '' }}>
                                    <label for="normal">
                                        Giao Hàng Tiêu Chuẩn (HCM) - Nhận Trong 2 đến 3 ngày <strong> 30.000đ</strong>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <p>Phương Thức Thanh Toán</p>
                    <ul class="lisgroup">
                        <li class="list-group-item ">
                            <input type="radio" id="cash" name="payment_methods" value="cash"
                                {{ old('payment_methods') == 'cash' ? 'checked' : '' }}>
                            <label for="cash">
                                <img src="img/cash.svg" style="height:40px" class="img-bank" alt="">
                                Thanh toán tiền mặt khi nhận hàng (COD)
                            </label>
                        </li>
                        <li class="list-group-item">
                            <input type="radio" id="bank" name="payment_methods" value="bank"
                                {{ old('payment_methods') == 'bank' ? 'checked' : '' }}>
                            <label for="bank">
                                <img class="img-bank" style="height:40px" src="img/bank.svg" alt="">
                                [Miễn phí thanh toán] Chuyển khoản qua ngân hàng (VietQR)
                            </label>
                        </li>
                    </ul>
            </div>
        </div>

    </div>
    <div class="col">
        <table class="table">
            @foreach($cart as $item)
            <tr>
                <td>
                    <img src="{{asset('uploads/'.$item->img)}}" width="70px" alt="">
                </td>
                <td>
                    {{$item->name_product}} <br>
                    <span class="text-danger">{{$item->quantity}}</span>
                </td>
                <td>{{number_format($item->total, 0,'.') . ' đ';}}</td>
            </tr>
            <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $item->id }}">
            <input type="hidden" name="products[{{ $loop->index }}][name]" value="{{ $item->name_product }}">
            <input type="hidden" name="products[{{ $loop->index }}][img]" value="{{ $item->img }}">
            <input type="hidden" name="products[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
            <input type="hidden" name="products[{{ $loop->index }}][total]" value="{{ $item->total }}">

            @php
            // Tính tổng giá trị của từng sản phẩm và cộng dồn vào tổng giá trị đơn hàng
            $totaltemporary += $item->quantity * $item->price;
            $totalfinal += $item->quantity * $item->price;
            @endphp
            @endforeach
            <tr>
                <td colspan="2">
                    <input type="text" id="discount_code" class="form-control" placeholder="MÃ GIẢM GIÁ">
                </td>
                <td>
                    <button type="button" id="search_discount" class="btn btn-primary">SEARCH</button>
                </td>
            </tr>
            <tr>
                <td>Tạm Tính</td>
                <td></td>
                <td id="temporary_total"> {{number_format($totaltemporary, 0, '.') . ' đ';}} </td>
            </tr>
            <tr>
                <td colspan="2">Phí Vận Chuyển</td>
                <td id="shipping_fee">0 đ</td>
            </tr>
            <tr>
                <td colspan="2">TỔNG CỘNG (đã bao gồm VAT)</td>
                <td style="color: red;" id="total_final">
                    <strong>{{number_format($totalfinal, 0, '.') . ' đ';}}</strong>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="mt-5">
                    <a href="/cartx" style="color:rgb(197, 21, 21);text-decoration: none">
                        <i class="fa-solid fa-backward"></i>
                        Giỏ hàng
                    </a>
                </td>
                <td>
                    <div class="mb-3">
                        <input type="hidden" name="totalfinal" id="hidden_totalfinal" value="{{ $totalfinal }}">
                        <button type="submit" class="btn btn-danger">Hoàn tất đơn hàng</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lấy các phần tử tổng tiền và phí vận chuyển
    const temporaryTotalEl = document.getElementById('temporary_total');
    const shippingFeeEl = document.getElementById('shipping_fee');
    const totalFinalEl = document.getElementById('total_final');
    const hiddenTotalFinalEl = document.getElementById('hidden_totalfinal');

    // Hàm cập nhật tổng tiền
    function updateTotal() {
        let shippingFee = parseInt(document.querySelector('input[name="ship"]:checked')?.value || '0');
        let temporaryTotal = parseInt(temporaryTotalEl.textContent.replace(/\D/g, ''));

        // Cập nhật phí vận chuyển và tổng tiền
        shippingFeeEl.textContent = new Intl.NumberFormat('vi-VN').format(shippingFee) + ' đ';
        let totalFinal = temporaryTotal + shippingFee;
        totalFinalEl.querySelector('strong').textContent = new Intl.NumberFormat('vi-VN').format(totalFinal) +
            ' đ';
        hiddenTotalFinalEl.value = totalFinal;
    }

    // Lắng nghe sự thay đổi của các radio button
    document.querySelectorAll('input[name="ship"]').forEach(radio => {
        radio.addEventListener('change', updateTotal);
    });

    // Cập nhật tổng tiền khi trang được tải
    updateTotal();
});
</script>
@endsection