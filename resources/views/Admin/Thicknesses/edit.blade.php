@extends('Admin.Layouts.index')

@section('title', 'Редактирование толщины - ' . $thickness->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Редактирование толщины - {{ $thickness->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form action="{{ route('admin.thicknesses.update', $thickness) }}" method="post">
						<div class="form-group">
							<label for="slug">Отображение в поисковой строке</label>
							<input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug', $thickness->slug) }}">

              @error('slug')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						@csrf

            @method('PATCH')

            <input type="hidden" name="thickness" value="{{ $thickness->id }}">

						<div class="form-group">
							<label for="name">Толщина *</label>
							<input type="text" id="name" class="form-control @error('name') parsley-error @enderror" name="name" value="{{ old('name', $thickness->name) }}">

							@error('name')
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