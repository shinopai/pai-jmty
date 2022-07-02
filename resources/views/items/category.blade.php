<x-guest-layout>
  <!-- header -->
  @include('layouts.header')

  <!-- all items per category -->
  <div class="result__wrap wrap vertical_padding">
    <h1 class="result__title">カテゴリー{{ $category_name }}の投稿<span class="result__total">全{{ $items->total() }}件</span>
    </h1>

    <div class="result__list--wrap">
      <h2 class="result__list--title">投稿一覧</h2>
      <div class="result__contents--wrap">
        @forelse($items as $item)
        <div class="result__contents">
          <div class="result__contents--before">
            @if(MyFunc::isExistsItemImage($item->item_image))
            <a href="{{ route('users.items.show', ['user' => $item->user, 'item' => $item]) }}"><img src="{{ asset('storage/item/'.$item->item_image) }}" alt="{{ $item->name }}"></a>
            @else
            <a href="{{ route('users.items.show', ['user' => $item->user, 'item' => $item]) }}"><img src="{{ asset('images/dummy.png') }}" alt="{{ $item->name }}"></a>
            @endif
          </div>
          <div class="result__contents--middle">
            <h3 class="result__contents--title"><a href="{{ route('users.items.show', ['user' => $item->user, 'item' => $item]) }}" class="blue_link">{{ $item->name }}</a></h3>
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
    {{ $items->appends(request()->query())->links() }}
  </div>

  <!-- footer -->
  @include('layouts.footer')
</x-guest-layout>
