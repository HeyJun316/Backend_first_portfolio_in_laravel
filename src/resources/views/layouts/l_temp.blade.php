<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">

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
  <title >最強EC</title>
</head>

<body>

  <header>
    <div class="h-inner">

      <div class="h-left">

        <a href="{{url ('/home')}}">
          <!-- <img src="../img/ウッディ.jpg" alt="logo"> -->
          <img alt="文字表示" src="{{ asset('/img/ウッディ.jpg') }}">
        </a>

        <h2 class="header_title">最強EC</h2>
      </div>
      <!--h-left-->

      <div class="h-right">
        <ul class="h-navs">
          @if(Auth::check())
          <li class="h-nav"><a href="{{ url('/home/') }}">{{Auth::user()->name}}</a></li>
          <li class="h-nav"><a href="{{url ('/home/cart/cart') }}">カート</a></a></li>
          <!--カートに飛ばして追加した商品を表示？カート機能必要-->
          <li class="h-nav"><a href="{{route ('history') }}">購入履歴</a></li>
          <!-- historyに飛ばしてuserIDから-->
          <li class="h-nav"><a href="#" class="dropdown-btn">その他</a>
            <ul class="dropdown">
              <li class="d-item"><a href="{{url ('/home/member/user')}}">会員情報</a></li>

              <!-- userIDから全情報を持ってくる-->
              <form action="{{route ('logout') }}" method="post">
                @csrf
                <li class="d-item">
                  <button type="submit"class="logout">
                    ログアウト
                </li>
              </form>

              <li class="d-item"><a href="{{url ('/home/member/delete_conf')}}">退会</a></li>

            </ul>
          </li>
        </ul>
        @else
        <li class="h-nav"><a href="{{ url('/home/member/login') }}"class="login_regist">ログイン/登録</a></li>


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

</body>
<script src="./js/swiper.min.js"></script>
<script>
  var mySwiper = new Swiper('.swiper-container', {
    // ここからオプション
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

@yield('birthday')

</html>