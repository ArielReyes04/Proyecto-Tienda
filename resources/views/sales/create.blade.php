<x-app-layout>
    <div class="container main-content mt-4">
        <h3 class="mb-4"><i class="bi bi-cart-plus me-2"></i>Registrar Venta</h3>

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

        <form method="POST" action="{{ route('sales.store') }}" id="formVenta">
            @csrf
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-12 col-md-6 mb-4">
                        <label for="product_{{ $product->id }}" class="form-label">
                            {{ $product->name }} <span class="text-muted">(Stock: {{ $product->stock }})</span>
                        </label>
                        <input
                            type="number"
                            name="products[{{ $product->id }}]"
                            id="product_{{ $product->id }}"
                            class="form-control"
                            placeholder="Cantidad"
                            min="0"
                            max="{{ $product->stock }}"
                            value="{{ old('products.' . $product->id, 0) }}"
                        >
                        <x-input-error :messages="$errors->get('products.' . $product->id)" class="input-error mt-2" />
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted text-center">No hay productos disponibles para registrar.</p>
                    </div>
                @endforelse
            </div>
            <button type="submit" class="btn btn-success btn-custom mt-3">
                <i class="bi bi-check-circle me-1"></i> Guardar Venta
            </button>
        </form>
    </div>

    <style>
        .form-label {
            font-weight: 500;
            color: #c9d1d9;
            font-size: 0.9rem;
        }
        .form-label .text-muted {
            color: #8b949e !important;
            font-size: 0.85rem;
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
            .form-control {
                font-size: 0.9rem;
            }
        }
    </style>
</x-app-layout>