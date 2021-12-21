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
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{ $order->id }}</th>
      <td>{{ $order->payerTypeForUser }}</td>
      <td>{{ $order->name }}</td>
      <td>{{ $order->email }}</td>
      <td>{{ $order->phone }}</td>
      <td>{{ $order->payTypeForUser }}</td>
      <td>{{ $order->package_count }}</td>
      <td>{{ $order->price }}</td>
      <td>{{ $order->created_at }}</td>
    </tr>
  </tbody>
</table>
