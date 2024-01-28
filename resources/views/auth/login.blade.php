@extends('client.layouts.layout')
@section('content')
<div class="auth">
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
                            <!-- Error for Email -->
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" required>
                            <!-- Error for Password -->
                        </div>
                        <div class="form-group">
                            <button type="submit">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                            <a  href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        </div>

                        <div class="form-group">
                            <a class="btn btn-secondary" href="{{route('google-auth')}}">Continue with google</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection