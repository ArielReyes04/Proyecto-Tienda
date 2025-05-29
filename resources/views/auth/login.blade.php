<x-guest-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel | Iniciar Sesión</title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Google Fonts: Inter -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background-color: #0d1117;
                color: #e6edf3;
                font-family: 'Inter', sans-serif;
                line-height: 1.6;
            }
            .login-container {
                background: linear-gradient(135deg, #161b22 0%, #0d1117 100%);
                border-radius: 12px;
                padding: 2.5rem;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
                animation: fadeIn 1s ease-in-out;
                max-width: 400px;
                width: 100%;
            }
            .form-label {
                font-weight: 500;
                color: #c9d1d9;
                font-size: 0.9rem;
            }
            .form-control {
                background-color: #21262d;
                border: 1px solid #30363d;
                color: #e6edf3;
                border-radius: 8px;
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }
            .form-control:focus {
                background-color: #21262d;
                border-color: #58a6ff;
                box-shadow: 0 0 0 3px rgba(88, 166, 255, 0.2);
                color: #e6edf3;
            }
            .form-control::placeholder {
                color: #8b949e;
            }
            .input-error {
                color: #f85149;
                font-size: 0.85rem;
            }
            .btn-primary {
                background-color: #1f6feb;
                border-color: #1f6feb;
                border-radius: 8px;
                font-weight: 500;
                padding: 8px 16px;
                transition: all 0.3s ease;
            }
            .btn-primary:hover {
                background-color: #388bff;
                border-color: #388bff;
            }
            .link-forgot {
                color: #8b949e;
                font-size: 0.9rem;
                text-decoration: none;
                transition: color 0.3s ease;
            }
            .link-forgot:hover {
                color: #58a6ff;
                text-decoration: underline;
            }
            .form-check-input {
                background-color: #21262d;
                border: 1px solid #30363d;
                transition: border-color 0.3s ease;
            }
            .form-check-input:checked {
                background-color: #1f6feb;
                border-color: #1f6feb;
            }
            .form-check-input:focus {
                box-shadow: 0 0 0 3px rgba(88, 166, 255, 0.2);
                border-color: #58a6ff;
            }
            .form-check-label {
                color: #c9d1d9;
                font-size: 0.9rem;
            }
            .session-status {
                background-color: #238636;
                color: #e6edf3;
                padding: 0.75rem;
                border-radius: 8px;
                font-size: 0.9rem;
                margin-bottom: 1.5rem;
                text-align: center;
            }
            @keyframes fadeIn {
                0% { opacity: 0; transform: translateY(20px); }
                100% { opacity: 1; transform: translateY(0); }
            }
            @media (max-width: 576px) {
                .login-container {
                    padding: 1.5rem;
                }
            }
        </style>
    </head>
    <body class="d-flex flex-column justify-content-center align-items-center min-vh-100 p-4">
        <div class="login-container">
            <!-- Session Status -->
            <x-auth-session-status class="session-status" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="input-error mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="input-error mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <span class="form-check-label ms-2">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    @if (Route::has('password.request'))
                        <a class="link-forgot" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="btn-primary">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
</x-guest-layout>