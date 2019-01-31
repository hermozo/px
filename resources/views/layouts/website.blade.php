<?php

use App\Website;

$url = null;
if (isset($u))
    $url = $u;
$menu = new Website();
$listMenuBase = $menu->getMenuBase($url);
//print $url;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="title" content="Procuraduria de el estado - Bolivia">
        <meta name="description" content="El 7 de febrero de 2009 que responde a las aspiraciones y anhelo, como nunca antes, los Derechos Fundamentales de las personas en el propósito de hacer realidad el vivir bien colectivo de todas las bolivianas y bolivianos, siendo necesario para ello preservar y defender la riqueza que Bolivia posee.">
        <meta name="keywords" content="Constitución, Política, Estado de 7 de febrero de 2009 que responde a las aspiraciones, consagra un conjunto de principios inherentes,  Derechos Fundamentales de las personas en el propósito de hacer realidad el vivir bien colectivo de todas las bolivianas y bolivianos, El Estado Plurinacional,  de Bolivia, como persona jurídica de existencia necesaria, hasta hace poco carecía de una institución o autoridad, específica se preocupe y encargue,  defensa legal, particularmente en procesos ante tribunales internacionales, emergentes de controversias planteadas, por empresas extranjeras.Con una nueva visión de Estado, el Presidente Evo Morales Ayma, sobre la base del Ministerio, sin Cartera Responsable de la Defensa Legal, de las Recuperaciones Estatales creado mediante, Decreto Presidencial No. 29589 de 5 de junio de 2008, instituyó el Ministerio de Defensa Legal del Estado a través del, Decreto Supremo No. 29894 de 7 de febrero de 2009, Con esos antecedentes y experiencias, la actual Constitución da lugar al nacimiento, en sus artículos 229 al 231, a la Procuraduría General del, Estado que tiene como atribuciones promover, defender y precautelar, precisamente los intereses del EstadoDentro del nuevo marco constitucional, la Ley No. 064 de 5 de diciembre de 2010 regula la organización y estructura de la Procuraduría General del Estado, entidad que inició inmediatamente sus actividades sobre la base y aplicación del Decreto Supremo No. 0788 de 5 de febrero de 2011 y del Decreto Supremo No. 0789 también de 5 de febrero de 2011, referido este último a la Escuela de Abogados del Estado, y al Consejo de Abogados del Estado, dependientes de esa inédita entidad.">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="Spanish">
        <meta name="revisit-after" content="1 days">
        <meta name="author" content="Conectica.bo - Bolivia (MAHH)">
        <meta name="og:title" property="og:title" content="Procuraduria de el estado - Bolivia">
        <link href="{{ asset('bt/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('fa-icon/css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('owl/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('owl/dist/assets/owl.theme.default.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Procuraduría del Estado - @yield('title')</title>
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('css/menue.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body>

        <nav id="header" class="navbar-fixed-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1">
                        <button class="btn btn-default" id="navegarmenu"><i class="fas fa-spinner"></i></button>
                    </div>
                    <!--<div class="col-md-3">
                        <p class="spam-agetic">BOLIVIA A TU SERVICIO
                            <a href="https://www.facebook.com/procuraduriabolivia"  target="_blank"><i class="fab fa-facebook-square animated bounce delay-1s"></i></a>
                            <a href="https://twitter.com/ProcuraduriaB"  target="_blank"><i class="fab fa-twitter-square  animated bounce delay-2s"></i></a>
                            <a href="https://www.youtube.com/channel/UCMxHyC66w4ILyu-AR7bmZLg" target="_blank"><i class="fab fa-youtube  animated bounce delay-3s"></i></a>
                            <a href="mailto:youremailaddress"><i class="fas fa-envelope-open animated bounce delay-4s"></i> </a>
                            <a href="tel:71274997"><i class="fas fa-phone animated bounce delay-5s"></i> </a>
                        </p>
                    </div>-->
                    <div class="col-md-6">
                        <p class="animated bounceIn ">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/logo_bol1.png') }}" id="logo" style="width:370px;">
                            </a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 text-right" style="padding-right:50px;">

                                <p>
                                    <a href="https://www.facebook.com/procuraduriabolivia"  target="_blank"><i class="fab fa-facebook-square animated bounce delay-1s"></i></a>
                                    <a href="https://twitter.com/ProcuraduriaB"  target="_blank"><i class="fab fa-twitter-square  animated bounce delay-2s"></i></a>
                                    <a href="https://www.youtube.com/channel/UCMxHyC66w4ILyu-AR7bmZLg" target="_blank"><i class="fab fa-youtube  animated bounce delay-3s"></i></a>
                                    <a href="mailto:youremailaddress"><i class="fas fa-envelope-open animated bounce delay-4s"></i> </a>
                                    <a href="tel:71274997"><i class="fas fa-phone animated bounce delay-5s"></i> </a>
                                </p>

                            </div>
                            <div class="col-md-12 search">

                                <form action="{{URL::to('search')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="search" name="data" class="textfield" id="buscadorindex" placeholder="Buscar..."/>
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="line-header animated rubberBand delay-1s"></div>
        </nav>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 sliderMenumk2" style="display:none">
                    <input type="checkbox" id="check">
                    <label class="icon-menu" for="check"><i class="fas fa-align-justify"></i></label>
                    <h2>Menú</h2>
                    <nav class="menu_list2">
                        <ul class="menu_list">
                            <li><a href="{{URL::to("/")}}">Inicio</a></li>
                            <?php
                            foreach ($listMenuBase as $key => $m) {
                                $sHtml = $menu->getChildHtml($m->id, $url);
                                ?>
                                <li>
                                    <a href="<?= $m->texto ? '/page/' . $m->descripcion : '#' ?>" class="<?= $m->texto ? '' : 'btn_plusdd'; ?>"><?= $m->titulo . " " ?></a>
                                    <?= strlen($sHtml) > 0 ? '<i class="fas fa-angle-down"></i>' : '' ?>
                                    <?= $sHtml ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-12 contenidositemk">
                    @yield('content')
                    <footer>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="text-center text-warning" style="color:#fff">¡La Patria no se vende, se defiende!</h1>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 enlaces">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <span id="btn_faq">Información Rápida</span></li>
                                        <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="{{URL::to('/')}}">Pasantías</a></li>
                                        <hr>
                                        <h3>CONTACTO</h3>
                                        <p> <b>Oficina central en la ciudad de El Alto</b> <br>
                                            <a href="tel:22173900"> <b>Teléfono:</b> (591) (2) 2173900 <br></a>
                                            <b>Fax:</b>	(591) (2) 2118454<br>
                                            <b>Dirección:</b>	Calle Martín Cárdenas, esquina Calle 11 de Junio, Zona Ferropetrol.
                                        </p>
                                    </ul>

                                </div>
                                <!--  <div class="col-md-3 enlaces">
                                      <h3>ENLACES RÁPIDOS</h3>
                                      <ul class="fa-ul">
                                          <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="{{URL::to('noticias')}}">NOTICIAS</a></li>
                                          <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="{{URL::to('casos')}}">CASOS</a></li>
                                          <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="{{URL::to('comunicados')}}">COMUNICADOS</a></li>
                                          <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <span id="btn_faq">PREGUNTAS FRECUENTES</span></li>
                                          <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="{{URL::to('galeria-fotos')}}">GALERIA DE IMAGENES</a></li>
                                          <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="{{URL::to('videos-tutoriales')}}">TUTORIALES Y VIDEOS</a></li>
                                      </ul>
                                  </div>
                                  <div class="col-md-5 contact_info">
                                      <h3>MANTENTE EN CONTACTO</h3>
                                      <p><b>Teléfonos Pilotos: </b>(591-2)-2173900 </p>
                                      <p><b>Teléfonos Secretaria Despacho: </b>(591-2)-2173904 .::. Fax Despacho: (591-2)-2173905</p>
                                      <p><b>Teléfono Subprocuraduria de Defensa y Representación Legal del Estado:</b> (591-2)-2173910</p>
                                      <p><b>Teléfono Subprocuraduria de Supervisión e Intervención:</b> (591-2)-2173903</p>
                                      <p><b>Teléfono Dirección Administrativa: </b>(591-2)-2173943</p>
                                      <p><b>Teléfono Dirección Jurídica:</b> (591-2)-2173958</p>
                                      <p><b>Teléfono Unidad de Comunicación:</b> (591-2)-2173972</p>
                                      <p><b>Teléfono Unidad de Transparencia: </b>(591-2)-2173976</p>
                                      <p><b> Teléfono Escuela de Abogados del Estado: </b>(591-2)-2173980</p>
                                      <p class="text-center">
                                          <a href="{{URL::to("contactos")}}">
                                              <img src="{{ asset('images/mapa.jpg') }}" class="img-thumbnail" style="width:250px"/>
                                          </a>
                                          <br/>
                                          Direcciones departamentales
                                      </p>
  
  
                                  </div>-->
                                <div class="col-md-6 rrss">
                                    <!--  <div class="row">
                                          <div class="col-md-12 col-xs-12 col-sm-12">
                                              <h3>REDES SOCIALES</h3>
                                              <ul>
                                                  <li><a href="https://www.facebook.com/procuraduriabolivia" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                  <li><a href="https://twitter.com/ProcuraduriaB"><i class="fab fa-twitter" target="_blank"></i></a></li>
                                                  <li><a href="https://www.youtube.com/channel/UCMxHyC66w4ILyu-AR7bmZLg"><i class="fab fa-youtube" target="_blank"></i></a></li>
                                              </ul>
                                          </div>
                                          <div class="col-md-12 col-xs-12">
                                              <a href="{{URL::to('vibliotecavirtual')}}"> <img src="{{ asset('images/virtual.png') }}" class="img-thumbnail img-responsive"> </a>
                                          </div>
                                      </div>-->
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3 col-xs-6">
                                            <br/>
                                            <a href="http://rae.procuraduria.gob.bo/" target="_blank"> <img src="{{ asset('images/raelogo.jpg') }}" class="img-thumbnail img-responsive"> </a>
                                        </div>
                                        <div class="col-md-6 col-md-offset-3 col-xs-6">
                                            <br/>
                                            <a href="https://rope.procuraduria.gob.bo/" target="_blank"> <img src="{{ asset('images/ropelogo.jpg') }}" class="img-thumbnail img-responsive"> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                    </footer>

                </div>
            </div>
        </div>

        <style>
            .footerextrellas {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 280px;
                background-color: rgba(0,0,0,0.2);
                color: #999;
                text-align: center;
                box-shadow: 10px 1px 20px #000
            }
            .activeestrellas {
                color: red;
            }


        </style>

        <div class="footerextrellas">
            <p>
                <i class="fas fa-star startbtncalificacion" data-punt="1"></i>
                <i class="fas fa-star startbtncalificacion" data-punt="2"></i>
                <i class="fas fa-star startbtncalificacion" data-punt="3"></i>
                <i class="fas fa-star startbtncalificacion" data-punt="4"></i>
                <i class="fas fa-star startbtncalificacion" data-punt="5"></i>
            </p>
        </div>
        <style>
            .startbtncalificacion:hover{
                color: #ffd65e !important
            }
        </style>
        <!--<div class="overlay"></div>-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_view">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">INFORMACIÓN RÁPIDA</h3>
                    </div>
                    <div class="modal-body" id="content_modal">

                    </div>
                </div>
            </div>
        </div>
        <div id="urlPathURLX" name="{{ URL::to('/') }}"></div>
        <script src="{{ URL::to('admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/d3.v3.min.js') }}" defer></script>
        <script src="{{ asset('assets/dashtimer.js') }}" defer></script>
        <script src="{{ asset('bt/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('owl/dist/owl.carousel.min.js') }}" defer></script>
        <script src="{{ asset('js/website.js') }}" defer></script>
        <script src="{{ URL::to('assets/notify.js') }}"></script>
        <script src="{{ asset('js/formulario.js') }}" defer></script>
        @yield('scripts')
    </body>
</html>
