@extends('welcome')
@section('content')
    <section>
        <div class="container container-cart" style="transform: translateX(-133px)">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>DANH MỤC SẢN PHẨM</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach ($category as $key => $cate)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                href="{{ URL::to('/danh-muc-san-pham/' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($brand as $key => $brands)
                                        <li><a href="{{ URL::to('/thuong-hieu-san-pham/' . $brands->brand_id) }}"> <span
                                                    class="pull-right">(50)</span>{{ $brands->brand_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                    </div>
                </div>
                <div class="col-sm-7 padding-right">
                    <section id="cart_items">
                        <div class="container">
                            <div class="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                                    <li class="active">Giỏ hàng của bạn</li>
                                </ol>
                            </div>
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @elseif (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <div class="table-responsive cart_info">

                                    <table class="table table-condensed">
                                        <thead>
                                            <tr class="cart_menu">
                                                <td colspan="1" class="image"><p>Hình ảnh</p></td>
                                                <td colspan="1" class="description"><p>Mô tả</p></td>
                                                <td colspan="1" class="price"><p>Giá</p></td>
                                                <td colspan="1"class="quantity"><p>Số lượng</p></td>
                                                <td colspan="1"class="total"><p>Tổng tiền</p></td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (Session::get('cart') == true)
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach (Session::get('cart') as $key => $cart)
                                                    @php
                                                        $subtotal = $cart['product_price'] * $cart['product_qty'];
                                                        $total += $subtotal;
                                                    @endphp
                                                    <tr>
                                                        <td class="cart_product">
                                                            <a href=""><img
                                                                    src="{{ asset('public/uploads/product/' . $cart['product_image']) }}"
                                                                    width="80" alt="{{ $cart['product_name'] }}" /></a>
                                                        </td>
                                                        <td class="cart_description">
                                                            <h4><a href=""></a></h4>
                                                            <p style="font-size: 17px">{{ $cart['product_name'] }} </p>
                                                        </td>
                                                        <td class="cart_price">
                                                            <p>{{ number_format($cart['product_price'], 0, ',', '.') . ' ' . 'VND' }}</p>
                                                        </td>
                                                        <td class="cart_quantity">
                                                            <div class="cart_quantity_button">
                                                                <input class="cart_quantity_input" type="number"
                                                                    name="cart_qty[{{ $cart['session_id'] }}]"
                                                                    min="1" value="{{ $cart['product_qty'] }}">
                                                            </div>
                                                        </td>
                                                        <td class="cart_total">
                                                            <p class="cart_total_price">
                                                                {{ number_format($subtotal, 0, ',', '.') . ' ' . 'VND' }}
                                                            </p>
                                                        </td>
                                                        <td class="cart_delete">
                                                            <a class="cart_quantity_delete"
                                                                href="{{ url('/del-product/'. $cart['session_id']) }}"><i
                                                                    class="fa fa-times s"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr class="trans_tr_btn">
                                                    <td colspan="3">
                                                        <div class="payment-form">
                                                            <h5>Hình thức thanh toán</h5>
                                                        </div>
                                                        <form action="{{URL::to('/order-place')}}" method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="payment-options">
                                                                <span>
                                                                    <label><input name="payment_method" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
                                                                </span>
                                                                <span>
                                                                    <label><input name="payment_method" value="2" type="checkbox"> Thanh toán khi nhận hàng</label>
                                                                </span>
                                                                <span>
                                                                    <label><input name="payment_method" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
                                                                </span>
                                                                <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-default btn-sm order">
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td colspan="3">
                                                        <div class="total_area payment">
                                                            <ul>
                                                                    <li>Tổng tiền:<span>{{number_format($total, 0, ',', '.') . ' ' . 'VND' }}</li>
                                                                    <li>Phí vận chuyển <span>Free</span></li>
                                                                    <li>Thuế <span>{{Cart::tax(0).' '.'VND'}}</span></li>
                                                                    @foreach(Session::get('coupon') as $key => $cou)
                                                                    @if($cou['coupon_condition']==1)
                                                                       <li>Mã giảm :<span>{{$cou['coupon_number']}} %</span></li>
                                                                    @php
                                                                    $total_coupon = ($total*$cou['coupon_number'])/100;
                                                                    echo '<li>Tổng giảm:<span>'.number_format($total_coupon,0,',','.').'đ</span></li>';
                                                                    @endphp
                                                                    <li>Thành tiền sau giảm: <span>{{number_format($total-$total_coupon,0,',','.')}}đ</span></li>
                                                                    @elseif($cou['coupon_condition']==2)
                                                                        <li>Mã giảm:<span>{{number_format($cou['coupon_number'],0,',','.')}} VND</span></li>
                                                                        @php
                                                                        $total_coupon = $total - $cou['coupon_number'];
                                                                        @endphp
                                                                    <li>Thành tiền sau giảm: <span>{{number_format($total_coupon,0,',','.')}}đ</span></li>
                                                                    @endif
                                                                    @endforeach
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                        @endif
                                     </tbody>
                                </table>
                            </div>

                        </div>
                    </section> <!--/#cart_items-->

                </div>
            </div>
        </div>
    </section>
@endsection

