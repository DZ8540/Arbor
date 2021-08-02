<header class="d-none d-lg-block">
	<div class="bg-yellow py-1 open-sans">
		<div class="container d-flex align-items-center justify-content-between">
			<div class="d-flex align-items-center">

				<!-- opening hours -->
				@if(!empty($about_company->work_start) && !empty($about_company->work_end))
					<span class="d-flex align-items-end me-4">
						<svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0)">
								<path
									d="M10 22C15.5228 22 20 17.5228 20 12C20 6.47715 15.5228 2 10 2C4.47715 2 0 6.47715 0 12C0 17.5228 4.47715 22 10 22Z"
									stroke="black" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M12 6V12L16 14" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
							</g>
							<defs>
								<clipPath id="clip0">
									<rect width="24" height="24" fill="white" />
								</clipPath>
							</defs>
						</svg>
						<span class="fs-5">с {{ date('H:i', strtotime($about_company->work_start)) }} до {{ date('H:i', strtotime($about_company->work_end)) }} мск</span>
					</span>
					<span class="">Вне рабочее время <br />
						просим оставить заявку</span>
				@endif

			</div>
			<div class="d-flex flex-column flex-lg-row">
				<div class="d-flex flex-column flex-xl-row align-items-start me-lg-3 me-xl-0">
					<!-- email -->

					@if(!empty($about_company->email))
						<span>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
									stroke="black" stroke-linecap="round" stroke-linejoin="round" />
								<path
									d="M16 7.99999V13C16 13.7956 16.3161 14.5587 16.8787 15.1213C17.4413 15.6839 18.2044 16 19 16C19.7957 16 20.5587 15.6839 21.1213 15.1213C21.6839 14.5587 22 13.7956 22 13V12C21.9999 9.74302 21.2362 7.55247 19.8333 5.78452C18.4303 4.01658 16.4706 2.77521 14.2726 2.26229C12.0747 1.74936 9.76794 1.99503 7.72736 2.95936C5.68677 3.92368 4.03241 5.54995 3.03327 7.57371C2.03413 9.59748 1.74898 11.8997 2.22418 14.1061C2.69938 16.3125 3.90699 18.2932 5.65064 19.7263C7.39429 21.1593 9.57144 21.9603 11.8281 21.9991C14.0847 22.0379 16.2881 21.3122 18.08 19.94"
									stroke="black" stroke-linecap="round" stroke-linejoin="round" />
							</svg>

							<a class="fs-5" href="mailto:{{ $about_company->email }}">{{ $about_company->email }}</a>
						</span>
					@endif

					<button data-bs-toggle="modal" data-bs-target="#callModal" class="dashed p-0 ps-4 ps-xl-0 mx-xl-4">Оставить
						заявку</button>
				</div>

				<!-- tel -->
				@if(!empty($about_company->phone))
					<span class="d-flex align-items-center">
						<svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M22.0001 16.92V19.92C22.0012 20.1985 21.9441 20.4741 21.8326 20.7293C21.721 20.9845 21.5574 21.2136 21.3521 21.4018C21.1469 21.5901 20.9046 21.7335 20.6408 21.8227C20.377 21.9119 20.0974 21.945 19.8201 21.92C16.7429 21.5856 13.7871 20.5341 11.1901 18.85C8.77388 17.3146 6.72539 15.2661 5.19006 12.85C3.50003 10.2412 2.4483 7.27097 2.12006 4.17997C2.09507 3.90344 2.12793 3.62474 2.21656 3.3616C2.30518 3.09846 2.44763 2.85666 2.63482 2.6516C2.82202 2.44653 3.04986 2.28268 3.30385 2.1705C3.55783 2.05831 3.8324 2.00024 4.11006 1.99997H7.11006C7.59536 1.9952 8.06585 2.16705 8.43382 2.48351C8.80179 2.79996 9.04213 3.23942 9.11005 3.71997C9.23668 4.68004 9.47151 5.6227 9.81006 6.52997C9.9446 6.8879 9.97372 7.27689 9.89396 7.65086C9.81421 8.02482 9.62892 8.36809 9.36005 8.63998L8.09006 9.90997C9.51361 12.4135 11.5865 14.4864 14.0901 15.91L15.3601 14.64C15.6319 14.3711 15.9752 14.1858 16.3492 14.1061C16.7231 14.0263 17.1121 14.0554 17.4701 14.19C18.3773 14.5285 19.32 14.7634 20.2801 14.89C20.7658 14.9585 21.2095 15.2032 21.5266 15.5775C21.8437 15.9518 22.0122 16.4296 22.0001 16.92Z"
								stroke="black" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<a class="fs-5 text-nowrap" href="tel:{{ $about_company->phone }}">{{ $about_company->phone }}</a>
					</span>
				@endif
				
			</div>
		</div>
	</div>
	<div class="shadow-box">
		<div class="container d-flex align-items-center pt-2">
			<!-- logo -->
			<a href="{{ route('user.index') }}">
				<img src="{{ $about_company->logo ? Storage::url($about_company->logo) : asset('img/images/logo.svg') }}" alt="{{ $about_company->name }}" height="71" width="85" />
			</a>

			<!-- catalogue -->
			<a href="catalogue.html"
				class="p-1 py-xl-2 px-xl-3 bttn d-flex align-items-center mx-3 mx-xxl-4 menu-hover-link">
				<svg class="me-xxl-2" width="24" height="25" viewBox="0 0 24 25" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path d="M3 12.5H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M3 6.53223H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M3 18.4679H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<span class="d-none d-xxl-block">Каталог</span>
			</a>
			<!-- search -->
			<form class="flex-fill position-relative rounded-pill border p-2">
				<input class="border-0 ps-3 ps-xl-4" type="search" placeholder="Поиск по сайту…" />
				<button class="position-absolute end-0 me-3">
					<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M10.5 18.3143C14.6421 18.3143 18 14.9744 18 10.8545C18 6.73453 14.6421 3.39465 10.5 3.39465C6.35786 3.39465 3 6.73453 3 10.8545C3 14.9744 6.35786 18.3143 10.5 18.3143Z"
							stroke="#EF5B16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M21 21.2982L15.8 16.1261" stroke="#EF5B16" stroke-width="2" stroke-linecap="round"
							stroke-linejoin="round" />
					</svg>
				</button>
			</form>
			<div class="d-flex mx-xl-3 mx-xxl-4 text-nowrap">
				<a class="bg-gray-light rounded-pill py-1 px-3" href="{{ route('user.services') }}">Услуги</a>
				<a class="mx-3 mx-xxl-4 bg-gray-light rounded-pill py-1 px-3" href="{{ route('user.about') }}">О компании</a>
				<a class="bg-gray-light rounded-pill py-1 px-3" href="{{ route('user.news') }}">Новости</a>
			</div>
			<!-- call -->
			<button class="bttn bttn-lg mx-xxl-4 d-none d-xxl-block">Заказать звонок</button>
			<div class="position-relative cart-hover-main">
				<!-- cart -->
				<div class="ms-auto d-flex flex-column align-items-center cart-hover bg-white text-center py-2 px-3">
					<div class="bg-gray-light rounded-circle p-3 position-relative small">
						<div class="px-1 rounded-circle bg-orange roboto position-absolute end-0 top-0 small mt-2">12</div>
						<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0)">
								<path
									d="M9 22.3518C9.55228 22.3518 10 21.9065 10 21.3572C10 20.8079 9.55228 20.3625 9 20.3625C8.44772 20.3625 8 20.8079 8 21.3572C8 21.9065 8.44772 22.3518 9 22.3518Z"
									stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path
									d="M20 22.3518C20.5523 22.3518 21 21.9065 21 21.3572C21 20.8079 20.5523 20.3625 20 20.3625C19.4477 20.3625 19 20.8079 19 21.3572C19 21.9065 19.4477 22.3518 20 22.3518Z"
									stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path
									d="M1 1.46436H5L7.68 14.7826C7.77144 15.2406 8.02191 15.6519 8.38755 15.9447C8.75318 16.2374 9.2107 16.3929 9.68 16.384H19.4C19.8693 16.3929 20.3268 16.2374 20.6925 15.9447C21.0581 15.6519 21.3086 15.2406 21.4 14.7826L23 6.43757H6"
									stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</g>
							<defs>
								<clipPath id="clip0">
									<rect width="24" height="23.8714" fill="white" transform="translate(0 0.469727)" />
								</clipPath>
							</defs>
						</svg>
					</div>
					<a class="stretched-link" href="cart.html">Корзина</a>
				</div>
				<!-- cart -->
				<div class="d-none cart-hover-block bg-white position-absolute px-4 py-3 end-0">
					<div class="border-bottom py-3 d-flex justify-content-between">
						<!-- img and article -->
						<div>
							<img class="rounded-10 mb-1" src="img/images/cart-item.jpeg" alt="" />
							<div class="c-gray text-secondary small">Код: 00-0012345</div>
						</div>
						<div class="d-flex flex-fill mx-3 flex-column">
							<a href="card.html" class="mb-2">ЛДСП Намбия (R)</a>
							<span class="mb-3">2750*1830*16</span>
							<div class="d-flex align-items-center justify-content-between bg-orange rounded-pill px-3"
								style="width: 104px">
								<button class="btn p-0">
									<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.33337 8.55188H12.6667" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
								<input class="bg-transparent text-center text-white border-0 roboto fw-5" type="number" name="" id=""
									value="1" />
								<button class="btn p-0">
									<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.12048 3.88525V13.2186" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
										<path d="M3.45422 8.55188H12.7876" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
							</div>
						</div>
						<!-- delete and price -->
						<div class="d-flex flex-column align-items-end text-end">
							<button class="btn p-0">
								<svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M5.75033 18.4787C5.75033 19.5272 6.61283 20.3851 7.66699 20.3851H15.3337C16.3878 20.3851 17.2503 19.5272 17.2503 18.4787V7.04034H5.75033V18.4787ZM18.2087 4.18074H14.8545L13.8962 3.22754H9.10449L8.14616 4.18074H4.79199V6.08714H18.2087V4.18074Z"
										fill="#D00B0B" />
								</svg>
							</button>
							<span class="roboto fw-5">3505 руб./шт</span>
						</div>
					</div>
					<div class="border-bottom py-3 d-flex justify-content-between">
						<!-- img and article -->
						<div>
							<img class="rounded-10 mb-1" src="img/images/cart-item.jpeg" alt="" />
							<div class="c-gray text-secondary small">Код: 00-0012345</div>
						</div>
						<div class="d-flex flex-fill mx-3 flex-column">
							<a href="card.html" class="mb-2">ЛДСП Береза нордик (T)</a>
							<span class="mb-3">2750*1830*16</span>
							<div class="d-flex align-items-center justify-content-between bg-orange rounded-pill px-3"
								style="width: 104px">
								<button class="btn p-0">
									<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.33337 8.55188H12.6667" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
								<input class="bg-transparent text-center text-white border-0 roboto fw-5" type="number" name="" id=""
									value="1" />
								<button class="btn p-0">
									<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.12048 3.88525V13.2186" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
										<path d="M3.45422 8.55188H12.7876" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
							</div>
						</div>
						<!-- delete and price -->
						<div class="d-flex flex-column align-items-end text-end">
							<button class="btn p-0">
								<svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M5.75033 18.4787C5.75033 19.5272 6.61283 20.3851 7.66699 20.3851H15.3337C16.3878 20.3851 17.2503 19.5272 17.2503 18.4787V7.04034H5.75033V18.4787ZM18.2087 4.18074H14.8545L13.8962 3.22754H9.10449L8.14616 4.18074H4.79199V6.08714H18.2087V4.18074Z"
										fill="#D00B0B" />
								</svg>
							</button>
							<span class="roboto fw-5">12 505 <span class="text-nowrap">руб./шт</span></span>
						</div>
					</div>
					<div class="border-bottom py-3 d-flex justify-content-between">
						<!-- img and article -->
						<div>
							<img class="rounded-10 mb-1" src="img/images/cart-item.jpeg" alt="" />
							<div class="c-gray text-secondary small">Код: 00-0012345</div>
						</div>
						<div class="d-flex flex-fill mx-3 flex-column">
							<a href="card.html" class="mb-2">ЛДСП Намбия (R)</a>
							<span class="mb-3">2750*1830*16</span>
							<div class="d-flex align-items-center justify-content-between bg-orange rounded-pill px-3"
								style="width: 104px">
								<button class="btn p-0">
									<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.33337 8.55188H12.6667" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
								<input class="bg-transparent text-center text-white border-0 roboto fw-5" type="number" name="" id=""
									value="1" />
								<button class="btn p-0">
									<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.12048 3.88525V13.2186" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
										<path d="M3.45422 8.55188H12.7876" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
							</div>
						</div>
						<!-- delete and price -->
						<div class="d-flex flex-column align-items-end text-end">
							<button class="btn p-0">
								<svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M5.75033 18.4787C5.75033 19.5272 6.61283 20.3851 7.66699 20.3851H15.3337C16.3878 20.3851 17.2503 19.5272 17.2503 18.4787V7.04034H5.75033V18.4787ZM18.2087 4.18074H14.8545L13.8962 3.22754H9.10449L8.14616 4.18074H4.79199V6.08714H18.2087V4.18074Z"
										fill="#D00B0B" />
								</svg>
							</button>
							<span class="roboto fw-5">22 505 руб./шт</span>
						</div>
					</div>
					<div class="border-bottom py-3 d-flex justify-content-between">
						<!-- img and article -->
						<div>
							<img class="rounded-10 mb-1" src="img/images/cart-item.jpeg" alt="" />
							<div class="c-gray text-secondary small">Код: 00-0012345</div>
						</div>
						<div class="d-flex flex-fill mx-3 flex-column">
							<a href="card.html" class="mb-2">ЛДСП Береза нордик (T)</a>
							<span class="mb-3">2750*1830*16</span>
							<div class="d-flex align-items-center justify-content-between bg-orange rounded-pill px-3"
								style="width: 104px">
								<button class="btn p-0">
									<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.33337 8.55188H12.6667" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
								<input class="bg-transparent text-center text-white border-0 roboto fw-5" type="number" name="" id=""
									value="1" />
								<button class="btn p-0">
									<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.12048 3.88525V13.2186" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
										<path d="M3.45422 8.55188H12.7876" stroke="white" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg>
								</button>
							</div>
						</div>
						<!-- delete and price -->
						<div class="d-flex flex-column align-items-end text-end">
							<button class="btn p-0">
								<svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M5.75033 18.4787C5.75033 19.5272 6.61283 20.3851 7.66699 20.3851H15.3337C16.3878 20.3851 17.2503 19.5272 17.2503 18.4787V7.04034H5.75033V18.4787ZM18.2087 4.18074H14.8545L13.8962 3.22754H9.10449L8.14616 4.18074H4.79199V6.08714H18.2087V4.18074Z"
										fill="#D00B0B" />
								</svg>
							</button>
							<span class="roboto fw-5">3505 руб./шт</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="menu-hover py-5 d-none position-absolute bg-white w-100">
		<div class="container">
			<div class="row">

				@foreach ($category_types as $item)
					<div class="col-auto">
						<a class="h4 mb-4" href="{{ route('user.catalog') }}">{{ $item->name }}</a>
						<ul class="list-unstyled">
							
							@foreach ($item->categories as $category)
								<li class="mb-3">
									<a href="{{ route('user.category', $category->slug) }}">{{ $category->name }}</a>
								</li>
							@endforeach

						</ul>
					</div>
				@endforeach
				
			</div>
		</div>
	</div>
</header>