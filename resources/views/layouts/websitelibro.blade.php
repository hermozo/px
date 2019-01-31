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
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('bt/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('fa-icon/css/all.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
        <title>Procuraduría del Estado - @yield('title')</title>
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
        <nav id="header" class="navbar-fixed-top">
            <div class="container-fluid">
                <div class="row">
                    <!--<div class="col-md-4 col-xs-2">
                        <button type="button" id="sidebarCollapse"><i class="fas fa-bars"></i></button>
                    </div>-->
                    <div class="col-md-4 colmtn_menu col-xs-2">
                        <button type="button" id="sidebarCollapse"><i class="fas fa-bars"></i></button>
                    </div>
                    <div class="col-md-8 col-xs-8 logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/logo_bol1.png') }}">
                        </a>
                    </div>
                    <div class="col-md-4 col-xs-2 search">
                        <button type="button"><i class="fas fa-search"></i></button>
                        <form action="{{URL::to('search')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="search" name="data" class="textfield" placeholder="Buscar..."/>
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="line-header">
                <!--<div class="line1"></div><div class="line2"></div><div class="line3"></div><div class="line4"></div><div class="line5"></div><div class="line6"></div><div class="line7"></div><div class="line8"></div><div class="line9"></div>-->
            </div>
        </nav>
        <div id="app" class="wrapper row">
            <nav id="sidebar" class="col-md-2">
                <br/>

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
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="content" class="col-md-10">
                @yield('content')
                <!--<div class="container-fluid">
                </div>-->



                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
        <!--<div class="overlay"></div>-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_view">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">.</h4>
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
        <script src="{{ asset('js/bxSlider.js') }}" defer></script>
        <script src="{{ asset('js/website.js') }}" defer></script> 
        <script src="{{ URL::to('assets/notify.js') }}"></script>
        <script src="{{ asset('js/formulario.js') }}" defer></script> 
        @yield('scripts')

    </body>
</html>