@extends('layouts.l_temp')

@section('single_productcss')
<link rel="stylesheet" href="{{ asset('css/single_product.css') }}">
@endsection


@section('content')
<section class="product">

  <div class="p-inner">
    <div class="p-left">
      <div class="main-img">
        <img alt="文字表示" src="{{ asset('/img/最新4.jpg') }}">

      </div>
      <!--main-img-->
      <div class="sub-img">
        <img alt="文字表示" src="{{ asset('/img/リサイズ2.png') }}">
        <img alt="文字表示" src="{{ asset('/img/リサイズ2.png') }}">
        <img alt="文字表示" src="{{ asset('/img/リサイズ2.png') }}">
        <br>
        <img alt="文字表示" src="{{ asset('/img/リサイズ2.png') }}">
        <img alt="文字表示" src="{{ asset('/img/リサイズ2.png') }}">
        <img alt="文字表示" src="{{ asset('/img/リサイズ2.png') }}">


      </div>
      <!--sub-image-->

    </div>
    <!--p-left-->


    <div class="p-right">
      <div class="p-product">

        <div class="p-name">
          <p>{{$product_name}}
          </p>
        </div>
        <div class="p-price">
          <p>{{$price}}円</p>
        </div>
        <div class="p-describe">
          <p>{{$detail}}</p>
        </div>
      </div>


      <div class="p-size">
        <ul class="size_lists">
          <form action="{{route ('cart')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$product_id}}" name="product_id">
            @foreach($size_id as $size)


            <li class="size_list">
              <input type="radio" name="size" value="{{$size->size}}" class="radio">
              {{$size->size}}
            </li>
            @endforeach
          </ul>
        </div>
        @if(Auth::check())
        <div class="p-btn">
          <input type="submit" name="cart" value="カートに入れる" class="btn">
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