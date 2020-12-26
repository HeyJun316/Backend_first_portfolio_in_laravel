@extends('layouts.l_temp')
@section('registcss')
<link rel="stylesheet" href="{{ asset('css/regist.css') }}">
@endsection

@section('content')
<section class="resist">
    <div class="r-container">
        <div class="r-inner">
            <dl>
                <form method="post" action="{{ route('contact.confirm') }}">
                    @csrf
                    <div class="r-info">
                        <dt class="r-dt"><label for="email">
                                メールアドレス
                            </label>
                        </dt>
                        <dd>
                            <input type="text" name="email" value="{{ old('email') }}" class="input">
                            <br>
                            @if ($errors->has('email'))
                            <p class="error-message">{{ $errors->first('email') }}</p>
                            @endif
                        </dd>

                    </div>
                    <div class="r-info">
                        <dt class="r-dt"><label for="title">
                                タイトル
                            </label>
                        </dt>
                        <dd>
                            <input type="text" name="title" value="{{ old('title') }}" class="input">
                            <br>
                            @if ($errors->has('title'))
                            <p class="error-message">{{ $errors->first('title') }}</p>
                            @endif

                        </dd>
                    </div>
                    <div class="r-info">
                        <dt class="r-dt"><label for="title">
                                お問い合わせ
                            </label>
                        </dt>
                        <dd>
                            <textarea col="20" rows="3" name="body" class="textarea_size" wrap="hard">{{ old('body') }}</textarea>
                            <br>
                            @if ($errors->has('title'))
                            <p class="error-message">{{ $errors->first('body') }}</p>
                            @endif

                        </dd>
                    </div>
                    <button type="submit">
                        入力内容確認
                    </button>
                </form>


            </dl>
        </div>
    </div>
</section>

@endsection