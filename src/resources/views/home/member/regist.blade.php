@extends('layouts.l_temp')
@section('registcss')
<link rel="stylesheet" href="{{ asset('css/regist.css') }}">
@endsection
@section('content')
</section>
<section class="resist">
  <div class="title">
    <h2>
      会員登録
    </h2>

  </div>
  <!--title-->
  <div class="r-container">



    <div class="r-inner">
      <dl>
        <form method="post" action="{{route ('register') }}">
          @csrf
          <!--氏名-->
          @if($errors->has('name'))
          <div style="color:red">
            {{$errors->first('name')}}
          </div>
          @endif
          <div class="r-info">
            <dt class="r-dt"><label for="name">
                氏名
              </label>
            </dt>
            <dd>
              <input type="text" name="name" value="{{ old('name') }}" placeholder="お名前" class="input">
            </dd>
          </div>
          <!--r-info-->

          <!--メールアドレス-->
          @if($errors->has('email'))
          <div style="color:red">
            {{$errors->first('email')}}
          </div>
          @endif
          <div class="r-info">
            <dt class="r-dt">
              <label for="mail">
                メールアドレス
              </label>
            </dt>
            <dd><input type="text" name="email" value="{{ old('email') }}" placeholder="メール" class="input"></dd>
          </div>
          <!--r-info-->

          <!--性別-->
          @if($errors->has('sex'))
          <div style="color:red">
            {{$errors->first('sex')}}
          </div>
          @endif
          <div class="r-info">
            <dt class="r-dt sex">
              性別
            </dt>
            <dd>
              <label for="man">男性</label>
              <input type="radio" name="sex" id="man" value="男性" @if(old('sex')=="男性" ) checked @endif>
              <br class="line">

              <label for="woman">女性</label>
              <input type="radio" name="sex" id="man" value="女性" @if(old('sex')=="女性" ) checked @endif>
            </dd>
          </div>
          <!--r-info-->

          <!--郵便局-->
          @if($errors->has('postal_code'))
          <div style="color:red">
            {{$errors->first('postal_code')}}
          </div>
          @endif
          <div class="r-info">
            <dt class="r-dt"><label for="post">郵便番号</label></dt>
            <dd>

              <input type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="郵便番号" class="input"></dd>
          </div>
          <!--r-info-->
          <!--住所-->
          @if($errors->has('address'))
          <div style="color:red">
            {{$errors->first('address')}}
          </div>
          @endif
          <div class="r-info">
            <dt class="r-dt"><label for="address">住所</label></dt>
            <dd><input type="text" name="address" value="{{ old('address') }}" placeholder="住所" class="input"></dd>
          </div>
          <!--r-info-->

          <!--生年月日+jQuery-->
          @if($errors->has('year'))
          <div style="color:red">
            {{$errors->first('year')}}
          </div>
          @endif

          <div class="r-info r-birth">
            <dt class="r-dt r-b adjust3">
              <label for="03" class="append">
                生年月日
              </label>
            </dt>
            <dd>
              <select name="year" id="year">
                <option value="{{old('$i')}}">---</option>
              </select>年<br class="line">
              <select name="month" id="month">
                <option value="{{old('$i')}}">---</option>
              </select>月<br class="line">
              <select name="day" id="day">
                <option value="{{old('$i')}}">---</option>
              </select>日
            </dd>
          </div>
          <!--r-info-->

          <!--パスワード-->
          @if($errors->has('password'))
          <div style="color:red">
            {{$errors->first('password')}}
          </div>
          @endif
          <div class="r-info">
            <dt class="r-dt"><label for="pass">パスワード</label></dt>
            <dd><input type="password" name="password" placeholder="パスワード" class="input"></dd>
          </div>
          <!--r-info-->

          <div class="r-info">
            <dt class="r-dt"><label for="pass">パスワード<br>(確認)</label></dt>
            <dd><input type="password" name="password_confirmation" placeholder="パスワード" class="input"></dd>
          </div>
          <!--r-info-->
          <input type="submit" name="btn" class="btn r-btn" value="会員登録">
        </form>
      </dl>
    </div>
    <!--r-inner-->
  </div>
  <!--r-container-->

</section>
@section('birthday')
<script>
  var time = new Date();
  var year = time.getFullYear();
  for (var i = year; i >= 1900; i--) {
    $('#year').append('<option value="' + i + '">' + i + '</option>');
  }
  for (var i = 1; i <= 12; i++) {
    $('#month').append('<option value="' + i + '"> ' + i + '</option>');
  }
  for (var i = 1; i <= 31; i++) {
    $('#day').append('<option value="' + i + '" > ' + i + '</option>');
  }
</script>

@endsection
@endsection