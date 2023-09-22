
@extends('welcome')
@section('content')
<section>
    <div class="container " >
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
                <section id="form"><!--form-->
                    <div class="container containerss">
                        <div class="row">

                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="login-form"><!--login form-->
                                    <h2>Đăng nhập tài khoản</h2>
                                    <form action="{{URL::to('/login-customer')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="email" name="email_account" placeholder="Địa chỉ email" />
                                        <input type="text" name="password_account" placeholder="Mật khẩu" />
                                        <span>
                                            <input type="checkbox" class="checkbox">
                                            Ghi nhớ đăng nhập
                                        </span>
                                        <button type="submit" class="btn btn-default"> Đăng nhập</button>
                                    </form>
                                </div><!--/login form-->
                            </div>

                            <div class="col-sm-1">
                                <h2 class="or">HOẶC</h2>
                            </div>
                            <div class="col-sm-4">
                                <div class="signup-form"><!--sign up form-->

                                    <h2>Đăng kí tài khoản</h2>
                                    <form action="{{URL::to('/add-customer')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="text" name="customer_name" placeholder="Tên"/>
                                        <input type="email" name="customer_email" placeholder="Địa chỉ Email"/>
                                        <input type="password" name="customer_password" placeholder="Mật khẩu"/>
                                        <input type="Text" name="customer_phone" placeholder="phone"/>
                                        <a class="" href="{{URL::to('/login-checkout')}}"><button type="submit" class="btn btn-default">Đăng kí</button></a>
                                    </form>
                                </div><!--/sign up form-->
                            </div>
                        </div>
                    </div>
                </section><!--/form-->
            </div>

        </div>
    </div>
</section>
@endsection
