<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('svg/1B-withoutbg.svg')}}" alt="logo" width="32px" height="32px">
        </a>
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="fw-bolder ms-2">Inicio</span>
        </a>
        @auth
        <span class="vr me-3"></span>
        <div class="d-flex">
            <a class="fw-bolder navbar-brand" href="{{ route('sacado.list') }}">
                Listar
            </a>
            @if(Auth::user()->isAdmin === true)
            <span class="vr me-3"></span>
            <a class="fw-bolder text-success navbar-brand" href="{{ route('sacado.create') }}">
                Cadastrar
            </a>
            @endif
        </div>    
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <div class="d-flex gap-2">
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class=" btn btn-primary" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                            </li>
                        @endif
                    </div>
                @else
                    <div>
                        <button class="btn btn-secondary" type="button" disabled>
                            {{ Auth::user()->name }}
                        </button>
                        <a class="btn btn-outline-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
