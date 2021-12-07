@extends('User.Layouts.index')

@section('title', 'Корзина')
		
@section('content')
<div class="container mb-5 cart-page">
	<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
			<li class="breadcrumb-item active" aria-current="page">Корзина</li>
		</ol>
	</nav>
	<h1 class="mb-4">Корзина</h1>
  @foreach ($cart['products'] as $item_key => $item)
    <div
      class="d-flex flex-column flex-lg-row align-items-center align-items-md-start justify-content-xxl-between mb-4 border-bottom pb-4">
      <div class="img mb-3 mb-md-0">
        <img src="{{ Storage::url($item->image) }}"
          class="w-100 h-100 rounded-10" alt="{{ $item->name }}">
      </div>
      <div class="flex-fill">
        <div
          class="d-flex flex-column flex-lg-row flex-fill align-items-center align-items-lg-start text-center text-lg-start">
          <div class="info">
            <a href="{{ route('user.product', [$item->category->slug, $item->slug]) }}" class="h4 fw-6">{{ $item->name }} {{ $item->format }}</a>
            <div class="text-dark fs-5">Код: {{ $item->code }}</div>
          </div>
          <div class="amount my-3 my-md-0">
            <div
              class="quantity-el mx-auto mx-md-0 d-flex align-items-center justify-content-between rounded-pill bg-orange px-3">
              <form action="{{ route('user.cart.remove', $item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="p-0" type="button">
                  <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.32568 8H13.659" stroke="white" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </button>
              </form>
              <input class="bg-transparent border-0 text-white text-center fw-6" type="number" value="{{ $item->cart_count }}">
              <form action="{{ route('user.cart.add', $item->id) }}" method="POST">
                @csrf
                <button type="submit" class="p-0" type="button">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.99951 3.33337V12.6667" stroke="white" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                    <path d="M3.3335 8H12.6668" stroke="white" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </button>
              </form>
            </div>
          </div>
          <div class="total">
            <div class="h4 fw-6">{{ $item->price }} руб.</div>
            <div class="fs-5">цена за 1 шт.</div>
          </div>
          <form action="{{ route('user.cart.delete', $item->id) }}" method="POST" class="delete mt-3 mt-md-0 d-flex justify-content-xl-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="">
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10.0007 31.6667C10.0007 33.5 11.5007 35 13.334 35H26.6673C28.5007 35 30.0007 33.5 30.0007 31.6667V11.6667H10.0007V31.6667ZM31.6673 6.66667H25.834L24.1673 5H15.834L14.1673 6.66667H8.33398V10H31.6673V6.66667Z"
                  fill="#323232" />
              </svg>
            </button>
          </form>
        </div>
        @foreach ($item->services as $key => $item)
          <div class="d-flex flex-column flex-lg-row flex-fill align-items-start">
            <div class="info">
              <div class="h4 mb-2 fw-6 mt-2">Выбранные услуги</div>
              <div class="fs-5 fw-6 mb-4">{{ $key + 1 }} ДЕТАЛЬ</div>
              <div class="fw-6 fs-5 mb-3">Распиловка</div>
              <ul class="list-unstyled mb-4">
                <li class="mb-1">a. {{ $item->sides->sideA }} мм</li>
                <li class="mb-1">b. {{ $item->sides->sideB }} мм</li>
                <li class="mb-1">c. {{ $item->sides->sideC }} мм</li>
                <li>d. {{ $item->sides->sideD }} мм</li>
              </ul>
              <div class="fw-6 fs-5 mb-3">Кромление</div>
              <span>Стороны: a, b, c, d</span>
            </div>
            <div class="amount">
              <div class="quantity-el d-flex align-items-center justify-content-between rounded-pill bg-orange px-3">
                <form action="{{ route('user.cart.service.remove', $item->id) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="product" value="{{ $item_key }}">
                  <button class="p-0" type="submit">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.32568 8H13.659" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </button>
                </form>
                <input class="bg-transparent border-0 text-white text-center fw-6" type="number" value="{{ $item->count }}" readonly>
                <form action="{{ route('user.cart.service.add', $item->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="product" value="{{ $item_key }}">
                  <button class="p-0" type="submit">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.99951 3.33337V12.6667" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                      <path d="M3.3335 8H12.6668" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </button>
                </form>
              </div>
            </div>
            <div class="total">
              <div class="fs-5 text-center">х {{ $item->count }} шт.</div>
            </div>
            <div class="delete d-flex justify-content-xl-center">
              <form action="{{ route('user.cart.service.delete', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="product" value="{{ $item_key }}">
                <button class="" type="submit">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6 6L18 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endforeach
  
	{{-- <div
		class="d-flex flex-column flex-lg-row align-items-center align-items-md-start justify-content-xxl-between mb-4 border-bottom pb-4">
		<div class="img mb-3 mb-md-0">
			<img src="img/images/cart-item.jpeg" class="w-100 h-100 rounded-10" alt="">
		</div>
		<div
			class="d-flex flex-column flex-lg-row flex-fill align-items-center align-items-lg-start text-center text-lg-start">
			<div class="info">
				<a href="card.html" class="h4 fw-6">ЛДСП Цемент (К) 2750*1830*16</ф>
					<div class="text-dark fs-5">Код: 00-0012345</div>
					<a href="card.html" class="d-inline-flex align-items-center p-0 c-accent roboto fw-5 mt-3">
						<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 5V19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M5 12H19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<span>Добавить услугу</span>
					</a>
			</div>
			<div class="amount my-3 my-md-0">
				<div
					class="quantity-el mx-auto mx-md-0 d-flex align-items-center justify-content-between rounded-pill bg-orange px-3">
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
			<div class="total">
				<div class="h4 fw-6">3 505 руб.</div>
				<div class="fs-5">цена за 1 шт.</div>
			</div>
			<div class="delete mt-3 mt-md-0 d-flex justify-content-xl-center">
				<button class="">
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M10.0007 31.6667C10.0007 33.5 11.5007 35 13.334 35H26.6673C28.5007 35 30.0007 33.5 30.0007 31.6667V11.6667H10.0007V31.6667ZM31.6673 6.66667H25.834L24.1673 5H15.834L14.1673 6.66667H8.33398V10H31.6673V6.66667Z"
							fill="#323232" />
					</svg>
				</button>
			</div>
		</div>
	</div>

	<div
		class="d-flex flex-column flex-lg-row align-items-center align-items-md-start justify-content-xxl-between mb-4 border-bottom pb-4">
		<div class="img mb-3 mb-md-0">
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGRng_S13vIw9-8iIpYBZatZiuXrlgXiSrNQ&usqp=CAU"
				class="w-100 h-100 rounded-10" alt="">
		</div>
		<div class="flex-fill">
			<div
				class="d-flex flex-column flex-lg-row flex-fill align-items-center align-items-lg-start text-center text-lg-start">
				<div class="info">
					<a href="card.html" class="h4 fw-6">ЛДСП Цемент (К) 2750*1830*16</a>
					<div class="text-dark fs-5">Код: 00-0012345</div>
				</div>
				<div class="amount my-3 my-md-0">
					<div
						class="quantity-el mx-auto mx-md-0 d-flex align-items-center justify-content-between rounded-pill bg-orange px-3">
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
				<div class="total">
					<div class="h4 fw-6">3 505 руб.</div>
					<div class="fs-5">цена за 1 шт.</div>
				</div>
				<div class="delete d-flex justify-content-xl-center mt-3 mt-md-0">
					<button class="">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M10.0007 31.6667C10.0007 33.5 11.5007 35 13.334 35H26.6673C28.5007 35 30.0007 33.5 30.0007 31.6667V11.6667H10.0007V31.6667ZM31.6673 6.66667H25.834L24.1673 5H15.834L14.1673 6.66667H8.33398V10H31.6673V6.66667Z"
								fill="#323232" />
						</svg>
					</button>
				</div>
			</div>
			<div class="d-flex flex-column flex-lg-row flex-fill align-items-start">
				<div class="info">
					<div class="h4 mb-2 fw-6 mt-2">Выбранные услуги</div>
					<div class="fs-5 fw-6 mb-4">1 ДЕТАЛЬ</div>
					<div class="fw-6 fs-5 mb-3">Распиловка</div>
					<ul class="list-unstyled mb-4">
						<li class="mb-1">a. 17 мм</li>
						<li class="mb-1">b. 20 мм</li>
						<li class="mb-1">c. 20 мм</li>
						<li>d. 17 мм</li>
					</ul>
					<div class="fw-6 fs-5 mb-3">Кромление</div>
					<span>Стороны: a, b, c, d</span>
				</div>
				<div class="amount">
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
				<div class="total">
					<div class="fs-5 text-center">х 12 шт.</div>
				</div>
				<div class="delete d-flex justify-content-xl-center">
					<button class="">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M18 6L6 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M6 6L18 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div> --}}

	<div class="d-flex flex-column-reverse flex-md-row justify-content-between align-items-md-end">
		<a href="catalogue.html" class="c-accent roboto fw-5 fs-5 d-flex align-items-center mt-4 mt-md-0">
			<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M19 12H5" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M12 19L5 12L12 5" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
			<span>Вернуться в каталог</span>
		</a>
		<div>
			<div class="d-flex justify-content-md-end align-items-baseline mb-3 mb-lg-4 mb-xl-5">
				<div class="roboto fw-bold fs-4 me-4">Итого: </div>
				<div class="fw-6 fs-5">{{ $cart['total_price'] }} ₽</div>
			</div>
			<a href="{{ route('user.order') }}" class="bttn bttn-lg">Оформление заказа</a>
		</div>
	</div>

</div>

<!-- CTA FORM -->
@include('User.Components.cta_form')
@endsection