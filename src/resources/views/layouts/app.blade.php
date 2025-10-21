<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeMarket</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Coachtech Logo">
                </a>
                <nav>
                    <ul class="header-nav">
                        @auth
                        <li class="header-nav__item">
                            <form class="form" action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">ログアウト</button>
                            </form>
                        </li>
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/mypage">マイページ</a>
                        </li>
                        @endauth
                        @yield('css')
                        <!-- これをindex.blade.phpの＠cssに入れる。@guest
                        <li class="header-nav__item">
                            {{-- ログインページのURLに置き換えてください --}}
                            <a class="header-nav__link" href="/login">ログイン</a>
                        </li>
                        {{-- 新規登録ボタンも必要な場合は、ここに含めてください --}}
                        {{-- 
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/register">新規登録</a>
                        </li>
                        --}}
                        @endguest -->
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>