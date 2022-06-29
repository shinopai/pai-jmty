<x-app-layout>
  <!-- header -->
  @include('layouts.header')

  <!-- main -->
  <!-- main visual -->
  <div id="front__mainvisual">
    <div class="wrap vertical_padding">
      <a href="{{ url('/') }}" class="link_wrap"><img src="{{ asset('images/logo_front01.svg') }}" alt="logo_front01" srcset="" class="basic__logo"></a>
      <form action="#" method="get" class="basic__searchform">
        <dl class="basic__searchcontents">
          <dt><input type="text" name="search" value="" placeholder="何をお探しですか？" class="basic__searchinput" /></dt>
          <dd><button class="basic__searchbutton">検索</button></dd>
        </dl>
      </form>
      <p class="front__maintitle--large">必要なものを必要な人へ</p>
      <p class="front__maintitle--small">あなたのいらないが誰かの役に立つ</p>
    </div>
  </div>

  <!-- flash message -->
  <x-flash-message />

  <!-- new arrival -->
  <section>
    <div class="wrap vertical_padding">
      <div class="new__header flex">
        <div>
          <span class="new__label">PICK UP</span>
          <span class="new__label--after"></span>
          <h2 class="section_heading">無料でお譲りできるものの新着情報</h2>
        </div>
        <a href="" class="blue_link">無料の新着をもっと見る</a>
      </div>
      <div class="new__contents--wrap flex">
        @forelse($free_items as $item)
        <a href="{{ route('users.items.show', ['user' => $item->user, 'item' => $item]) }}" class="contents">
          <div class="new__contents">
            <figure class="new__figure">
              <img src="{{ asset('images/'.$item->item_image) }}" alt="{{ $item->name }}">
              <figcaption>
                <span>{{ $item->user->place }}</span>
                <span>{{ $item->price }}円</span>
              </figcaption>
            </figure>
          </div>
        </a>
        @empty
        <p>まだ商品はありません</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- categories -->
  <section>
    <div class="wrap vertical_padding">
      <h2 class="section_heading">カテゴリーを選択</h2>
      <hr class="basic__hr">
      <div class="category__contents--wrap flex">
        @foreach($categories as $category)
        <div class="category__contents">
          <h3 class="category__title"><a href="" class="basic_link">{{ $category->name }}</a></h3>
          <span class="category__number">12345件</span>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- footer -->
  @include('layouts.footer')
</x-app-layout>
