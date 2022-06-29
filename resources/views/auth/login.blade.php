<x-guest-layout>
    <!-- header -->
    @include('layouts.header')

    <div class="form__wrap">
        <a href="{{ url('/') }}" class="contents"><img src="{{ asset('images/logo_front01.svg') }}" alt="logo_front01" srcset="" class="basic__logo"></a>
    <!-- error message -->
    <x-auth-validation-errors :errors="$errors" />
        <div class="wrap vertical_padding">
            <form action="{{ url('/login') }}" method="post" class="basic__form" enctype="multipart/form-data">
              @csrf
              <div class="basic__form--item">
                <label for="email" class="basic__form--label">メールアドレス</label><br>
                <input type="email" name="email" id="email" class="basic__form--input" value="{{ old('email') }}" placeholder="例) email@jmty.jp">
              </div>
              <div class="basic__form--item">
                <label for="password" class="basic__form--label">パスワード(半角英数字14文字以内)</label><br>
                <input type="password" name="password" id="password" class="basic__form--input" value="">
              </div>
              <div class="basic__form--item">
                <input type="submit" value="ログイン" class="basic__form--submit">
              </div>
            </form>
        </div>
    </div>
</x-guest-layout>
