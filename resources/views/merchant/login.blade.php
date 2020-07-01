@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                            {{ __('E-Mail/Phone') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter E-Mail or Phone Number" autofocus>
                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('email')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter created password while registration" name="password" autocomplete="current-password">
                                @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('password')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('usertype') ? 'has-error' : ''}}">
                            <label for="usertype" class="col-md-4 col-form-label text-md-right">{{ __('Usertype ') }}</label>
                            <div class="col-md-6">
                                <select name="usertype" id="usertype" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="1">Buyer</option>
                                    <option value="2">Seller</option>
                                </select>
                                @if($errors->has('usertype'))
                                 <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('usertype') }}
                                 </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
