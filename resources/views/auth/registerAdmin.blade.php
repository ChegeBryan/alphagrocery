@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">

        <div class="card-body">
          <h4 class="card-title text-center">{{ __('Register') }}</h4>
          <form method="POST" action="{{ route('register.admin') }}">
            @csrf

            <div class="form-group">
              <label for="name">{{ __('Admin Name') }}</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                     value="{{ old('name') }}" required autocomplete="on" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>

            <div class="form-group">
              <label for="email">{{ __('E-Mail Address') }}</label>

              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                     value="{{ old('email') }}" required autocomplete="on">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>

            <div class="form-group">
              <label for="password">{{ __('Password') }}</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                     name="password" required autocomplete="new-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="password-confirm">{{ __('Confirm Password') }}</label>

              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                     autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary btn-block">
              {{ __('Register') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
