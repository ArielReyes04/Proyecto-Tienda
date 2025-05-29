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
        .nav-link {
            color: #c9d1d9 !important;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #58a6ff !important;
        }
        .header {
            background: linear-gradient(135deg, #161b22 0%, #0d1117 100%);
            border-bottom: 1px solid #30363d;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .error {
            color: #f85149;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        @media (max-width: 576px) {
            .main-content {
                padding: 1.5rem;
            }
            .navbar-brand {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-vh-100 d-flex flex-column">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <i class="bi bi-shop-window me-2"></i>{{ config('app.name', 'Mi Tienda') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @include('layouts.navigation')
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="main-content flex-grow-1">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="text-center py-3" style="background-color: #161b22; color: #c9d1d9;">
            <p class="mb-0">© {{ date('Y') }} {{ config('app.name', 'Mi Tienda') }}. Todos los derechos reservados.</p>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <script>
        // Custom validation rule for email domain
        $.validator.addMethod("emailDomain", function(value, element, domain) {
            return this.optional(element) || value.endsWith("@" + domain);
        }, "El correo debe ser del dominio {0}");

        // Form validation
        $("#formRegistro").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    emailDomain: "espe.edu.ec"
                }
            },
            messages: {
                email: {
                    required: "Este campo es obligatorio",
                    email: "Ingrese un correo válido",
                    emailDomain: "El correo debe ser del dominio espe.edu.ec"
                }
            },
            errorClass: "error",
            errorElement: "div",
            highlight: function(element) {
                $(element).addClass("border-danger").removeClass("border-primary");
            },
            unhighlight: function(element) {
                $(element).removeClass("border-danger").addClass("border-primary");
            }
        });
    </script>
</body>
</html>