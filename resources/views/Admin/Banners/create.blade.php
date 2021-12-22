@extends('Admin.Layouts.index')

@section('title', 'Создание товара')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Создание нового баннера</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form action="{{ route('admin.banners.store') }}" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title">Заголовок *</label>
							<input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">

              @error('title')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						@csrf

						<div class="form-group">
							<label for="description">Описание *</label>
							<textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') parsley-error @enderror">{{ old('description') }}</textarea>

							@error('description')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="link">Ссылка *</label>
							<input type="text" id="link" class="form-control @error('link') parsley-error @enderror" name="link" value="{{ old('link') }}">

							@error('link')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="image" class="control-label">Изображение</label>
							<br>
							<img src="{{ asset('img/placeholder.png') }}" id="imagePreview" alt="" width="200px">
							<br>
							<br>
							<input type="file" class="btn btn-primary" id="image" name="image">

							@error('image')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            @if (!$show_additional_select)
              <div class="form-group">
                <label class="control-label" for="is_additional">Специальный</label>
                <select class="form-control @error('is_additional') parsley-error @enderror" id="is_additional" name="is_additional">
                  <option value="0">Нет</option>
                  <option value="1">Да</option>
                </select>

                @error('is_additional')
                  <ul class="parsley-errors-list filled" id="parsley-id-29">
                    <li class="parsley-required">{{ $message }}</li>
                  </ul>
                @enderror
              </div>
            @endif

						<br>

						<button type="submit" class="btn btn-success">Добавить</button>
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