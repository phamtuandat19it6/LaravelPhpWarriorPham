<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.lagre.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/css/app.css')}}" >
	<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/mains.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1147679ae7.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->'

<body>
	<header>
        <div class="logo">
          <a href ="{{URL::to('/trang-chu')}}"> <img src="{{asset('public/frontend/image/logo.png')}}" alt="" /></a>
        </div>
        <div class="menus menu">
          <li>
            <a>NỮ</a>
            <ul class="sub-menus sub-menu">
              <li><a href="category.html">Hàng mới về</a></li>
              <li><a href="">Collection</a></li>
              <li>
                <a href="">Áo</a>
                <ul class="li">
                  <li><a href="">Áo sơ mi</a></li>
                  <li><a href="">Áo thun</a></li>
                  <li><a href="">Áo vet</a></li>
                  <li><a href="">Áo khoác</a></li>
                  <li><a href="">Áo len</a></li>
                </ul>
              </li>
              <li>
                <a href="">Quần</a>
                <ul class="li">
                  <li><a href="">Quần</a></li>
                  <li><a href="">Quần jean</a></li>
                  <li><a href="">Quần dài</a></li>
                  <li><a href="">Quần lửng</a></li>
                  <li><a href="">Áo len</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a>NAM</a></li>
          <li><a>TRẺ EM</a></li>
          <li><a class="hot">FLASH SALE</a></li>
          <li><a class="hot">HOT ITEMS</a></li>
          <li><a>TIN TỨC</a></li>
          <li><a>THÔNG TIN</a></li>
        </div>
        <div class="orthers">
          <li style="display: flex">
            <form action="{{URL::to('/tim-kiem')}}" method="POST">
                {{ csrf_field() }}
            <input name="keywords_submit" placeholder="Tìm kiếm" type="text" />
            <button name="search-item" type="submit" id="completed-task" class="fas fa-search">
          </button>
        </form>
          </li>

          <?php
          $customer_id = Session::get('customer_id');
          $shipping_id = Session::get('shipping_id');
          if($customer_id!==NULL && $shipping_id!==NULL){
              ?>
              <li><a class="fa fa-paw" href="{{URL::to('/payment')}}">  &#160;<p>THANH TOÁN</p></a></li>
              <?php
          }else if($customer_id!==NULL){
              ?>
              <li><a class="fa fa-paw" href="{{URL::to('/checkouts')}}">  &#160;<p>THANH TOÁN</p></a></li>
          <?php
          }else{
            ?>
            <li><a class="fa fa-paw" href="{{URL::to('/login-checkout')}}">  &#160;<p>THANH TOÁN</p></a></li>
            <?php
          }
          ?>
             <?php
             $customer_id = Session::get('customer_id');
             if($customer_id!==NULL){
             ?>
                 <li><a class="fa fa-heart" href="{{URL::to('/checkouts')}}">  &#160;<p>YÊU THÍCH</p></a></li>
             <?php
             }else{
             ?>
                 <li><a class="fa fa-paw" href="{{URL::to('/login-checkout')}}">  &#160;<p>YÊU THÍCH</p></a></li>
             <?php
             }
             ?>
          <li ><a class="fa fa-shopping-bag" href="{{URL::to('/gio-hang')}}">  &#160;<p>GIỎ HÀNG</p></a></li>
            <?php
            $customer_id = Session::get('customer_id');
            if($customer_id!==NULL){
            ?>
                <li ><a class="fa fa-user" href="{{URL::to('/logout-checkout')}}">  &#160;<p>ĐĂNG XUẤT</p></a></li>
            <?php
            }else{
            ?>
                <li ><a class="fa fa-user" href="{{URL::to('/login-checkout')}}">  &#160;<p>ĐĂNG NHẬP</p></a></li>
            <?php
            }
            ?>
        </div>
      </header>

    <section id="slider"><!--slider-->
        <div class="container s">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{asset('public/frontend/image/slide6.jpg')}}" class="girl img-responsive" alt="" />
                                <div class="col-sm-6 col6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>FREE Ship cho HĐ từ 3 SP đến 400K</h2>
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> --}}
                                    <button type="button" class="btn btn-default get"> Mua hàng ngày</button>
                                </div>

                            </div>
                            <div class="item ">
                                <img src="{{asset('public/frontend/image/slide7.jpg')}}" class="girl img-responsive" alt="" />
                                <div class="col-sm-6 col6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>FREE Ship cho HĐ từ 3 SP đến 400K</h2>
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> --}}
                                    <button type="button" class="btn btn-default get"> Mua hàng ngày</button>
                                </div>

                            </div>
                            <div class="item ">
                                <img src="{{asset('public/frontend/image/slide8.jpg')}}" class="girl img-responsive" alt="" />
                                <div class="col-sm-6 col6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>FREE Ship cho HĐ từ 3 SP đến 400K</h2>
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> --}}
                                    <button type="button" class="btn btn-default get"> Mua hàng ngày</button>
                                </div>

                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->


    @yield('content')

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/image/slide4.jpg')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/image/slide8.jpg')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('public/frontend/image/slide7.jpg')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
                                        <img src="{{asset('public/frontend/image/slide6.jpg')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{asset('public/frontend/images/home/map.png')}}" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hổ trợ trực tuyến</a></li>
								<li><a href="#">Liên hệ chúng tôi</a></li>
								<li><a href="#">Tình trạng đặc hàng</a></li>
								<li><a href="#">Thay đổi địa điểm</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Shop nhanh</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Áo thun</a></li>
								<li><a href="#">Nam</a></li>
								<li><a href="#">Nữ</a></li>
								<li><a href="#">Thẻ quà tặng</a></li>
								<li><a href="#">Giày</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">chính sách bảo mật</a></li>
								<li><a href="#">chính sách hoàn trả</a></li>
								<li><a href="#">Hệ thống thanh toán</a></li>
								<li><a href="#">Hệ thống vé</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới thiệu về shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin công ty</a></li>
								<li><a href="#">Nghề nghiệp</a></li>
								<li><a href="#">Địa điểm cửa hàng</a></li>
								<li><a href="#">Chương trình tiếp thị</a></li>
								<li><a href="#">Bản quyền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Nhận thông tin </h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Email của bạn" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Nhận thông tin cập nhật mới nhất <br />từ trang web của chúng tôi</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->
    <script src="{{asset('public/frontend/js/final.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweet_alert.js')}}"></script>



    <script type="text/javascript" >
    $(document).ready(function(){
        $('.send_order').click(function(){
        swal({
        title: "Xác nhận đơn hàng?",
        text: "Đơn hàng sẽ không được hoàn trả khi đặt, bạn có chắc chắn muốn đặt không?",
        icon: "success",
        showCancelButton: true,
        cancelButtonText:"Đóng, chưa mua !",
        cancelButtonClass:"btn-primary",
        confirmButtonClass: "btn-success",
        confirmButtonText: "Cảm ơn,Mua hàng",
        closeOnConfirm:false,
        closeOnCancel:false,
        },
        function(isConfirm){
            if(isConfirm){
                var shipping_name = $('.shipping_name').val();
                var shipping_email = $('.shipping_email').val();
                var shipping_address = $('.shipping_address').val();
                var shipping_phone = $('.shipping_phone').val();
                var shipping_notes = $('.shipping_notes').val();
                var shipping_method = $('.payment_select').val();
                var order_fee = $('.order_fee').val();
                var order_coupon = $('.order_coupon').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                url: '{{url('/confirm-order')}}',
                method: 'POST',
                data:{shipping_name:shipping_name,
                    shipping_email:shipping_email,
                    shipping_notes:shipping_notes,
                    shipping_address:shipping_address,
                    shipping_phone:shipping_phone,
                    order_coupon:order_coupon,
                    shipping_method:shipping_method,
                    order_fee:order_fee,_token:_token},
                success:function(){
                    swal("Đơn hàng","Đơn hàng của bạn đã được gửi thành công","success");
                }
            });
                    window.setTimeout(() => {
                        location.reload();
                    }, 3000);
            }else{
                swal("Đóng","Đơn hàng chưa được gửi làm ơn hoàn tất đơn hàng","error");
            }
        });
    });
});
</script>
<script type="text/javascript" >
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id =$(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url: '{{url('/add-cart-ajax')}}',
            method: 'POST',
            data:{cart_product_id:cart_product_id,
            cart_product_name:cart_product_name,
            cart_product_image:cart_product_image,
            cart_product_price:cart_product_price,
            cart_product_qty:cart_product_qty,_token:_token},
            success:function(data){
                swal({
                    title:"Đã thêm sản phẩm vào giỏ hàng",
                    text:"Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                    showCancelButton: true,
                    cancelButtonText:"Xem tiếp",
                    confirmButtonClass:"btn-success",
                    confirmButtonText:"Đi đến giỏ hàng",
                    closeOnConfirm: false,
                    },
                    function() {
                    window.location.href ="{{url('/gio-hang')}}";
                    });
            }
        });
    });
});
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result ='';

        if(action=='city'){
            result='province';
        }else{
            result='wards';
        }
        $.ajax({
            url:'{{url('/select-delivery-home')}}',
            method:'POST',
            data:{action:action,ma_id:ma_id,_token:_token},
            success:function(data){
                $('#'+result).html(data);
            }
        });
    });
});
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' || maqh == '' || xaid == ''){
                alert('Làm ơn chọn để tính phí vận chuyển');
            }else{
                    $.ajax({
                    url:'{{url('/caculate-fee')}}',
                    method:'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                        location.reload();
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('.sap').click(function(){
        var _token = $('input[name="_token"]').val();
        var coupon = $('#coupon').val();
        $.ajax({
            url:'{{url('/check-coupon')}}',
            method:'POST',
            data:{_token:_token,coupon:coupon},
            success:function(){
                location.reload();
            }
        });
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('.noapdung').click(function(){
        $.ajax({
            url:'{{url('/unset-coupon')}}',
            success:function(){
                location.reload();
            }
        });
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('.manoapdung').click(function(){
        $.ajax({
            url:'{{url('/unset-coupon')}}',
            success:function(){
                location.reload();
            }
        });
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#x').click(function(){
        $.ajax({
            url:'{{url('/del-fee')}}',
            success:function(){
                location.reload();
            }
        });
    });
    $('.xoatatca').click(function(){
        $.ajax({
            url:'{{ url('/del-all-product') }}',
            success:function(){
                location.reload();
            }
        });
    });
    $('#capnhat').click(function(){
        $.ajax({
            url:'{{ url('/update-cart') }}',

            success:function(){
                location.reload();
            }
        });

    });
});

</script>

</body>
</html>
