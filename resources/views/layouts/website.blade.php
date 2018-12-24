<?php

use App\Website;
$url=null;
if(isset($u))
    $url=$u;
$menu = new Website();
$listMenuBase = $menu->getMenuBase($url);
//print $url;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
        <link href="{{ asset('bt/css/bootstrap.css') }}" rel="stylesheet">
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">-->
        <link href="{{ asset('fa-icon/css/all.css') }}" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
        <title>{{ config('app.name', 'Procuraduría') }} - @yield('title')</title>

        <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav id="header" class="navbar-fixed-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-xs-2">
                        <button type="button" id="sidebarCollapse"><i class="fas fa-bars"></i></button>
                    </div>
                    <div class="col-md-4 col-xs-8 logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/logo_bol1.png') }}" width="250px">
                        </a>
                    </div>
                    <div class="col-md-4 col-xs-2 search">
                    	<button type="button"><i class="fas fa-search"></i></button>
                        <form >
                            <input type="text" name="search" class="textfield" placeholder="Buscar..."/>
                            <button type="button"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="line-header">
                <!--<div class="line1"></div><div class="line2"></div><div class="line3"></div><div class="line4"></div><div class="line5"></div><div class="line6"></div><div class="line7"></div><div class="line8"></div><div class="line9"></div>-->
            </div>
        </nav>
        <div id="app" class="wrapper">
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fas fa-times"></i>
                </div>
    
                <div class="sidebar-header">
                    <!--<h3>Bootstrap Sidebar</h3>-->
                </div>
                <br/>
    
                <ul class="menu_list">
                    <?php
                    foreach ($listMenuBase as $key => $m) {
                        $sHtml = $menu->getChildHtml($m->id, $url);
                        ?>
                        <li>
                            <a href="<?= $m->texto ? '/page/' . $m->descripcion : '#' ?>"><?= $m->titulo . " " ?></a>
                            <?= strlen($sHtml) > 0 ? '<i class="fas fa-angle-down"></i>' : '' ?>
                            <?= $sHtml ?>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="content">
            	@yield('content')
                <!--<div class="container-fluid">
                </div>-->
            </div>
        </div>
        <div class="overlay"></div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-4 enlaces">
                        <h3>ENLACES RÁPIDOS</h3>
                        <ul class="fa-ul">
                            <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="#">SERVICIOS</a></li>
                            <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="#">CASOS</a></li>
                            <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="#">NOTICIAS</a></li>
                            <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="#">CONTACTOS</a></li>
                            <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <a href="#">MAPA</a></li>
                            <li><span class="fa-li" ><i class="fas fa-angle-right"></i></span> <span id="btn_faq">PREGUNTAS FRECUENTES</span></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-8 contact_info">
                        <h3>MANTENTE EN CONTACTO</h3>
                        <ul class="fa-ul">
                            <li><span class="fa-li" ><i class="fas fa-home"></i></span> Av. Arce Esq. Rosendo Gutierrez
                                <br/>Edif. Multicentro, Torre B, Piso 14</li>
                            <li><span class="fa-li" ><i class="fas fa-phone-volume"></i></span> +591 (02) 214 8267 - Oficina.</li>
                            <li><span class="fa-li" ><i class="fas fa-envelope"></i></span> info@pge.gob.bo</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-12 rrss">
                    	<div class="row">
                    		<div class="col-md-12 col-xs-9">
                    			<h3>REDES SOCIALES</h3>
                            	<ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                    		</div>
                    		<div class="col-md-12 col-xs-3">
                    			<p><a href="#"><i class="fas fa-book"></i></a></p>
                    		</div>
                    	</div>                        
                    </div>
                </div>
            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!--<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->

        <script src="{{ asset('assets/d3.v3.min.js') }}" defer></script>
        <script src="{{ asset('assets/dashtimer.js') }}" defer></script>


        <script src="{{ asset('js/jquery1.12.4.js') }}" defer></script>
        <!--<script src="{{ asset('js/popper.min.js') }}" defer></script>-->
        <script src="{{ asset('bt/js/bootstrap.min.js') }}" defer></script>
        
        <script src="{{ asset('js/bxSlider.js') }}" defer></script>
        <script src="{{ asset('js/website.js') }}" defer></script> 

    </body>
</html>