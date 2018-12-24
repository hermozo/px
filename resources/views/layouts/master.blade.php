<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <title>Admin</title> 
        <link href="{{ URL::to('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('admin/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('admin/dist/css/sb-admin-2.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('admin/vendor/morrisjs/morris.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>
        <link href="{{ URL::to('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Navegacóin</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Procuradoria</a>
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                <a href="{{ url('sitioweb') }}"><i class="fa fa-cogs" aria-hidden="true"></i> Pagina </a>
                            </li>
                            <li>
                                <a href="{{ url('pagina') }}"><i class="fa fa-chrome" aria-hidden="true"></i> Paginas Sitio Web</a>
                            </li>
                            <!--li>
                                <a href="{{ url('multimedia',['id'=>'1']) }}"><i class="fa fa-picture-o" aria-hidden="true"></i> Galería </a>
                            </li-->

                            <li>
                                <a href="{{ url('multimedia',['id'=>'2']) }}"><i class="fa fa-fast-forward" aria-hidden="true"></i> Sliders </a>
                            </li>

                            <li>
                                <a href="{{ url('informaciones',['tipo'=>'noticia']) }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Noticias</a>
                            </li>
                            <li>
                                <a href="{{ url('informaciones',['tipo'=>'comunicado']) }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Comunicados</a>
                            </li>
                            <li> 
                                <a href="{{ url('infografia') }}"><i class="fa fa-pie-chart" aria-hidden="true"></i> Infografias * </a>
                            </li>
                            <li>
                                <a href="{{ url('informaciones',['tipo'=>'casos']) }}"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Casos</a>
                            </li>

                            <li>
                                <a href="{{ url('direcciones') }}"><i class="fa fa-map-marker" aria-hidden="true"></i> Direcciones </a>
                            </li>
                            <li>
                                <a href="{{ url('galery/1') }}"><i class="fa fa-file-video-o" aria-hidden="true"></i> Tutoriales y videos  </a> <!-- 1 -->
                            </li>
                            <li>
                                <a href="{{ url('galery/2') }}"><i class="fa fa-picture-o" aria-hidden="true"></i> Galería de imagenes WEB  </a> <!-- 2 -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Unidades de la institución * </a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Servidores de la institución * </a>
                            </li>


                            <li>
                                <a href="#"><i class="fa fa-th-list" aria-hidden="true"></i> Revistas * </a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-th-list" aria-hidden="true"></i> Preguntas frecuentes * </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>


            <div id="urlPath" name="{{ URL::to('/') }}"></div>



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

        <script src="{{ asset('assets/d3.v3.min.js') }}" defer></script>
        <script src="{{ asset('assets/dashtimer.js') }}" defer></script>

        <script src="{{ URL::to('assets/notify.js') }}"></script>
        <script src="{{ URL::to('js/pagina.js') }}"></script>
        <script src="{{ URL::to('js/Informaciones.js') }}"></script>
        <script src="{{ URL::to('js/Galeria.js') }}"></script>
        <script src="{{ URL::to('js/Direcciones.js') }}"></script>
        <script src="{{ URL::to('js/Galery.js') }}"></script>

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
                                           //location.reload();
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

                                       /********************/
                                       var dt = new DashTimer('#timer').init({
                                           start: {
                                               fill: 'green',
                                               innerRatio: .9,
                                               outerRatio: 1
                                           },
                                           finish: {
                                               fill: 'red',
                                               innerRatio: .3,
                                               outerRatio: 1
                                           },
                                           values: {
                                               show: true,
                                               decorate: function (d) {
                                                   return Math.floor(d / 10) * 10;
                                               },
                                               classes: "mui--text-light-secondary mui--text-caption"
                                           }
                                       }).setData([{
                                               immediate: {
                                                   angle: true
                                               },
                                               start: {
                                                   angle: 1,
                                                   fill: '#eee'
                                               },
                                               finish: {
                                                   angle: 0,
                                                   fill: '#eee'
                                               }
                                           }, {
                                               values: {
                                                   show: true
                                               }
                                           }]).start(1000, 0, .90);
                                       /********************/

                                       var tamanio = <?= parse_size(ini_get('upload_max_filesize')); ?>;
                                       //$('input[type=file]').change(function () {
                                       $('#archivosSubir').change(function () {
                                           imagenes = [];
                                           iterador = 0;
                                           subidos = '';
                                           negados = '';
                                           for (var i = 0; i < this.files.length; i++) {
                                               if (this.files[i].size <= parseInt(tamanio)) {
                                                   imagenes.push(this.files[i]);
                                               } else {
                                                   negados += '<li class="list-group-item">' + this.files[i].name + '</li>';
                                               }
                                           }
                                           $("#negados").html(negados);
                                           listado();
                                       })
                                   });
        </script>


    </body>
</html>
