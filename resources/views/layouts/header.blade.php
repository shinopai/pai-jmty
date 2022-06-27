<header>
  <nav class="header__nav">
    <div class="header__inner wrap">
      <div class="header__flex--wrap flex">
      <div class="header__flex--item"><h1 class="header__title">地元の掲示板 ジモティー</h1></div>
      @if(!MyFunc::isLoginOrRegister())
      <div class="header__flex--item">
        <ul class="header__flex--menu">
          <li>24962232件&nbsp;06/27更新</li>
          <li><a href="{{ url('/') }}" class="header__basiclink">地元の掲示板 ジモティー</a></li>
          <li><a href="{{ route('login') }}" class="header__loginlink blue_link">ログイン</a></li>
          <li><a href="{{ route('register') }}" class="header__registerlink">会員登録</a></li>
        </ul>
      </div>
      @endif
      </div>
    </div>
  </nav>
</header>
