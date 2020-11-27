@extends('layouts.l_temp')
@section('deleteconfcss')
<link rel="stylesheet" href="{{ asset('css/delete_conf.css') }}">
@endsection

@section('content')

<section class="delete">
  <div class="title">
    <h2>
      退会する
    </h2>
  </div>
  <div class="d-container">
    <div class="d-inner" style="display: inline-flex;">
      <a href="{{url ('/home')}}">
        <input type="button" name="back" value="戻る" class="btn back-btn">
      </a>
      <form action="{{route ('delete') }}" method="post" class="delete">
        @csrf
        <input type="submit" name="delete" value="退会する" class="btn d-btn">
      </form>
    </div>
  </div>
</section>
@endsection