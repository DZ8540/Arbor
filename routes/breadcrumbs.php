<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// User {

Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
  $trail->push('Главная', route('user.index'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
  $trail->parent('index');
  $trail->push('О компании', route('user.about'));
});

Breadcrumbs::for('services', function (BreadcrumbTrail $trail) {
  $trail->parent('index');
  $trail->push('Услуги', route('user.services'));
});

// News
Breadcrumbs::for('news', function (BreadcrumbTrail $trail) {
  $trail->parent('index');
  $trail->push('Новости', route('user.news'));
});
Breadcrumbs::for('news.item', function (BreadcrumbTrail $trail, $news) {
  $trail->parent('news');
  $trail->push($news->name, route('user.news.item', $news->slug));
});
// News

// Catalog
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
  $trail->parent('index');
  $trail->push('Каталог', route('user.catalog'));
});
Breadcrumbs::for('catalog.category', function (BreadcrumbTrail $trail, $category) {
  $trail->parent('catalog');
  $trail->push($category->name, route('user.category', $category->slug));
});
Breadcrumbs::for('catalog.product', function (BreadcrumbTrail $trail, $product) {
  $category = $product->category;

  $trail->parent('index');
  $trail->push($category->name, route('user.category', $category->slug));
  $trail->push($product->name, route('user.category', $product->slug));
});
// Catalog

Breadcrumbs::for('cart', function (BreadcrumbTrail $trail) {
  $trail->parent('index');
  $trail->push('Корзина', route('user.cart'));
});

Breadcrumbs::for('order', function (BreadcrumbTrail $trail) {
  $trail->parent('index');
  $trail->push('Оформление заказа', route('user.order'));
});

Breadcrumbs::for('search', function (BreadcrumbTrail $trail) {
  $trail->parent('index');
  $trail->push('Поиск', route('user.search'));
});

// }