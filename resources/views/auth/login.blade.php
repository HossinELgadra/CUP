@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8">
           
            <div style="margin-top: 85px" class="card" style="display: flex; align-items: center; justify-content: center">
                
                <div  style="display: flex; align-items: center; justify-content: center" class="card-header">{{ __('تسجيل الدخول') }}</div>

                <div class="card-body">
                    <img src="{{ asset('assets/admin/dist/img/CupLogo.jpg')}}" style="margin-left: 200px;height: 150px" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div  class="row mb-3"  style="margin-left: 200px">
                            <div class="col-md-6 ">
                                <input id="email" type="email" class="form-control text-md-end @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="email" class="col-md-4 col-form-label ">{{ __('البريد الالكتروني') }}</label>
                        </div>

                        <div class="row mb-3" style="margin-left: 200px">
                            <div class="col-md-6 " >
                              
                                    <input id="password" placeholder="الرمز السري " type="password" class="form-control text-md-end  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        
                            </div>
                            <label for="password"  class="col-md-4 col-form-label " >{{ __('الرمز السري') }}</label>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div  class="row mb-0">
                            <div  style="margin-left: 350px" class="col-md-8 offset-md-4">
                                <button  type="submit" class="btn btn-primary">
                                    {{ __('تسجيل الدخول') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
