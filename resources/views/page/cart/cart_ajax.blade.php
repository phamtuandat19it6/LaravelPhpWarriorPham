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
                                <form action="{{ url('/update-cart') }}" method="POST">
                                    {{ csrf_field() }}
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
                                                                <input class="cart_quantity_input" type="number" name="cart_qty[{{ $cart['session_id'] }}]"min="1" value="{{ $cart['product_qty'] }}">
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
                                                <tr class="trans_tr_btn">
                                                    <td><input type="submit" value="cập nhật giỏ hàng" name="update_qty"class="btn btn-default capnhat">
                                                    <a class="btn btn-primary xoatatca">Xóa tất cả</a></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </form>

                                            @else
                                            <tr class="alert alert-success"><td colspan="6"  >
                                                    @php
                                                        echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                                    @endphp
                                                </td>
                                            </tr>
                                            @endif
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </section> <!--/#cart_items-->
                    @if(Session::get('cart'))
                    <section id="do_action">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="total_area">
                                        <ul>
                                            <li>Tổng tiền:<span>{{number_format($total, 0, ',', '.') . ' ' . 'VND' }}</li>
                                            <li>Phí vận chuyển <span>Free</span></li>
                                            <li>Thuế <span>{{Cart::tax(0).' '.'VND'}}</span></li>
                                            @if(Session::get('coupon'))
                                            @foreach(Session::get('coupon') as $key => $cou)
                                            @if($cou['coupon_condition']==1)
                                            <li>Mã giảm :<span>{{$cou['coupon_number']}} %</span></li>
                                                 @php
                                                $total_coupon = ($total*$cou['coupon_number'])/100;
                                                echo '<li>Tổng giảm:<span>'.number_format($total_coupon,0,',','.').'đ</span></li>';
                                                 @endphp
                                            <li>Thành tiền: <span>{{number_format($total-$total_coupon,0,',','.')}}VND</span></li>
                                            @elseif($cou['coupon_condition']==2)
                                            <li>Mã giảm:<span>{{number_format($cou['coupon_number'],0,',','.')}} VND</span></li>
                                                @php
                                                $total_coupon = $total - $cou['coupon_number'];
                                                @endphp
                                            <li>Thành tiền sau giảm: <span>{{number_format($total_coupon,0,',','.')}}VND</span></li>
                                            @endif
                                            @endforeach
                                            @else
                                            <li>Thành tiền sau giảm: <span>{{number_format($total,0,',','.')}}VND</span></li>
                                            @endif
                                        </ul>
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id!==NULL && $shipping_id!==NULL){
                                    ?>
                                       <a class="btn btn-default thanhtoan " href="{{URL::to('/payment')}}">Đặt hàng</a>
                                    <?php
                                    }elseif($customer_id!==NULL){
                                    ?>
                                        <a class="btn btn-default thanhtoan " href="{{URL::to('/checkouts')}}">Đặt hàng</a>
                                    <?php
                                    }else{
                                        ?>
                                        <a class="btn btn-default thanhtoan " href="{{URL::to('/login-checkout')}}">Đặt hàng</a>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                @endif

                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                        @if(Session::get('cart'))
                                        {{-- action="{{url('/check-coupon')}}" method="POST" --}}
                                        <form >
                                            {{ csrf_field() }}
                                        <td>
                                              <input type="text" class="form-control magiamgia" id="coupon" name="coupon" placeholder="Nhập mã giảm giá">
                                        </td>
                                        <td>
                                            <input type="button" class="btn btn-default check_coupon apdung sap " name="check_coupon" value="Áp dụng mã giảm giá">
                                        </td>
                                        <td>
                                            @if(Session::get('coupon'))
                                            <input type="button" class="btn btn-primary check_coupon noapdung " value="Không áp dụng mã">
                                            @endif
                                        </td>
                                    </form>
                                    @endif
                                    </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </section><!--/#do_action-->
                </div>
                <div col-sm-2>
                </div>
            </div>
        </div>
    </section>
@endsection
