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
						<select class="form-select">
							<option value="">ЛДСП</option>
							<option value="">Материал</option>
						</select>
					</div>
				</fieldset>
				<fieldset class="d-flex flex-column flex-lg-row mb-4">
					<label class="col-lg-6 fw-6 mb-2 mb-lg-0">Толщина плиты:</label>
					<div class="col-lg-6">
						<select class="form-select">
							<option value="">16 мм</option>
							<option value="">16 мм</option>
						</select>
					</div>
				</fieldset>
				<fieldset>
					<legend class="fw-6 fs-6 mb-4">Выберите стороны для кромления и введите требуемые размеры плиты:</legend>
					<div class="d-flex flex-column-reverse align-items-start add-sawing-block">
						<!-- hidden element -->
						<div class="row row-cols-lg-2 mb-4 position-relative pt-5">
							<button class="position-absolute w-auto end-0 top-0">
								<span>Удалить</span>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M18 6L6 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" />
									<path d="M6 6L18 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" />
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
									<div
										class="quantity-el d-flex align-items-center justify-content-between rounded-pill bg-orange px-3">
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
						<button type="button" onclick="addInput(this)" class="fw-5 fs-5 c-accent roboto">
							<svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M12 5V19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M5 12H19" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							<span>Добавить деталь</span>
						</button>
						<div class="row row-cols-lg-2 mb-4 position-relative pt-5">
							<button class="position-absolute w-auto end-0 top-0">
								<span>Удалить</span>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M18 6L6 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" />
									<path d="M6 6L18 18" stroke="#D00B0B" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" />
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
									<div
										class="quantity-el d-flex align-items-center justify-content-between rounded-pill bg-orange px-3">
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
					</div>
				</fieldset>
			</div>
		</div>
		<form class="col-lg-5 position-sticky top-0 start-0">
			<div class="shopping-sidebar py-4 py-xxl-5 fw-6 rounded-10">
				<div class="mb-4 p-3 px-xl-4 px-xxl-5">
					<div class="h4 mb-3">Характеристики</div>
					<div class="d-flex justify-content-between mb-2 mb-lg-3">
						<div>Материал:</div>
						<div>ЛДСП</div>
					</div>
					<div class="d-flex justify-content-between">
						<div>Толщина:</div>
						<div>10 мм</div>
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
				</div>
				<div class="px-3 px-xl-4 px-xxl-5 mt-2 mt-xxl-4">
					<a href="cart.html" class="bttn py-3 w-100">В корзину</a>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- CTA FORM -->
@include('User.Components.cta_form')
@endsection