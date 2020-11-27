@extends('layouts.l_temp')
@section('deletecompcss')
  <link rel="stylesheet" href="{{ asset('css/delete_comp.css') }}">
@endsection


@section('content')


<section class="delete">
  <div class="title">
    <h2>

      退会完了
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