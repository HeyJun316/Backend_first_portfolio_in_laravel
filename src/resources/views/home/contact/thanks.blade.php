@extends('layouts.l_temp')
@section('cartcss')
<link rel="stylesheet" href="{{ asset('css/delete_conf.css') }}">
@endsection

@section('content')
@csrf
<h1>{{ __('送信完了') }}</h1>
@endsection