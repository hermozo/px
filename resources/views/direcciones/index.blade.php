@extends('layouts.master')
@section('content')
<br/>
<button  type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-default" id="nuevaDireccion">Crear nueva dirección</button>
<br/>
<br/>

<div class="modal fade bs-direccion-modal-sm" id="modal-eliminar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                <button type="button" class="btn btn-danger" id="eliminar-direccion-btn">SI</button>
            </div>
        </div>
    </div>
</div>


<table class="table table-striped table-hover">
    <tr>
        <td><b> </b></td>
        <td><b>Dirección </b></td>
        <td><b>Latitud </b></td>
        <td><b>Longitud </b></td>
        <td><b>Heading </b></td>
        <td><b>Pitch </b></td>
    </tr>
    @foreach ($data as $d)
    <tr>
        <td style="width: 150px">
            <p>
                <button type="button" class="btn btn-default btn-xs btn-edit-direcciones" data-id="{{ $d->id }}"><i class="fa fa-edit" aria-hidden="true"></i>  Editar</button>
                <button type="button" class="btn btn-danger btn-xs eliminar-direccion" data-id="{{ $d->id }}">
                    <i class="fa fa-times" aria-hidden="true"></i> Borrar</button>
            </p>
        </td>
        <td><?= $d->direccion; ?></td>
        <td><?= $d->lat; ?></td>
        <td><?= $d->lng; ?></td>
        <td><?= $d->heading; ?></td>
        <td><?= $d->pitch; ?></td>
    </tr>
    @endforeach
</table>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dirección</h4>
            </div>
            <div class="modal-body">


                <form class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="form-latitud" class="col-sm-2 control-label">Latitud</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="form-latitud">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="form-longitud" class="col-sm-2 control-label">Longitud</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="form-longitud">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="form-cabecera" class="col-sm-2 control-label">Cabecera</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="34" id="form-cabecera">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="form-punto" class="col-sm-2 control-label">Punto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="10" id="form-punto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="form-direccion" class="col-sm-2 control-label">Dirección</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="form-direccion">
                        </div>
                    </div>
                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardar-btn" class="btn btn-primary" style="display: none">Registrar</button>
                <button type="button" id="guardar-btn-cambios" class="btn btn-primary"  style="display: none">Guardar</button>
            </div>
        </div>
    </div>
</div>

{{ $data->render() }}
@endsection
