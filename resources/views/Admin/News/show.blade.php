@extends('Admin.Layouts.index')

@section('title', 'Производитель' . $manufacturer->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Производитель - {{ $manufacturer->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form>
						<div class="form-group">
							<label for="name">Название *</label>
							<input type="text" class="form-control" disabled value="{{ $manufacturer->name }}">
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection