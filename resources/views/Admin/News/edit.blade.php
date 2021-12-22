@extends('Admin.Layouts.index')

@section('title', 'Редактирование новости - ' . $news->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Редактирование новости - {{ $news->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form action="{{ route('admin.news.update', $news) }}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="form-group">
							<label for="slug">Отображение в адресной строке</label>
							<input type="text" id="slug" class="form-control @error('slug') parsley-error @enderror" name="slug" value="{{ old('slug', $news->slug) }}">

							@error('slug')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="name">Название *</label>
							<input type="text" id="name" class="form-control @error('name') parsley-error @enderror" name="name" value="{{ old('name', $news->name) }}">

							@error('name')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            @method('PATCH')

            <div class="form-group">
							<label for="description">Описание *</label>
							<textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') parsley-error @enderror">{{ old('description', $news->description) }}</textarea>

							@error('description')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <input type="hidden" name="news" value="{{ $news->id }}">

            <div class="form-group">
							<label for="image" class="control-label">Главное изображение новости</label>
							<br>
							<img src="{{ $news->image }}" id="imagePreview" alt="" width="200px">
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
							<label for="gallery" class="control-label">Остальные изображения новости</label>
							<br>
							<div id="galleryPreview" style="display: flex; overflow: scroll">
                @foreach($news->newsImages as $item)
									<div style="margin-right: 20px; position: relative">
										<img src="{{ Storage::url($item->image) }}" width="200px" alt="">
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