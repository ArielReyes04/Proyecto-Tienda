<x-app-layout>
    <div class="container main-content mt-4">
        <h3 class="mb-4"><i class="bi bi-tags me-2"></i>Crear Categoría</h3>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('categories.store') }}" id="formCategoria">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label">Nombre de la Categoría</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required
                >
                <x-input-error :messages="$errors->get('name')" class="input-error mt-2" />
            </div>
            <button type="submit" class="btn btn-success btn-custom">
                <i class="bi bi-check-circle me-1"></i> Guardar
            </button>
        </form>
    </div>

    <style>
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
        .alert-danger {
            background-color: #2e0f0f;
            border-color: #f85149;
            color: #f85149;
            border-radius: 8px;
        }
        .alert-danger .btn-close {
            filter: invert(1) grayscale(100%) brightness(150%);
        }
        .btn-custom {
            border: 1px solid #30363d;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-success {
            background-color: #238636;
            border-color: #238636;
        }
        .btn-success:hover {
            background-color: #2ea043;
            border-color: #2ea043;
        }
        h3 {
            color: #ffffff;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .mb-4 {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 576px) {
            h3 {
                font-size: 1.5rem;
            }
            .form-control {
                font-size: 0.9rem;
            }
        }
    </style>
</x-app-layout>