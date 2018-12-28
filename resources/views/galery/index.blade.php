@extends('layouts.master')
@section('content')

<?php
switch ($tipo) {
    case(1):
        $nombretipo = "Tutorial";
        $texto = "Galeria";
        break;
    case(2):
        $nombretipo = "Galeria";
        $texto = "Imagenes";
        break;
    case(3):
        $nombretipo = "Revistas";
        $texto = "Fotos";
        break;
}
?>

<br/>

<button type="button" class="btn btn-default" id="btn-crear-presentacion">
    Crear nueva {{$nombretipo}}
</button>
<br/>
<br/>
<div class="modal fade bs-direccion-modal-sm" id="modal-eliminar-galery" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                <button type="button" class="btn btn-danger" id="eliminar-galery-btn">OK</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalGalery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Galeria</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="tituloPresentacion" class="col-sm-2 control-label">Título de la galería</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombrePresentacion" placeholder="">
                            <input type="hidden" class="form-control" id="tipoPresentacion" value="<?= $tipo; ?>" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcionPresentacion" class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="descripcionPresentacion"></textarea>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn-crear-galery" style="display:none">Regisrtar</button>
                <button type="button" class="btn btn-primary" id="btn-guardar-galery" style="display:none">Guardar</button>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped table-hover">
    <tr> 
        <td><b> </b></td>
        <td><b>Nombre </b></td>
        <td><b>Descripción </b></td>
    </tr>
    @foreach ($data as $d)
    <tr> 
        <td style="width: 250px"> 
            <p>
                <a href="{{ url('uploadservidor/'.$d->id) }}" type="button" class="btn btn-success btn-xs"><i class="fa fa-edit" aria-hidden="true"></i>  <?= $texto; ?></a>
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-edit" aria-hidden="true"></i>  Editar</button>
                <button type="button" class="btn btn-danger btn-xs eliminar-galery" data-id="{{ $d->id }}">
                    <i class="fa fa-times" aria-hidden="true"></i> Borrar</button>
            </p>
        </td>
        <td><?= $d->nombre; ?></td>
        <td><?= $d->descripcion; ?></td>
    </tr>
    @endforeach
</table>
@endsection