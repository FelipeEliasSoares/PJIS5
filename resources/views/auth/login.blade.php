
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Left side - Login Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="w-75">
                    

                        <h1 class="mb-2 fw-bold">Bem Vindo!</h1>
                        <p class="mb-4 text-muted">Digite seus dados para fazer login na sua conta.</p>

                        <x-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            </div>

                            <div class="mb-3">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                            </div>

                            <div class="mb-3">
                                <label for="remember_me" class="flex items-center">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <span class="ms-2 text-sm text-muted">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <x-button class="btn btn-primary w-100 py-2 mt-3">
                                {{ __('Log in') }}
                            </x-button>

                            <div class="text-center mt-3">
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-muted text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    
                </div>
            </div>

            <!-- Right side - Image -->
            <div class="col-md-6 d-none d-md-block" id="right_side_mage" style="background-color: #333;">
                
            </div>
        </div>
    </div>

@push('styles')
<style>
    body {
        background-color: #ffffff;
        font-family: Arial, sans-serif;
    }
    h1 {
        font-size: 24px;
        color: #333;
    }



    .form-label {
        font-weight: normal;
        color: #666;
        margin-bottom: 4px;
    }
    .form-control {
        border: none;
        border-radius: 4px;
        background-color: #f7f7f7;
        padding: 10px;
    }
    .form-control:focus {
        box-shadow: none;
        background-color: #f0f0f0;
    }
    .btn-primary {
        background-color: #5a55ca;
        border: none;
        border-radius: 4px;
        padding: 10px;
        font-weight: bold;
    }
    .btn-primary:hover {
        background-color: #4a46a8;
    }
    a {
        color: #5a55ca;
    }
    a:hover {
        color: #4a46a8;
    }
    .text-muted {
        color: #888 !important;
    }
</style>
@endpush