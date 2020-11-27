@extends('layouts.l_temp')
@section('usercss')
  <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection
@section('content')

<section class="resist">
  <div class="title">
    <h2>
      会員情報
    </h2>
  </div>

  <div class="r-container">
    <div class="r-inner">

    <dl>

    <!--氏名-->
        <div class="r-info">
          <dt class="r-dt">
            <label for="name">
              氏名
            </label>
          </dt>

          <p class="input">{{$users->name}}</p>
          </dd>
        </div>

        <!--メールアドレス-->
        <div class="r-info">
          <dt class="r-dt">
            <label for="mail">
              メールアドレス
            </label>
          </dt>
          <p class="input">{{$users->email}}</p>
          <dd>
          </dd>
        </div>

        <!--性別-->
        <div class="r-radio r-info">
          <div class="r-dt radio-dt">
            性別
          </div>
          <div class="radio-inner">
            <label for="man" class=>{{$users->sex}}</label>
          </div>
        </div>

        <!--郵便局-->
        <div class="r-info post">
          <dt class="r-dt "><label for="post">郵便番号</label></dt>
          <dd>
            <p class="input">{{$users->postal_code}}
            </p>
          </dd>
        </div>

        <!--住所-->
        <div class="r-info">
          <dt class="r-dt"><label for="address">住所</label></dt>
          <dd>
            <p class="input">{{$users->address}}</p>
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
            {{$users->birthday}}
          </dd>
        </div>

        <!--パスワード-->
        <div class="r-info">
          <dt class="r-dt"><label for="pass">パスワード</label></dt>
          <dd>
            <p class="input">********</p>
          </dd>
        </div>
        <div class="r-info">
          <dt class="r-dt"><label for="pass">パスワード<br>(確認)</label></dt>
          <dd>
            <p class="input">********</p>

          </dd>
        </div>
        <form action="{{route('modify')}}" method="get">
          <input type="submit" name="btn" class="btn r-btn" value="編集する">
        </form>
      </dl>
    </div>
  </div>
</section>
@endsection