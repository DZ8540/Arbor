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
							<label for="name">Название компании *</label>
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
							<label for="call_email">Электронная почта для заявок</label>
							<input type="call_email" id="call_email" class="form-control @error('call_email') parsley-error @enderror" name="call_email" value="{{ old('call_email', $about->call_email) }}">

              @error('call_email')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="phone">Телефон компании, отображающийся в шапке</label>
							<input type="text" id="phone" class="form-control @error('phone') parsley-error @enderror" name="phone" value="{{ old('phone', $about->phone) }}">

              @error('phone')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="commercial_phone">Телефон для коммерческих предложений</label>
							<input type="text" id="commercial_phone" class="form-control @error('commercial_phone') parsley-error @enderror" name="commercial_phone" value="{{ old('commercial_phone', $about->commercial_phone) }}">

              @error('commercial_phone')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="other_phone_1">Второй телефон</label>
							<input type="text" id="other_phone_1" class="form-control @error('other_phone_1') parsley-error @enderror" name="other_phone_1" value="{{ old('other_phone_1', $about->other_phone_1) }}">

              @error('other_phone_1')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="other_phone_2">Третий телефон</label>
							<input type="text" id="other_phone_2" class="form-control @error('other_phone_2') parsley-error @enderror" name="other_phone_2" value="{{ old('other_phone_2', $about->other_phone_2) }}">

              @error('other_phone_2')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

            <div class="form-group">
							<label for="other_phone_3">Четвертый телефон</label>
							<input type="text" id="other_phone_3" class="form-control @error('other_phone_3') parsley-error @enderror" name="other_phone_3" value="{{ old('other_phone_3', $about->other_phone_3) }}">

              @error('other_phone_3')
								<ul class="parsley-errors-list filled" id="parsley-id-29">
									<li class="parsley-required">{{ $message }}</li>
								</ul>
							@enderror
						</div>

						@csrf

						@method('PATCH')

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
							<label for="image" class="control-label">Фото о компании</label>
							<br>
							<img src="{{ $about->image ? Storage::url($about->image) : asset('img/fallback-image.jpg') }}" id="imagePreview" alt="" width="200px">
							<br>
							<br>
							<input type="file" class="btn btn-primary" id="image" name="image">

							@error('image')
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
							<label for="address">Адрес компании</label>
							<input type="text" id="address" class="form-control @error('address') parsley-error @enderror" name="address" value="{{ old('address', $about->address) }}">

              @error('address')
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