@extends('Admin.Layouts.index')

@section('title', 'Вход')

@section('content')
<div class="vertical-align-wrap">
  <div class="vertical-align-middle">
    <div class="auth-box">
      <div class="content">
        <div class="header">
          <div class="logo text-center">{{ config('app.name', 'Arbor') }}</div>
          <p class="lead">Вход в админ панель</p>
        </div>
        <form class="form-auth-small" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="Email" name="email" required autocomplete="email" autofocus>

            @error('email')
              <ul class="parsley-errors-list filled" id="parsley-id-29">
                <li class="parsley-required">{{ $message }}</li>
              </ul>
            @enderror
          </div>

          <div class="form-group">
            <label for="password" class="control-label">Пароль</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="current-password">

            @error('password')
              <ul class="parsley-errors-list filled" id="parsley-id-29">
                <li class="parsley-required">{{ $message }}</li>
              </ul>
            @enderror
          </div>

          <div class="form-group clearfix">
            <label class="fancy-checkbox element-left">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <span>Запомнить меня</span>
            </label>
            <span class="helper-text element-right">Нет аккаунта? <a href="{{ route('register') }}">Регистрация</a></span>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block">Войти</button>
          <div class="bottom">
            <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Забыли пароль?</a></span>
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