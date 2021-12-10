@extends('Admin.Layouts.index')

@section('title', 'Главные категории')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Заказы</h2>
				{{-- <a href="{{ route('admin.category_type.create') }}" class="btn btn-success right">Добавить</a> --}}
			</div>

			<div class="panel-content">
				<div class="row">
					
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Тип плательщика</th>
								<th scope="col">Имя</th>
								<th scope="col">Email</th>
								<th scope="col">Телефон</th>
								<th scope="col">Тип оплаты</th>
								<th scope="col">Кол-во товаров</th>
								<th scope="col">Сумма</th>
								<th scope="col">Дата</th>
                <td>Действия</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($orders as $item)
								<tr>
									<th scope="row">{{ $item->id }}</th>
									<td>{{ $item->payerTypeForUser }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->email }}</td>
									<td>{{ $item->phone }}</td>
									<td>{{ $item->payTypeForUser }}</td>
									<td>{{ $item->package_count }}</td>
									<td>{{ $item->price }}</td>
									<td>{{ $item->created_at }}</td>
                  <td>
										<a href="{{ route('admin.orders.show', $item) }}" class="btn btn-primary">Просмотр</a>
										<form action="{{ route('admin.orders.delete', $item) }}" method="POST" style="display: inline">
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
          {{ $orders->links() }}
        </div>
			</div>
			
		</div>
	</div>
</div>
@endsection