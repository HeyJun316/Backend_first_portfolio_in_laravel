@extends('layouts.l_temp')

@section('registcompcss')
<link rel="stylesheet" href="{{ asset('css/regist_comp.css') }}">
@endsection

@section('content')

</section>
<section class="delete">
  <div class="title">
    <h2>
      完了
    </h2>
  </div>
  <div class="d-container">
    <div class="d-inner" style="display: inline-flex;">
      <form action="" method="post" class="back">
        <a href="{{url ('/home/cart/payment_conf')}}">
          <input type="button" name="back" value="購入画面に戻る" class="btn back-btn">
        </a>
      </form>

    </div>
  </div>
</section>
@endsection