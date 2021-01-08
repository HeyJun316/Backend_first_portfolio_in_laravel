@extends('layouts.l_temp')

@section('payment_comp')
<link rel="stylesheet" href="{{ asset('css/payment_comp.css') }}">
@endsection

@section('content')
</section>
<section class="delete">
  <div class="title">
    <h2>
      購入完了
    </h2>
  </div>
  <div class="d-container">
    <h2 style="color:black; margin-top:10px; font-weight:bold;">
      Thanks a lot !
    </h2>
    <div class="d-inner" style="display: inline-flex;">
      <form action="" method="post" class="back">

        <a href="{{route('top')}}">
          <input type="button" name="back" value="ホームに戻る" class="btn back-btn">
        </a>
      </form>

    </div>
  </div>
</section>
@endsection