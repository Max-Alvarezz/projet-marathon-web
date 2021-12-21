@extends('layouts.app')

@section('content')
    <div class="container">
                <div class="card">
                    <p>{{ __('Login') }}</p>

                    <div class="formulaire-connexion">
                        
                        <form class="form-co" method="POST" action="{{ route('login') }}">
                            @csrf

                            <legend class="titles">connexion</legend>

                            <div class="input-box">
                                <label for="email" class="details">{{ __('E-Mail Address') }}</label>



                                <div class="input-box">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-box">
                                <label for="password">{{ __('Password') }}</label>

                                <div class="input-box">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="submit-inscription">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
@endsection

