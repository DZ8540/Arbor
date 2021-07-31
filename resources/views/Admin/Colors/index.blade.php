@extends('Admin.Layouts.index')

@section('title', 'Цвета товаров')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Цвета</h2>
				<a href="{{ route('admin.colors.create') }}" class="btn btn-success right">Добавить</a>
			</div>

			<div class="panel-content">
				<div class="row">

					
					<table class="table table-hover">
						<thead>
							<tr>
								<td>#</td>
								<td>Отображение в адресной строке</td>
								<td>Название</td>
								<td>HEX код</td>
								<td>Цвет</td>
								<td>Действия</td>
							</tr>
						</thead>
						<tbody>
							@foreach($colors as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>{{ $item->slug }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item['hex_code'] }}</td>
									<td><span style="display:block;width:50px;height:20px;background-color:{{ $item['hex_code'] }}"></span></td>
									<td>
										<a href="{{ route('admin.colors.show', $item) }}" class="btn btn-primary">Просмотр</a>
										<a href="{{ route('admin.colors.edit', $item) }}" class="btn btn-warning">Редактировать</a>
										<form action="{{ route('admin.colors.destroy', $item) }}" method="POST" style="display: inline">
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