@extends('layouts.l_temp')

@section('single_productcss')
<link rel="stylesheet" href="{{ asset('css/single_product.css') }}">
@endsection


@section('content')
<section class="product">

  <div class="p-inner">

    <div class="p-left swiper-container">
      <div class="main-img swiper-wrapper">
        <div class="swiper-slide">
          <img alt="文字表示" src="{{ asset($products->image) }}">
        </div>
        @foreach($products->images as $image)
        <div class="swiper-slide">
          <img alt="文字表示" src="{{ asset($image->image) }}">
        </div>
        @endforeach
      </div>
      <!--swiper-wrapper-->

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev swiper-button-black"></div>
      <div class="swiper-button-next swiper-button-black"></div>
      <!--main-img-->
      <div class="sub-img">
        <img alt="文字表示" src="{{ asset($products->image) }}">
        @foreach($products->images as $image)
        <img alt="文字表示" src="{{ asset($image->image) }}">
        @endforeach
      </div>
      <!--sub-image-->
    </div>
    <!--p-left swiper-container-->
    <div class="p-right">
      <div class="p-product">

        <div class="p-name">
          <p>{{$products->product_name}}

          </p>
        </div>
        <div class="p-price">
          <p>{{$products->price}}円</p>
        </div>
        <div class="p-describe">
          <p>{{$products->detail}}</p>
        </div>
      </div>


      <div class="p-size">
        <ul class="size_lists">
          <form action="{{route ('cart')}}" method="POST" class="size">
            @csrf
            <input type="hidden" value="{{$products->id}}" name="product_id">
            @foreach($products->product_size as $sizes)
            <li class="size_list">
              <input type="radio" name="size" value="{{$sizes->size->id}}" class="radio">
              {{$sizes->size->size}}
            </li>
            @endforeach
        </ul>
      </div>
      <div class="p-btn">
        @if(Auth::check())
        <input type="submit" name="cart" value="カートに入れる" class="btn cart_in">
        </form>
        @else
        <a href="{{url('home/member/login')}}">
          <input type="button" name="cart" value="カートに入れる" class="btn">
        </a>
        @endif
      </div>
    </div>
    <!--p-right-->
  </div>
  <!--p-inner-->
</section>

@endsection