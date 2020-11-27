@extends('layouts.l_temp')

@section('registconfcss')
<link rel="stylesheet" href="{{ asset('css/regist_conf.css') }}">
@endsection
@section('content')
<section class="resist">
  <div class="title">
    <h2>
      会員登録
    </h2>
  </div>
  <div class="r-container">
    <div class="r-inner">
      <dl>
        <form method="post" action="{{route ('register') }}">
          @csrf

          <!--氏名-->
          <div class="r-info">
            <dt class="r-dt">
              <label for="name">
                氏名
              </label>
            </dt>
            <dd>
              {{$name}}
            </dd>
          </div>

          <!--メールアドレス-->
          <div class="r-info">
            <dt class="r-dt">
              <label for="mail">
                メールアドレス
              </label>
            </dt>
            <dd>
              {{$email}}
            </dd>
          </div>

          <!--性別-->
          <div class="r-radio r-info">
            <div class="r-dt radio-dt">
              性別
            </div>
            <div class="radio-inner">
              <input type="radio" name="man" id="man" class="radio-form" value="{{$sex}}" checked>
            </div>
          </div>

          <!--郵便局-->
          <div class="r-info post">
            <dt class="r-dt ">
              <label for="post">郵便番号</label>
            </dt>
            <dd>
              {{$postal_code}}
            </dd>
          </div>

          <!--住所-->
          <div class="r-info">
            <dt class="r-dt">
              <label for="address">住所</label>
            </dt>
            <dd>
              {{$address}}
            </dd>
          </div>
          <!--生年月日+jQuery-->
          <div class="r-info r-birth">
            <dt class="r-dt r-b">
              <label for="03" class="append">
                生年月日
              </label>
            </dt>
            <dd>
              {{$year}}年
              {{$month}}月
              {{$day}}日
            </dd>
          </div>

          <!--パスワード-->
          <div class="r-info">
            <dt class="r-dt"><label for="pass">パスワード</label>
            </dt>
            <dd>
              {{$password}}
            </dd>
          </div>
          <div class="r-info">
            <dt class="r-dt">
              <label for="pass">パスワード<br>(確認)</label>
            </dt>
            <dd>
              {{$password}}
            </dd>
          </div>
          <input type="submit" name="btn" class="btn r-btn" value="登録完了">
        </form>
      </dl>
    </div>
  </div>
</section>
@endsection