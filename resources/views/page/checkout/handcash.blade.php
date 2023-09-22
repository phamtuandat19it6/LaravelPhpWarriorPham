


@extends('welcome')
@section('content')
<section>
    <div class="container container-cart" >
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


            <div class="col-sm-9 padding-right">
                <section id="cart_items">
                    <div class="container">
                        <div class="review-payment">
                            <h2>Cảm ơn bạn đã đặt hàng ở chỗ chúng tôi, chúng tôi sẽ liên hệ bạn sớm nhất</h2>
                        </div>
                    </div>
                </section> <!--/#cart_items-->
            </div>

        </div>
    </div>
</section>
@endsection

