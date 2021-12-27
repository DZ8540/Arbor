<div class="modal fade" id="callModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="callModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content rounded-10">
				<div class="modal-header border-0">
					<button type="button" class="btn-close mt-xxl-2 me-xxl-2" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form class="modal-body col-lg-10 px-xl-4 mx-auto pt-0 pb-5" action="{{ route('user.consult.call') }}" method="POST">
					<h3 class="h4 mb-4">Заказать обратный звонок</h3>
          @csrf
					<fieldset class="mb-4">
						<label for="callback-name" class="mb-1 required">Имя</label>
						<input id="callback-name" type="text" name="name" class="form-control" value="{{ old('name') }}" required />

            @error('name')
              <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
					</fieldset>
					<fieldset class="mb-4">
						<label for="callback-tel" class="mb-1 required">Телефон</label>
						<input id="callback-tel" type="tel" name="phone" value="{{ old('phone') }}" class="form-control" required />

            @error('phone')
              <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
					</fieldset>
					<fieldset class="mb-4">
						<label for="callback-email" class="mb-1">Время звонка</label>
						<input id="callback-email" type="time" name="time" value="{{ old('time') }}" class="form-control" />

            @error('time')
              <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
					</fieldset>
					<button class="bttn mx-auto mb-4 py-3" type="submit" data-bs-dismiss="modal">Отправить</button>
					<p class="mb-0"><span class="required"></span> — обязательно для заполнения</p>
				</form>
			</div>
		</div>
	</div>