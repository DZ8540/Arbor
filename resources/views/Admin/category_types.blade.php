@extends('Admin.Layouts.index')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Главные категории</h2>
				{{-- <a href="{{ route('admin.category_type.create') }}" class="btn btn-success right">Добавить</a> --}}
			</div>

			<div class="panel-content">
				<div class="row">
					
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Название</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($category_types as $item)
								<tr>
									<th scope="row">{{ $item->id }}</th>
									<td>{{ $item->name }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection