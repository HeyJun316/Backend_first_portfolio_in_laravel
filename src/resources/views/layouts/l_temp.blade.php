<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" />
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- drawer.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/css/drawer.min.css">
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
    <!-- drawer.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/js/drawer.min.js"></script>

  @yield('homecss')
  @yield('product_listcss')
  @yield('cartcss')
  @yield('registcss')
  @yield('registconfcss')
  @yield('registcompcss')
  @yield('historycss')
  @yield('usercss')
  @yield('modifycss')
  @yield('deletecompcss')
  @yield('deleteconfcss')
  @yield('single_productcss')
  @yield('loafercss')
  @yield('searchcss')
  @yield('payment_conf')
  @yield('payment_comp')

  <link rel="icon" href="../img/靴のアイコン8.jpeg">
  <title>最強EC</title>
</head>

<body class="drawer drawer--right">
<div id="wrapper">

  <header id="header">
    <div class="h-inner">

      <div class="h-left">

        <a href="{{url ('/home')}}">
          <!-- <img src="../img/ウッディ.jpg" alt="logo"> -->
          <img alt="文字表示" src="{{ asset('/img/logo.jpg') }}">
        </a>

        <h2 class="header_title">最強EC</h2>
      </div>
      <!--h-left-->

      <div class="h-right">
        <ul class="h-navs">
          @if(Auth::check())
          <li class="h-nav sp-hidden"><a href="{{ url('/home/') }}">{{Auth::user()->name}} 様</a></li>
          <li class="h-nav sp-hidden"><a href="{{url ('/home/cart/cart') }}">カート</a></a></li>
          <!--カートに飛ばして追加した商品を表示？カート機能必要-->
          <li class="h-nav sp-hidden"><a href="{{route ('history') }}">購入履歴</a></li>
          <!-- historyに飛ばしてuserIDから-->
          <li class="h-nav sp-hidden"><a href="#" class="dropdown-btn">その他</a>
            <ul class="dropdown">
              <li class="d-item"><a href="{{url ('/home/member/user')}}">会員情報</a></li>

              <!-- userIDから全情報を持ってくる-->
              <form action="{{route ('logout') }}" method="post">
                @csrf
                <li class="d-item">
                  <button type="submit" class="logout">
                    ログアウト
                </li>
              </form>

              <li class="d-item"><a href="{{url ('/home/member/delete_conf')}}">退会</a></li>

            </ul>
          </li>
        </ul>
        <!-- drawer.js -->
        <button class="drawer-toggle drawer-hamburger">
          <span class="sr-only">toggle navigation</span>
          <span class="drawer-hamburger-icon"></span>
        </button>
        <!-- ?-->
        <nav class="drawer-nav" role="navigation">
          <ul class="drawer-menu">
            <li><a class="drawer-brand">{{Auth::user()->name}} 様</a></li>
            <li><a href="{{url ('/home/cart/cart') }}" class="drawer-menu-item">カート</a></li>
            <li><a href="{{route ('history') }}" class="drawer-menu-item">購入履歴</a></li>
            <li><a href="{{url ('/home/member/user')}}" class="drawer-menu-item">会員情報</a></li>
            <form action="{{route ('logout') }}" method="post">
                @csrf
                <li class="d-item drawer-menu-item">
                  <button type="submit" class="logout">
                    ログアウト
                </li>
              </form>
            <li><a href="{{url ('/home/member/delete_conf')}}" class="drawer-menu-item">退会</a></li>
          </ul>
        </nav>
        @else
        <li class="h-nav"><a href="{{ url('/home/member/login') }}" class="login_regist">ログイン/登録</a></li>


        </ul>
        @endif
        <!--navs-->
      </div>
      <!--h-right-->
    </div>
    <!--container-->
  </header>
  <!--m-container-->
  @yield('mainvisual')

  @yield('home')

  @yield('content')



  <footer>
    <div class="f-container">
      <div class="f-left">©︎最強EC</div>
      <div class="div_contact">
        <a href="{{url ('/home/contact/contact')}}" class="a_contact">
          <input type="button" name="contact" value="お問い合わせ" class="input_contact">
        </a>
      </div>
    </div>
  </footer>
  </div>
  <!--wrapper-->

</body>

<!-- <script src="{{asset ('js/swiper.min.js') }}"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<script>
  var mySwiper = new Swiper('.swiper-container', {
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true,
    }
  });
</script>
<!--ドロップダウンメニュー-->
<script>
  $(function() {
    $('.dropdown-btn').on('click',
      function() {
        $('.dropdown').stop().slideToggle('slow');

      });
  });
</script>
<script>
  $(function() {
    $('.a-contents').hide();
    $('.a-click').on('click', function() {
      $(this).next().slideToggle('fast');
      $(this).children('.a-icon').toggleClass('a-open');

    });

  });
</script>
<script>
  $(document).ready(function () {
    $('.drawer').drawer();
  });

</script>
<script>
    $(function() {
      var height=$("#header").height();
      $("body").css("margin-top", height + 0);//10pxだけ余裕をもたせる
    });
</script>



@yield('birthday')

</html>