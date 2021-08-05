@extends('Admin.Layouts.index')

@section('title', 'Новости')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Новости</h2>
				<a href="{{ route('admin.news.create') }}" class="btn btn-success right">Добавить</a>
			</div>

			<div class="panel-content">
				<div class="row">

					
					<table class="table table-hover">
						<thead>
							<tr>
								<td>#</td>
								<td>Отображение в адресной строке</td>
								<td>Название</td>
								<td>Дата создания</td>
								<td>Время создания</td>
								<td>Изображение</td>
								<td>Действия</td>
							</tr>
						</thead>
						<tbody>
							@foreach($news as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>{{ $item->slug }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->date }}</td>
									<td>{{ $item->time }}</td>
									<td>
                    <img src="{{ Storage::url($item->image) }}" width="200px" alt="">
                  </td>
									<td>
										<a href="{{ route('admin.news.show', $item) }}" class="btn btn-primary">Просмотр</a>
										<a href="{{ route('admin.news.edit', $item) }}" class="btn btn-warning">Редактировать</a>
										<form action="{{ route('admin.news.destroy', $item) }}" method="POST" style="display: inline">
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