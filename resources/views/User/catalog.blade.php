@extends('User.Layouts.index')

@section('title', 'Каталог')

@section('content')
<div class="container mb-5 pb-xl-4">
	<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
			<li class="breadcrumb-item active" aria-current="page">Каталог</li>
		</ol>
	</nav>
	<h1 class="mb-4">Каталог</h1>
	<div class="row gx-xxl-5">

		<div class="col-lg-3 mb-4">
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

      @foreach ($category_types as $category_type)
        @if ($category_type->categories->count())
          <h4 class="fw-6 mb-4">{{ $category_type->name }}</h4>
          <div class="row row-cols-lg-3 gy-4 text-center h4 fw-5 pb-5">

            @foreach ($category_type->categories as $item)
              <div>
                <div class="rounded-30 position-relative">
                  <img class="w-100 h-100" src="{{ Storage::url($item->image) }}" alt="">
                  <a href="{{ route('user.category', $item->slug) }}" class="p-3 w-100 start-0 bottom-0 position-absolute stretched-link">{{ $item->name }}</a>
                </div>
              </div>  
            @endforeach
            
          </div>
        @endif
      @endforeach
			
		</div>
	</div>
</div>

<!-- CTA FORM -->
<section class="bg-dark-blue py-5 text-white">
	<div class="container col-xxl-8 mx-auto my-xl-4">
		<h2 class="text-center">Остались вопросы?</h2>
		<p class="fs-5 text-center">Свяжитесь с нами любым удобным способом</p>
		<div class="row row-cols-lg-2 row-cols-xl-4 mt-4 gy-4 col-lg-9 col-xl-12 mx-auto">
			<div class="d-flex">
				<svg class="flex-shrink-0" width="56" height="56" viewBox="0 0 56 56" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<circle cx="28" cy="28" r="27.5" stroke="white" />
					<path
						d="M38 32.92V35.92C38.0011 36.1985 37.9441 36.4741 37.8325 36.7293C37.7209 36.9845 37.5573 37.2136 37.3521 37.4018C37.1468 37.5901 36.9046 37.7335 36.6407 37.8227C36.3769 37.9119 36.0974 37.945 35.82 37.92C32.7428 37.5856 29.787 36.5341 27.19 34.85C24.7738 33.3146 22.7253 31.2661 21.19 28.85C19.5 26.2412 18.4482 23.271 18.12 20.18C18.095 19.9034 18.1279 19.6247 18.2165 19.3616C18.3051 19.0985 18.4476 18.8567 18.6348 18.6516C18.822 18.4465 19.0498 18.2827 19.3038 18.1705C19.5578 18.0583 19.8323 18.0002 20.11 18H23.11C23.5953 17.9952 24.0658 18.1671 24.4338 18.4835C24.8017 18.8 25.0421 19.2394 25.11 19.72C25.2366 20.68 25.4714 21.6227 25.81 22.53C25.9445 22.8879 25.9737 23.2769 25.8939 23.6509C25.8141 24.0248 25.6289 24.3681 25.36 24.64L24.09 25.91C25.5135 28.4135 27.5864 30.4864 30.09 31.91L31.36 30.64C31.6319 30.3711 31.9751 30.1858 32.3491 30.1061C32.7231 30.0263 33.1121 30.0554 33.47 30.19C34.3773 30.5285 35.3199 30.7634 36.28 30.89C36.7658 30.9585 37.2094 31.2032 37.5265 31.5775C37.8437 31.9518 38.0122 32.4296 38 32.92Z"
						stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<div class="ms-3 d-flex flex-column align-items-start">
					<a href="tel:+7(917)234-56-78" class="fs-5 mb-1 text-nowrap">+7 (917) 234-56-78</a>
					<button class="p-0 c-accent">Оставить заявку</button>
				</div>
			</div>
			<div class="d-flex">
				<svg class="flex-shrink-0" width="56" height="56" viewBox="0 0 56 56" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<circle cx="28" cy="28" r="27.5" stroke="white" />
					<path
						d="M28 32C30.2091 32 32 30.2091 32 28C32 25.7909 30.2091 24 28 24C25.7909 24 24 25.7909 24 28C24 30.2091 25.7909 32 28 32Z"
						stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path
						d="M32 24V29C32 29.7956 32.3161 30.5587 32.8787 31.1213C33.4413 31.6839 34.2044 32 35 32C35.7957 32 36.5587 31.6839 37.1213 31.1213C37.6839 30.5587 38 29.7956 38 29V28C37.9999 25.743 37.2362 23.5525 35.8333 21.7845C34.4303 20.0166 32.4706 18.7752 30.2726 18.2623C28.0747 17.7494 25.7679 17.995 23.7274 18.9594C21.6868 19.9237 20.0324 21.5499 19.0333 23.5737C18.0341 25.5975 17.749 27.8997 18.2242 30.1061C18.6994 32.3125 19.907 34.2932 21.6506 35.7263C23.3943 37.1593 25.5714 37.9603 27.8281 37.9991C30.0847 38.0379 32.2881 37.3122 34.08 35.94"
						stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<div class="ms-3 d-flex flex-column align-items-start">
					<a href="mailto:company@mail.ru" class="fs-5 mb-1 c-accent">company@mail.ru</a>
					<span>Интернет-магазин</span>
				</div>
			</div>
			<div class="d-flex">
				<svg class="flex-shrink-0" width="56" height="56" viewBox="0 0 56 56" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<circle cx="28" cy="28" r="27.5" stroke="white" />
					<path
						d="M28 32C30.2091 32 32 30.2091 32 28C32 25.7909 30.2091 24 28 24C25.7909 24 24 25.7909 24 28C24 30.2091 25.7909 32 28 32Z"
						stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path
						d="M32 24V29C32 29.7956 32.3161 30.5587 32.8787 31.1213C33.4413 31.6839 34.2044 32 35 32C35.7957 32 36.5587 31.6839 37.1213 31.1213C37.6839 30.5587 38 29.7956 38 29V28C37.9999 25.743 37.2362 23.5525 35.8333 21.7845C34.4303 20.0166 32.4706 18.7752 30.2726 18.2623C28.0747 17.7494 25.7679 17.995 23.7274 18.9594C21.6868 19.9237 20.0324 21.5499 19.0333 23.5737C18.0341 25.5975 17.749 27.8997 18.2242 30.1061C18.6994 32.3125 19.907 34.2932 21.6506 35.7263C23.3943 37.1593 25.5714 37.9603 27.8281 37.9991C30.0847 38.0379 32.2881 37.3122 34.08 35.94"
						stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<div class="ms-3 d-flex flex-column align-items-start">
					<a href="mailto:company@mail.ru" class="fs-5 mb-1 c-accent">company@mail.ru</a>
					<span>Предложение о сотрудничестве</span>
				</div>
			</div>
			<div class="text-lg-start text-xl-center">
				<span>Присоединяйтесь к нам</span>
				<div class="mt-3">
					<!-- vk -->
					<a href="#">
						<svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z"
								fill="#4D76A1" />
							<path fill-rule="evenodd" clip-rule="evenodd"
								d="M11.5468 17.2631H12.4886C12.4886 17.2631 12.7731 17.2319 12.9184 17.0753C13.0521 16.9315 13.0478 16.6616 13.0478 16.6616C13.0478 16.6616 13.0294 15.3978 13.6159 15.2117C14.1941 15.0284 14.9366 16.4331 15.7236 16.9732C16.3187 17.382 16.7709 17.2924 16.7709 17.2924L18.8752 17.2631C18.8752 17.2631 19.976 17.1953 19.454 16.3298C19.4112 16.259 19.15 15.6896 17.8895 14.5195C16.5701 13.2948 16.7467 13.4929 18.3361 11.3745C19.3041 10.0844 19.691 9.29682 19.5702 8.95949C19.4549 8.63819 18.743 8.72311 18.743 8.72311L16.3737 8.73787C16.3737 8.73787 16.1981 8.71392 16.0678 8.79178C15.9405 8.86815 15.8586 9.04612 15.8586 9.04612C15.8586 9.04612 15.4836 10.0444 14.9835 10.8935C13.9285 12.685 13.5066 12.7795 13.3342 12.6683C12.9331 12.409 13.0332 11.6267 13.0332 11.071C13.0332 9.3349 13.2966 8.61103 12.5205 8.42364C12.263 8.36139 12.0734 8.32032 11.4148 8.31369C10.5694 8.30492 9.85388 8.31626 9.44873 8.51476C9.17921 8.64675 8.97128 8.94088 9.09792 8.95777C9.2545 8.97874 9.60917 9.05339 9.7972 9.30945C10.04 9.63972 10.0314 10.3816 10.0314 10.3816C10.0314 10.3816 10.1709 12.4253 9.70564 12.6792C9.38627 12.8533 8.94818 12.4978 8.00761 10.8725C7.52567 10.04 7.16181 9.11971 7.16181 9.11971C7.16181 9.11971 7.09164 8.94772 6.96651 8.85574C6.81463 8.74429 6.60243 8.70878 6.60243 8.70878L4.35101 8.72354C4.35101 8.72354 4.01303 8.73295 3.88896 8.87991C3.77858 9.01061 3.88019 9.281 3.88019 9.281C3.88019 9.281 5.64282 13.4048 7.63862 15.4829C9.46863 17.3882 11.5468 17.2631 11.5468 17.2631Z"
								fill="white" />
						</svg>
					</a>
					<!-- fb -->
					<a href="#" class="mx-3">
						<svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z"
								fill="#3B5998" />
							<path
								d="M15.0168 12.4698H12.8755V20.3144H9.63132V12.4698H8.08838V9.7129H9.63132V7.92888C9.63132 6.65311 10.2373 4.6554 12.9044 4.6554L15.3075 4.66545V7.34148H13.5639C13.2779 7.34148 12.8757 7.48437 12.8757 8.09295V9.71547H15.3002L15.0168 12.4698Z"
								fill="white" />
						</svg>
					</a>
					<!-- inst -->
					<a href="#" class="me-3">
						<svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0)">
								<path
									d="M1.50008 1.63305C-0.385923 3.59205 7.7188e-05 5.67305 7.7188e-05 11.995C7.7188e-05 17.245 -0.915923 22.508 3.87808 23.747C5.37508 24.132 18.6391 24.132 20.1341 23.745C22.1301 23.23 23.7541 21.611 23.9761 18.788C24.0071 18.394 24.0071 5.60305 23.9751 5.20105C23.7391 2.19405 21.8881 0.461046 19.4491 0.110046C18.8901 0.0290464 18.7781 0.00504639 15.9101 4.63948e-05C5.73708 0.00504639 3.50708 -0.447954 1.50008 1.63305Z"
									fill="url(#paint0_linear)" />
								<path
									d="M11.9979 3.13905C8.36694 3.13905 4.91894 2.81605 3.60194 6.19605C3.05794 7.59205 3.13694 9.40505 3.13694 12.001C3.13694 14.279 3.06394 16.42 3.60194 17.805C4.91594 21.187 8.39194 20.863 11.9959 20.863C15.4729 20.863 19.0579 21.225 20.3909 17.805C20.9359 16.395 20.8559 14.609 20.8559 12.001C20.8559 8.53905 21.0469 6.30405 19.3679 4.62605C17.6679 2.92605 15.3689 3.13905 11.9939 3.13905H11.9979ZM11.2039 4.73605C18.7779 4.72405 19.7419 3.88205 19.2099 15.579C19.0209 19.716 15.8709 19.262 11.9989 19.262C4.93894 19.262 4.73594 19.06 4.73594 11.997C4.73594 4.85205 5.29594 4.74005 11.2039 4.73405V4.73605ZM16.7279 6.20705C16.1409 6.20705 15.6649 6.68305 15.6649 7.27005C15.6649 7.85705 16.1409 8.33305 16.7279 8.33305C17.3149 8.33305 17.7909 7.85705 17.7909 7.27005C17.7909 6.68305 17.3149 6.20705 16.7279 6.20705ZM11.9979 7.45005C9.48494 7.45005 7.44794 9.48805 7.44794 12.001C7.44794 14.514 9.48494 16.551 11.9979 16.551C14.5109 16.551 16.5469 14.514 16.5469 12.001C16.5469 9.48805 14.5109 7.45005 11.9979 7.45005ZM11.9979 9.04705C15.9029 9.04705 15.9079 14.955 11.9979 14.955C8.09394 14.955 8.08794 9.04705 11.9979 9.04705Z"
									fill="white" />
							</g>
							<defs>
								<linearGradient id="paint0_linear" x1="1.5461" y1="22.4671" x2="23.8516" y2="3.16202"
									gradientUnits="userSpaceOnUse">
									<stop stop-color="#FFDD55" />
									<stop offset="0.5" stop-color="#FF543E" />
									<stop offset="1" stop-color="#C837AB" />
								</linearGradient>
								<clipPath id="clip0">
									<rect width="24" height="24" fill="white" />
								</clipPath>
							</defs>
						</svg>
					</a>
					<!-- tg -->
					<a href="#">
						<svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z"
								fill="#039BE5" />
							<path
								d="M5.49102 11.74L17.061 7.27896C17.598 7.08496 18.067 7.40996 17.893 8.22196L17.894 8.22096L15.924 17.502C15.778 18.16 15.387 18.32 14.84 18.01L11.84 15.799L10.393 17.193C10.233 17.353 10.098 17.488 9.78802 17.488L10.001 14.435L15.561 9.41196C15.803 9.19896 15.507 9.07896 15.188 9.29096L8.31702 13.617L5.35502 12.693C4.71202 12.489 4.69802 12.05 5.49102 11.74Z"
								fill="white" />
						</svg>
					</a>
				</div>
			</div>
		</div>
		<h2 class="text-center mt-5 mb-4">Не нашли нужный товар? Напишите и мы Вам поможем</h2>
		<form action="#" method="GET" class="row row-cols-lg-1 row-cols-xl-3 gy-4 gx-xl-5 col-lg-5 col-xl-12 mx-auto">
			<fieldset class="d-flex flex-column">
				<label class="mb-2" for="cta-name">Ваше имя:</label>
				<input id="cta-name" type="text" class="form-control ps-lg-4 rounded-pill" placeholder="Иван Иванов">
			</fieldset>
			<fieldset class="d-flex flex-column">
				<label class="mb-2" for="cta-tel">Ваш номер телефона:</label>
				<input required id="cta-tel" type="tel" class="form-control ps-lg-4 rounded-pill"
					placeholder="+7 (917) 123-45-67">
			</fieldset>
			<fieldset class="d-flex flex-column">
				<label class="mb-2" for="cta-art">Введите артикул или название товара:</label>
				<input id="cta-art" type="text" class="form-control ps-lg-4 rounded-pill" placeholder="">
			</fieldset>
			<div>
				<button class="bttn bttn-lg rounded-pill w-100" type="submit">Отправить</button>
			</div>
			<fieldset class="form-chec d-flex">
				<input required type="checkbox" name="check" id="check" class="form-check-input flex-shrink-0 me-3">
				<div>
					<label for="check" class="d-inline">Нажимая на кнопку, я соглашаюсь на </label><a href=""
						class="text-decoration-underline d-inline">обработку персональных данных</a><label for="check">.</label>
				</div>
			</fieldset>
		</form>
	</div>
</section>
@endsection