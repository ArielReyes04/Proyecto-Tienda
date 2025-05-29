<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 px-6 py-8 bg-gray-900 text-white rounded-lg shadow-lg animate-fadeIn" style="background-color: #161b22; border: 1px solid #30363d;">
        <h2 class="text-2xl font-bold mb-2 text-white"><i class="bi bi-person-circle me-2"></i>Bienvenido, {{ Auth::user()->name }}</h2>
        <p class="text-sm text-gray-400 mb-6">Rol: {{ Auth::user()->getRoleNames()->first() }}</p>
        <p class="text-xs text-gray-500 mb-6">Fecha y hora: {{ now()->format('h:i A -05, l, F d, Y') }} (09:12 PM -05, Wednesday, May 28, 2025)</p>

        @role('admin|secre')
            <a href="{{ route('users.index') }}"
                class="inline-block mb-2 mr-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded transition duration-200 btn-custom">
                <i class="bi bi-people me-1"></i> Gestión de Usuarios
            </a>
        @endrole

        @role('bodega')
            <a href="{{ route('categories.index') }}"
                class="inline-block mb-2 mr-2 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded transition duration-200 btn-custom">
                <i class="bi bi-tags me-1"></i> Gestión de Categorías
            </a>
            <a href="{{ route('products.index') }}"
                class="inline-block mb-2 mr-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded transition duration-200 btn-custom">
                <i class="bi bi-box-seam me-1"></i> Gestión de Productos
            </a>
        @endrole

        @role('cajera')
            <a href="{{ route('sales.index') }}"
                class="inline-block mb-2 mr-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded transition duration-200 btn-custom">
                <i class="bi bi-cart-check me-1"></i> Registro de Ventas
            </a>
        @endrole
    </div>

    <style>
        .animate-fadeIn {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .btn-custom {
            border: 1px solid #30363d;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            border-color: #58a6ff;
            box-shadow: 0 0 0 3px rgba(88, 166, 255, 0.2);
        }
        h2 {
            color: #ffffff;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .text-gray-400 {
            color: #8b949e !important;
        }
        .text-gray-500 {
            color: #6e7681 !important;
        }
        @media (max-width: 576px) {
            h2 {
                font-size: 1.5rem;
            }
            .btn-custom {
                font-size: 0.9rem;
                padding: 6px 12px;
            }
        }
    </style>
</x-app-layout>