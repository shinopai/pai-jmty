<x-guest-layout>
  <!-- header -->
  @include('layouts.header')

  <!-- user profile -->
  <div class="profile__wrap wrap vertical_padding">
    <h1 class="profile__title">{{ $user->nickname }}さんのプロフィール</h1>
    <div class="profile__inner">
      <div class="profile__before">
        <div class="flex">
          @if(MyFunc::isExistsProfileImage($user->profile_image))
          <img src="{{ asset('storage/profile/'.$user->profile_image) }}" alt="{{ $user->nickname }}" srcset="" class="profile__image">
          @else
          <img src="{{ asset('images/profile.png') }}" alt="{{ $user->nickname }}" srcset="" class="profile__image">
          @endif
          @empty($user->comment)
          <p class="profile__text--comment plane">自己紹介文が入力されていません。</p>
          @else
          <p class="profile__text--comment">{{ $user->comment }}</p>
          @endempty
        </div>
      </div>
      <div class="profile__after">
        <dl class="profile__someinfo">
          <dt>ニックネーム</dt>
          <dd>{{ $user->nickname }}</dd>
          <dt>登録日時</dt>
          <dd>{{ $user->created_at->format('Y/m/d') }}</dd>
          <dt>居住地</dt>
          <dd>{{ $user->place }}</dd>
        </dl>
      </div>
    </div>
    <p>投稿・評価一覧</p>
  </div>
</x-guest-layout>
