@extends('Admin.Layouts.index')

@section('title', 'Баннер - ' . $banner->title)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Баннер - {{ $banner->title }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form>
						<div class="form-group">
							<label for="title">Заголовок</label>
							<input type="text" value="{{ $banner->title }}" class="form-control" disabled>
						</div>

						<div class="form-group">
							<label for="description">Описание</label>
							<textarea cols="30" rows="10" class="form-control" disabled>{{ $banner->description }}</textarea>
						</div>

						<div class="form-group">
							<label for="link">Ссылка</label>
							<input type="text" class="form-control" value="{{ $banner->link }}" disabled>
						</div>

						<div class="form-group">
							<label for="image" class="control-label">Изображение</label>
							<br>
							<img src="{{ $banner->image ? Storage::url($banner->image) : asset('img/fallback-image.jpg') }}" alt="" width="200px">
							<br>
						</div>

            <div class="form-group">
							<label for="link">Специальный</label>
							<input type="text" class="form-control" value="{{ $banner->is_additional }}" disabled>
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection