@extends('User.Layouts.index')

@section('title', 'О компании')

@section('content')
<div class="container">
	<nav aria-label="breadcrumb" class="mt-4 mt-xxl-5 mb-4">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
			<li class="breadcrumb-item active" aria-current="page">О компании</li>
		</ol>
	</nav>
</div>

<div class="about-bg d-flex">
	<div class="offset-lg-6 py-5 px-3 px-xl-5 text-md-center d-flex flex-column justify-content-center position-relative">
		<h1 class="mb-3 mb-xl-4">О компании АРБОР</h1>
		<p>Торговая Компания «АРБОР» уже более 10 лет является одним из крупнейших поставщиков материалов и комплектующих
			для производства мебели на рынке Республики Татарстан!</p>
		<p>Работая ранее как ООО «Строительный Мир», а ныне как Торговая Компания «АРБОР» мы успели зарекомендовать себя
			как надёжного поставщика качественных материалов!</p>
	</div>
</div>
<p class="col-lg-6 mx-auto text-center py-5 px-3">Как выясняется, не очень просто найти прихожую, кухонный гарнитур,
	шкаф, или любую другую мебель, которая бы вам безоговорочно подошла. В особенности, это касается офисной мебели.
	И практически единственным решением в этом случае становится распил.</p>

<!-- ADVANTAGES -->
<section class="advantages bg-gray-light">
	<div class="container">
		<h2 class="text-center mb-5">Преимущества работы с нами</h2>
		<ul class="row row-cols-lg-2 gy-4 gy-xl-5 pt-xl-3 list-unstyled">
			<li class="position-relative pt-4 ps-5">
				<span class="position-absolute top-0 start-0 fw-bold">01</span>
				<span>Вся продукция представляемая нашей компанией сертифицирована и соответствует всем европейским и российским
					стандартам качества и экологичности</span>
			</li>
			<li class="position-relative pt-4 ps-5">
				<span class="position-absolute start-0 fw-bold">02</span>
				<span>Помимо плитных материалов Мы с радостью готовы вам предложить широчайший ассортимент мебельной фурнитуры,
					крепёжных систем, а так же кромочного материала. Перечень предлагаемой фурнитуры постоянно обновляется
					в результате отбора наиболее востребованных, популярных и качественных изделий.</span>
			</li>
			<li class="position-relative pt-4 ps-5">
				<span class="position-absolute start-0 fw-bold">03</span>
				<span>Наша компания является единственным в Республике Татарстан дилером Богородской Мебельной Компании
					и мы с радостью готовы вам предложить широчайший ассортимент высококачественных столешниц и МДФ — фасадов,
					коллекция декоров на которые пополняется ежемесячно</span>
			</li>
			<li class="position-relative pt-4 ps-5">
				<span class="position-absolute start-0 fw-bold">04</span>
				<span>Складская программа и возможность поставки любых комплектующих под заказ позволяют удовлетворять спрос
					как крупных производителей мебели, так и розничных клиентов. Специалисты компании внимательно отнесутся
					к Вашим потребностям и предложат оптимальный вариант исполнения заказа.</span>
			</li>
			<li class="position-relative pt-4 ps-5">
				<span class="position-absolute start-0 fw-bold">05</span>
				<span>Гибкая система скидок, индивидуальный подход к покупателям — все это и многое другое способствует
					формированию прочных и стабильных партнёрских отношений. Успех ТК «АРБОР» сегодня — это, в первую очередь,
					успешная работа команды профессионалов-единомышленников.</span>
			</li>
			<li class="position-relative pt-4 ps-5">
				<span class="position-absolute start-0 fw-bold">06</span>
				<span>Мы тщательно контролируем качество поставляемой продукции, соответствие ассортимента и стоимости товара
					требованиям рынка, постоянно ведём поиск новых видов материалов, стремимся к расширению сети
					поставщиков</span>
			</li>
		</ul>
	</div>
</section>

<!--  -->
<section class="our-production py-5 my-xl-4">
	<div class="container">
		<h2 class="text-center mb-4">Наше производство</h2>
		<!-- Swiper -->
		<div class="position-relative rounded-10 mb-4">
			<div class="swiper-container swiper-production position-static col-xl-10">
				<div class="swiper-wrapper align-items-center h-100">
					<div class="swiper-slide">
						<img class="w-100" src="img/images/production-1.jpg" alt="">
					</div>
					<div class="swiper-slide">
						<img class="w-100" src="img/images/production-2.jpg" alt="">
					</div>
					<div class="swiper-slide">
						<img class="w-100" src="img/images/production-3.jpg" alt="">
					</div>
					<div class="swiper-slide">
						<img class="w-100" src="img/images/production-4.jpg" alt="">
					</div>
					<div class="swiper-slide">
						<img class="w-100" src="img/images/production-5.jpg" alt="">
					</div>
				</div>
				<div class="swiper-button-prev">
					<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M31.25 37.5L18.75 25L31.25 12.5" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
							stroke-linejoin="round" />
					</svg>
				</div>
				<div class="swiper-button-next">
					<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18.75 37.5L31.25 25L18.75 12.5" stroke="#FF9900" stroke-width="2" stroke-linecap="round"
							stroke-linejoin="round" />
					</svg>
				</div>
			</div>
		</div>
		<p class="text-center col-lg-8 col-xl-6 mx-auto">Значимость этих проблем настолько очевидна, что высокотехнологичная
			концепция общественного уклада не даёт нам иного выбора, кроме определения поставленных обществом задач.
			В частности, высокотехнологичная концепция общественного уклада
			позволяет оценить значение новых предложений.</p>
	</div>
</section>

<!-- CTA FORM -->
@include('User.Components.cta_form')
@endsection