@extends('layouts.website', [])
@section('title', $model->nombre)
@section('content')
@section('styles')
{{ Html::style(asset('css/page.css')) }}
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
                    <div class="col-md-12 col-xs-12">
                        <iframe allowfullscreen="" frameborder="0" height="550" src="https://www.youtube.com/embed/?listType=playlist&list={{$model->descripcion}}" width="100%"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- @section('scripts')

{{ Html::script(asset('js/lightbox-plus-jquery.js')) }}

@stop-->