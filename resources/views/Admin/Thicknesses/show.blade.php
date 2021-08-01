@extends('Admin.Layouts.index')

@section('title', 'Толщина' . $thickness->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Толщина - {{ $thickness->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form>
						<div class="form-group">
							<label for="slug">Отображение в поисковой строке</label>
							<input type="text" class="form-control" value="{{ $thickness->slug }}" disabled>
						</div>

						<div class="form-group">
							<label for="name">Толщина</label>
							<input type="thickness" class="form-control" value="{{ $thickness->name }}" disabled>
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection