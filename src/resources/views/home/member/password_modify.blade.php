@extends('layouts.l_temp')

@section('modifycss')
<link rel="stylesheet" href="{{ asset('css/modify.css') }}">
@endsection

@section('content')
<section class="resist">
  <div class="title">
    <h2>
      パスワード変更
    </h2>
  </div>
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endifstor
  <div class="r-container">
    <div class="r-inner">
    <form action="{{route('password_change')}}" method="post">
      @csrf

      <dl>
        <!--氏名-->
        <div class="r-info">
          <dt class="r-dt"><label for="old_password">
            古いパスワード
            </label>
          </dt>
          <dd>
            <input type="password" name="old_pass" class="input">
          </dd>
        </div>

        <!--メールアドレス-->
        <div class="r-info">
          <dt class="r-dt">
            <label for="password">
              新しいパスワード
            </label>
          </dt>
          <dd><input type="password" name="password" class="input"></dd>
        </div>
        <div class="r-info">
          <dt class="r-dt">
            <label for="password_confirmation">
              新しいパスワード【確認】
            </label>
          </dt>
          <dd><input type="password" name="password_confirmation" class="input"></dd>
        </div>
          <input type="submit" name="btn" class="btn r-btn" value="変更を登録する">
        </form>
      </dl>
    </div>
  </div>
</section>
@endsection