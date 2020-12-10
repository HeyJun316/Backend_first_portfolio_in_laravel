@extends('layouts.l_temp')

@section('cartcss')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')

<section class="main">
  <div class="title">
    カート
    <h2 class="message">{{$message ??''}}</h2>
  </div>
  <div class="flex_div">
    @if($carts->isNotEmpty())
    <div class="l-container">
      <table class="c-table">
        <tr>
          <th>商品名</th>
          <th>値段</th>
          <th>サイズ</th>
          <th>数量</th>
          <th rowspan="1" class="delete">--</th>
        </tr>
        <!--1行目-->
        @foreach($carts as $cart)

        <tr>
          <td class="c-prod">
            <p>{{$cart->product->product_name}}</p>
          </td>
          <td>{{$cart->product->price}}円</td>
          <td>{{$cart->size->size}}</td>
          <td>
            1
          </td>

          <form action="{{route ('cartdelete')}}" method="post">
            @csrf
            <td class="delete">
              <input type="hidden" value="{{$cart->product_id}}" name="product_id">
              <input type="hidden" value="{{$cart->size_id}}" name="size_id">
              <input type="hidden" value="{{Auth::User()->id}}" name="user_id">
              <input type="submit" value="取り消す" name="delete">
            </td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
    <!--l-container-->
    <div class="r-container">
      <div class="r-box">
        <div class="total-p">
          合計金額<br>{{number_format($sum)}}円
        </div>

        <form action="{{route ('payment_conf')}}" method="get" class="form">
          <input type="submit" name="next" value="レジへ進む" class="btn next-btn">
          <!-- <div class="div_btn_in_cart"> -->
          <a href="{{url ('/home')}}">
            <input type="button" name="back" value="他の商品を選ぶ" class="input_btn_in_cart">
          </a>
          <!-- </div> -->
        </form>
        <!--next-btn-->
      </div>
      <!--r-box-->
    </div>
  </div>
  <!--r-container-->
  </div>
  <!--flex_div-->
  @else
  <div class="empty_p">
    <p>カート内は空っぽです</p>
    <a href="{{url ('/home')}}" class="a_btn_in_cart">
      <input type="button" name="back" value="商品を選ぶ" class="input_btn_in_cart_emp">
    </a>
  </div>

  @endif
</section>


@endsection