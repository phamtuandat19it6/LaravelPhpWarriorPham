@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">

                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">

                    <div class="position-center">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class ="aler_text">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                        <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text"  name="product_name" class="form-control" placeholder="Tên sản phẩm" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file"  name="product_image" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea  style="resize: none" rows="8" class="form-control"  id="ckeditor2" name="product_content"  placeholder="Nội dung sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea  style="resize: none" cols="30" rows="10" class="form-control" id="ckeditor1" name="product_desc"  placeholder="Mô tả sản phẩm"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục thương hiệu</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="color">Màu Sắc:</label>
                            <input type="text" name="product_color" id="color" value="{{ old('color') }}" >
                        </div>
                        <div class="form-group">
                            <label for="size">Kích Thước:</label>
                            <select name="product_size" id="size" >
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="L">L</option>
                                <option value="M">M</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text"  name="product_price" class="form-control" placeholder="Giá sản phẩm" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
