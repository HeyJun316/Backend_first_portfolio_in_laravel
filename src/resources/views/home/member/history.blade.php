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
      <th>
        <span style="font-weight: bold;">
          注文日
        </span>
        <br><br>{{$history->created_at}}</th>
      <th>
        <span style="font-weight: bold;">
          金額
        </span>
        <br><br>{{$history->product->price}}円</th>
    </tr>
    <tr>
      <td colspan="2">
        <span style="font-weight: bold;">
          商品
        </span>
        <p class="p-name">{{$history->product->product_name}}</p>
      </td>

    </tr>
  </table>
  @endforeach
  <div class="back">
      <a href="{{url ('/home')}}">
        <input type="button" name="back" value="戻る" class="btn back_btn">
      </a>
  </div>
  <!--s-container-->

</section>
@endsection