@extends('Admin.Layouts.index')

@section('title', 'Товар - ' . $product->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Товар - {{ $product->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form>
						<div class="form-group">
							<label class="control-label">Категория</label>
							<select class="form-control" disabled>
								<option>{{ $product->category->name }}</option>
							</select>
						</div>

						<div class="form-group">
							<label for="slug">Отображение в поисковой строке</label>
							<input type="text" class="form-control" value="{{ $product->slug }}" disabled>
						</div>

						@csrf

						<div class="form-group">
							<label for="name">Название</label>
							<input type="text" class="form-control" value="{{ $product->name }}" disabled>
						</div>

						<div class="form-group">
							<label for="description">Описание *</label>
							<textarea cols="30" rows="10" class="form-control" disabled>{{ $product->description }}</textarea>
						</div>

						<div class="form-group">
							<label for="image" class="control-label">Главное изображение товара</label>
							<br>
							<img src="{{ $product->image }}" alt="" width="200px">
							<br>
						</div>

						<div class="form-group">
							<label class="control-label">Остальные изображения товара</label>
							<br>
							<div style="display: flex; overflow: scroll">
								@foreach($product->productImages as $image)
									<div style="margin-right: 20px; position: relative">
										<img src="{{ Storage::url($image->image) }}" width="200px" alt="">
									</div>
								@endforeach
							</div>
							<br>
						</div>

						<div class="form-group">
							<label for="code">Код</label>
							<input type="text" class="form-control" value="{{ $product->code }}" disabled>
						</div>

						<div class="form-group">
							<label for="price">Цена</label>
							<input type="number" class="form-control" value="{{ $product->price }}" disabled>
						</div>

						<div class="form-group">
							<label for="format">Формат</label>
							<input type="text" class="form-control" value="{{ $product->format }}" disabled>
						</div>

						<div class="form-group">
							<label for="format">Артикул</label>
							<input type="text" class="form-control" value="{{ $product->article }}" disabled>
						</div>

						<div class="form-group">
							<label for="format">Количество</label>
							<input type="number" class="form-control" value="{{ $product->count }}" disabled>
						</div>

						<div class="form-group">
							<label class="control-label" for="manufacturer_id">Производитель *</label>
							<select class="form-control" id="manufacturer_id" disabled>
								<option>{{ $product->manufacturer->name }}</option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label" for="color_id">Цвет</label>
							<select class="form-control" id="color_id" disabled>
								<option>{{ $product->color->name }}</option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label" for="thickness_id">Толщина</label>
							<select class="form-control" id="thickness_id" disabled>
								<option>{{ $product->thickness->name }}</option>
							</select>
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection