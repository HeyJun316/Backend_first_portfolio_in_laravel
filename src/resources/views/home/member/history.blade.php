@extends('layouts.l_temp')



@section('historycss')
<link rel="stylesheet" href="{{ asset('css/history.css') }}">
@endsection

@section('content')
</section>
<section class="main">
  <div class="title">
    <h2>
      購入履歴
    </h2>
  </div>
  <!--商品1-->

  @foreach($histories as $history)
  <table class="h-table">
    <tr class="bg">
      <th>注文日<br><br>{{$history->created_at}}</th>
      <th>金額<br><br>{{$history->product->price}}円</th>
    </tr>
    <tr>
      <td colspan="2">
        <img src=".../img/リサイズ2.png" alt="">
        <!-- <p clss="p-titlename">商品名</p> -->
        商品
        <p class="p-name">{{$history->product->product_name}}</p>
      </td>

    </tr>
  </table>
  @endforeach
  <div class="back">
    <form action="" method="post">

      <a href="{{url ('/home')}}">
        <input type="button" name="back" value="戻る" class="btn">
      </a>
    </form>
  </div>
  <!--s-container-->

</section>
@endsection