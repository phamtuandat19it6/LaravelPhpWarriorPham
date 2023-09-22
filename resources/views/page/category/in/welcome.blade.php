<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Đồ Án Thực Tập</title>
    <script src="https://kit.fontawesome.com/1147679ae7.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600:700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" />
  </head>
  <body>
    <header>
      <div class="logo">
        <a href ="{{URL::to('/trang-chu')}}"> <img src="{{asset('public/frontend/image/logo.png')}}" alt="" /></a>
      </div>
      <div class="menus">
        <li>
          <a>NỮ</a>
          <ul class="sub-menus">
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
        <li><a>BỘ SƯU TẬP</a></li>
        <li><a>TIN TỨC</a></li>
        <li><a>THÔNG TIN</a></li>
      </div>
      <div class="orthers">
        <li style="display: flex">
          <input placeholder="Tìm kiếm" type="text" /><i
            class="fas fa-search"
          ></i>
        </li>
        <li><a class="fa fa-paw" href=""></a></li>
        <li><a class="fa fa-user" href=""></a></li>
        <li><a class="fa fa-shopping-bag" href="{{asset('cart.blade.php')}}"></a></li>
      </div>
    </header>
   <!-- slider -->
   @yield('content')
    <!-- -------------------container--------------- -->
    <section class="app-container">
      <p>Tải ứng dụng IVY moda</p>
      <div class="app-google">
        <a href=""><img src="{{asset('public/frontend/image/appstore.png')}}" alt="" /></a>
        <a href=""><img src="{{asset('public/frontend/image/googleplay.png')}}" alt="" /></a>
      </div>
      <p>Nhận bản tin IVY moda</p>
      <input type="text" placeholder="Nhập email của bạn..." />
    </section>
    <!-- -------------------footer------------------ -->
    <div class="footer">
      <div class="footer-container">
        <div class="footer-top">
          <li>
            <a href=""><img src="{{asset('public/frontend/image/img-congthuong.png')}}" alt="" /></a>
          </li>
          <li><a href=""><p>Liên hệ</p> </a></li>
          <li><a href=""><p>Tuyển dụng</p> </a></li>
          <li><a href=""><p>Giới thiệu</p></a></li>
          <li>
            <a href="" class="fab fa-facebook-f"></a>
            <a href="" class="fab fa-twitter"></a>
            <a href="" class="fab fa-youtube"></a>
          </li>
        </div>
        <p class="footer-thongtin">
          Công ty Cổ phần Dự Kim với số đăng kí kinh doanh:0105777650 <br />
          Địa chỉ đăng kí:Tổ dân phố Tháp, P.Đại Mỗ, Q.Nam Từ Liêm, TP.Hà Nội,
          Việt Nam - 0243 205 2222 <br />
          Đặt hàng online: <span class="footer-sdt">0246 662 3434</span>
        </p>
        <div class="footer-bottom">@Ivymod All rights reserved</div>
      </div>
    </div>
    <script src="{{asset('public/frontend/js/starter.js')}}"></script>
  </body>
</html>
