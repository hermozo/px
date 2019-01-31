@extends('layouts.website', [])
@section('title', 'Galeria')
@section('content')
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
                <h1 class="text-center">Galer&iacute;a de Im&aacute;genes</h1>
                <div id="content_nt" class="row">
                    <?php $i = 0; ?>
                    @foreach($list as $key=>$model)
                    <div class="col-md-3 col-xs-4">
                        <a href="{{ URL::to('galeria-fotos', ['id'=>$model->id]) }}">
                            <div class="choice_item  animated bounceInRight delay-<?= $i ?>s" id="{{$model->id}}">
                                <img src="{{ asset('img/folder_icon.png') }}"  
                                     style="background-image: url({{ asset('images/'.$model->filename) }}); background-size:cover; background-position:top center;"/>
                                <div class="choice_text">
                                    <h4 class="text-center">{{$model->nombre}}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection