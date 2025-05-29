<x-app-layout>
    <div class="container main-content mt-4">
        <h3 class="mb-4"><i class="bi bi-person-plus me-2"></i>Crear Usuario</h3>

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

        <form method="POST" action="{{ route('users.store') }}" id="formRegistro">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                <x-input-error :messages="$errors->get('name')" class="input-error mt-2" />
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">Email (@espe.edu.ec)</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                <x-input-error :messages="$errors->get('email')" class="input-error mt-2" />
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <x-input-error :messages="$errors->get('password')" class="input-error mt-2" />
            </div>
            <div class="mb-4">
                <label for="role" class="form-label">Rol</label>
                <select name="role" id="role" class="form-select">
                    @forelse ($roles as $role)
                        @if(Auth::user()->hasRole('secre') && $role->name === 'admin')
                            @continue
                        @endif
                        <option value="{{ $role->name }}" {{ old('role') === $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                    @empty
                        <option value="" disabled>No hay roles disponibles</option>
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('role')" class="input-error mt-2" />
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