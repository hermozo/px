@extends('layouts.master')
@section('content')

<?php
switch ($tipo) {
    case(1):
        $nombretipo = "Tutorial";
        $texto = "Galería";
        $label = "URL de la lista de video youtube ";
        break;
    case(2):
        $nombretipo = "Galería";
        $texto = "Imágenes";
        $label = "Descripción de la Galeria";
        break;
    case(3):
        $nombretipo = "Revistas";
        $texto = "Fotos";
        $label = "Descripción de la Revista";
        break;
}
?>

<br/>

<button type="button" class="btn btn-default" id="btn-crear-presentacion">
    Crear  {{$nombretipo}}
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
                <button type="button" class="btn btn-danger" id="eliminar-galery-btn">SI</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalGalery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Galería</h4>
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
                        <label for="descripcionPresentacion" class="col-sm-2 control-label"><?php echo $label; ?></label>
                        <div class="col-sm-10">
                            <?php if ($tipo != 1) { ?>
                                <textarea class="form-control" id="descripcionPresentacion"></textarea>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="descripcionPresentacion" placeholder="PLoRSO1sC_X3_PtfSrp1viBIhBeemj3mos">
                            <?php } ?>

                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn-crear-galery" style="display:none">Registrar</button>
                <button type="button" class="btn btn-primary" id="btn-guardar-galery" style="display:none">Guardar</button>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped table-hover">
    <tr>
        <td><b> </b></td>
        <td><b>Nombre </b></td>
        <td><b><?= $label; ?> </b></td>
    </tr>
    @foreach ($data as $d)
    <tr>
        <td style="width: 250px">
            <p>
                <?php if ($tipo != 1) { ?>
                    <a href="{{ url('uploadservidor/'.$d->id) }}" type="button" class="btn btn-success btn-xs"><i class="fa fa-edit" aria-hidden="true"></i>  <?= $texto; ?></a>
                <?php } ?>

                <button type="button" class="btn btn-default btn-xs editar-galery" data-id="{{ $d->id }}"><i class="fa fa-edit" aria-hidden="true"></i>  Editar</button>
                <button type="button" class="btn btn-danger btn-xs eliminar-galery" data-id="{{ $d->id }}">
                    <i class="fa fa-times" aria-hidden="true"></i> Borrar</button>
            </p>
        </td>
        <td><?= $d->nombre; ?></td>
        <?php if ($tipo != 1) { ?>
            <td><?= $d->descripcion; ?></td>
        <?php } else { ?>
            <td><a href="https://www.youtube.com/watch?v=i91XnsBuUYE&list=<?= $d->descripcion; ?>" target="_blank"> Lista de reproducción </a></td>
        <?php } ?>

    </tr>
    @endforeach
</table>
@endsection
