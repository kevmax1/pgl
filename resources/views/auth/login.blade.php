@extends('layouts.login')

@section('title')
    Login to - 
@endsection

@section('content')
<div class="panel panel-default panel-border-color panel-border-color-primary">
    <div class="panel-heading"><img src="/assets/img/logo-symbol.png" alt="logo" width="27" height="27" class="logo-img">{{ config('app.name', 'Laravel') }}<span class="splash-description">Please enter your user information.</span></div>
    <div class="panel-body">
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" placeholder="Email" autocomplete="off" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" name="password" type="password" placeholder="Password" class="form-control" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group row login-tools">
            <div class="col-xs-6 login-remember">
              <div class="be-checkbox">
                <input type="checkbox" {{ old('remember') ? 'checked' : '' }} id="remember">
                <label for="remember">Remember Me</label>
              </div>
            </div>
            <div class="col-xs-6 login-forgot-password"><a href="{{ route('password.request') }}">Forgot Password?</a></div>
          </div>
          <div class="form-group login-submit">
            <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Sign me in</button>
          </div>
        </form>
    </div>
</div>
<div class="splash-footer"><span>Don't have an account? <a href="{{ url('/contact_admin') }}">Contact the Admin</a></span></div>
@endsection
