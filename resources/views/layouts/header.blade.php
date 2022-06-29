<header>
  <nav class="header__nav">
    <div class="header__inner wrap">
      <div class="header__flex--wrap flex">
      <div class="header__flex--item"><h1 class="header__title">地元の掲示板 ジモティー</h1></div>
      @if(!MyFunc::isLoginOrRegister())
      <div class="header__flex--item">
        <ul class="header__flex--menu">
          <li>{{ $total_items }}件&nbsp;06/27更新</li>
          <li><a href="{{ url('/') }}" class="header__basiclink">地元の掲示板 ジモティー</a></li>
          @auth
          <li><a href="{{ route('users.profile', ['user' => Auth::id()]) }}" class="header__loginlink blue_link">マイページ</a></li>
          <li><a href="{{ route('users.items.create', ['user' => Auth::id()]) }}" class="header__postlink">投稿する</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}" id="logout_form">
              @csrf
            </form>
            <a href="" class="header__registerlink" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">ログアウト</a>
          </li>
          @else
          <li><a href="{{ route('login') }}" class="header__loginlink blue_link">ログイン</a></li>
          <li><a href="{{ route('register') }}" class="header__registerlink">会員登録</a></li>
          @endauth
        </ul>
      </div>
      @endif
      </div>
    </div>
  </nav>
</header>
