<header class="header01">
    <a href="index"><img class="logo" src="storage/img/logo.png"></a>

    <nav class="header01-nav">
        <ol class="header01-list">
            <li class="header01-item">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a class="auth_link" href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a class="auth_link" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a></li>

                        @if (Route::has('register'))
                            <li><a class="auth_link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">会員登録</a></li>
                        @endif
                    @endauth
                </div>
            @endif
            </a></li>
        </ol>
    </nav>
</header>