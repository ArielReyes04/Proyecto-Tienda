<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel | Bienvenido</title>

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
        .navbar-custom {
            background-color: #161b22;
            border-bottom: 1px solid #30363d;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
            color: #ffffff !important;
            transition: color 0.3s ease;
        }
        .navbar-brand:hover {
            color: #58a6ff !important;
        }
        .btn-custom {
            border: 1px solid #30363d;
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #30363d;
            border-color: #58a6ff;
            color: #ffffff;
        }
        .btn-primary {
            background-color: #1f6feb;
            border-color: #1f6feb;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #388bff;
            border-color: #388bff;
        }
        .hero-section {
            background: linear-gradient(135deg, #161b22 0%, #0d1117 100%);
            border-radius: 12px;
            padding: 3rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            font-weight: 700;
            font-size: 2.5rem;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .lead {
            font-size: 1.25rem;
            font-weight: 300;
            color: #c9d1d9;
        }
        .icon-lg {
            font-size: 3rem;
            color: #58a6ff;
            margin-bottom: 1rem;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .navbar-nav .btn {
            margin-left: 10px;
        }
        @media (max-width: 576px) {
            h1 {
                font-size: 2rem;
            }
            .hero-section {
                padding: 2rem;
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="w-100">
        @if (Route::has('login'))
            <nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <i class="bi bi-shop-window me-2"></i>Mi Tienda
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="ms-auto d-flex align-items-center">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-success btn-custom">
                                    <i class="bi bi-speedometer2 me-1"></i> Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-light btn-custom me-2">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar sesión
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        @endif
    </header>

    <main class="flex-grow-1 d-flex justify-content-center align-items-center p-4">
        <div class="hero-section text-center">
            <i class="bi bi-stars icon-lg"></i>
            <h1>Bienvenido a la Plataforma</h1>
            <p class="lead">Administra tus productos, ventas y usuarios con una interfaz moderna y eficiente.</p>
        </div>
    </main>

    <footer class="text-center py-3" style="background-color: #161b22; color: #c9d1d9;">
        <p class="mb-0">&copy; {{ date('Y') }} Mi Tienda. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>