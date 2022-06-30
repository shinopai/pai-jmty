<x-guest-layout>
  <!-- header -->
  @include('layouts.header')

  <!-- search result -->
  <div class="result__wrap wrap vertical_padding">
    <h1 class="result__title">「{{ $search_word }}」の{{ $category }}<span class="result__total">全{{ $items->total() }}件</span>
    </h1>
    <div class="search__list--category">
      <dl class="search__list--title">
        カテゴリー:
      </dl>
      <dd class="search__list--contents">
        <ul class="search__list--wrap">
          @foreach($categories as $category)
          @if($category->id == $category_id)
          <li class="search__list--item active">{{ $category->name }}</li>
          @else
          <li class="search__list--item"><a href="{{ url('/search?keyword='.$search_word.'?category_id='.$category->id) }}" class="blue_link">{{ $category->name }}</a></li>
          @endif
          @endforeach
        </ul>
      </dd>
    </div>

    <div class="result__list--wrap">
      <h2 class="result__list--title">「{{ $search_word }}」の投稿一覧</h2>
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
</x-guest-layout>
