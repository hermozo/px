@extends('layouts.website', ['u'=>$page->descripcion])
@section('title', $page->titulo)
@section('content')
<!-- <link href="{{ asset('css/bxSlider.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/page.css') }}" rel="stylesheet">
<section id="content_page">
    <br/>
    <?php
    $text = str_replace('http://192.168.89.5:8000/', \Illuminate\Support\Facades\URL::asset('/'), $page->texto);
    ?>
    
    {!! $text !!}

</section>
<?php
//$a=\App\Website::getSubmenuUrl('subprocuraduria-de-defensa-y-representacion-legal-del-estado-spdrle');
?>
@endsection