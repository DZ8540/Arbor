@extends('User.Layouts.index')

@section('title', 'Новости')
		
@section('content')
<div class="container">

	{{ Breadcrumbs::render('news') }}

	<h2 class="h1 mb-5">Популярные новости</h2>
	<div class="position-relative">
		<div class="swiper-container position-static swiper-news col-xxl-10">
			<div class="swiper-wrapper">

        @foreach ($popularNews as $item)
          <div class="swiper-slide">
            <img class="w-100" src="{{ $item->image }}" alt="">
            <div class="py-2 px-3">
              <a href="{{ route('user.news.item', $item->slug) }}" class="d-block stretched-link m-0">{{ $item->name }}</a>
              <time datetime="2021-03-09 18:41">{{ $item->dateTime }}</time>
            </div>
          </div>
        @endforeach
				
			</div>
			<div class="swiper-button-prev">
				<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M31.25 37.5L18.75 25L31.25 12.5" stroke="black" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" />
				</svg>
			</div>
			<div class="swiper-button-next">
				<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18.75 37.5L31.25 25L18.75 12.5" stroke="black" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" />
				</svg>
			</div>
		</div>
	</div>

	<section class="company-news my-5">
		<h2 class="h1 mb-4 mb-lg-5">Новости компании</h2>

    <form action="{{ route('user.news') }}" id="newsForm" method="GET">
      <div class="border-bottom d-flex flex-column flex-md-row justify-content-between mb-5">
        <div class="w-100 news-filter d-flex align-items-start text-start fs-5 mb-3 mb-md-0" id="dates">
          <label class="active px-0 pb-2 pb-lg-4 me-3 text-start" role="button">
            <input type="radio" name="date" value="reset" @if ($date == 'reset') checked @endif class="d-none" />
            За всё время
          </label>
        </div>
        <div class="d-inline-flex">
          <select name="count" class="form-select border-0 w-auto" role="button">
            <option value="4">Показать по 4</option>
            <option value="8" @if ($count == 8) selected @endif>Показать по 8</option>
          </select>
        </div>
      </div>
    </form>
		<!-- new big preview -->

    <div id="news">
      @foreach ($news as $item)
        <div class="row mb-4">
          <div class="new-img col-lg-4 pe-xxl-4 mb-3 mb-lg-0">
            <img class="w-100 h-100 rounded-10" src="{{ $item->image }}" alt="">
          </div>
          <div class="col-sm-7 col-lg-8 d-flex flex-column pb-xxl-3">
            <span class="text-muted">{{ $item->date }}</span>
            <div class="mt-2 mt-xxl-5 mb-auto">
              <h5 class="fw-6 mb-xl-3">{{ $item->name }}</h5>
              <p>{{ $item->description }}</p>
            </div>
            <a href="{{ route('user.news.item', $item->slug) }}" class="c-accent fw-5 roboto">
              <span>Подробнее</span>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 5L19 12L12 19" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </a>
          </div>
        </div>
      @endforeach
    </div>

		<button class="bttn c-accent bg-transparent rounded-10 w-100 mt-4" id="showMore">Показать ещё</button>

		<!-- pagination -->
		{{ $news->links() }}

	</section>
</div>

<input type="hidden" value="{{ route('user.news') }}" id="currentPageLink">
<input type="hidden" value="{{ $date }}" id="currentDateFromInput">
<input type="hidden" value="{{ $count }}" id="currentCount">
@endsection

@section('scripts')
<script src="{{ asset('js/User/news.js') }}"></script>
@endsection