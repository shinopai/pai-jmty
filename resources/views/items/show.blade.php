<x-guest-layout>
  <!-- header -->
  @include('layouts.header')

  <!-- item detail -->
  <div class="itemdetail__wrap vertical_padding">
    <div class="itemdetail__before">
      <h1 class="itemdetail__title">{{ $item->name }}</h1>
      <span class="itemdetail__id">(投稿ID: {{ $item->id }})</span>
      <img src="{{ asset('images/'.$item->item_image) }}" alt="{{ $item->name }}" srcset="" class="itemdetail__image">
      <p class="itemdetail__text--comment">{{ $item->comment }}</p>
    </div>
    <div class="itemdetail__after">
      <div id="like_area"></div>
      <p class="itemdetail__text--date">更新{{ $item->updated_at->format('Y年m月d日 H時i分') }}</p>
      <p class="itemdetail__text--date">作成{{ $item->created_at->format('Y年m月d日 H時i分') }}</p>
      <dl class="itemdetail__someinfo">
        <dt>価格</dt>
        <dd>{{ number_format($item->price) }}円</dd>
        <dt>取引場所</dt>
        <dd>{{ $item->user->place }}</dd>
        <dt>ジャンル</dt>
        <dd>{{ $item->category->name }}</dd>
        <dt>投稿者</dt>
        <dd><a href="{{ route('users.profile', ['user' => $user]) }}" class="blue_link">{{ $user->nickname }}</a></dd>
        <dd>投稿:{{ $user->items->count() }}</dd>
      </dl>
      <p class="itemdetail__text--usercomment">{{ $user->comment }}</p>
    </div>
  </div>
</x-guest-layout>

<script>
  // vs code上はエラーになってるけど、変数はvueに渡ってるので問題無し
  var itemId = @json($item->id);
</script>
