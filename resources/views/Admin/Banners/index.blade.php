@extends('Admin.Layouts.index')

@section('title', 'Баннеры')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Баннеры</h2>
				<a href="{{ route('admin.banners.create') }}" class="btn btn-success right">Добавить</a>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<table class="table table-hover">
						<thead>
							<tr>
								<td>#</td>
								<td>Заголовок</td>
								<td>Описание</td>
								<td>Ссылка</td>
								<td>Изображение</td>
								<td>Специальный</td>
								<td>Действия</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($banners as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>{{ $item->title }}</td>
									<td>{{ $item->description }}</td>
									<td>{{ $item->link }}</td>
									<td>
										<img src="{{ $item->image }}" width="200px" alt="">
									</td>
									<td>{{ $item->is_additional }}</td>
									<td>
										<a href="{{ route('admin.banners.show', $item) }}" class="btn btn-primary">Просмотр</a>
										<a href="{{ route('admin.banners.edit', $item) }}" class="btn btn-warning">Редактировать</a>
										<form action="{{ route('admin.banners.destroy', $item) }}" method="POST" style="display: inline">
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