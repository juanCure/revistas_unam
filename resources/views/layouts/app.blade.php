<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anaheim&amp;display=swap">
    <link rel="stylesheet" href="fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/ionicons.min.css">
    <link rel="stylesheet" href="fonts/line-awesome.min.css">
    <link rel="stylesheet" href="fonts/typicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/jumbotron.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/interiores.css">
    <link rel="stylesheet" href="css/journal_view.css">
    <link rel="stylesheet" href="css/article_view.css">
    {{-- <link href="{{ asset('css/create-revista.css') }}" rel="stylesheet" id="bootstrap-css"> --}}

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="js/chartThemes/sand-signika.js"></script>
    <script src="https://code.highcharts.com/modules/cylinder.js"></script>


    @livewireStyles

    <!-- Styles -->

    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script> --}}

    <!-- Agregando CDN para toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

</head>
<body>
    <div id="app">
        @auth
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">

                            {{-- @auth --}}
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
                            {{-- @endauth --}}

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
            @yield('content')
        @else
            @include('public_header')
            {{-- Este es el contenido principal de cada vista --}}
            @yield('content')

            <!-- This is the footer template -->

            <div class="footer-dark">
                <footer id="footer">
                    <div class="container">
                        <div class="row" style="margin-top: 20px;margin-bottom: 40px;">
                            <div class="col-12 d-flex d-xl-flex justify-content-center justify-content-xl-center" style="border-bottom: solid #666666 1px;margin-bottom: 20px;"><img id="logo_unam-1" src="img/culturaUNAM_02.png" style="max-width: 301px;margin-bottom: 39px;"></div>
                            <div class="col-12" style="margin-bottom: 20px;"></div>
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
                        <div class="col item social" style="margin-top:15px;"><a href="#"><i class="fa fa-facebook-square"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="far fa-envelope"></i></a></div>
                        <div style="text-align:center;margin-top:-40px;">
                            <h2 class="divider-style"></h2>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-12 d-xl-flex justify-content-xl-end align-items-xl-center">
                                <div class="d-xl-flex align-items-xl-center">
                                    <p class="text-center copyright">Hecho en México por la Dirección General de Publicaciones y Fomento Editorial, UNAM todos los derechos reservados 2021.&nbsp;Esta página puede ser reproducida con fines no lucrativos, siempre y cuando se cite la fuente completa y su dirección electrónica, y no se mutile. De otra forma requiere permiso previo por escrito de la institución.</p>
                                </div>
                            </div>
                            <div class="col-12 d-flex d-md-flex d-xl-flex justify-content-sm-center justify-content-md-center justify-content-xl-center align-items-xl-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#">Contacto</a></li>
                                    <li class="list-inline-item"><a href="#">Créditos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        @endauth
    </div>
    @livewireScripts

    <script src="js/allJournals.js"></script>
    {{-- <script src="js/chartData.js"></script> --}}
    <script src="js/main.js"></script>
    <script src="js/results_journal.js"></script>
    <script src="js/results_article.js"></script>

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
