<x-app-layout>
    <div class="container main-content mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0"><i class="bi bi-people me-2"></i>Listado de Usuarios</h3>
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-custom">
                <i class="bi bi-person-plus me-1"></i> Crear Usuario
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles->pluck('name')->first() ?? 'Sin rol' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No hay usuarios disponibles.</td>
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