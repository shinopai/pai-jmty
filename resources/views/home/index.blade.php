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
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
        <div class="new__contents">
          <figure class="new__figure">
              <img src="{{ asset('images/dummy.png') }}">
              <figcaption>
                <span>name</span>
                <span>0円</span>
              </figcaption>
          </figure>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
