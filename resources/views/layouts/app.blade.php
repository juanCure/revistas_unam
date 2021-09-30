<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    @livewireStyles

    <!-- Fonts Default Laravel Project -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/create-revista.css') }}" rel="stylesheet" id="bootstrap-css"> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    <!-- Agregando CDN para toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- Estilos Revistas UNAM -->
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="{{ asset('fonts/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fonts/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('fonts/fonts/ionicons.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('fonts/fonts/fontawesome5-overrides.min.css') }}"> --}}

    <!-- Estilos locales -->

    <link rel="stylesheet" href="{{ asset('css/Dark-Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Navigation-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Simple-Slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Estilos remotes CDN -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">




</head>
<body>
    <div id="app">
        @auth
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">

                            @auth
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
                            @endauth

                            <!-- Authentication Links -->
                            {{-- @guest
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

                            @endguest --}}
                        </ul>
                    </div>
                </div>
            </nav>
        @else
            @include('public_header')
        @endauth

        {{-- Este es el contenido principal de cada vista --}}
        {{-- <main class="py-4"> --}}
        <div class="container-fluid">
            @yield('content')
        </div>
        {{-- </main> --}}

        <div class="footer-dark">
            <footer>
                <div class="container">
                    <hr style="padding-top: 10px;border-top: solid black 1px;">
                    <div class="row" style="margin-top:20px;">
                        <div class="col-12 d-xl-flex justify-content-xl-center"><img id="logo_unam-1" src="{{ asset('img/revunamB.png') }}" style="max-width: 200px;margin-bottom: 30px;"></div>
                        <div class="col-md-6 item text" style="margin-bottom:0px;">
                            <h3>Dirección</h3>
                            <p>Av. del IMAN No. 5 Ciudad Universitaria,CP. 04510 Ciudad de México</p>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Conócenos</h3>
                            <ul>
                                <li><a href="#">Información general</a></li>
                                <li><a href="#">Normas operativas</a></li>
                                <li><a href="#">Estructuras organizacionales</a></li>
                                <li><a href="#">Aviso de privacidad</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Temas de interés</h3>
                            <ul>
                                <li><a href="#">Enlaces</a></li>
                                <li><a href="#">Open access</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col item social" style="margin-top:15px;"><a href="#"><i class="fab fa-facebook-square"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></a></div>
                    <div style="text-align:center;margin-top:-40px;">
                        <h2 class="divider-style"></h2>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 d-xl-flex justify-content-xl-end align-items-xl-center">
                            <div class="d-xl-flex align-items-xl-center">
                                <p class="text-center copyright">Hecho en México por la Dirección General de Publicaciones y Fomento Editorial, UNAM todos los derechos reservados 2021.&nbsp;Esta página puede ser reproducida con fines no lucrativos, siempre y cuando se cite la fuente completa y su dirección electrónica, y no se mutile. De otra forma requiere permiso previo por escrito de la institución.</p>
                            </div>
                        </div>
                        <div class="col-12 d-xl-flex justify-content-xl-center align-items-xl-center">
                            <ul class="list-inline">
                                <li class="list-inline-item">Contacto</li>
                                <li class="list-inline-item">Créditos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
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
    <script src="{{ asset('js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="{{ asset('js/themes/avocado.src.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/themes/dark-unica.js') }}"></script>
    <script src="{{ asset('js/themes/sunset.src.js') }}"></script>
</body>
</html>
