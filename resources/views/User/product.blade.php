@extends('User.Layouts.index')

@section('title', 'Страница товара')
		
@section('content')
<div class="container mb-5">
	<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
			<li class="breadcrumb-item"><a href="catalogue.html">Каталог</a></li>
			<li class="breadcrumb-item"><a href="category.html">ЛДСП</a></li>
			<li class="breadcrumb-item active" aria-current="page">ЛДСП Мадейра (А) АРТЕКС 2750*1830*10</li>
		</ol>
	</nav>
	<h1 class="mb-4">{{ $product->name }} {{ $product->format }}</h1>
	<div class="row gx-xxl-5 mb-5 pe-xxl-5 justify-content-between align-items-start position-relative">
		<div class=" col-lg-6 mb-4">

			<!-- slider -->
			<div class="card-swiper d-flex justify-content-between mb-4">
				<div class="swiper-container gallery-thumbs card-gallery-thumbs me-2">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="{{ Storage::url($product->image) }}" alt="">
						</div>

            @foreach ($product->productImages as $item)
              <div class="swiper-slide"><img
                src="{{ Storage::url($item->image) }}" alt=""></div>
            @endforeach
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next swiper-button-white rounded-circle border bg-white">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 5L12 19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M19 12L12 19L5 12" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>
					<div class="swiper-button-prev swiper-button-white rounded-circle border bg-white">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 19V5" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M5 12L12 5L19 12" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>
				</div>
				<div class="swiper-container rounded-10 gallery-top card-gallery-top my-auto">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="{{ Storage::url($product->image) }}" alt="">
						</div>

            @foreach ($product->productImages as $item)
              <div class="swiper-slide"><img
                src="{{ Storage::url($item->image) }}" alt=""></div>
            @endforeach
					</div>
				</div>
			</div>
			<!-- slider -->

			<div class="mb-4">
				<h4 class="mb-3">Полное описание</h4>
				<div>{{ $product->description }}</div>
			</div>
			<div class="mb-4">
				<h4 class="mb-3">Услуга распиловки и кромления</h4>
				<div>Равным образом, постоянный количественный рост и сфера нашей активности в значительной степени
					обусловливает важность инновационных методов управления процессами.</div>
			</div>

			<legend class="fw-6 fs-6 mb-4">Выберите стороны для кромления и введите требуемые размеры плиты:</legend>
			<div class="d-flex flex-column-reverse align-items-start add-sawing-block">
				<!-- hidden element -->
				<div class="row row-cols-lg-2 mb-4 position-relative pt-5">
					<button class="position-absolute w-auto end-0 top-0">
						<span>Удалить</span>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M18 6L6 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M6 6L18 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</button>
					<div class="mb-3 mb-lg-0">
						<img class="rounded-10 w-100 h-100 bg-gray-light p-3" src="img/images/sawing.png" alt="">
					</div>
					<div class="d-flex flex-column">
						<fieldset class="form-check align-items-center mb-3">
							<input name="category" id="side-a" type="checkbox" class="form-check-input me-2">
							<label class="fw-6 me-4" for="side-a">a</label>
							<div class="position-relative flex-fill">
								<input class="form-control" type="text" placeholder="1605">
								<span class="position-absolute end-0 top-0 py-1 pe-3 text-muted">мм</span>
							</div>
						</fieldset>
						<fieldset class="form-check align-items-center mb-3">
							<input name="category" id="side-b" type="checkbox" class="form-check-input me-2">
							<label class="fw-6 me-4" for="side-b">b</label>
							<div class="position-relative flex-fill">
								<input class="form-control" type="text" placeholder="1605">
								<span class="position-absolute end-0 top-0 py-1 pe-3 text-muted">мм</span>
							</div>
						</fieldset>
						<fieldset class="form-check align-items-center mb-3">
							<input name="category" id="side-c" type="checkbox" class="form-check-input me-2">
							<label class="fw-6 me-4" for="side-c">c</label>
							<div class="position-relative flex-fill">
								<input class="form-control" type="text" placeholder="1605">
								<span class="position-absolute end-0 top-0 py-1 pe-3 text-muted">мм</span>
							</div>
						</fieldset>
						</fieldset>
						<fieldset class="form-check align-items-center mb-3">
							<input name="category" id="side-d" type="checkbox" class="form-check-input me-2">
							<label class="fw-6 me-4" for="side-d">d</label>
							<div class="position-relative flex-fill">
								<input class="form-control" type="text" placeholder="1605">
								<span class="position-absolute end-0 top-0 py-1 pe-3 text-muted">мм</span>
							</div>
						</fieldset>
						<div class="d-flex flex-wrap mt-auto">
							<label class="fw-6 me-4 align-items-center mb-2 mb-lg-0" for="">Количество деталей:</label>
							<div class="quantity-el d-flex align-items-center justify-content-between rounded-pill bg-orange px-3">
								<button class="p-0" type="button">
									<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M4.32568 8H13.659" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
								<input class="bg-transparent border-0 text-white text-center fw-6" type="number" value="1">
								<button class="p-0" type="button">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7.99951 3.33337V12.6667" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
										<path d="M3.3335 8H12.6668" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
							</div>
						</div>
					</div>
				</div>
				<button onclick="addInput(this)" class="fw-5 fs-5 c-accent roboto">
					<svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 5V19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M5 12H19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<span>Добавить деталь</span>
				</button>
			</div>
			<button class="bttn fs-6 d-flex mx-auto mt-5 py-3 px-5">Добавить к заказу</button>
		</div>
		<div class="col-lg-5 position-sticky top-0 start-0">
			<div class="shopping-sidebar py-4 py-xxl-5 fw-6 rounded-10">
				<div
					class="border-bottom d-flex flex-wrap justify-content-between p-3 pt-0 px-xl-4 px-xxl-5 text-muted fw-normal">
					<div class="me-3">Код: {{ $product->code }}</div>
					<div>В наличии: {{ $product->count }} штук</div>
				</div>
				<div class="mb-4 p-3 px-xl-4 px-xxl-5">
					<div class="h4 mb-3">Характеристики</div>
					<div class="d-flex justify-content-between mb-2 mb-lg-3">
						<div class="fw-normal">Формат:</div>
						<div>{{ $product->format }}</div>
					</div>
					<div class="d-flex justify-content-between mb-2 mb-lg-3">
						<div class="fw-normal">Толщина:</div>
						<div>{{ $product->thickness->name }}</div>
					</div>
					<div class="d-flex justify-content-between mb-2 mb-lg-3">
						<div class="fw-normal">Артикул:</div>
						<div>{{ $product->article }}</div>
					</div>
					<div class="d-flex justify-content-between">
						<div class="fw-normal">Производитель:</div>
						<div>{{ $product->manufacturer->name }}</div>
					</div>
				</div>
				<div>
					<div class="h4 mb-3 px-3 px-xl-4 px-xxl-5">Выбранные услуги</div>
					<div class="border-top p-3 px-xl-4 px-xxl-5">
						<div class="d-flex justify-content-between mb-4">
							<div>1 ДЕТАЛЬ</div>
							<div>х 12 шт.</div>
						</div>
						<div class="d-flex justify-content-between mb-4">
							<div class="fw-normal">Распиловка</div>
							<div>
								<div class="mb-1">a. 17 мм</div>
								<div class="mb-1">b. 20 мм</div>
								<div class="mb-1">c. 20 мм</div>
								<div>d. 17 мм</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<div class="fw-normal">Кромление</div>
							<div>
								<div>Стороны: a, b, c, d</div>
							</div>
						</div>
					</div>
					<div class="border-top p-3 px-xl-4 px-xxl-5">
						<div class="d-flex justify-content-between mb-4">
							<div>2 ДЕТАЛЬ</div>
							<div>х 5 шт.</div>
						</div>
						<div class="d-flex justify-content-between mb-4">
							<div class="fw-normal">Распиловка</div>
							<div>
								<div class="mb-1">a. 17 мм</div>
								<div class="mb-1">b. 20 мм</div>
								<div class="mb-1">c. 20 мм</div>
								<div>d. 17 мм</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<div class="fw-normal">Кромление</div>
							<div>
								<div>Стороны: a, b, c, d</div>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex flex wrap justify-content-between align-items-center px-3 px-xl-4 px-xxl-5 mt-2 mt-xxl-4">
					<div class="h4 fw-6 mb-3">{{ $product->price }} руб./шт</div>
					<a href="cart.html" class="bttn py-3 mb-3">В корзину</a>
				</div>
			</div>
		</div>
	</div>

	<section>
		<h2 class="h1 mb-4">Сопутствующие товары</h2>
		<div class="row row-cols-2 row-cols-lg-4 row-cols-xxl-6 g-2 g-xl-4 me-xxl-5">

      @foreach ($other as $item)
        <div class="position-relative">
          <div class="card">
            <img class="card-img-top"
              src="{{ Storage::url($item->image) }}"
              alt="{{ $item->name }}">
            <div class="card-body d-flex flex-column d-flex flex-column p-2 p-xxl-3 text-center">
              <a href="{{ route('user.product', [$category->slug, $item->slug]) }}" class="card-title stretched-link fw-6">{{ $item->name }}</a>
              <div class="card-subtitle">{{ $item->format }}</div>
              <div class="small text-muted text-end my-2">Код: {{ $item->code }}</div>
              <div class="fw-6 mb-3">{{ $item->price }} руб./шт</div>
              <div class="card-hov flex-column justify-content-between mt-auto">
                <div
                  class="rounded-pill px-2 px-lg-3 d-flex align-items-center justify-content-center border b-accent mb-2">
                  <button class="px-0">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M3.77246 8H13.1058" stroke="black" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </button>
                  <div>
                    <input class="bg-transparent border-0 text-center fw-6" type="number" value="1">
                  </div>
                  <button class="px-0">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.56055 3.33337V12.6667" stroke="black" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                      <path d="M3.89355 8H13.2269" stroke="black" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </button>
                </div>
                <button class="fs-6 bttn open-sans p-2 px-3">
                  <span>В корзину</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
			
		</div>
	</section>

</div>

<!-- CTA FORM -->
@include('User.Components.cta_form')
@endsection