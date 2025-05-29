<x-app-layout>
    <div class="container main-content mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0"><i class="bi bi-tags me-2"></i>Categorías</h3>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-custom">
                <i class="bi bi-plus-circle me-1"></i> Crear Categoría
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $cat)
                        <tr>
                            <td>{{ $cat->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-muted">No hay categorías registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .table-dark {
            background-color: #21262d;
            border: 1px solid #30363d;
            --bs-table-bg: #21262d;
            --bs-table-color: #e6edf3;
            --bs-table-border-color: #30363d;
            --bs-table-hover-bg: #30363d;
            --bs-table-hover-color: #ffffff;
        }
        .table-dark th {
            font-weight: 600;
            color: #c9d1d9;
            background-color: #161b22;
        }
        .table-dark td {
            color: #e6edf3;
            vertical-align: middle;
        }
        .table-dark .text-muted {
            color: #8b949e !important;
        }
        .btn-custom {
            border: 1px solid #30363d;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #1f6feb;
            border-color: #1f6feb;
        }
        .btn-primary:hover {
            background-color: #388bff;
            border-color: #388bff;
        }
        h3 {
            color: #ffffff;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 576px) {
            .table-responsive {
                font-size: 0.9rem;
            }
            h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</x-app-layout>