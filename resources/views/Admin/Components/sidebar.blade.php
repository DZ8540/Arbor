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
				
				<li class="@if(Route::is('admin.category.types')) active @endif"><a href="{{ route('admin.category.types') }}"><i class="lnr lnr-home"></i> <span>Главные категории</span></a></li>

				<li class="@if(Route::is('admin.categories.index')) active @endif"><a href="{{ route('admin.categories.index') }}"><i class="lnr lnr-home"></i> <span>Категории</span></a></li>
			</ul>
		</nav>
	</div>
</div>