@extends('User.Layouts.index')

@section('title', 'Главная - Arbor.ru')

@section('content')
<section class="py-5 first-slider container">
	<div class="row gx-lg-3 gx-xxl-4">
		<div class="col-lg-7 col-xl-8 mb-3 mb-lg-0">
			<div class="swiper-container swiper-banner mb-4 mb-lg-0 h-100">
				<div class="swiper-wrapper">
					
					@foreach ($banners as $item)
						<div class="swiper-slide">
							<div
								class="d-flex flex-column-reverse align-items-center text-center text-xl-start flex-xl-row linear rounded-30">
								<div>
									<h2 class="mb-3">{{ $item->title }}</h2>
									<p class="fs-5 mb-4">{{ $item->description }}</p>
									<a href="{{ $item->link }}" class="bttn bttn-lg">Подробнее</a>
								</div>
								<img src="{{ $item->image }}" alt="" />
							</div>
						</div>
					@endforeach
					
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<div class="col-lg-5 col-xl-4">
			
			@if(!empty($banner_addition->title) && !empty($banner_addition->description))
				<div class="h-100 d-flex flex-column justify-content-center rounded-30 bg-yellow p-4 p-md-5 p-lg-4 p-xxl-5">
					<h3 class="mb-4">{{ $banner_addition->title }}</h3>
					<p class="fs-5 mb-4">{{ $banner_addition->description }}</p>
					
					@if (!empty($banner_addition->link))
						<a href="{{ $banner_addition->link }}" class="roboto fs-5 fw-5 d-flex align-items-center">
							<span class="me-2">Читать подробнее</span>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M4.99988 12H18.9999" stroke="black" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" />
								<path d="M11.9999 5L18.9999 12L11.9999 19" stroke="black" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" />
							</svg>
						</a>
					@endif

				</div>
			@endif

		</div>
	</div>
</section>

@if ($categories->count())
  <section class="container py-5 categ-section">
    <h2 class="mb-4">Категории товаров</h2>
    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-4 text-center h4 fw-5">
      
      @foreach ($categories as $item)
        <div>
          <div class="rounded-30">
            <img class="w-100 h-100" src="{{ $item->image }}" alt="{{ $item->name }}" />
            <a href="{{ route('user.category', $item->slug) }}" class="p-3 w-100 start-0 bottom-0 position-absolute">{{ $item->name }}</a>
          </div>
        </div>
      @endforeach

    </div>
    <div class="text-center mt-4">
      <a href="{{ route('user.catalog') }}" class="bttn bttn-lg">Посмотреть ещё</a>
    </div>
  </section>
@endif

<section class="py-5 services-section bg-gray-light">
	<div class="container">
		<h2 class="h1 mb-3 mb-lg-5">Услуги</h2>
		<div class="row row-cols-md-2 mb-4 align-items-center">
			<div>
				<div class="rounded-30 position-relative text-center">
					<img class="w-100 h-100" src="img/images/service-1.jpeg" alt="" />
					<a href="{{ route('user.services') }}"
						class="translucent h4 m-0 p-3 w-100 start-0 bottom-0 position-absolute stretched-link fw-5">Распиловка</a>
				</div>
			</div>
			<div class="mt-3 text-center text-md-start">
				<p class="mb-4">
					Как выясняется, не очень просто найти прихожую, кухонный гарнитур, шкаф, или любую другую мебель,
					которая бы вам безоговорочно подошла. В особенности, это касается офисной мебели.
					И практически единственным решением в этом случае становится распил.
				</p>
				<a href="{{ route('user.services') }}" class="bttn bttn-lg">Подробнее</a>
			</div>
		</div>
		<div class="row row-cols-md-2 mb-4 text-center align-items-center flex-column-reverse flex-md-row">
			<div class="mt-3">
				<p class="mb-4">
					Кромление материалов необходимо для того, чтобы обеспечить защиту торца от попадания влаги и образования
					сколов. Проще говоря, любая деталь корпусной мебели будет изготовлена грамотно
					и примет эстетически приятный внешний вид.
				</p>
				<a href="{{ route('user.services') }}" class="bttn bttn-lg">Подробнее</a>
			</div>
			<div>
				<div class="rounded-30 position-relative">
					<img class="w-100 h-100" src="img/images/service-2.jpeg" alt="" />
					<a href="{{ route('user.services') }}"
						class="translucent h4 m-0 p-3 w-100 start-0 bottom-0 position-absolute stretched-link fw-5">Кромление</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="container py-5">
	<h2 class="h1 mb-4 mb-lg-5">О компании</h2>
	<div class="row row-cols-md-2 text-center align-items-center">
		<img class="mb-4" src="img/images/about.jpeg" alt="" />
		<div>
			<p class="mb-3">
				{{ $about_company->description }}
			</p>
			<p class="mb-4">
				Сложно сказать, почему интерактивные прототипы лишь добавляют фракционных разногласий и объявлены
				нарушающими общечеловеческие нормы этики и морали. Ясность нашей позиции очевидна:
				начало повседневной работы по формированию позиции позволяет выполнить важные задания по разработке
				стандартных подходов. Не следует, однако, забывать, что глубокий уровень погружения,
				в своём классическом представлении, допускает внедрение поэтапного и последовательного развития общества.
			</p>
			<a href="{{ route('user.about') }}" class="bttn bttn-lg">Подробнее</a>
		</div>
	</div>
</section>

@if ($news->count())
  <section class="news-section bg-gray-light py-5">
    <div class="container">
      <h2 class="h1 mb-5">Новости</h2>
      <div class="position-relative">
        <div class="swiper-container position-static swiper-news col-xxl-10">
          <div class="swiper-wrapper">

            @foreach ($news as $item)
              <div class="swiper-slide">
                <img class="w-100" src="{{ $item->image }}" alt="{{ $item->name }}" />
                <div class="py-2 px-3">
                  <a href="{{ route('user.news.item', $item) }}" class="d-block stretched-link m-0">{{ $item->name }}</a>
                  <time datetime="2021-03-09 18:41">{{ $item->date }}</time>
                </div>
              </div>
            @endforeach
            
          </div>
          <div class="swiper-button-prev">
            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M31.25 37.5L18.75 25L31.25 12.5" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </div>
          <div class="swiper-button-next">
            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.75 37.5L31.25 25L18.75 12.5" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </div>
        </div>
      </div>
      <div class="text-center">
        <a href="{{ route('user.news') }}" class="bttn bttn-lg mt-4">Все новости</a>
      </div>
    </div>
  </section>
@endif

<!-- CTA FORM -->
@include('User.Components.cta_form')
@endsection
