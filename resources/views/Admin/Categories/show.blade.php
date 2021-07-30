@extends('Admin.Layouts.index')

@section('title', 'Категория' . $category->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Категория - {{ $category->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form>
						<div class="form-group">
							<label class="control-label" for="categoryType">Главная категория</label>
							<select class="form-control" disabled>
								<option>{{ $category->category_type->name }}</option>
							</select>
						</div>

						<div class="form-group">
							<label for="slug">Отображение в поисковой строке</label>
							<input type="text" class="form-control" value="{{ $category->slug }}" disabled>
						</div>

						<div class="form-group">
							<label for="name">Название</label>
							<input type="text" class="form-control" value="{{ $category->name }}" disabled>
						</div>

						<div class="form-group">
							<label for="image" class="control-label">Изображение категории</label>
							<br>
							<img src="{{ asset('img/fallback-image.jpg') }}" alt="" width="200px">
						</div>

						<br>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection