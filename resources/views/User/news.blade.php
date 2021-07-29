@extends('User.Layouts.index')

@section('title', 'Новости')
		
@section('content')
<div class="container">
	<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
			<li class="breadcrumb-item active" aria-current="page">Новости</li>
		</ol>
	</nav>
	<h2 class="h1 mb-5">Популярные новости</h2>
	<div class="position-relative">
		<div class="swiper-container position-static swiper-news col-xxl-10">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img class="w-100" src="img/images/news-1.jpeg" alt="">
					<div class="py-2 px-3">
						<a href="new.html" class="d-block stretched-link m-0">Распродажа выставочных образцов</a>
						<time datetime="2021-03-09 18:41">18:41 9.03</time>
					</div>
				</div>
				<div class="swiper-slide">
					<img class="w-100" src="img/images/categ-3.jpeg" alt="">
					<div class="py-2 px-3">
						<a href="new.html" class="d-block stretched-link m-0">Заголовок новости или акции</a>
						<time datetime="2021-03-09 18:41">18:41 9.03</time>
					</div>
				</div>
				<div class="swiper-slide">
					<img class="w-100" src="img/images/news-1.jpeg" alt="">
					<div class="py-2 px-3">
						<a href="new.html" class="d-block stretched-link m-0">Распродажа выставочных образцов</a>
						<time datetime="2021-03-09 18:41">18:41 9.03</time>
					</div>
				</div>
				<div class="swiper-slide">
					<img class="w-100" src="img/images/categ-3.jpeg" alt="">
					<div class="py-2 px-3">
						<a href="new.html" class="d-block stretched-link m-0">Заголовок новости или акции</a>
						<time datetime="2021-03-09 18:41">18:41 9.03</time>
					</div>
				</div>
				<div class="swiper-slide">
					<img class="w-100" src="img/images/news-1.jpeg" alt="">
					<div class="py-2 px-3">
						<a href="new.html" class="d-block stretched-link m-0">Распродажа выставочных образцов</a>
						<time datetime="2021-03-09 18:41">18:41 9.03</time>
					</div>
				</div>
				<div class="swiper-slide">
					<img class="w-100" src="img/images/categ-3.jpeg" alt="">
					<div class="py-2 px-3">
						<a href="new.html" class="d-block stretched-link m-0">Заголовок новости или акции</a>
						<time datetime="2021-03-09 18:41">18:41 9.03</time>
					</div>
				</div>
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
		<div class="border-bottom d-flex flex-column flex-md-row justify-content-between mb-5">
			<div class="w-100 news-filter d-flex align-items-start text-start fs-5 mb-3 mb-md-0">
				<button class="active px-0 pb-2 pb-lg-4 me-3 text-start">За всё время</button>
				<button class=" pb-2 pb-lg-4 px-0 me-3 text-start">2021</button>
				<button class=" pb-2 pb-lg-4 px-0 me-3 text-start">2020</button>
				<button class=" pb-2 pb-lg-4 px-0 me-3 text-start">2019</button>
			</div>
			<div class="d-inline-flex">
				<select name="" id="" class="form-select border-0 w-auto">
					<option value="">Показать по 4</option>
					<option value="">Показать по 8</option>
				</select>
			</div>
		</div>
		<!-- new big preview -->
		<div class="row mb-4">
			<div class="new-img col-lg-4 pe-xxl-4 mb-3 mb-lg-0">
				<img class="w-100 h-100 rounded-10" src="img/images/production-1.jpg" alt="">
			</div>
			<div class="col-sm-7 col-lg-8 d-flex flex-column pb-xxl-3">
				<span class="text-muted">9 марта 2021</span>
				<div class="mt-2 mt-xxl-5 mb-auto">
					<h5 class="fw-6 mb-xl-3">Новое тиснение в Компании</h5>
					<p>Равным образом, постоянный количественный рост и сфера нашей активности в значительной степени
						обусловливает важность инновационных методов управления процессами. Для современного мира укрепление
						и развитие внутренней структуры
						прекрасно подходит для реализации своевременного выполнения сверхзадачи. Безусловно, внедрение современных
						методик создаёт необходимость включения в производственный план целого ряда внеочередных мероприятий
						с учётом комплекса
						первоочередных требований.
					</p>
				</div>
				<a href="new.html" class="c-accent fw-5 roboto">
					<span>Подробнее</span>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M12 5L19 12L12 19" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
							stroke-linejoin="round" />
					</svg>
				</a>
			</div>
		</div>

		<button class="bttn c-accent bg-transparent rounded-10 w-100 mt-4">Показать ещё</button>
		<!-- pagination -->
		<nav class="fs-20 fw-5 mt-4 mt-lg-5 roboto" aria-label="Навигация по страницам объявлений аукциона">
			<ul class="pagination justify-content-center flex-wrap">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1" aria-disabled="true">
						<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7 13L1 7L7 1" stroke="#4D2077" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</a>
				</li>
				<li class="page-item active"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">4</a></li>
				<li class="page-item"><a class="page-link" href="#">...</a></li>
				<li class="page-item"><a class="page-link" href="#">6</a></li>
				<li class="page-item">
					<a class="page-link" href="#">
						<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 13L7 7L1 1" stroke="#4D2077" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</a>
				</li>
			</ul>
		</nav>
	</section>
</div>
@endsection