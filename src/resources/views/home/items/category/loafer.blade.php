@extends('layouts.l_temp')

@section('product_listcss')
  <link rel="stylesheet" href="{{ asset('css/product_list.css') }}">
@endsection

@section('content')
  <section class="side-main">
    <div class="s-container">

    <div class="category">
      <h2 class="s-head">探す</h2>
      <ul class="s-search">
        <li><a href="">{{$categories[0]->name_jp}}</a></li>
        <li><a href="">{{$categories[1]->name_jp}}</a></li>
        <li><a href="">{{$categories[2]->name_jp}}</a></li>
        <li><a href="">{{$categories[3]->name_jp}}</a></li>
      </ul>
    </div>
      <!--cate-->

      <div class="ser-box">
        <h2 class="s-head">検索</h2>
        <input type="serach" placeholder="キーワード">
      </div>
      <!--d-box-->
    </div>
    <!--s-container-->
    <div class="m-container">
      <h2 class="s-head"><a href="">Home</a> ≫ <a href="">Loafer</a></h2>
    <!--カテゴリーごとの名前に↑-->
      <div class="items">
        @foreach($products as $product)
        <div class="item">
          <a class="product" href="">
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

  {{$products->links()}}

</div>
    </div>
    <!--m-container-->

  </section>
  @endsection