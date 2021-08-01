@extends('Admin.Layouts.index')

@section('title', 'О компании')

@section('content')
<div id="main-content">
	<div class="container-fluid">
		<h1 class="sr-only">Dashboard</h1>
		<div class="dashboard-section">

			<div class="section-heading clearfix">
				<h2 class="section-title">О компании</h2>
			</div>

			<div class="panel-content">
				<div class="row">

					<form action="{{ route('admin.about.company.index') }}" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Название компании</label>
							<input type="text" id="name" class="form-control @error('name') parsley-error @enderror" name="name" value="{{ old('name', $about->name) }}">

              @error('name')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="email">Электронная почта компании</label>
							<input type="email" id="email" class="form-control @error('email') parsley-error @enderror" name="email" value="{{ old('email', $about->email) }}">

              @error('email')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="phone">Телефон компании</label>
							<input type="text" id="phone" class="form-control @error('phone') parsley-error @enderror" name="phone" value="{{ old('phone', $about->phone) }}">

              @error('phone')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						@csrf

						<div class="form-group">
							<label for="description">Описание компании</label>
							<textarea id="description" class="form-control @error('description') parsley-error @enderror" name="description">{{ old('description', $about->description) }}</textarea>

              @error('description')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="image" class="control-label">Логотип</label>
							<br>
							<img src="{{ $about->logo ? Storage::url($about->logo) : asset('img/fallback-image.jpg') }}" id="imagePreview" alt="" width="200px">
							<br>
							<br>
							<input type="file" class="btn btn-primary" id="image" name="logo">

							@error('logo')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="workStart">Время начала работы</label>
							<input type="time" id="workStart" class="form-control @error('work_start') parsley-error @enderror" name="work_start" value="{{ old('work_start', date('H:i', strtotime($about->work_start))) }}">

              @error('work_start')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="workEnd">Время конца работы</label>
							<input type="time" id="workEnd" class="form-control @error('work_end') parsley-error @enderror" name="work_end" value="{{ old('work_end', date('H:i', strtotime($about->work_end))) }}">

              @error('work_end')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="adress">Адрес компании</label>
							<input type="text" id="adress" class="form-control @error('adress') parsley-error @enderror" name="adress" value="{{ old('adress', $about->adress) }}">

              @error('adress')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="vk">VK</label>
							<input type="text" id="vk" class="form-control @error('vk') parsley-error @enderror" name="vk" value="{{ old('vk', $about->vk) }}">

              @error('vk')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="facebook">Facebook</label>
							<input type="text" id="facebook" class="form-control @error('facebook') parsley-error @enderror" name="facebook" value="{{ old('facebook', $about->facebook) }}">

              @error('facebook')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="instagram">Instagram</label>
							<input type="text" id="instagram" class="form-control @error('instagram') parsley-error @enderror" name="instagram" value="{{ old('instagram', $about->instagram) }}">

              @error('instagram')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="telegram">Telegram</label>
							<input type="text" id="telegram" class="form-control @error('telegram') parsley-error @enderror" name="telegram" value="{{ old('telegram', $about->telegram) }}">

              @error('telegram')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						<br>

						<button type="submit" class="btn btn-success">Сохранить</button>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/Admin/imagePreview.js') }}"></script>
<script>
$('#phone').mask('+7(999)999-99-99');
</script>
@endsection