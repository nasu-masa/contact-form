<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;700&display=swap">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a  class="header__logo" href="/">
                Contact Form
            </a>

        <nav class="header-nav">
            <ul class="nav-list">
                    @guest
                    <li class="nav-list__item">
                        <a href="/register" class="nav-list__register">会員登録</a>
                    </li>
                    <li class="nav-list__item">
                        <a href="/login" class="nav-list__login">ログイン</a>
                    </li>
                    @endguest
                    @if (Auth::check())
                    <li class="nav-list__item">
                        <a href="/contact" class="nav-list__contact">お問い合わせ</a>
                    </li>
                    <li>
                        <form class="nav-list__button" action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="logout-button" >ログアウト</button>
                        </form>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>