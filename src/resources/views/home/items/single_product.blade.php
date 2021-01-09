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
              <table border="1" class="size-tb" >
                <!-- table header -->
                <tbody class="size-tb-body">
                  <tr class="table_header">
                    <td class="header_infojp" sytle="border: 1px solid black">JP</td>
                    <td class="header_infojp" sytle="border: 1px solid black">24.5</td>
                    <td class="header_infojp" sytle="border: 1px solid black">25.0</td>
                    <td class="header_infojp" sytle="border: 1px solid black">25.5</td>
                    <td class="header_infojp" sytle="border: 1px solid black">26.0</td>
                    <td class="header_infojp" sytle="border: 1px solid black">26.5</td>
                    <td class="header_infojp" sytle="border: 1px solid black">27.0</td>
                    <td class="header_infojp" sytle="border: 1px solid black">27.5</td>
                    <td class="header_infojp" sytle="border: 1px solid black">28.0</td>
                  </tr>
                  <!-- us size -->
                  <tr class="row1">
                    <td class="data_infous">USA</td>
                    <td class="data_infous">6.5</td>
                    <td class="data_infous">7</td>
                    <td class="data_infous">7.5</td>
                    <td class="data_infous">8</td>
                    <td class="data_infous">8.5</td>
                    <td class="data_infous">9</td>
                    <td class="data_infous">9.5</td>
                    <td class="data_infous">10</td>
                  </tr>
                  <!-- uk size -->
                  <tr class="row1">
                    <td class="data_info">UK</td>
                    <td class="data_info">6</td>
                    <td class="data_info">6.5</td>
                    <td class="data_info">7</td>
                    <td class="data_info">7.5</td>
                    <td class="data_info">8</td>
                    <td class="data_info">8.5</td>
                    <td class="data_info">9</td>
                    <td class="data_info">9.5</td>
                  </tr>
                  <!-- euro size -->
                  <tr class="row1">
                    <td class="data_infoeu">EU</td>
                    <td class="data_infoeu">39</td>
                    <td class="data_infoeu">40</td>
                    <td class="data_infoeu">41</td>
                    <td class="data_infoeu">42</td>
                    <td class="data_infoeu">-</td>
                    <td class="data_infoeu">43</td>
                    <td class="data_infoeu">-</td>
                    <td class="data_infoeu">44</td>
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