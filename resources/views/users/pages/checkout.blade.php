@extends('users.layout')
@section('content')
<section class="checkout-area pb-50 wow fadeInUp mt-50" data-wow-duration=".8s" data-wow-delay=".2s">
    <div class="container">
        <form action="{{route('checkout.placeOrder')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="checkbox-form">
                        <h3>Chi tiết thanh toán</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Họ và tên người nhận <span class="required">*</span></label>
                                    <input type="text" value="{{ old('name', Auth::user()->name) }}" name="name" placeholder="Nhập họ và tên" />
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input type="text" value="{{old('phone', Auth::user()->phone)}}" name="phone" placeholder="Ví dụ: 0979xxxxxx" />
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Quốc gia <span class="required">*</span></label>
                                    <select>
                                        <option value="volvo">Việt Nam</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Tỉnh/Thành phố <span class="required">*</span></label>
                                    <select class="js-select-basic-single" name="province" id="province-select">
                                        @foreach ($provinces as $province )
                                        <option value="{{$province->code}}" data-name="{{$province->name}}" {{ old('province') == $province->code ? 'selected' : '' }}>{{ $province->full_name }}</option>
                                        @endforeach
                                        @error('province')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-6">
                                    <div class="country-select">
                                        <label>Quận/Huyện <span class="required">*</span></label>
                                        <select class="js-select-basic-single" name="district" id="district-select">
                                        </select>
                                        @error('district')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="country-select">
                                        <label>Xã/Phường <span class="required">*</span></label>
                                        <select class="js-select-basic-single" name="ward" id="ward-select">
                                        </select>
                                        @error('ward')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Số nhà, tên đường <span class="required">*</span></label>
                                    <input type="text" name="address" placeholder="Số nhà, tên đường" />
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="order-notes">
                            <div class="checkout-form-list">
                                <label>Ghi chú đơn hàng</label>
                                <textarea id="checkout-mess" cols="30" name="note_order" rows="10" placeholder="Thêm ghi chú cho đơn hàng của bạn...."></textarea>
                                @error('note_order')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="your-order mb-30 ">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <tbody>
                                    @foreach ($carts as $pro )
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$pro->name_product}} <strong class="product-quantity"> × {{$pro->quantity}}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="price">{{$pro->price}} vnđ</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Thành tiền</th>
                                        <td><span class="sub_total">{{$sub_total}} </span>vnđ</td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Giao hàng</th>
                                        <td>
                                            <ul>
                                                <li>
                                                    <input id="shipping-saving" type="radio" name="shipping" value="saving" {{ old('shipping') == 'saving' ? 'checked' : '' }} />
                                                    <label for="shipping-saving">
                                                        Giao hàng tiết kiệm: <span id="shipping-amount-saving"></span>
                                                    </label>
                                                    @error('shipping')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </li>
                                                <!-- <li>
                                                    <input type="radio" name="shipping" />
                                                    <label>Free Shipping:</label>
                                                </li> -->
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Phương thức thanh toán</th>
                                        <td>
                                            <ul>
                                                <li>
                                                    <input id="payment_method_cod" type="radio" name="payment_method" value="cash" {{ old('payment_method') == 'cash' ? 'checked' : '' }} />
                                                    <label for="payment_method_cod">
                                                        Thanh toán bằng tiền mặt khi nhận hàng
                                                    </label>
                                                    @error('payment_method')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr class="checkout-form-list">
                                        <th>Mã KM/Quà tặng</th>
                                        <td class="voucher-box">
                                            <input type="text" id="voucher" name="voucher" placeholder="Nhập mã khuyến mãi/Quà tặng" />
                                            <button type="button" id="apply-voucher">Áp dụng</button>
                                        </td>
                                    </tr>

                                    <tr class="total">
                                        <th>Tổng tiền</th>
                                        <td><strong><span class="order-total"></span></strong>
                                            <input type="hidden" class="totalorder" name="totalorder">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="order-button-payment mt-20">
                                <button type="submit" class="tp-btn tp-color-btn w-100 banner-animation">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection