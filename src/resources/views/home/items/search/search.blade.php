@extends('layouts.l_temp')


@section('content')

@section('product_listcss')
<link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
@endsection




<section class="side-main">
  <div class="s-container">

    <div class="category">
      <h2 class="s-head">探す</h2>
      <ul class="s-search">
        @foreach($categories as $category)
        <li><a href="{{route ('product_list',['id' => $category->id])}}">
            {{$category->name_jp}}</a></li>
            @endforeach
      </ul>
    </div>
    <!--cate-->

    <div class="ser-box">
      <h2 class="s-head">検索</h2>
      <form action="{{ url('/home/items/search/search')}}" method="get" class="form">
        @csrf
        <input type="serach" name="product_name" placeholder="キーワード" class="search_input">
        <input type="submit" value="検索" class="search_btn">
      </form>
    </div>
    <!--d-box-->
  </div>
  <!--s-container-->

  <div class="m-container">
    @if ($search_products->isNotEmpty())
    <h2 class="s-head"><a href="{{ url('/home') }}">Home</a> ≫ {{$keyword_name}}</h2>
    <div class="items">
      <!--繰り返し DBからとりだしのを件数分ｸ返す-->
      @foreach($search_products as $product)
      <div class="item">
        <a class="product" href="{{route ('single_product', ['id' => $product->id] ) }}">
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
    @else
      <h2 class="s-head"><a href="{{ url('/home') }}">Home</a> ≫ {{$keyword_name}} ≫ 検索結果はありません。</h2>

    @endif
    <!--items-->
    <div class="more">
    </div>
  </div>
  <!--m-container-->

</section>
@endsection