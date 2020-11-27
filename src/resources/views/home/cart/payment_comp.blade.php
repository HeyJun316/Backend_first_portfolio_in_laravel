@extends('layouts.l_temp')

@section('payment_comp')
<link rel="stylesheet" href="{{ asset('css/payment_comp.css') }}">
@endsection

@section('content')
</section>
<section class="buy">
  <div class="title">
    <h2>
      購入完了
    </h2>
  </div>
  <div class="d-container">
    <h2 class="thanks">
      Thanks a lot !
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