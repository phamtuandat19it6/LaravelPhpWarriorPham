@extends('admin_layout')
@section('admin_content')



<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông tin đăng nhập
      </div>

      <div class="table-responsive">
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class ="aler_text">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>{{$customer->customer_name}}</td>
              <td>{{$customer->customer_phone}}</td>
              <td>{{$customer->customer_email}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Thông tin vận chuyển hàng hóa
      </div>

      <div class="table-responsive">
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class ="aler_text">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Tên người mua</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th>Ghi chú</th>
              <th>Hình thức thanh toán</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>{{$customer->customer_name}}</td>
                <td>{{$shipping->shipping_address}}</td>
                <td>{{$shipping->shipping_phone}}</td>
                <td>{{$shipping->shipping_email}}</td>
                <td>{{$shipping->shipping_notes}}</td>
                <td>@if($shipping->shipping_method==0)Chuyển khoản @else Tiền mặt @endif</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br><br>

  </div>
@endsection
