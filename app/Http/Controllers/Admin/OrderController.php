<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Service;

class OrderController extends BaseController
{
  public function index()
  {
    $order_columns = ['id', 'payer_type', 'name', 'email', 'phone', 'pay_type', 'package_count', 'price', 'created_at'];
    $orders = Order::select($order_columns)->get();

    return view('Admin.Orders.index', compact('orders'));
  }

  public function show(Order $id)
  {
    $services_columns = ['side_a', 'side_b', 'side_c', 'side_d', 'count'];
    $products = $id->products;

    foreach ($products as $item) {
      $pivot_id = $item->pivot->id;
      $services = Service::where('order_product_id', $pivot_id)->select($services_columns)->get();

      $services_for_item = [];
      foreach ($services as $service) {
        $services_for_item[] = $service->toArray();
      }

      $item->services = $services_for_item;
    }

    $id->order_products = $products;

    return view('Admin.Orders.show', [
      'item' => $id
    ]);
  }

  public function delete(Order $id)
  {
    foreach ($id->products as $item) {
      $pivot_id = $item->pivot->id;
      $services = Service::where('order_product_id', $pivot_id)->get();

      foreach ($services as $item) {
        $item->delete();
      }

      $item->pivot->delete();
    }

    $id->delete();
    return redirect()->route('admin.orders.index')->with('danger', 'Заказ был удален');
  }
}
