@extends('layouts.l_temp')
@section('payment_comp')
<link rel="stylesheet" href="{{ asset('css/payment_comp.css') }}">
@endsection


@section('content')
<section class="delete">
  <div class="title">
    <h2>
    </h2>
  </div>
  <div class="d-container">
    <h2 style="color:black; margin-top:10px; font-weight:bold;">
    送信完了!
    </h2>
    <div class="d-inner" style="display: inline-flex;">
      <form action="" method="post" class="back">

        <a href="{{url ('/home')}}">
          <input type="button" name="back" value="ホームに戻る" class="btn back-btn">
        </a>
      </form>

    </div>
  </div>
</section>
@endsection