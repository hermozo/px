@extends('layouts.website', [])
@section('title', $model->nombre)
@section('content')
@section('styles')
{{ Html::style(asset('css/lightbox.css')) }}
@stop
<?php

use Illuminate\Support\Facades\View;
?>
<!-- <link href="{{ asset('css/page.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/page.css') }}" rel="stylesheet">
<section id="content_page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br/>
                <br/>
                <h1 class="text-center">Galer&iacute;a {{ $model->nombre }}</h1>
                <div id="content_nt" class="row">
                    <?php $i = 0; ?>
                    @foreach($list as $key=>$m)
                    <a href="{{ asset('images/').'/'.$m->nombre}}" data-lightbox="image-1" data-title="{{$m->texto}}" class="col-md-3 col-xs-4">
                        <img src="{{ asset('images/imagen_4x4.png') }}" class="img-thumbnail  animated jackInTheBox delay-<?= $i ?>s" title="{{$model->titulo}}" 
                             style="
                             background-image: url({{ asset('images/'.$m->nombre) }}); 
                             background-size:cover; 
                             background-position:top center; 
                             margin-bottom: 20px; height: 250px"/>
                    </a>
                    <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

{{ Html::script(asset('js/lightbox-plus-jquery.js')) }}

@stop