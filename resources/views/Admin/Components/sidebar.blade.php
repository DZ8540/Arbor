<div id="left-sidebar" class="sidebar">
	<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
		<span class="sr-only">Toggle Fullwidth</span>
		<i class="fa fa-angle-left"></i>
	</button>
	<div class="sidebar-scroll">
		{{-- <div class="user-account">
			<img src="assets/img/user.png" class="img-responsive img-circle user-photo" alt="User Profile Picture">
			<div class="dropdown">
				<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong>Austin Hoffman</strong>
					<i class="fa fa-caret-down"></i></a>
				<ul class="dropdown-menu dropdown-menu-right account">
					<li><a href="#">My Profile</a></li>
					<li><a href="#">Messages</a></li>
					<li><a href="#">Settings</a></li>
					<li class="divider"></li>
					<li><a href="#">Logout</a></li>
				</ul>
			</div>
		</div> --}}
		<nav id="left-sidebar-nav" class="sidebar-nav">
			<ul id="main-menu" class="metismenu">
				<li class="@if(Route::is('admin.index')) active @endif"><a href="{{ route('admin.index') }}"><i class="lnr lnr-home"></i> <span>Главная</span></a></li>
				
				<li class="@if(Route::is('admin.category.types')) active @endif"><a href="{{ route('admin.category.types') }}"><i class="lnr lnr-star"></i> <span>Главные категории</span></a></li>

				<li class="@if(Route::is('admin.categories*')) active @endif"><a href="{{ route('admin.categories.index') }}"><i class="lnr lnr-link"></i> <span>Категории</span></a></li>

				<li class="@if(Route::is('admin.colors*')) active @endif"><a href="{{ route('admin.colors.index') }}"><i class="lnr lnr-highlight"></i> <span>Цвета</span></a></li>

				<li class="@if(Route::is('admin.manufacturers*')) active @endif"><a href="{{ route('admin.manufacturers.index') }}"><i class="lnr lnr-apartment"></i> <span>Производители</span></a></li>

				<li class="@if(Route::is('admin.thicknesses*')) active @endif"><a href="{{ route('admin.thicknesses.index') }}"><i class="lnr lnr-layers"></i> <span>Толщина</span></a></li>

				<li class="@if(Route::is('admin.about.company*')) active @endif"><a href="{{ route('admin.about.company.index') }}"><i class="lnr lnr-cog"></i> <span>О компании</span></a></li>

				<li class="@if(Route::is('admin.products*')) active @endif"><a href="{{ route('admin.products.index') }}"><i class="lnr lnr-inbox"></i> <span>Товары</span></a></li>

				<li class="@if(Route::is('admin.banners*')) active @endif"><a href="{{ route('admin.banners.index') }}"><i class="lnr lnr-picture"></i> <span>Баннеры на главной</span></a></li>
			</ul>
		</nav>
	</div>
</div>