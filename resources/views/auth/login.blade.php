@extends('client.layouts.layout')
@section('content')
{{-- <div class="auth">
    <div class="row">
        <div class="column">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        <!-- CSRF Field -->  
                        @csrf                 
                       
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" name="email" required>
                            @error('email')
                                    <small class="error">
                                       {{ $message }}
                                    </small>
                                @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" required>
                            @error('password')
                            <small class="error">
                               {{ $message }}
                            </small>
                        @enderror
                        </div>
                        <div class="form-group submit">
                            <button type="submit">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                            <a  href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        </div>

                        <div class="form-group submit">
                            <a class="btn btn-secondary" href="{{route('google-auth')}}">Continue with google</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="customer-login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-12 col-md-12">
                <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                    <h3>Rất tiếc chúng tôi không phát triển tính năng đăng nhập, đăng ký cho người dùng</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="default-form-box">
                            <label>Email Address<span>*</span></label>
                            
                            <input id="email" type="email" name="email" required>
                            @error('email')
                                    <small class="error">
                                       {{ $message }}
                                    </small>
                                @enderror
                        </div>
                        <div class="default-form-box">
                            <label>Passwords<span>*</span></label>
                            <input id="password" type="password" name="password" required>
                            @error('password')
                            <small class="error">
                               {{ $message }}
                            </small>
                        @enderror
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                            <label class="checkbox-default mb-4" for="offer">
                                <input type="checkbox" id="offer" name="remember">
                                <span>Remember me</span>
                            </label>
                            <a href="#">Lost your password?</a>

                        </div>
                        <div class="form-group submit">
                            <a class="btn btn-secondary" href="{{route('google-auth')}}">Continue with google</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

          
        </div>
    </div>
</div>
@endsection