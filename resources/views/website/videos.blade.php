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
                <h1 class="text-center">Galer&iacute;a de Videos</h1>
                <div id="content_nt" class="row">
                    <?php
                    $i = 0;
                    foreach ($list as $key => $model) {
                        ?>
                        <div class="col-md-3 col-xs-4">
                            <a href="{{ URL::to('videos-tutoriales', ['id'=>$model->id]) }}">
                                <div class="choice_item  animated bounceInRight delay-<?= $i ?>s" id="{{$model->id}}">
                                    <img src="{{ asset('img/videos.png') }}" title="{{$model->nombre}}" alt="{{$model->nombre}}" class="img-thumbnail"/>
                                    <div class="choice_text">
                                        <h4 class="text-center">{{$model->nombre}}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>



<!--<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_view">
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
</div>-->
@endsection