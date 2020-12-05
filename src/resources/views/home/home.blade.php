@extends('layouts.l_temp')


@section('homecss')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">`
@endsection


@section('mainvisual')

<section class="mainvisual">
  <div class="container swiper-contsiner">
    <div class="swiper-wrapper">
      <div class="swiper-slide">

        <div class="m-main">
          <h1 class="vertical">至高の<br>&emsp;&emsp;&thinsp; 一足を</h1>

        </div>
        <!--m-main-->
      </div>
      <!--swiper-slide-->

    </div>
    <!--swiperwrapper-->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
  <!--container-->

</section>


@endsection

@section('home')

<section class="side-main">
  <div class="s-container">
    <div class="category">
      <h2 class="s-head">探す</h2>
      <ul class="s-search">
        @foreach($categories as $category)
        <li class="category_nav">
          <a href="{{route ('product_list',['id' => $category->id] ) }}" class="category">
            {{$category->name_jp}}
          </a>
        </li>
        @endforeach
      </ul>
    </div>
    <!--cate-->
    <div class="ser-box">
      <h2 class="s-head">検索</h2>
      <form action="{{ url('/home/items/search/search')}}" method="get" class="form">
        @csrf
        <input type="search" class="search_input" name="product_name" placeholder="キーワード">
        <input type="submit" value="検索" class="search_btn">
      </form>
    </div>
    <!--d-box-->
  </div>
  <!--s-container-->

  <div class="m-container">
    <h2 class="s-head">最新</h2>
    <div class="items">
      <!--繰り返し DBからとりだしのを件数分ｸ返す-->
      @foreach($products as $product)
      <div class="item">
        <a class="product" href="{{ route ('single_product',['id' => $product->id] ) }}">
          <div class="p-img">
            <img alt="文字表示" src="{{ asset('/img/リサイズ黒.jpg') }}">
          </div>
          <div class="p-body">
            <div class="p-title">{{$product->product_name}}</div>
          </div>
          <div class="p-price">{{$product->price}}円</div>
        </a>
        <!--product-->
      </div>
      <!--item-->
      @endforeach
    </div>
    <!--items-->
    <div class="more">
      <p><a href="{{ route('new')}}">もっと見る</a></p>
    </div>
  </div>
  <!--m-container-->

</section>

@endsection