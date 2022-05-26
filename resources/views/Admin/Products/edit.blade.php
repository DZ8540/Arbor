@extends('Admin.Layouts.index')

@section('title', 'Редактирование товара - ' . $product->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Редактирование товара - {{ $product->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label" for="category_id">Категория *</label>
							<select class="form-control @error('category_id') parsley-error @enderror" id="category_id" name="category_id">
								@foreach ($categories as $item)
									<option @if($product->category->id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>

							@error('category_id')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="slug">Отображение в поисковой строке</label>
							<input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug', $product->slug) }}">

              @error('slug')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						@csrf

						<div class="form-group">
							<label for="name">Название *</label>
							<input type="text" id="name" class="form-control @error('name') parsley-error @enderror" name="name" value="{{ old('name', $product->name) }}">

							@error('name')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="description">Описание *</label>
							<textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') parsley-error @enderror">{{ old('description', $product->description) }}</textarea>

							@error('description')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="image" class="control-label">Главное изображение товара *</label>
							<br>
							<img src="{{ $product->image }}" id="imagePreview" alt="" width="200px">
							<br>
							<br>
							<input type="file" class="btn btn-primary" id="image" name="image">

							@error('image')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="gallery" class="control-label">Остальные изображения товара</label>
							<br>
							<div id="galleryPreview" style="display: flex; overflow: scroll">
								@foreach($product->productImages as $image)
									<div style="margin-right: 20px; position: relative">
										<img src="{{ Storage::url($image->image) }}" width="200px" alt="">
									</div>
								@endforeach
							</div>
							<br>
							<input type="file" class="btn btn-primary" id="gallery" name="gallery[]" multiple>

							@error('gallery')
							<ul class="parsley-errors-list filled" id="parsley-id-29">
								<li class="parsley-required">{{ $message }}</li>
							</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="code">Код *</label>
							<input type="text" id="code" class="form-control" name="code" value="{{ old('code', $product->code) }}">

              @error('code')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="measure">Единица измерения *</label>
							<input type="text" id="measure" class="form-control @error('measure') parsley-error @enderror" name="measure" value="{{ old('measure', $product->measure) }}">

							@error('measure')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="price">Цена</label>
							<input type="number" id="price" class="form-control" name="price" value="{{ old('price', $product->price) }}">

              @error('price')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<input type="hidden" name="product" value="{{ $product->id }}">

						<div class="form-group">
							<label for="format">Формат *</label>
							<input type="text" id="format" class="form-control" name="format" value="{{ old('format', $product->format) }}">

              @error('format')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="article">Артикул *</label>
							<input type="text" id="article" class="form-control" name="article" value="{{ old('article', $product->article) }}">

              @error('article')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						@method('PATCH')

						<div class="form-group">
							<label for="count">Количество</label>
							<input type="number" id="count" class="form-control" name="count" value="{{ old('count', $product->count) }}">

              @error('count')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>
            
						<div class="form-group">
							<label class="control-label" for="manufacturer_id">Производитель *</label>
							<select class="form-control @error('manufacturer_id') parsley-error @enderror" id="manufacturer_id" name="manufacturer_id">
								@foreach ($manufacturers as $item)
									<option @if($product->manufacturer && $product->manufacturer->id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>

							@error('manufacturer_id')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label class="control-label" for="color_id">Цвет *</label>
							<select class="form-control @error('color_id') parsley-error @enderror" id="color_id" name="color_id">
								@foreach ($colors as $item)
									<option @if($product->color && $product->color->id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>

							@error('color_id')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label class="control-label" for="thickness_id">Толщина *</label>
							<select class="form-control @error('thickness_id') parsley-error @enderror" id="thickness_id" name="thickness_id">
								@foreach ($thicknesses as $item)
									<option @if($product->thickness && $product->thickness->id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
								@endforeach
							</select>

							@error('thickness_id')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<br>

						<button type="submit" class="btn btn-success">Изменить</button>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/Admin/imagePreview.js') }}"></script>
<script src="{{ asset('js/Admin/galleryPreview.js') }}"></script>
@endsection