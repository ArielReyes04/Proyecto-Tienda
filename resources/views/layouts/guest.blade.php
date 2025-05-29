<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        .guest-container {
            background: linear-gradient(135deg, #161b22 0%, #0d1117 100%);
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            animation: fadeIn 1s ease-in-out;
            max-width: 400px;
            width: 100%;
        }
        .logo-link {
            display: block;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .logo-link svg {
            fill: #58a6ff;
            transition: transform 0.3s ease, fill 0.3s ease;
        }
        .logo-link:hover svg {
            fill: #388bff;
            transform: scale(1.1);
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 576px) {
            .guest-container {
                padding: 1.5rem;
            }
            .logo-link svg {
                width: 4rem;
                height: 4rem;
            }
        }
    </style>
</head>
<body class="d-flex flex-column justify-content-center align-items-center min-vh-100 p-4">
    <div class="text-center">
        <a href="/" class="logo-link">
            <x-application-logo class="w-20 h-20 fill-current" />
        </a>
    </div>

    <div class="guest-container">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>