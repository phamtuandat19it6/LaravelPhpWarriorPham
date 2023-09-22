@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">

                <header class="panel-heading">
                    Thêm danh mã giảm giá
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
                        <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mã giảm giá</label>
                            <input type="text"  name="coupon_name" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">mã giảm giá</label>
                            <input  type="text" class="form-control" name="coupon_code" placeholder="Mã giảm giá" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng mã</label>
                            <input type="text"  name="coupon_time" class="form-control"  required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tính năng mã giảm giá</label>
                            <select name="coupon_condition" class="form-control input-sm m-bot15">
                                <option value="0">----chọn----</option>
                                <option value="1">Giảm theo phần trăm</option>
                                <option value="2">Giảm theo tiền</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập số % hoặc số tiền giảm</label>
                            <input type="text"  name="coupon_number" class="form-control"  required="">
                        </div>
                        <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
