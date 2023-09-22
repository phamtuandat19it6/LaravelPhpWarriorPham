@extends('welcome')
@section('content')

<section>
    <div class="container container-cart" style="transform: translateX(-133px)" >
        <div class="row">

            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>DANH MỤC SẢN PHẨM</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach ($category as $key=>$cate )
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Thương hiệu sản phẩm</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach ($brand as $key=>$brands )
                                <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brands->brand_id)}}"> <span class="pull-right">(50)</span>{{$brands->brand_name}}</a></li>
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
                            <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                            <li class="active">Giỏ hàng của bạn</li>
                            </ol>
                        </div>
                        <div class="table-responsive cart_info">
                            <?php
                                $content = Cart::content();
                            ?>
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td colspan="1" class="image">Hình ảnh</td>
                                        <td colspan="1" class="description">Mô tả</td>
                                        <td colspan="1" class="price">Giá</td>
                                        <td  colspan="1"class="quantity">Số lượng</td>
                                        <td colspan="1"class="total">Tổng tiền</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($content as $v_content )
                                    <tr>
                                        <td  class="cart_product">
                                            <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50" alt="" /></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href="">{{$v_content->name}}</a></h4>
                                            <p>Mã ID: {{$v_content->id}}</p>
                                        </td>
                                        <td  class="cart_price">
                                            <p>{{number_format($v_content->price).' '.'VND'}}</p>
                                        </td>
                                        <td  class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                                    {{ csrf_field() }}
                                                <input  class="cart_quantity_input" type="text" name="cart_quantity" min="1" value="{{$v_content->qty}}" >
                                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                                <input type="submit" value="cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                            </form>
                                            </div>
                                        </td>
                                        <td  class="cart_total">
                                            <p class="cart_total_price">
                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                echo number_format($subtotal).' '.'VND';
                                                ?>
                                            </p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section> <!--/#cart_items-->

                <section id="do_action">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="total_area">
                                    <ul>
                                        <li>Tổng <span>{{Cart::priceTotal(0,',','.').' '.'VND'}}</span></li>
                                        <li>Thuế <span>{{Cart::tax(0).' '.'VND'}}</span></li>
                                        <li>Phí vận chuyển <span>Free</span></li>
                                        <li>Thành tiền <span>{{Cart::total(0,',','.').' '.'VND'}}</span></li>
                                    </ul>
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id!==NULL && $shipping_id!==NULL){
                                        ?>
                                       <a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Thanh Toán</a>
                                        <?php
                                    }elseif($customer_id!==NULL){
                                        ?>
                                        <a class="btn btn-default check_out" href="{{URL::to('/checkouts')}}">Thanh Toán</a>
                                    <?php
                                    }else{
                                        ?>
                                        <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh Toán</a>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </div>
                </section><!--/#do_action-->
            </div>
            <div col-sm-2 >

            </div>
        </div>
    </div>
</section>

@endsection
