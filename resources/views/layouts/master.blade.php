<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Administrador procuraduria</title>
        <link href="{{ URL::to('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('admin/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('admin/dist/css/sb-admin-2.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('admin/vendor/morrisjs/morris.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>


        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">


        <style>
            .navbar-default {
                background-color: #0a527e;
                border-color: #2881b8;
            }
            .navbar-default .navbar-brand {
                color: #94999a;
            }
            .navbar-default .navbar-brand:hover,
            .navbar-default .navbar-brand:focus {
                color: #ffffff;
            }
            .navbar-default .navbar-text {
                color: #94999a;
            }
            .navbar-default .navbar-nav > li > a {
                color: #94999a;
            }
            .navbar-default .navbar-nav > li > a:hover,
            .navbar-default .navbar-nav > li > a:focus {
                color: #ffffff;
            }
            .navbar-default .navbar-nav > .active > a,
            .navbar-default .navbar-nav > .active > a:hover,
            .navbar-default .navbar-nav > .active > a:focus {
                color: #ffffff;
                background-color: #2881b8;
            }
            .navbar-default .navbar-nav > .open > a,
            .navbar-default .navbar-nav > .open > a:hover,
            .navbar-default .navbar-nav > .open > a:focus {
                color: #ffffff;
                background-color: #2881b8;
            }
            .navbar-default .navbar-toggle {
                border-color: #2881b8;
            }
            .navbar-default .navbar-toggle:hover,
            .navbar-default .navbar-toggle:focus {
                background-color: #2881b8;
            }
            .navbar-default .navbar-toggle .icon-bar {
                background-color: #94999a;
            }
            .navbar-default .navbar-collapse,
            .navbar-default .navbar-form {
                border-color: #94999a;
            }
            .navbar-default .navbar-link {
                color: #94999a;
            }
            .navbar-default .navbar-link:hover {
                color: #ffffff;
            }

            @media (max-width: 767px) {
                .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                    color: #94999a;
                }
                .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
                .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
                    color: #ffffff;
                }
                .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
                .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
                .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
                    color: #ffffff;
                    background-color: #2881b8;
                }
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Navegacóin</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('sitioweb') }}" > <img src="{{ URL::to('images/proculogo2.png') }}" style="width: 80px"></a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a style="color:#fff" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Sesión {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>


                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="{{ url('sitioweb') }}" style="color:#999"><i class="fa fa-home" aria-hidden="true"></i> Inicio </a>
                            </li>
                            <li>
                                <a href="{{ url('pagina') }}" style="color:#999"><i class="fa fa-chrome" aria-hidden="true"></i> Páginas Sitio Web</a>
                            </li>
                            <!--li>
                                <a href="{{ url('multimedia',['id'=>'1']) }}"><i class="fa fa-picture-o" aria-hidden="true"></i> Galería </a>
                            </li-->
                            <li>
                                <a href="{{ url('infografia') }}" style="color:#999"><i class="fa fa-pie-chart" aria-hidden="true"></i> Infografías  </a>
                            </li>
                            <li>
                                <a href="{{ url('multimedia',['id'=>'2']) }}" style="color:#999"><i class="fa fa-fast-forward" aria-hidden="true"></i> Sliders </a>
                            </li>

                            <li>
                                <a href="{{ url('informaciones',['tipo'=>'noticia']) }}" style="color:#999"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Noticias</a>
                            </li>
                            <li>
                                <a href="{{ url('informaciones',['tipo'=>'comunicado']) }}" style="color:#999"><i class="fa fa-file-text-o" aria-hidden="true"></i> Comunicados</a>
                            </li>

                            <li>
                                <a href="{{ url('informaciones',['tipo'=>'casos']) }}" style="color:#999"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Casos</a>
                            </li>

                            <li>
                                <a href="{{ url('direcciones') }}" style="color:#999"><i class="fa fa-map-marker" aria-hidden="true"></i> Direcciones </a>
                            </li>
                            <li>
                                <a href="{{ url('galery/1') }}" style="color:#999"><i class="fa fa-file-video-o" aria-hidden="true"></i> Tutoriales y videos  </a>
                            </li>
                            <li>
                                <a href="{{ url('galery/2') }}" style="color:#999"><i class="fa fa-picture-o" aria-hidden="true"></i> Galería de imagenes</a>
                            </li>
                            <li>
                                <a href="{{ url('galery/3') }}" style="color:#999"><i class="fa fa-th-list" aria-hidden="true"></i> Revistas </a>
                            </li>
                            <li>
                                <a href="{{ url('consultas') }}" style="color:#999"><i class="fa fa-list-ol" aria-hidden="true"></i> Quejas y Reclamos   </a>
                            </li>


                            <!--li>
                                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Unidades de la institución  </a>
                            </li>
                            <li>
                                <a href="{{ url('servidores') }}"><i class="fa fa-users" aria-hidden="true"></i> Servidores de la institución </a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-th-list" aria-hidden="true"></i> Preguntas frecuentes * </a>
                            </li-->

                        </ul>
                    </div>
                </div>
            </nav>


            <div id="urlPath" name="{{ URL::to('/') }}"></div>
            <span id="TAMANIO" name="<?= parse_size(ini_get('upload_max_filesize')); ?>"></span>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ URL::to('admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::to('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::to('admin/vendor/metisMenu/metisMenu.min.js') }}"></script>
        <script src="{{ URL::to('admin/vendor/raphael/raphael.min.js') }}"></script>
        <script src="{{ URL::to('admin/vendor/morrisjs/morris.min.js') }}"></script>
        <script src="{{ URL::to('admin/dist/js/sb-admin-2.js') }}"></script>
        <script src="{{ URL::to('assets/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ URL::to('assets/notify.js') }}"></script>
        <script src="{{ URL::to('js/pagina.js') }}"></script>
        <script src="{{ URL::to('js/Informaciones.js') }}"></script>
        <script src="{{ URL::to('js/Galeria.js') }}"></script>
        <script src="{{ URL::to('js/Direcciones.js') }}"></script>
        <script src="{{ URL::to('js/Galery.js') }}"></script>
        <script src="{{ URL::to('js/Servidores.js') }}"></script>
        <script src="{{ URL::to('js/uploadservidor.js') }}"></script>
        <script src="{{ URL::to('js/Infografias.js') }}"></script>
        <script src="{{ URL::to('js/Graficos.js') }}"></script>
        <?php

        function parse_size($size) {
            $unit = preg_replace('/[^bkmgtpezy]/i', '', $size);
            $size = preg_replace('/[^0-9\.]/', '', $size);
            if ($unit) {
                return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
            } else {
                return round($size);
            }
        }
        ?>
        <script>
                                   var imagenes = [];
                                   var iterador = 0;
                                   var subidos = '';
                                   var negados = '';
                                   function uploadfile(archivo) {
                                       var file_data = archivo;
                                       var form_data = new FormData();
                                       form_data.append("_token", $('[name=_token]').val());
                                       form_data.append('file', file_data);
                                       form_data.append('tipo', 'galery');
                                       $.ajax({
                                           url: '<?= URL::to('multimedia') ?>',
                                           dataType: 'text',
                                           cache: false,
                                           contentType: false,
                                           processData: false,
                                           data: form_data,
                                           type: 'POST',
                                       }).done(function (data, textStatus, jqXHR) {
                                           iterador++;
                                       }).fail(function (jqXHR, textStatus, errorThrown) {
                                           iterador++;
                                       }).always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
                                           listado();
                                       });
                                   }

                                   function listado() {
                                       if (imagenes.length == iterador) {
                                           location.reload();
                                       } else {
                                           uploadfile(imagenes[iterador]);
                                           subidos += '<li class="list-group-item">' + imagenes[iterador].name + '</li>';
                                           $("#subidos").html(subidos);
                                       }
                                   }

                                   $(function () {
                                       new Pagina();
                                       new Informaciones();
                                       new Galeria();
                                       new Direcciones();
                                       new Galery();
                                       new Servidores();
                                       new Uploadservidor();
                                       new Infografias();
                                       new Graficos();
                                       /********************/
                                       var tamanio = <?= parse_size(ini_get('upload_max_filesize')); ?>;
                                       $('#archivosSubir').change(function () {
                                           imagenes = [];
                                           iterador = 0;
                                           subidos = '';
                                           negados = '';
                                           for (var i = 0; i < this.files.length; i++) {
                                               var file_data = this.files[i];
                                               var imgattr = file_data.name.split('.');
                                               if (imgattr[(imgattr.length - 1)] == 'jpg' || imgattr[(imgattr.length - 1)] == 'png') {
                                                   if (file_data.size <= parseInt(tamanio)) {
                                                       imagenes.push(file_data);
                                                   } else {
                                                       negados += '<li class="list-group-item"> Supero el peso permitido => ' + file_data.name + '</li>';
                                                   }
                                               } else {
                                                   negados += '<li class="list-group-item"> Archivo no valido => ' + file_data.name + '</li>';
                                               }
                                           }
                                           $("#negados").html(negados);
                                           listado();
                                       })


                                       $("#videoregister").click(function () {
                                           var datav = {
                                               nombre: $("#videonombre").val(),
                                               texto: $("#videodescripcion").val(),
                                               _token: $("input[name='_token']").val(),
                                           }
                                           fetch('{{ URL::to("/slidevideo") }}', {
                                               method: 'POST',
                                               body: $.param(datav),
                                               headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                                           }).then((res) => {
                                               return res.json()
                                           }).catch((error) => {
                                               console.log(error);
                                               $.notify("Complete el formulario", "error");
                                           }).then((response) => {
                                               if (response == 1) {
                                                   $.notify('Registrado correctamente.', "success");
                                                   setTimeout(() => {
                                                       location.reload();
                                                   }, 500)
                                               } else {
                                                   for (let e of response.errors) {
                                                       $.notify(e, "error");
                                                   }
                                               }
                                           });


                                       })
                                   });
        </script>


    </body>
</html>
