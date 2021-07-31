@extends('Admin.Layouts.index')

@section('title', 'Редактирование категории - ' . $category->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Редактирование категории - {{ $category->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form action="{{ route('admin.categories.update', $category) }}" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label" for="categoryType">Главная категория *</label>
							<select class="form-control @error('category_type_id') parsley-error @enderror" id="categoryType" name="category_type_id">
								@foreach ($category_types as $item)
									<option value="{{ $item->id }}" @if($category->category_type_id == $item->id) selected @endif>{{ $item->name }}</option>
								@endforeach
							</select>

							@error('category_type_id')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="slug">Отображение в поисковой строке</label>
							<input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug', $category->slug) }}">

              @error('slug')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						@csrf

            @method('PATCH')

						<div class="form-group">
							<label for="name">Название *</label>
							<input type="text" id="name" class="form-control @error('name') parsley-error @enderror" name="name" value="{{ old('name', $category->name) }}">

							@error('name')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="image" class="control-label">Изображение категории *</label>
							<br>
							<img src="{{ Storage::url($category->image) }}" id="imagePreview" alt="" width="200px">
							<br>
							<br>
							<input type="file" class="btn btn-primary" id="image" name="image" value="{{ old('image', Storage::path($category->image)) }}">

							@error('image')
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
@endsection