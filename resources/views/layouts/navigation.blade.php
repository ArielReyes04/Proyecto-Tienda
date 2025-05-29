<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container-fluid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="d-flex align-items-center w-100">
            <!-- Logo -->
            <div class="shrink-0 d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="navbar-brand">
                    <x-application-logo class="block h-9 w-auto fill-current me-2" style="fill: #ffffff;" />
                    Mi Tienda
                </a>
            </div>

            <!-- Navigation Links and Settings Dropdown (Desktop) -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Settings Dropdown -->
                <div class="d-flex align-items-center me-4">
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="btn btn-outline-light btn-custom d-flex align-items-center">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ms-1 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                
            </div>

            <!-- Hamburger (Mobile) -->
            <button class="navbar-toggler d-flex d-lg-none align-items-center ms-auto" type="button" @click="open = !open" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': !open}" class="d-lg-none pt-2 pb-3 bg-light border-top border-dark">
        <div class="space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-dark">
            <div class="px-4">
                <div class="font-medium text-base text-dark">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-dark-muted">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1 px-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="nav-link">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
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
        display: flex;
        align-items: center;
    }
    .navbar-brand:hover {
        color: #58a6ff !important;
    }
    .nav-link {
        color: #c9d1d9 !important;
        font-weight: 500;
        transition: color 0.3s ease, background-color 0.3s ease;
        padding: 0.5rem 1rem;
        border-radius: 8px;
    }
    .nav-link:hover {
        color: #58a6ff !important;
    }
    .nav-link.active {
        color: #58a6ff !important;
        background-color: #21262d;
    }
    .d-lg-none .nav-link {
        color: #000000 !important;
    }
    .d-lg-none .nav-link:hover {
        color: #ffffff !important;
        background-color: #000000;
    }
    .btn-custom {
        border: 1px solid #30363d;
        border-radius: 8px;
        padding: 8px 16px;
        color: #c9d1d9;
        background-color: #21262d;
        transition: all 0.3s ease;
    }
    .btn-custom:hover {
        background-color: #30363d;
        border-color: #58a6ff;
        color: #ffffff;
    }
    .dropdown-menu {
        background-color: #21262d;
        border: 1px solid #30363d;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
    .dropdown-item {
        color: black;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .dropdown-item:hover {
        background-color: #30363d;
        color: #58a6ff;
    }
    .navbar-toggler {
        border: none;
        color: #c9d1d9;
    }
    .navbar-toggler:hover {
        color: #58a6ff;
    }
    .bg-light {
        background-color: #ffffff !important;
    }
    .border-dark {
        border-color: #30363d !important;
    }
    .text-dark {
        color: #000000 !important;
    }
    .text-dark-muted {
        color: #333333 !important;
    }
    @media (max-width: 576px) {
        .navbar-brand {
            font-size: 1.25rem;
        }
    }
</style>