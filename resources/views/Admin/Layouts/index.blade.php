<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Админ панель - @yield('title') - {{ config('app.name', 'Arbor') }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/metisMenu/metisMenu.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('css/Admin/main.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
</head>

<body>
	<div id="wrapper">
		<!-- NAVBAR -->
    @includeWhen(Auth::check(), 'Admin.Components.header')
		<!-- END NAVBAR -->

		<!-- LEFT SIDEBAR -->
    @includeWhen(Auth::check(), 'Admin.Components.sidebar')
		<!-- END LEFT SIDEBAR -->

		<!-- MAIN CONTENT -->
		@yield('content')
		<!-- END MAIN CONTENT -->
	</div>

  @if (session()->has('success'))
    <div style="position: absolute; z-index: 1000; display: flex; justify-content: center; width: 100%; top: 15px;">
      <div>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <i class="fa fa-check-circle"></i> {{ session()->get('success') }}
        </div>
      </div>
    </div>
  @endif

  @if (session()->has('danger'))
    <div style="position: absolute; z-index: 1000; display: flex; justify-content: center; width: 100%; top: 15px;">
      <div>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <i class="fa fa-times-circle"></i> {{ session()->get('danger') }}
        </div>
      </div>
    </div>
  @endif

	<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor/metisMenu/metisMenu.js') }}"></script>
	<script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap-progressbar/js/bootstrap-progressbar.min.js') }}"></script>
	<script src="{{ asset('vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js') }}"></script>
	<script src="{{ asset('vendor/chartist-plugin-axistitle/chartist-plugin-axistitle.min.js') }}"></script>
	<script src="{{ asset('vendor/chartist-plugin-legend-latest/chartist-plugin-legend.js') }}"></script>
	<script src="{{ asset('vendor/toastr/toastr.js') }}"></script>
	<script src="{{ asset('js/Admin/common.js') }}"></script>
	@yield('scripts')
	<script>
		$(function () {

			// sparkline charts
			var sparklineNumberChart = function () {

				var params = {
					width: '140px',
					height: '30px',
					lineWidth: '2',
					lineColor: '#20B2AA',
					fillColor: false,
					spotRadius: '2',
					spotColor: false,
					minSpotColor: false,
					maxSpotColor: false,
					disableInteraction: false
				};

				$('#number-chart1').sparkline('html', params);
				$('#number-chart2').sparkline('html', params);
				$('#number-chart3').sparkline('html', params);
				$('#number-chart4').sparkline('html', params);
			};

			sparklineNumberChart();


			// traffic sources
			var dataPie = {
				series: [45, 25, 30]
			};

			var labels = ['Direct', 'Organic', 'Referral'];
			var sum = function (a, b) {
				return a + b;
			};

			new Chartist.Pie('#demo-pie-chart', dataPie, {
				height: "270px",
				labelInterpolationFnc: function (value, idx) {
					var percentage = Math.round(value / dataPie.series.reduce(sum) * 100) + '%';
					return labels[idx] + ' (' + percentage + ')';
				}
			});


			// progress bars
			$('.progress .progress-bar').progressbar({
				display_text: 'none'
			});

			// line chart
			var data = {
				labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				series: [
					[200, 380, 350, 480, 410, 450, 550],
				]
			};

			var options = {
				height: "200px",
				showPoint: true,
				showArea: true,
				axisX: {
					showGrid: false
				},
				lineSmooth: false,
				chartPadding: {
					top: 0,
					right: 0,
					bottom: 30,
					left: 30
				},
				plugins: [
					Chartist.plugins.tooltip({
						appendToBody: true
					}),
					Chartist.plugins.ctAxisTitle({
						axisX: {
							axisTitle: 'Day',
							axisClass: 'ct-axis-title',
							offset: {
								x: 0,
								y: 50
							},
							textAnchor: 'middle'
						},
						axisY: {
							axisTitle: 'Reach',
							axisClass: 'ct-axis-title',
							offset: {
								x: 0,
								y: -10
							},
						}
					})
				]
			};

			new Chartist.Line('#demo-line-chart', data, options);


			// sales performance chart
			var sparklineSalesPerformance = function () {

				var lastWeekData = [142, 164, 298, 384, 232, 269, 211];
				var currentWeekData = [352, 267, 373, 222, 533, 111, 60];

				$('#chart-sales-performance').sparkline(lastWeekData, {
					fillColor: 'rgba(90, 90, 90, 0.1)',
					lineColor: '#5A5A5A',
					width: '' + $('#chart-sales-performance').innerWidth() + '',
					height: '100px',
					lineWidth: '2',
					spotColor: false,
					minSpotColor: false,
					maxSpotColor: false,
					chartRangeMin: 0,
					chartRangeMax: 1000
				});

				$('#chart-sales-performance').sparkline(currentWeekData, {
					composite: true,
					fillColor: 'rgba(60, 137, 218, 0.1)',
					lineColor: '#3C89DA',
					lineWidth: '2',
					spotColor: false,
					minSpotColor: false,
					maxSpotColor: false,
					chartRangeMin: 0,
					chartRangeMax: 1000
				});
			}

			sparklineSalesPerformance();

			var sparkResize;
			$(window).on('resize', function () {
				clearTimeout(sparkResize);
				sparkResize = setTimeout(sparklineSalesPerformance, 200);
			});


			// top products
			var dataStackedBar = {
				labels: ['Q1', 'Q2', 'Q3'],
				series: [
					[800000, 1200000, 1400000],
					[200000, 400000, 500000],
					[100000, 200000, 400000]
				]
			};

			new Chartist.Bar('#chart-top-products', dataStackedBar, {
				height: "250px",
				stackBars: true,
				axisX: {
					showGrid: false
				},
				axisY: {
					labelInterpolationFnc: function (value) {
						return (value / 1000) + 'k';
					}
				},
				plugins: [
					Chartist.plugins.tooltip({
						appendToBody: true
					}),
					Chartist.plugins.legend({
						legendNames: ['Phone', 'Laptop', 'PC']
					})
				]
			}).on('draw', function (data) {
				if (data.type === 'bar') {
					data.element.attr({
						style: 'stroke-width: 30px'
					});
				}
			});

		});
	</script>
</body>

</html>