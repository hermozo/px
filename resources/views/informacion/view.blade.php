@extends('layouts.master')
@section('content')
<h4 class="text-center">Crear {{$data}} </h4>
<span id="url-informacion" name="{{ URL::to('informacion') }}" href="{{$data}}"></span>
<span id="url-informaciones" name="{{ URL::to('informaciones') }}" href="{{$data}}"></span>
<span id="url-galeria" name="{{ URL::to('galeria') }}"></span>
<div id="galeriaMultimedia" style="display: none"></div>





<div class="row">
    <div class="col-md-2">
        <img src="{{ isset($datos->portal)?URL::to('images/').'/'.$datos->portal:URL::to('images/unnamed.jpg') }}" class="img-responsive" id="imgUploadChange">
        <div class="row">
            <div class="col-xs-12">

                <span id="imgUploadnoticias" name="<?= URL::to('multimedia') ?>"></span>
                <span id="referenciaImagen" name="{{URL::to('images/')}}"></span>
                <form method='post' action='' class="btn-file" enctype='multipart/form-data'>
                    <input  id="multiuniupload" type="file" name="file[]" id="file" multiple>
                </form>  
                <!--button class="btn btn-danger" id="irGaleria" style="width: 100%"> Galeria</button-->
            </div>
        </div>
    </div> 
    <div class="col-md-8">
        <form class="form-horizontal" id="form-infomaciones">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="form-titulo" class="col-sm-2 control-label">Titulo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="titulo" id="form-titulo" value="{{ isset($datos->titulo)?$datos->titulo:'' }}"/>
                </div>
            </div>
            <div class="form-group">
                <label for="form-descripcion" class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="descripcion" id="form-descripcion" value="{{ isset($datos->descripcion)?$datos->descripcion:'' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Publicado</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="from" id="from" placeholder="Desde" value="{{ isset($datos->fechainicio)?$datos->fechainicio:'' }}">
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control"  name="to" id="to" placeholder="Hasta" value="{{ isset($datos->fechafinal)?$datos->fechafinal:'' }}">
                    <input type="hidden" class="form-control"  name="tipo" id="tipo-informaciones"  value="{{ isset($datos->tipo)?$datos->tipo:$data }}">
                    <input type="hidden" class="form-control"  name="imagen" id="tipo-imagen" value="{{ isset($datos->portal)?$datos->portal:URL::to('images/unnamed.jpg') }}" >
                </div>
            </div>

        </form>
    </div> 
</div>

<br/>

<textarea class="form-control textoContenido"   name="contenido"  id="summary-ckeditor-informaciones">{{ isset($datos->contenido)?$datos->contenido:'' }}</textarea>
<legend></legend>
<p class="text-center">
    <?php if (isset($datos)) { ?>

        <input type="hidden" class="form-control"  id="infoID"  value="{{ isset($datos->id)?$datos->id:0 }}">
        <button class="btn btn-primary" id="btn-guardar-informaciones-editar">Guardar {{$data}} </button>

    <?php } else { ?>
        <button class="btn btn-primary" id="btn-guardar-informaciones">Publicar {{$data}} </button>
    <?php } ?>

</p>
<script src="{{ URL::to('../ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace('summary-ckeditor-informaciones', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '500'
});</script>

<script>
</script>


@endsection