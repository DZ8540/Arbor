@extends('User.Layouts.index')

@section('title', 'Оформление заказа')
		
@section('content')
<div class="container mb-5 cart-page">
	<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
			<li class="breadcrumb-item active" aria-current="page">Оформление заказа</li>
		</ol>
	</nav>
	<h1 class="mb-5">Оформление заказа</h1>
	<form class="row justify-content-between align-items-start position-relative" id="order-form">
		<!-- left -->
		<div class="col-xl-6">
			<!-- PAYER TYPE -->
			<div>
				<!-- PAYER types -->
				<div class="mb-5">
					<div class="h4 mb-4 d-flex align-items-center mb-3">
						<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path
								d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path
								d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path
								d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<span>Тип плательщика</span>
					</div>
					<fieldset class="form-check mb-3">
						<input type="radio" name="payer" value="individ" id="individual" class="form-check-input"
							onchange="changeFieldset(this.value, this.getAttribute('name'), this.closest('form').id)" checked>
						<label for="individual">Физическое лицо</label>
					</fieldset>
					<fieldset class="form-check">
						<input type="radio" name="payer" value="ent" id="entity" class="form-check-input"
							onchange="changeFieldset(this.value, this.getAttribute('name'), this.closest('form').id)">
						<label for="entity">Юридическое лицо</label>
					</fieldset>
				</div>
				<!-- individual payer -->
				<fieldset class="mb-4 payer" id="individ">
					<div class="h4 mb-4 d-flex align-items-center">
						<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path
								d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<span>Покупатель</span>
					</div>
					<fieldset class="mb-4">
						<label for="user-name" class="mb-1 required">Имя</label>
						<input id="user-name" type="text" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="user-email" class="mb-1 required">E-mail</label>
						<input id="user-email" type="email" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="user-tel" class="mb-1 required">Телефон</label>
						<input id="user-tel" type="tel" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="user-comment" class="mb-1">Комментарий к заказу</label>
						<textarea id="user-comment" cols="30" rows="3" class="form-control"></textarea>
					</fieldset>
				</fieldset>
				<!-- entity payer -->
				<fieldset class="mb-4 payer d-none" id="ent">
					<fieldset class="mb-4">
						<label for="location" class="mb-1 required">Местоположение</label>
						<input id="location" type="text" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="Index" class="mb-1 required">Индекс</label>
						<input id="Index" type="text" class="form-control" required>
					</fieldset>
					<div class="h4 mb-4 d-flex align-items-center">
						<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path
								d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<span>Покупатель</span>
					</div>
					<fieldset class="mb-4">
						<label for="company-name" class="mb-1 required">Название компании</label>
						<input id="company-name" type="text" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="legal-address" class="mb-1 required">Юридический адрес</label>
						<input id="legal-address" type="text" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="inn" class="mb-1 required" title="Идентификационный номер налогоплательщика">ИНН</label>
						<input id="inn" type="text" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="kpp" class="mb-1 required" title="КПП — это набор цифр, дополняющий ИНН">КПП</label>
						<input id="kpp" type="text" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="contact" class="mb-1 required">Контактное лицо</label>
						<input id="contact" type="text" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="email" class="mb-1 required">E-mai</label>
						<input id="email" type="email" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="tel" class="mb-1 required">Телефон</label>
						<input id="tel" type="tel" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="comment" class="mb-1">Комментарий к заказу</label>
						<textarea name="" id="comment" cols="30" rows="3" class="form-control"></textarea>
					</fieldset>
				</fieldset>
			</div>
			<!-- DELIVERY -->
			<div>
				<!-- DELIVERY types -->
				<div class="mb-4">
					<div class="h4 d-flex align-items-center mb-3">
						<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M16 3H1V16H16V3Z" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
							<path d="M16 8H20L23 11V16H16V8Z" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
							<path
								d="M5.5 21C6.88071 21 8 19.8807 8 18.5C8 17.1193 6.88071 16 5.5 16C4.11929 16 3 17.1193 3 18.5C3 19.8807 4.11929 21 5.5 21Z"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path
								d="M18.5 21C19.8807 21 21 19.8807 21 18.5C21 17.1193 19.8807 16 18.5 16C17.1193 16 16 17.1193 16 18.5C16 19.8807 17.1193 21 18.5 21Z"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<span>Доставка</span>
					</div>
					<fieldset class="form-check mb-3">
						<input type="radio" name="delivery" value="cour" id="courier" class="form-check-input"
							onchange="changeFieldset(this.value, this.getAttribute('name'), this.closest('form').id)" checked>
						<label for="courier">Доставка курьером</label>
					</fieldset>
					<fieldset class="form-check">
						<input type="radio" name="delivery" value="pick" id="pickup" class="form-check-input"
							onchange="changeFieldset(this.value, this.getAttribute('name'), this.closest('form').id)">
						<label for="pickup">Самовывоз</label>
					</fieldset>
				</div>
				<!-- courier -->
				<fieldset class="delivery" id="cour">
					<fieldset class="mb-4">
						<label for="address" class="mb-1 required">Адрес доставки</label>
						<input id="address" type="text" class="form-control" required>
					</fieldset>
					<fieldset class="mb-4">
						<label for="deliv-comment" class="mb-1">Комментарий к доставке</label>
						<textarea name="" id="deliv-comment" cols="30" rows="3" class="form-control"></textarea>
					</fieldset>
				</fieldset>
				<!-- pickup -->
				<fieldset class="delivery d-none mb-4" id="pick">
					<div class="d-flex flex-wrap rounded-10 bg-gray-light p-3 fs-5 mb-4">
						<span class="me-4">Мы находимся по адресу:</span>
						<span class="fw-6">ул. Улица, д.35</span>
					</div>
					<script async
						src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9fb482a74d255d722e01314f6d53db11f7420412c89abe56a2f0db0b337ef36e&amp;width=100%25&amp;height=302px&amp;lang=ru_RU&amp;scroll=false">
					</script>
				</fieldset>
			</div>
			<!-- PAYMENT TYPE -->
			<div>
				<!-- PAYER types -->
				<div class="mb-5">
					<div class="h4 mb-4 d-flex align-items-center mb-3">
						<svg class="me-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M21 4H3C1.89543 4 1 4.89543 1 6V18C1 19.1046 1.89543 20 3 20H21C22.1046 20 23 19.1046 23 18V6C23 4.89543 22.1046 4 21 4Z"
								stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M1 10H23" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<span>Тип оплаты</span>
					</div>
					<fieldset class="form-check mb-3">
						<input type="radio" name="payment-type" id="bank-card" class="form-check-input" checked>
						<label for="bank-card">Банковская карта</label>
					</fieldset>
					<fieldset class="form-check mb-3">
						<input type="radio" name="payment-type" id="qr-code" class="form-check-input">
						<label for="qr-code">По QR-коду</label>
					</fieldset>
					<fieldset class="form-check">
						<input type="radio" name="payment-type" id="cash-money" class="form-check-input">
						<label for="cash-money">При получении</label>
					</fieldset>
				</div>
				<div></div>
			</div>
		</div>
		<!-- right -->
		<div class="col-xl-5 col-xxl-4 position-sticky top-0 start-0">
			<div class="shopping-sidebar pb-4 fw-6 rounded-10">
				<div class="border-bottom d-flex justify-content-between p-3 pt-4 px-xl-4">
					<div class="h4 mb-0">Ваш заказ</div>
					<a href="cart.html" class="c-accent">Изменить</a>
				</div>
				<div class="p-3 px-xl-4 border-bottom">
					<div class="d-flex justify-content-between mb-2 mb-lg-3">
						<div class="fw-normal">Товары, 3 шт.</div>
						<div>10515 ₽</div>
					</div>
					<!-- если выбран самовывоз -->
					<div class="d-flex justify-content-between mb-2 mb-lg-3">
						<div class="fw-normal me-2">Самовывоз</div>
						<div class="text-end">ул. Большая Красная, д.35</div>
					</div>
				</div>
				<div class="d-flex p-3 px-xl-4 justify-content-between h4 mb-0">
					<div>Итого</div>
					<div>10515 ₽</div>
				</div>
				<!-- Выбранные услуги -->
				<div>
					<div class="h4 mb-3 px-3 px-xl-4">Выбранные услуги</div>
					<div class="border-top p-3 px-xl-4">
						<div class="d-flex justify-content-between mb-4">
							<div>1 ДЕТАЛЬ</div>
							<div>х 12 шт.</div>
						</div>
						<div class="d-flex justify-content-between mb-4">
							<div class="fw-normal">Распиловка</div>
							<div>
								<div class="mb-1">a. 17 мм</div>
								<div class="mb-1">b. 20 мм</div>
								<div class="mb-1">c. 20 мм</div>
								<div>d. 17 мм</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<div class="fw-normal">Кромление</div>
							<div>
								<div>Стороны: a, b, c, d</div>
							</div>
						</div>
					</div>
					<div class="border-top p-3 px-xl-4">
						<div class="d-flex justify-content-between mb-4">
							<div>2 ДЕТАЛЬ</div>
							<div>х 5 шт.</div>
						</div>
						<div class="d-flex justify-content-between mb-4">
							<div class="fw-normal">Распиловка</div>
							<div>
								<div class="mb-1">a. 17 мм</div>
								<div class="mb-1">b. 20 мм</div>
								<div class="mb-1">c. 20 мм</div>
								<div>d. 17 мм</div>
							</div>
						</div>
						<div class="d-flex justify-content-between">
							<div class="fw-normal">Кромление</div>
							<div>
								<div>Стороны: a, b, c, d</div>
							</div>
						</div>
					</div>
					<!-- если выбрана доставка -->
					<div class="border-top p-3 px-xl-4">
						<div class="d-flex justify-content-between">
							<div class="fw-normal">Доставка</div>
							<div>ул. Улица, д.35</div>
						</div>
					</div>
				</div>
				<div class="px-3 px-xl-4 mt-2 mt-xxl-4">
					<button class="bttn py-3 mb-3 w-100" data-bs-toggle="modal" data-bs-target="#checkoutModal">Оформить
						заказ</button>
					<button class="bttn py-3 mb-3 w-100" data-bs-toggle="modal" data-bs-target="#paymentQRModal">Оплатить
						QR</button>
				</div>
				<fieldset class="px-3 px-xl-4 d-flex fs-6">
					<input required type="checkbox" name="check" id="check" class="form-check-input flex-shrink-0 me-2 mt-0">
					<div>
						<label for="check" class="d-inline">Согласен на </label><a href="" class="d-inline">обработку персональных
							данных</a>
					</div>
				</fieldset>
			</div>
		</div>
	</form>
</div>
@endsection