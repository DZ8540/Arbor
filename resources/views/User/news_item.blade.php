@extends('User.Layouts.index')

@section('title', 'Новость')

@section('content')
<div class="mb-5">
	<div class="container">
		<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
				<li class="breadcrumb-item"><a href="news.html">Новости</a></li>
				<li class="breadcrumb-item active" aria-current="page">Новое тиснение в Компании</li>
			</ol>
		</nav>

		<h2 class="h1 mb-4">{{ $news->name }}</h2>

		<div class="row">
			<!-- slider -->
			<div class="col-md-4 pe-xxl-5 mb-4">
				<!-- Swiper -->
				<div class="swiper-container position-relative gallery-top new-gallery-top mb-3 rounded-10">
					<div class="swiper-wrapper">

						<div class="swiper-slide">
							<img src="{{ Storage::url($news->image) }}" alt="{{ $news->name }}">
						</div>
						
						@foreach ($news->newsImages as $item)
							<div class="swiper-slide">
								<img src="{{ Storage::url($item->image) }}" alt="">
							</div>
						@endforeach

					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-white h-100 top-0 bottom-0 end-0 px-3 w-auto mt-0">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="swiper-button-prev swiper-button-white h-100 top-0 bottom-0 start-0 px-3 w-auto mt-0">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 18L9 12L15 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
				</div>
				<div class="swiper-container gallery-thumbs new-gallery-thumbs">
					<div class="swiper-wrapper w-100">

						<div class="swiper-slide">
							<img src="{{ Storage::url($news->image) }}" alt="{{ $news->name }}">
						</div>

						@foreach ($news->newsImages as $item)
							<div class="swiper-slide">
								<img src="{{ Storage::url($item->image) }}" alt="">
							</div>
						@endforeach
						
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="text-muted mb-3">{{ $news->dateForPage }}</div>
				<div>

					<p>{{ $news->description }}</p>

				</div>
				<a href="{{ route('user.news') }}" class="c-accent fw-5 fs-5 roboto">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M19 12L5 12" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M12 19L5 12L12 5" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span>К другим новостям</span>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection