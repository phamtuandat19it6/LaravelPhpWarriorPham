


@extends('welcome')
@section('content')

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

                <div class="col-sm-9 padding-right s">
                    <section id="cart_items" class="s">
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
                                <form action="{{ url('/update-cart') }}" method="POST">
                                    {{ csrf_field() }}
                                    <table class="table table-condensed s">
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
                                        @if (Session::get('cart') == true)
                                        <tbody>
                                            @php
                                            $total = 0;
                                            @endphp
                                            @foreach (Session::get('cart') as $key => $cart)
                                            @php
                                            $subtotal = $cart['product_price'] * $cart['product_qty'];
                                            $total += $subtotal;
                                            @endphp
                                            <tr class="td_center">
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
                                                        <input class="cart_quantity_input s" type="number" name="cart_qty[{{ $cart['session_id'] }}]"min="1" value="{{ $cart['product_qty'] }}">
                                                    </div>
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">{{ number_format($subtotal, 0, ',', '.') . ' ' . 'VND' }}</p>
                                                </td>
                                                <td class="cart_delete">
                                                    <a class="cart_quantity_delete"  href="{{ url('/del-product/'. $cart['session_id']) }}"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <input type="submit" value="cập nhật giỏ hàng" name="update_qty"class="btn btn-default capnhat">
                                                    <a class="btn btn-primary xoatatca"href="{{ url('/del-all-product') }}">Xóa tất cả</a>
                                                </td>
                                            </tr>
                                            @else
                                            <tr class="alert alert-success">
                                                <td colspan="6">
                                                @php
                                                    echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                                @endphp
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endif
                                    </table>
                                </form>
                            </div>
                        </div>
                    </section> <!--/#cart_items-->
                @if(Session::get('cart'))
                <section id="do_actions">
                    <div class="cart-total-area">
                        <div class="total-area">
                            <div class="hinhanh">
                            </div>
                            <div class="total_area w checkout">
                                <div class="rows magia">
                                    <form >
                                        {{ csrf_field()}}
                                            <input type="text" class="form-control giamgia"  id="coupon" placeholder="Nhập mã giảm giá">
                                            <input type="button" class="btn btn-default check_coupon s sap" name="check_coupon" value="Áp dụng mã giảm giá">
                                            @if(Session::get('coupon'))
                                            <a class="btn btn-primary check_coupon manoapdung  " href="{{ url('/unset-coupon') }}">Không áp dụng mã</a>
                                            @endif
                                    </form>
                                </div>
                                @endif
                                @if(Session::get('cart'))
                                <ul>
                                    <li>Tổng tiền:<span>{{number_format($total, 0, ',', '.').' '.'VND'}}</li>
                                    @if(Session::get('fee'))
                                    <li style="position: relative">Phí vận chuyển <span> {{number_format(Session::get('fee'), 0, ',', '.').' '.'VND'}}</span>
                                    <a style="position: absolute;top: 0px;left: 400px;color:rgb(208, 95, 95)" class="cart_quantity_delete" id="x" href="{{ url('/del-fee')}}"><img src="{{asset('public/frontend/image/refresh.png')}}" alt=""></a></li>
                                    @else
                                    <li>Phí vận chuyển <span> {{number_format(0).' '.'VND'}}</span></li>
                                    @endif
                                    @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                    @if($cou['coupon_condition']==1)
                                    <li>Mã giảm :<span>{{$cou['coupon_number']}} %</span></li>
                                        @php
                                        $total_coupon = ($total*$cou['coupon_number'])/100;
                                        echo '<li>Tiền giảm:<span>'.number_format($total_coupon,0,',','.').'VND</span></li>';
                                        echo '<li>Thành tiền:<span>'.number_format(($total - $total_coupon - Session::get('fee')),0,',','.').'VND</span></li>';
                                        $total_after_coupon = $total - $total_coupon - Session::get('fee');
                                        @endphp
                                    @elseif($cou['coupon_condition']==2)
                                    <li>Mã giảm:<span>{{number_format($cou['coupon_number'],0,',','.')}} VND</span></li>
                                    @php
                                    $total_coupon = $cou['coupon_number'];
                                     $total_after_coupon = $total_coupon;
                                    @endphp
                                    @php
                                    if(Session::get('fee') && !Session::get('coupon')){
                                        $total_after = $total - Session::get('fee');
                                        echo '<li>Tiền giảms:<span>'.number_format($total_after,0,',','.').'VND</span></li>';
                                    }elseif(!Session::get('fee') && Session::get('coupon')){
                                        $total_after = $total - $total_after_coupon;
                                        echo '<li>Tiền giảm:<span>'.number_format($total_after,0,',','.').'VND</span></li>';
                                    }elseif(Session::get('fee') && Session::get('coupon')){
                                        $total_after = $total - $total_after_coupon - Session::get('fee');
                                        echo '<li>Thành tiền:<span>'.number_format($total_after,0,',','.').'VND</span></li>';
                                    }elseif(!Session::get('fee') && !Session::get('coupon')){
                                        $total_after = $total;
                                        echo '<li>Tiền giảm:<span>'.number_format($total_after,0,',','.').'VND</span></li>';
                                    }
                                    @endphp
                                    @endif
                                    @endforeach
                                    @else
                                     <?php if(Session::get('fee')){
                                        ?>
                                         <li>Thành tiền sau giảm: <span>{{number_format($total - Session::get('fee'),0,',','.').' '.'VND'}}</span></li>
                                         <?php
                                     }else{
                                         ?>
                                        <li>Thành tiền sau giảm: <span>{{number_format($total,0,',','.').' '.'VND'}}</span></li>
                                        <?php
                                     }
                                     ?>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                 </section><!--/#do_action-->
                 @endif
                    <div class="col-sm-12 transnote s ">

                        <div class="col-sm-6 bill-to s ">
                            <p >Điền thông tin gửi hàng</p>
                            <div class="form-one ship">
                                <form >
                                    {{ csrf_field() }}
                                    <input  type="text" name="shipping_name" class="shipping_name"  placeholder="Họ và tên" required>
                                    <input  type="email" name="shipping_email" class="shipping_email" placeholder="Email"  required>
                                    <input  type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ"  required>
                                    <input  type="number" name="shipping_phone" class="shipping_phone" placeholder="phone"  required>
                                    <textarea  name="shipping_notes" class="shipping_notes" placeholder="Ghi chú về đơn hàng của bạn hoặc chi tiết địa chỉ vận chuyển" rows="5"></textarea>

                                     @if(Session::get('fee'))
                                    <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                                    @endif
                                    <input type="hidden" name="oder_fee" class="order_fee" value="25000">
                                    @if (Session::get('coupon'))
                                        @foreach (Session::get('coupon') as $key =>$cou)
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="">
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInput">Chọn hình thức thanh toán</label>
                                        <select name="payment_select"  class="form-control input-sm m-bot15 payment_select" >
                                            <option value="0">Qua chuyển khoản</option>
                                            <option value="1">Tiền mặt</option>
                                        </select>
                                    </div>
                                    <input  type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-default send_order">
                                </form>
                            </div>
                        </div>


                        <div class="col-sm-6 tinhphi s">
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn thành phố</label>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                            <option value="">-- Chọn tỉnh thành phố --</option>
                                        @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                            <option value="">-- Chọn quận huyện --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn xã phường</label>
                                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                            <option value="">-- Chọn xã phường --</option>
                                    </select>
                                </div>
                                <input  type="button" value="Tính phí vận chuyển" name="caculate_order" class="btn btn-primary tinhphi calculate_delivery">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

