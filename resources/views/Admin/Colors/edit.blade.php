@extends('Admin.Layouts.index')

@section('title', 'Редактирование цвета - ' . $color->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Редактирование цвета - {{ $color->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form action="{{ route('admin.colors.update', $color) }}" method="post">
						<div class="form-group">
							<label for="slug">Отображение в поисковой строке</label>
							<input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug', $color->slug) }}">

              @error('slug')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						@csrf

            @method('PATCH')

            <input type="hidden" name="color" value="{{ $color->id }}">

						<div class="form-group">
							<label for="name">Название *</label>
							<input type="text" id="name" class="form-control @error('name') parsley-error @enderror" name="name" value="{{ old('name', $color->name) }}">

							@error('name')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="hex_code">Цвет *</label>
							<input type="color" id="hex_code" class="form-control @error('hex_code') parsley-error @enderror" name="hex_code" value="{{ old('hex_code', $color->hex_code) }}">

							@error('hex_code')
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