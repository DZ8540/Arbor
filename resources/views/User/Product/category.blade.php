@extends('User.Layouts.index')

@section('title', 'Категория')
		
@section('content')
<div class="container mb-5">
	<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
			<li class="breadcrumb-item"><a href="catalogue.html">Каталог</a></li>
			<li class="breadcrumb-item active" aria-current="page">ЛДСП</li>
		</ol>
	</nav>
	<h1 class="mb-4">{{ $category->name }}</h1>
	<div class="row gx-xxl-5">

		<div class="col-lg-3 mb-4">
			<fieldset class="mb-25 roboto rounded-10 bg-gray-light py-3 py-xl-4 px-4 mb-4">
				<div class="h5 mb-3">Цвет</div>
				<div class="colors-wr d-flex flex-wrap flex-xxl-row mb-2">

          @foreach ($colors as $item)
            <div class="color-wr mb-2" style="color: {{ $item->hex_code }}">
              <input type="checkbox" id="color-{{ $item->slug }}" @if ($item->checked) checked @endif class="color-input Filter" name="color" value="{{ $item->id }}">
              <div class="color"></div>
              <label for="color-{{ $item->slug }}">{{ $item->name }}</label>
            </div>
          @endforeach
					
				</div>

				<div class="h5 mb-3 mt-4">Толщина</div>
				<div class="d-flex flex-wrap flex-xxl-row">
          
          @foreach ($thicknesses as $item)
            <fieldset class="form-check color-wr align-items-center mb-3">
              <input name="thickness" id="thick-{{ $item->slug }}" @if ($item->checked) checked @endif type="checkbox" value="{{ $item->id }}" class="Filter form-check-input me-2">
              <label class="me-4" for="thick-{{ $item->slug }}">{{ $item->name }}</label>
            </fieldset>
          @endforeach
          
				</div>
			</fieldset>

			<div class="catalogue-sidebar rounded-10">
				
        @foreach ($category_types as $category_type)
          @if ($category_type->categories->count())
            <div class="bg-dark text-white p-3 px-xxl-4 fw-6 fs-5">{{ $category_type->name }}</div>

            @foreach ($category_type->categories as $item)
              <div
                class="d-flex justify-content-between align-items-center position-relative border-bottom p-3 ps-xxl-5 pe-xxl-4">
                <a class="stretched-link" href="{{ $item->slug }}">{{ $item->name }}</a>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9 18L15 12L9 6" stroke="#4B4B4B" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </div>  
            @endforeach
          @endif
          
        @endforeach

			</div>
		</div>

		<div class="col-lg-9 categ-section">

			<form class="border-bottom fs-5 pb-2 pb-xl-3 mb-4 d-flex flex-column flex-md-row justify-content-between" id="sort">
        <div class="sort-items d-flex flex-column flex-sm-row mb-4 mb-md-0">

          @foreach ($sorts as $item)
            <fieldset class="d-flex align-items-center">
              <input type="radio" name="sort-items" id="by-{{ $item['value'] }}" value="{{ $item['value'] }}" @if ($item['value'] == $sort) checked @endif />
              <label for="by-{{ $item['value'] }}" class="me-1">{{ $item['name'] }}</label>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L12 15L18 9" stroke="black" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
            </fieldset>
          @endforeach
          
        </div>
				<div class="d-inline-flex">
					<select name="show_count" id="showCount" class="form-select border-0 w-auto p-0 pe-5" role="button">
						<option value="16">Показать по 16</option>
						<option value="32" @if ($show_count == 32) selected @endif>Показать по 32</option>
						<option value="48" @if ($show_count == 48) selected @endif>Показать по 48</option>
					</select>
				</div>
			</form>

			<div class="me-xxl-5">
				<div class="row row-cols-2 row-cols-sm-3 row-cols-lg-4 g-2 g-xl-4" id="products">

          @foreach ($products as $item)        
            <div class="position-relative product">
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
                      <button class="px-0 decrement">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M3.77246 8H13.1058" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </button>
                      <div>
                        <input class="bg-transparent border-0 text-center fw-6" type="number" value="1" readonly>
                      </div>
                      <button class="px-0 increment">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8.56055 3.33337V12.6667" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                          <path d="M3.89355 8H13.2269" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </button>
                    </div>
                    <form action="{{ route('user.cart.add', $item->id) }}" method="POST">
                      @csrf
                      <input type="hidden" name="count" value="1">
                      <button type="submit" class="fs-6 bttn open-sans p-2 px-3">
                        <span>В корзину</span>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

				</div>

				<button class="bttn c-accent bg-transparent rounded-10 w-100 mt-4" id="showMore">Показать ещё</button>

        <!-- pagination -->
        {{ $products->links() }}
			</div>
		</div>
	</div>
</div>

<!-- CTA FORM -->
@include('User.Components.cta_form')

<form action="{{ route('user.category', $category->slug) }}" id="form" method="GET">
  <input type="hidden" name="sort" id="formSort" value="">
  <input type="hidden" name="show_count" id="formShowCount" value="">
  <input type="hidden" name="colors" id="formColors" value="{{ $form_colors }}">
  <input type="hidden" name="thicknesses" id="formThicknesses" value="{{ $form_thicknesses }}">
</form>

<input type="hidden" value="{{ route('user.category', $category->slug) }}{{ $current_url }}" id="currentPageLink">
<input type="hidden" value="{{ $show_count }}" id="currentShowCount">
<input type="hidden" value="{{ $current_page }}" id="currentPage">
@endsection

@section('scripts')
<script src="{{ asset('js/User/products.js') }}"></script>
<script src="{{ asset('js/User/cart.js') }}"></script>
@endsection