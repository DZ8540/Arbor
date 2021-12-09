@extends('Admin.Layouts.index')

@section('title', 'Заказ' . $item->name)

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">Заказ - {{ $item->name }}</h2>
			</div>

			<div class="panel-content">
				<div class="row">
					
					<form>
            <div class="form-group">
							<label for="name">Тип плательщика</label>
							<input type="text" class="form-control" disabled value="{{ $item->payerTypeForUser }}">
						</div>

            <div class="form-group">
							<label for="name">На имя</label>
							<input type="text" class="form-control" disabled value="{{ $item->name }}">
						</div>

            <div class="form-group">
							<label for="name">Email</label>
							<input type="text" class="form-control" disabled value="{{ $item->email }}">
						</div>

            <div class="form-group">
							<label for="name">Телефон</label>
							<input type="text" class="form-control" disabled value="{{ $item->phone }}">
						</div>

            @if ($item->payer_type)
              <div class="form-group">
                <label for="name">Местоположение</label>
                <input type="text" class="form-control" disabled value="{{ $item->location }}">
              </div>

              <div class="form-group">
                <label for="name">Индекс</label>
                <input type="text" class="form-control" disabled value="{{ $item->index }}">
              </div>

              <div class="form-group">
                <label for="name">Название компании</label>
                <input type="text" class="form-control" disabled value="{{ $item->company_name }}">
              </div>

              <div class="form-group">
                <label for="name">ИНН</label>
                <input type="text" class="form-control" disabled value="{{ $item->individual_tax_number }}">
              </div>

              <div class="form-group">
                <label for="name">КПП</label>
                <input type="text" class="form-control" disabled value="{{ $item->reason_code }}">
              </div>
            @endif

            <div class="form-group">
							<label for="description">Сообщение</label>
							<textarea name="description" id="description" cols="30" rows="10" disabled class="form-control">{{ old('description', $item->comment) }}</textarea>
						</div>

            <div class="form-group">
              <label for="name">Тип доставки</label>
              <input type="text" class="form-control" disabled value="{{ $item->delivery_type }}">
            </div>

            <div class="form-group">
              <label for="name">Адрес доставки</label>
              <input type="text" class="form-control" disabled value="{{ $item->delivery_address }}">
            </div>

            <div class="form-group">
							<label for="description">Сообщение доставки</label>
							<textarea name="description" id="description" cols="30" rows="10" disabled class="form-control">{{ old('description', $item->delivery_comment) }}</textarea>
						</div>

            <div class="form-group">
              <label for="name">Тип оплаты</label>
              <input type="text" class="form-control" disabled value="{{ $item->payTypeForUser }}">
            </div>

            <div class="form-group">
              <label for="name">Количество товаров</label>
              <input type="text" class="form-control" disabled value="{{ $item->package_count }}">
            </div>

            <div class="form-group">
              <label for="name">Сумма</label>
              <input type="text" class="form-control" disabled value="{{ $item->price }}">
            </div>

            <div class="form-group">
              <label for="name">Дата</label>
              <input type="text" class="form-control" disabled value="{{ $item->created_at }}">
            </div>

            <h2 class="section-title">Товары</h2>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Изображение</th>
                  <th scope="col">Товар</th>
                  <th scope="col">Количество</th>
                  <th scope="col">Цена</th>
                  <th scope="col">Услуги</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($item->order_products as $product)
                  <tr>
                    <td><img src="{{ Storage::url($product->image) }}" alt=""></td>
                    <td><a href="{{ route('admin.products.show', $product->slug) }}">{{ $product->name }}</a></td>
                    <td>{{ $product->pivot->count }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                      @foreach ($product->services as $item)
                        <p>Сторона a: {{ $item['side_a'] }} мм</p>
                        <p>Сторона b: {{ $item['side_b'] }} мм</p>
                        <p>Сторона c: {{ $item['side_c'] }} мм</p>
                        <p>Сторона d: {{ $item['side_d'] }} мм</p>
                        <p>Кол-во: {{ $item['count'] }}</p>
                      @endforeach
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection