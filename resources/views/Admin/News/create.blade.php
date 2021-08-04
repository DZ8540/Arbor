@extends('Admin.Layouts.index')

@section('title', 'Добавление новости')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Добавление новости</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form action="{{ route('admin.news.store') }}" method="post">
						@csrf

						<div class="form-group">
							<label for="slug">Отображение в адресной строке</label>
							<input type="text" id="slug" class="form-control @error('slug') parsley-error @enderror" name="slug" value="{{ old('slug') }}">

							@error('slug')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<div class="form-group">
							<label for="name">Название *</label>
							<input type="text" id="name" class="form-control @error('name') parsley-error @enderror" name="name" value="{{ old('name') }}">

							@error('name')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<br>

						<button type="submit" class="btn btn-success">Добавить</button>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection