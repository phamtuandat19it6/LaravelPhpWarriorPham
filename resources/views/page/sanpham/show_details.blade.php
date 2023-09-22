@extends('welcome')
@section('content')
@foreach ($product_details as $key => $value )
<section>
    <div class="container s " >
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


            <div class="col-sm-9 padding-right s">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-6">
                        <div class="view-product">
                            <img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                                <div class="carousel-inner carouselinners">
                                    <div class="item active">
                                    <a href=""><img src="{{asset('public/frontend/image/product4.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/image/product2.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/image/product3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item ">
                                    <a href=""><img src="{{asset('public/frontend/image/product4.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/image/product2.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/image/product3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item ">
                                    <a href=""><img src="{{asset('public/frontend/image/product4.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/image/product2.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('public/frontend/image/product3.jpg')}}" alt=""></a>
                                    </div>
                                </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>


                    <div class="col-sm-6">
                        <div class="product-information"><!--/product-information-->
                            <img src="{{URL::to('/public/frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                            <form >
                                {{ csrf_field() }}
                            <input type="hidden" value="{{$value->product_id}}"class="cart_product_id_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_name}}"class="cart_product_name_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_image}}"class="cart_product_image_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_price}}"class="cart_product_price_{{$value->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                            <h2>{{$value->product_name}}</h2>
                            <p>Mã ID: {{$value->product_id}}</p>
                            <img src="{{URL::to('/public/frontend/images/product-details/rating.png')}}" alt="" />

                            <span>
                                <span>{{number_format($value->product_price).' '.'VNĐ'}}</span>
                                <label>Số lượng:</label>
                                <input name="" type="number" min="1" value="1" />
                                <input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
                                <button type="button" name="add-to-cart" class="btn btn-default cart  add-to-cart x" data-id_product="{{$value->product_id}}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm giỏ hàng
                                </button>
                            </span>
                        </form>
                            <p style="text-transform: uppercase"><b>Tình Trạng:</b>&emsp; Còn hàng</p>
                            <p style="text-transform: uppercase"><b>Điêu kiện:</b>&emsp; Mới 100%</p>
                            <p style="text-transform: uppercase"><b>Thương hiệu:</b>&emsp;{{$value->brand_name}}</p>
                            <p style="text-transform: uppercase"><b>Danh mục:</b>&emsp;{{$value->category_name}}</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>

                </div><!--/product-details-->


                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
                            <li ><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >
                            <p>{!!$value->product_desc!!}</p>
                        </div>

                        <div class="tab-pane fade" id="companyprofile" >
                            <p>{!!$value->product_content!!}</p>
                        </div>

                        <div class="tab-pane fade" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>

                                <p><b>Write Your Review</b></p>

                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name"/>
                                        <input type="email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->
                @endforeach


                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Sản phẩm liên quan</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner carouselinnerv">
                            <div class="item active">
                                @foreach ($relate as $key => $lienquan )
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
                                                <h3>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h3>
                                                <p>{{$lienquan->product_name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="item ">
                                @foreach ($relate as $key => $lienquan )
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
                                                <h3>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h3>
                                                <p>{{$lienquan->product_name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <a class="left recommended-item-control angle" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control angle" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->
            </div>

        </div>
    </div>
</section>

@endsection

