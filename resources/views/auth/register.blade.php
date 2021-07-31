@extends('Admin.Layouts.index')

@section('title', 'Вход')

@section('content')
<div class="vertical-align-wrap">
  <div class="vertical-align-middle">
    <div class="auth-box register">
      <div class="content">
        <div class="header">
          <div class="logo text-center">{{ config('app.name', 'Arbor') }}</div>
          <p class="lead">Создать аккаунт</p>
        </div>
        <form class="form-auth-small" method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group">
            <label for="name" class="control-label">Имя</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
              <ul class="parsley-errors-list filled" id="parsley-id-29">
                <li class="parsley-required">{{ $message }}</li>
              </ul>
            @enderror
          </div>

          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
              <ul class="parsley-errors-list filled" id="parsley-id-29">
                <li class="parsley-required">{{ $message }}</li>
              </ul>
            @enderror
          </div>

          <div class="form-group">
            <label for="password" class="control-label">Пароль</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
              <ul class="parsley-errors-list filled" id="parsley-id-29">
                <li class="parsley-required">{{ $message }}</li>
              </ul>
            @enderror
          </div>

          <div class="form-group">
            <label for="password" class="control-label">Подтвердите пароль</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>

          <button type="submit" class="btn btn-primary btn-lg btn-block">Регистрация</button>
          <div class="bottom">
            <span class="helper-text">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/Admin/imagePreview.js') }}"></script>
@endsection