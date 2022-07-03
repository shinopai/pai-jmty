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
    <div class="result__contents--wrap vertical_padding">
      <h2 class="result__list--title">投稿一覧</h2>
      @forelse($user->items as $item)
      <div class="result__contents">
        <div class="result__contents--before">
          @if(MyFunc::isExistsItemImage($item->item_image))
          <a href="{{ route('users.items.show', ['user' => $user, 'item' => $item]) }}"><img src="{{ asset('storage/item/'.$item->item_image) }}" alt="{{ $item->name }}"></a>
          @else
          <a href="{{ route('users.items.show', ['user' => $user, 'item' => $item]) }}"><img src="{{ asset('images/dummy.png') }}" alt="{{ $item->name }}"></a>
          @endif
        </div>
        <div class="result__contents--middle">
          <h3 class="result__contents--title"><a href="{{ route('users.items.show', ['user' => $user, 'item' => $item]) }}" class="blue_link">{{ $item->name }}</a></h3>
          <span class="result__contents--price">{{ number_format($item->price) }}円</span>
          <span class="result__contents--place">{{ $item->user->place }}</span>
          <span class="result__contents--category">{{ $item->category->name }}</span>
          <p class="result__contents--comment">
            {{ MyFunc::characterLimit($item->comment) }}
          </p>
        </div>
        <div class="result__contents--after">
          <p class="result__contents--date updated">更新{{ $item->updated_at->format('m月d日') }}</p>
          <p class="result__contents--date created">作成{{ $item->created_at->format('m月d日') }}</p>
        </div>
      </div>
      @empty
      <p>投稿はありません</p>
      @endforelse
    </div>
  </div>
</x-guest-layout>
