@extends('User.Layouts.index')

@section('title', 'Распиловка и кромление')
		
@section('content')
<div class="container pb-5">

  {{ Breadcrumbs::render('services') }}

	<h1 class="mb-3">Распиловка и кромление</h1>
	<div class="row justify-content-between align-items-start position-relative">
		<div class="col-lg-6 col-xxl-5 mb-4">
			<p>Равным образом, постоянный количественный рост и сфера нашей активности в значительной степени обусловливает
				важность инновационных методов управления процессами.</p>
			<div>
				<fieldset class="d-flex flex-column flex-lg-row mb-4">
					<label class="col-lg-6 fw-6 mb-2 mb-lg-0 pe-1">Выберите материал для распила:</label>
					<div class="col-lg-6">
						<select class="form-select" id="formCategory">
              <option>Выберите материал</option>

              @foreach ($categories as $item)
							  <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
						</select>
					</div>
				</fieldset>
				<fieldset class="d-flex flex-column flex-lg-row mb-4" id="formThickness">
					<label class="col-lg-6 fw-6 mb-2 mb-lg-0">Толщина плиты:</label>
					<div class="col-lg-6">
						<select class="form-select">
              <option>Выберите толщину</option>
            </select>
					</div>
				</fieldset>
				<fieldset class="d-flex flex-column flex-lg-row mb-4" id="formColor">
					<label class="col-lg-6 fw-6 mb-2 mb-lg-0">Цвет:</label>
					<div class="col-lg-6">
						<select class="form-select">
							<option>Выберите цвет</option>
						</select>
					</div>
				</fieldset>
				<fieldset>
					<legend class="fw-6 fs-6 mb-4">Выберите стороны для кромления и введите требуемые размеры плиты:</legend>
					<div class="d-flex flex-column-reverse align-items-start add-sawing-block" id="services"></div>

          <button id="addService" class="fw-5 fs-5 c-accent roboto">
            <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 5V19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M5 12H19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>Добавить деталь</span>
          </button>
          <button class="bttn fs-6 d-flex mx-auto mt-5 py-3 px-5" id="servicesAdd">Добавить к заказу</button>
				</fieldset>
			</div>
		</div>
		<div class="col-lg-5 position-sticky top-0 start-0">
			<div class="shopping-sidebar py-4 py-xxl-5 fw-6 rounded-10">
				<div class="mb-4 p-3 px-xl-4 px-xxl-5">
					<div class="h4 mb-3">Характеристики</div>
					<div class="d-flex justify-content-between mb-2 mb-lg-3">
						<div>Материал:</div>
						<div id="material"></div>
					</div>
					<div class="d-flex justify-content-between">
						<div>Толщина:</div>
						<div id="thickness"></div>
					</div>
					<div class="d-flex justify-content-between">
						<div>Цвет:</div>
						<div id="color"></div>
					</div>
				</div>
				<div>
					<div class="h4 mb-3 px-3 px-xl-4 px-xxl-5">Выбранные услуги</div>
					<div class="border-top p-3 px-xl-4 px-xxl-5" id="productServices"></div>
				</div>
				<div class="px-3 px-xl-4 px-xxl-5 mt-2 mt-xxl-4">
					<form action="/cart/" method="POST" id="form">
            @csrf
            <input type="hidden" name="services_sides" id="formSides" value="[]">
					  <button type="submit" class="bttn py-3 mb-3">В корзину</button>
          </form>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="token" value="{{ csrf_token() }}">
<input type="hidden" id="serviceImage" value="{{ asset('img/images/sawing.png') }}">

<!-- CTA FORM -->
@include('User.Components.cta_form')
@endsection

@section('scripts')
<script src="{{ asset('js/User/Service.js') }}"></script>
<script src="{{ asset('js/User/services.js') }}"></script>
<script src="{{ asset('js/User/product.js') }}"></script>
@endsection