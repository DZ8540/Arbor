@extends('Admin.Layouts.index')

@section('title', 'Товары')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Товары</h2>
				<a href="{{ route('admin.products.create') }}" class="btn btn-success right">Добавить</a>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<table class="table table-hover">
						<thead>
							<tr>
								<td>#</td>
								<td>Отображение в поисковой строке</td>
								<td>Название</td>
								<td>Цена</td>
								<td>Категория</td>
								<td>Количество</td>
								<td>Изображение</td>
								<td>Действия</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>{{ $item->slug }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->price }}</td>
									<td>{{ $item->category->name }}</td>
									<td>{{ $item->count }}</td>
									<td>
										<img src="{{ $item->image }}" width="200px" alt="">
									</td>
									<td>
										<a href="{{ route('admin.products.show', $item) }}" class="btn btn-primary">Просмотр</a>
										<a href="{{ route('admin.products.edit', $item) }}" class="btn btn-warning">Редактировать</a>
										<form action="{{ route('admin.products.destroy', $item) }}" method="POST" style="display: inline">
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

        <div class="row">
          {{ $products->links() }}
        </div>
			</div>
			
		</div>
	</div>
</div>
@endsection