@extends('Admin.Layouts.index')

@section('title', 'Производители')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Производители</h2>
				<a href="{{ route('admin.manufacturers.create') }}" class="btn btn-success right">Добавить</a>
			</div>

			<div class="panel-content">
				<div class="row">

					
					<table class="table table-hover">
						<thead>
							<tr>
								<td>#</td>
								<td>Название</td>
								<td>Действия</td>
							</tr>
						</thead>
						<tbody>
							@foreach($manufacturers as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>{{ $item->name }}</td>
									<td>
										<a href="{{ route('admin.manufacturers.show', $item) }}" class="btn btn-primary">Просмотр</a>
										<a href="{{ route('admin.manufacturers.edit', $item) }}" class="btn btn-warning">Редактировать</a>
										<form action="{{ route('admin.manufacturers.destroy', $item) }}" method="POST" style="display: inline">
											@method('DELETE')
                      @csrf
											<button type="submit" class="btn btn-danger">Удалить</button>
										</form>
									</td>
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