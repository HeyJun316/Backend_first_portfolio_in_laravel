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
        <a href="{{url ('/home')}}">
          <input type="button" name="back" value="ホームに戻る" class="btn back-btn">
        </a>
      </form>

    </div>
  </div>
</section>
@endsection