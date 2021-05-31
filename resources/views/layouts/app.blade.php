<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    @livewireStyles

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create-revista.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    <!-- Agregando CDN para toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar sólo si el usuario está autenticado -->
                    @if(auth()->check())
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('revistas.index') }}">Revistas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('areas_conocimiento.index') }}">Áreas de conocimiento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frecuencias.index') }}">Frecuencias
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('subsistemas.index') }}">Subsistemas
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entidad_editoras.index') }}">Entidad Editoras
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('editoriales.index') }}">Editoriales
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('idiomas.index') }}">Idiomas
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('temas.index') }}">Temas
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('indexadores.index') }}">Sistemas Indexadores
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('responsables.index') }}">Responsables
                            </li>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
{{--
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif --}}

                {{-- @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif--}}
                @yield('content')
            </div>
        </main>
    </div>
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('alert', param => {
            toastr[param['type']](param['message'], param['type']);
        });

        // window.livewire.on( 'confirm_remove_frecuencia', id => {

        //     let cfn = confirm("Seguro que deseas eliminar?");

        //     if( cfn ){
        //         console.log("deleting frecuencia");
        //         window.livewire.emit('remove_frecuencia', id);
        //     }
        // });

        window.livewire.on( 'confirm_remove', id => {

            let cfn = confirm("Seguro que deseas eliminar?");

            if( cfn ){
                console.log("delete");
                window.livewire.emit('remove', id);
            }
        });

        // Listener para el evento después de agregar un nuevo responsable
        window.livewire.on('responsableAgregado', ()=>{
            $('#agregarResponsableModal').modal('hide');
        });

        // Listener para el evento después de editar un responsable
        window.livewire.on('responsableActualizado', ()=>{
            $('#editarResponsableModal').modal('hide');
        });
    </script>
    @if (session()->has('success'))
        <script type="text/javascript">
            console.log("toastr.success");
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    <script type="text/javascript">
        window.addEventListener('myownapp:scroll-to', (ev) => {
          console.log("Estoy en myownapp:scroll-to event");
          ev.stopPropagation();

          const selector = ev?.detail?.query;

          if (!selector) {
            //console.log("No selector");
            return;
          }

          const el = window.document.querySelector(selector);
          //console.log(el);

          if (!el) {
            return;
          }

          try {
            el.scrollIntoView({
              behavior: 'smooth',
            });
          } catch {}

        }, false);
    </script>
</body>
</html>
