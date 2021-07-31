@extends('Admin.Layouts.index')

@section('title', 'Цвет' . $color->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Цвет - {{ $color->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form>
						<div class="form-group">
							<label for="slug">Отображение в поисковой строке</label>
							<input type="text" class="form-control" value="{{ $color->slug }}" disabled>
						</div>

            <div class="form-group">
							<label for="slug">Название</label>
							<input type="text" class="form-control" value="{{ $color->name }}" disabled>
						</div>

						<div class="form-group">
							<label for="name">Цвет</label>
							<input type="color" class="form-control" value="{{ $color->hex_code }}" disabled>
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection