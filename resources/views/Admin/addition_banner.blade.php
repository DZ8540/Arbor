@extends('Admin.Layouts.index')

@section('title', 'Специальный баннер')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Специальный баннер</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form action="{{ route('admin.addition.banner.update') }}" method="post">
						@csrf

						<div class="form-group">
							<label for="title">Заголовок</label>
							<input type="text" id="title" class="form-control @error('title') parsley-error @enderror" name="title" value="{{ old('title', $check_banner ? $banner->title : '') }}">

							@error('title')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            @method('PATCH')
  
            <div class="form-group">
							<label for="description">Описание</label>
							<textarea id="description" class="form-control @error('description') parsley-error @enderror" cols="30" rows="10" name="description">{{ old('description', $check_banner ? $banner->description : '') }}</textarea>

							@error('description')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="link">Ссылка</label>
							<input type="text" id="link" class="form-control @error('link') parsley-error @enderror" name="link" value="{{ old('link', $check_banner ? $banner->link : '') }}">

							@error('link')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<br>

						<button type="submit" class="btn btn-success">Сохранить</button>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection