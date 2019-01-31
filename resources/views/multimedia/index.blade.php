@extends('layouts.master')
@section('content')


<form method="POST" action="/profile">
    @csrf
</form>

<span id="url-galeria" name="{{ URL::to('multimedia') }}"></span>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Archivos</a></li>
    <li><a data-toggle="tab" href="#menu1">Subir imágenes</a></li>
    <li><a data-toggle="tab" href="#menu2">Videos</a></li>
</ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div style="clear: both;"></div>
        <br/>
        <div style="clear: both;"></div>
        @foreach ($data as $d)
        <?php
        $ext = explode('.', $d->nombre);

        switch ($d->tipo) {
            case('galery'):
                echo '<div class="img-thumbnail" id="multi-' . $d->id . '"><p> <div class="btn-group btn-eliminar-multimedia" data-id="' . $d->id . '" role="group">
                                <button type="button" class="btn btn-danger btn-xs">Borrar</button>
                              </div> </p>'
                . '<img src="' . URL::to('images/' . $d->nombre) . '"  style="height:100px" title="' . $d->texto . '">'
                . '<p class="text-center" style="font-size:8px">' . str_replace("-", " ", $d->texto) . '<p>'
                . '</div>';
                break;

            case('video'):
                echo '<div class="img-thumbnail" id="multi-' . $d->id . '"><p> <div class="btn-group btn-eliminar-multimedia" data-id="' . $d->id . '" role="group">
                                <button type="button" class="btn btn-danger btn-xs">Borrar</button>
                              </div> </p>'
                . ' <p><a href="https://www.youtube.com/watch?v=' . $d->nombre . '" target="_blank"><img src="' . URL::to('img/videos.png') . '"  style="height:100px"></a></P>  '
                . '<p class="text-center" style="font-size:8px">' . str_replace("-", " ", $d->texto) . '<p>'
                . '</div>';
                break;
        }
        ?>
        @endforeach

        <div style="clear: both;"></div>
        {{ $data->render() }}
    </div>
    <div id="menu1" class="tab-pane fade">
        <div class="jumbotron">
            <center>
                <?php
                if (Session::get('ID') == 2) {
                    $t = "Sliders (Carrucel)";
                } else {
                    $t = "archivos!";
                }
                ?>
                <form method='post' action='' class="btn-file" enctype='multipart/form-data'>
                    <label for="file" class="eleccionpaparapa">Subir <?= $t; ?></label>
                    <input id="archivosSubir" type="file" name="file[]" id="file" multiple>
                </form>
            </center>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-center">Archivos subidos</p>
                        <ul class="list-group" id="subidos"></ul>
                    </div>
                    <div class="col-md-6">
                        <p class="text-center">Archivos negados</p>
                        <ul class="list-group" id="negados"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="menu2" class="tab-pane fade">
        <h1>Video de YouTube</h1>
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="videonombre" class="col-sm-2 control-label">Link del video Youtube</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="videonombre" id="videonombre" placeholder="vtTUKLE_SWE">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="videodescripcion" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="videodescripcion" id="videodescripcion" placeholder="Video de presentación">
                        </div>
                    </div>
                </form>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" id="videoregister" class="btn btn-default">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-eliminarinformaciones-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p class="text-center"><small>Esta seguro de eliminar el dato?</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                <button type="button" class="btn btn-danger" id="eliminar-galeria-btn">SI</button>
            </div>
        </div>
    </div>
</div>



<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
    .eleccionpaparapa{
        color:red !important;
        height: 50px;
        width:200px ;
        border:dashed 5px #000000;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright:5px;
        -moz-border-radius-bottomleft:5px;
        -moz-border-radius-bottomright:5px;
        -webkit-border-top-left-radius:5px;
        -webkit-border-top-right-radius:5px;
        -webkit-border-bottom-left-radius:5px;
        -webkit-border-bottom-right-radius:5px;
        border-top-left-radius:5px;
        border-top-right-radius:5px;
        border-bottom-left-radius:5px;
        border-bottom-right-radius:5px;
        line-height: 40px
    }

    .eleccionpaparapa:hover{
        color:#000 !important;
        background-color: #CCC !important;
    }
</style>


@endsection
