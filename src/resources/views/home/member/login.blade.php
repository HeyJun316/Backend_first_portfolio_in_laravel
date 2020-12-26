@extends('layouts.l_temp')


@section('content')

<head>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

</section>
<section class="login">
  <div class="title">
    <h2>ログイン</h2>
    @if (session('oauth_error'))
    {{ session('oauth_error') }}
    @endif
  </div>
  <div class="l-container">
    <div class="login-left">
      <h3 class="l-title">ログイン</h3>
      @if($errors->any())
      <div style="color:red">
        @foreach($errors->all() as $error)
        {{$error}}
        @endforeach
      </div>
      @endif

      <div class="l-form">
        <form action="{{ route('login') }}" method="post">
          @csrf
          <input type="text" name="email" placeholder="メールアドレス" value="{{ old('email')}}" class="l-add" required>
          <!--+value="{{old ('email')}}-->
          <br>
          <input type="password" name="password" placeholder="パスワード" class="l-pass">
          <!--name="password" 絶対！-->
          <br>
          <input type="submit" name="login" value="ログイン" class="btn">
        </form>
      </div>
      <!--l-form-->
    </div>
    <!--login-left-->
    <div class="login-right">
      <h3 class="l-title">外部からログイン</h3>
      <form action="" method="post">
        <a href="{{ url('/home/member/login/google')}}">
          <input type="button" name="login" value="Googleでログイン" class="btn google">
        </a>
      </form>
    </div>
    <!--login-right-->
  </div>
  <div class="sign-up">
    <h2 class="title">新規登録</h2>
    <form action="" method="post">

      <a href="{{url ('/home/member/regist')}}">
        <input type="button" value="会員登録" class="btn sign-btn">
      </a>
    </form>
  </div>
  <!--l-container-->
</section>

</html>
@endsection