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
        <div class="p-toggle">
          <dt class="a-click" date-target="syncer-acdb-01">*サイズ一覧<span class="a-icon"></span></dt>
          <dd class="a-contents">
            <div class="a-body">
              <table class="size-tb">
                <!-- table header -->
                <tbody class="size-tb-body">
                  <tr class="table_header">
                    <td class="header_info10">JP</td>
                    <td class="header_info30">24.5</td>
                    <td class="header_info20">25.0</td>
                    <td class="header_info30">25.5</td>
                    <td class="header_info20">26.0</td>
                    <td class="header_info30">26.5</td>
                    <td class="header_info20">27.0</td>
                    <td class="header_info30">27.5</td>
                    <td class="header_info20">28.0</td>
                    <td class="header_info30">28.5</td>
                    <td class="header_info20">29.0</td>
                  </tr>
                  <!-- us size -->
                  <tr class="row1">
                    <td class="data_info10">USA</td>
                    <td class="data_info30">6.5</td>
                    <td class="data_info20">7</td>
                    <td class="data_info30">7.5</td>
                    <td class="data_info20">8</td>
                    <td class="data_info30">8.5</td>
                    <td class="data_info20">9</td>
                    <td class="data_info30">9.5</td>
                    <td class="data_info20">10</td>
                    <td class="data_info30">10.5</td>
                    <td class="data_info20">11</td>
                  </tr>
                  <!-- uk size -->
                  <tr class="row1">
                    <td class="data_info10">UK</td>
                    <td class="data_info30">6</td>
                    <td class="data_info20">6.5</td>
                    <td class="data_info30">7</td>
                    <td class="data_info20">7.5</td>
                    <td class="data_info30">8</td>
                    <td class="data_info20">8.5</td>
                    <td class="data_info30">9</td>
                    <td class="data_info20">9.5</td>
                    <td class="data_info30">10</td>
                    <td class="data_info20">10.5</td>
                  </tr>
                  <!-- euro size -->
                  <tr class="row1">
                    <td class="data_info10">EU</td>
                    <td class="data_info30">39</td>
                    <td class="data_info20">40</td>
                    <td class="data_info30">41</td>
                    <td class="data_info20">42</td>
                    <td class="data_info30">-</td>
                    <td class="data_info20">43</td>
                    <td class="data_info30">-</td>
                    <td class="data_info20">44</td>
                    <td class="data_info30">-</td>
                    <td class="data_info20">45</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </dd>
        </div>
        <!--p-togggle-->
        <!-- @if($errors->has('message'))
        {{$errors->first('message')}}
        @endif -->
        <ul class="size_lists">
          <form action="{{route ('cart')}}" method="post" class="size">
            @csrf
            <input type="hidden" value="{{$products->id}}" name="product_id">
            @foreach($products->product_size as $sizes)
            <li class="size_list">
              <input type="radio" name="size" value="{{$sizes->size->id}}" class="radio" id="{{$sizes->size->id}}">
              <label for="{{$sizes->size->id}}">
                {{$sizes->size->size}}
              </label>
            </li>
            @endforeach
        </ul>
      </div>

      <div class="p-btn">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
        @endforeach
        @endif
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