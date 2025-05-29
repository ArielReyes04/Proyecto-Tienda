<x-app-layout>
    <div class="container main-content mt-4">
        <h3 class="mb-4"><i class="bi bi-box-seam me-2"></i>Crear Producto</h3>

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

        <form method="POST" action="{{ route('products.store') }}" id="formProducto">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <label for="name" class="form-label">Nombre</label>
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
                <div class="col-12 col-md-6 mb-4">
                    <label for="price" class="form-label">Precio</label>
                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        id="price"
                        class="form-control"
                        value="{{ old('price') }}"
                        min="0"
                        required
                    >
                    <x-input-error :messages="$errors->get('price')" class="input-error mt-2" />
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <label for="stock" class="form-label">Stock</label>
                    <input
                        type="number"
                        name="stock"
                        id="stock"
                        class="form-control"
                        value="{{ old('stock') }}"
                        min="0"
                        required
                    >
                    <x-input-error :messages="$errors->get('stock')" class="input-error mt-2" />
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <label for="category_id" class="form-label">Categoría</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @forelse ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @empty
                            <option value="" disabled>No hay categorías disponibles</option>
                        @endforelse
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="input-error mt-2" />
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-custom mt-3">
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
        .form-control, .form-select {
            background-color: #21262d;
            border: 1px solid #30363d;
            color: #e6edf3;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
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
        .row {
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
            .form-control, .form-select {
                font-size: 0.9rem;
            }
        }
    </style>
</x-app-layout>