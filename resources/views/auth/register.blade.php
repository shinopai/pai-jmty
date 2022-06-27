<x-guest-layout>
    <!-- header -->
    @include('layouts.header')

    <div class="form__wrap">
        <a href="{{ url('/') }}" class="contents"><img src="{{ asset('images/logo_front01.svg') }}" alt="logo_front01" srcset="" class="basic__logo"></a>
        <div class="wrap vertical_padding">
            <form action="{{ url('/register') }}" method="post" class="basic__form" enctype="multipart/form-data">
              @csrf
              <div class="basic__form--item">
                <label for="name" class="basic__form--label">ニックネーム(10文字以内)</label><br>
                <input type="text" name="name" id="name" class="basic__form--input" value="{{ old('name') }}" placeholder="例) ジモティー">
              </div>
              <div class="basic__form--item">
                <label for="email" class="basic__form--label">メールアドレス</label><br>
                <input type="email" name="email" id="email" class="basic__form--input" value="{{ old('email') }}" placeholder="例) email@jmty.jp">
              </div>
              <div class="basic__form--item">
                <label for="password" class="basic__form--label">パスワード(半角英数字14文字以内)</label><br>
                <input type="password" name="password" id="password" class="basic__form--input" value="">
              </div>
              <div class="basic__form--item">
                <label for="profile_image" class="basic__form--label">プロフィール画像</label><br>
                <input type="file" name="profile_image" id="profile_image" class="basic__form--input" value="">
              </div>
              <div class="basic__form--item">
                <label for="place" class="basic__form--label">居住地</label><br>
                <select name="place" id="place" class="basic__form--select">
                    <option value="" selected>都道府県</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select>
              </div>
              <div class="basic__form--item">
                <input type="submit" value="無料会員登録" class="basic__form--submit">
              </div>
            </form>
            <p>会員登録されている方は<a href="{{ route('login') }}" class="blue_link">こちら</a>からログインしてください</p>
        </div>
    </div>
</x-guest-layout>
