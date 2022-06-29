<x-guest-layout>
  <!-- header -->
  @include('layouts.header')

  <div class="form__wrap">
    <a href="{{ url('/') }}" class="contents"><img src="{{ asset('images/logo_front01.svg') }}" alt="logo_front01" srcset="" class="basic__logo"></a>
    <!-- error message -->
    <x-auth-validation-errors :errors="$errors" />
    <div class="wrap vertical_padding">
      <form action="{{ route('users.items.store', ['user' => $user]) }}" method="post" class="basic__form" enctype="multipart/form-data">
        @csrf
        <div class="basic__form--item">
          <label for="name" class="basic__form--label">商品名(50文字以内)</label><br>
          <input type="text" name="name" id="name" class="basic__form--input" value="{{ old('name') }}" placeholder="例) ジモティーバイク">
        </div>
        <div class="basic__form--item">
          <label for="item_image" class="basic__form--label">商品画像</label><br>
          <input type="file" name="item_image" id="item_image" class="basic__form--input" value="">
        </div>
        <div class="basic__form--item">
          <label for="price" class="basic__form--label">価格</label><br>
          <input type="number" name="price" id="price" class="basic__form--input" value="{{ old('price') }}" placeholder="例) 1000円" min="0" max="999999999">
        </div>
        <div class="basic__form--item">
          <label for="comment" class="basic__form--label">コメント(300文字以内)</label><br>
          <textarea name="comment" id="comment" class="basic__form--textarea" placeholder="例) 引っ越しの為、整理します。使用頻度は低かったので状態は良いです。" rows="10">{{ old('comment') }}</textarea>
        </div>
        <div class="basic__form--item">
          <label for="category_id" class="basic__form--label">カテゴリー</label><br>
          <select name="category_id" id="category_id" class="basic__form--select">
            <option value="" selected>カテゴリー</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="basic__form--item">
          <input type="submit" value="投稿" class="basic__form--submit">
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>
