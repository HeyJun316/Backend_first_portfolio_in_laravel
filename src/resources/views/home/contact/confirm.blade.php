@extends('layouts.l_temp')
@section('usercss')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection

@section('content')
<section class="resist">
    <div class="r-container">
        <div class="r-inner">
            <dl>
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="r-info">
                        <dt class="r-dt">
                            <label for="email">メールアドレス</label>
                        </dt>
                        <dd class="input">
                            {{ $inputs['email'] }}
                            <input name="email" value="{{ $inputs['email'] }}" type="hidden" class="input">
                        </dd>
                    </div>

                    <div class="r-info">
                        <dt class="r-dt">
                            <label>タイトル</label>
                        </dt>
                        <dd class="input">
                            {{ $inputs['title'] }}
                            <input name="title" value="{{ $inputs['title'] }}" type="hidden">
                        </dd>
                    </div>

                    <div class="r-info">
                        <dt class="r-dt">
                            <label>お問い合わせ内容</label>
                        </dt>
                        <dd class="input textarea">
                            {!! nl2br(e($inputs['body'])) !!}
                            <input name="body" value="{{ $inputs['body'] }}" type="hidden">
                        </dd>
                    </div>

                    <button type="submit" name="action" value="back">
                        入力内容修正
                    </button>
                    <button type="submit" name="action" value="submit">
                        送信する
                    </button>
                </form>
            </dl>
        </div>
    </div>
</section>

@endsection