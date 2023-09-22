@extends('welcome')
@section('content')
<section id="slider">
      <div class="aspect-ratio-169">
        <img src="{{('public/frontend/image/slide6.jpg')}}" alt="" />
        <img src="{{('public/frontend/image/slide5.jpg')}}" alt="" />
        <img src="{{('public/frontend/image/slide8.jpg')}}" alt="" />
        <img src="{{('public/frontend/image/slide7.jpg')}}" alt="" />
      </div>
      <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
</section>
{{-- ----------------------------- --}}
<section class="category">
    <div class="container">
      <div class="category-top row">
        <p>Trang chủ</p>
        <span style="transform: translateY(-20%)">&#8594;</span>
        <p>Nữ</p>
        <span style="transform: translateY(-20%)">&#8594;</span>
        <p>Hàng nữ mới về</p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="category-left">
            <h2>DANH MỤC SẢN PHẨM</h2>
          <ul>
            @foreach ($category as $key=>$cate )
            <li class="category-left-li">
              <a>{{$cate->category_name}}</a>
              <ul class="li">
                @foreach ($brand as $key=>$brands )
                <li><a href="{{URL::to('/danh-muc-san-pham/'.$brands->brand_id)}}">{{$brands->brand_name}}</a></li>
                @endforeach
              </ul>
            </li>
            @endforeach
          </ul>
        </div>
        {{-- --------------------------- --}}
        <div class="category-right">
          <div class="category-rigth-top-content row">
            <div class="category-right-top-item">
              <p>HÀNG NỮ MỚI VỀ</p>
            </div>
            <div class="category-right-top-item">
              <div class="button-select">
                <button>
                  <span>Bộ lọc</span><i class="fas fa-sort-down"></i>
                </button>
                <select name="" id="">
                  <option value="">Sắp xếp</option>
                  <option value="">Giá cao đến thấp</option>
                  <option value="">Giá thấp đến cao</option>
                </select>
              </div>
            </div>
          </div>
          <div class="category-rigth-content row">
            @foreach ($all_product as $key => $product)
            <div class="category-rigth-content-item">
              <a href="product.html">
                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                <h1>{{$product->product_name}}</h1>
                <p>{{($product->product_price).'VNĐ'}}</p>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
