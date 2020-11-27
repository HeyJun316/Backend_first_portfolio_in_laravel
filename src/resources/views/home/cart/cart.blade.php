@extends('layouts.l_temp')

@section('cartcss')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
<h2 style="color:red; font-weight:bold; text-align:center; margin:30px;">{{$message ??''}}</h2>

<section class="main">
  <div class="title">
    カート
  </div>
  @if($carts->isNotEmpty())
  <th></th>
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
          <img alt="文字表示" src="{{ asset('/img/リサイズ2.jpg') }}">
          <p>{{$cart->product->product_name}}</p>
        </td>
        <td>{{$cart->product->price}}円</td>
        <td>{{$size ?? ''}}</td>
        <td>
          1
        </td>
        <form action="{{route ('cartdelete')}}" method="post">
          @csrf
          <th class="delete">
            <input type="hidden" value="{{$cart->product_id}}" name="product_id">
            <input type="hidden" value="{{Auth::User()->id}}" name="user_id">
            <input type="submit" value="取り消す" name="delete">
          </th>
        </form>
        </td>
        @endforeach
    </table>

  </div>
  <!--s-container-->
  <div class="r-container">
    <div class="r-box">
      <div class="total-p">
        合計金額&emsp;&emsp;&emsp;{{number_format($sum)}}円
      </div>

      <form action="{{route ('payment_conf')}}" method="get">
        <input type="submit" name="next" value="レジへ進む" class="btn next-btn">
      </form>
      <!--next-btn-->
    </div>
    <!--r-box-->
    <div class="div_btn_in_cart">
      <a href="{{url ('/home')}}" >
        <input type="button" name="back" value="他の商品を選ぶ" class="input_btn_in_cart">
      </a>
    </div>
  </div>
  <!--r-container-->
  @else
  <div class="empty_p">
    <p>カート内は空っぽです</p>
      <a href="{{url ('/home')}}" class="a_btn_in_cart">
        <input type="button" name="back" value="商品を選ぶ" class="input_btn_in_cart_emp">
      </a>
    </div>
  </div>

  @endif
</section>


@endsection