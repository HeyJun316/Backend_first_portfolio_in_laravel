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
<dd>
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
          <dd>
            <p class="input">{{$users->email}}</p>
          </dd>
        </div>

        <div class="r-info">
          <dt class="r-dt">
            <label for="mail">
              性別
            </label>
          </dt>
          <dd>
            <p class="input">{{$users->sex}}</p>
          </dd>
        </div>

        <!--性別-->

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
        <div class="r-info">
          <dt class="r-dt">
            <label for="mail">
              生年月日
            </label>
          </dt>
          <dd>
            <p class="input">{{$users->birthday}}</p>
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