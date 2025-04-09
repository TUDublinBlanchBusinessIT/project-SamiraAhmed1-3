@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="background-color: #f0f8ff; min-height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg" style="border-radius: 10px; background-color: #ffffff; margin-top: 10%;">
                    <div class="card-header text-center" style="background-color: #3498db; color: white; font-size: 1.5rem;">
                        <strong>Login</strong>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" style="font-weight: bold; color: #2c3e50;">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus style="border: 2px solid #3498db; padding: 12px;">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" style="font-weight: bold; color: #2c3e50;">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border: 2px solid #3498db; padding: 12px;">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember" style="font-size: 1rem; color: #2c3e50;">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" style="background-color: #3498db; border: none; padding: 12px; font-size: 1.1rem; border-radius: 5px;">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <div class="form-group text-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #3498db;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
