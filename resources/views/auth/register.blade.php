@extends('client.layouts.layout')
@section('content')
<div class="auth">
    <div class="row">
        <div class="column">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        <!-- CSRF Field -->  
                        @csrf     
                        <div class="form-group">
                            <label for="email">Name</label>
                            <input id="name" type="text" name="name" required>
                            @error('name')
                            <small class="error">
                               {{ $message }}
                            </small>
                            @enderror                     
                           </div>             
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
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input id="password" type="password" name="password_confirmation" required>
                         
                        </div>
                        <div class="form-group submit">
                            <button type="submit">
                                {{ __('Register') }}
                            </button>
                         
                        </div>

                        <div class="form-group submit">
                            <a class="btn btn-secondary" href="{{route('google-auth')}}">Register with google</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection