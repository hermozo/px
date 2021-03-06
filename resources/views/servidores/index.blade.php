@extends('layouts.master')
@section('content')



<div id="servidordelainstitucion" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Servidor</h4>
            </div>
            <div class="modal-body">

                <span id="referenciaImagen"  name="{{URL::to('images/')}}"></span>
                <span id="imgUploadServidores" name="<?= URL::to('uploadservidor') ?>"></span>
                <form method='post' action='' class="btn-file" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input  id="servidor-foto-upload" type="file" name="file[]"  multiple>
                </form>  
                <img id="imgUploadChangeservidor" class="img-thumbnail img-responsive"/>
                <form class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" id="servidor-foto" >
                    <div class="form-group">
                        <label for="servidor-nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-nombre" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-apellidop" class="col-sm-2 control-label">Apellido paterno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-apellidop" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-apellidom" class="col-sm-2 control-label">Apellido materno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-apellidom" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-profecion" class="col-sm-2 control-label">Profeción</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-profecion" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-direccion" class="col-sm-2 control-label">Dirección</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-direccion" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-ubicacion" class="col-sm-2 control-label">Ubicación</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-ubicacion" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-telefono" class="col-sm-2 control-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-telefono" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-interno" class="col-sm-2 control-label">Interno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-interno" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="servidor-email" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servidor-unidad" class="col-sm-2 control-label">Unidad</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="servidor-unidad">
                                <option value="adminisatrativa">Adminisatrativa</option>
                                <option value="auditoria">Auditoria</option>
                                <option value="dddlapaz">DDD La Paz</option>
                                <option value="eae">EAE</option>
                                <option value="juridica">Juridica</option>
                                <option value="planificacion">Planificacion</option>
                                <option value="sub1">Sub 1</option>
                                <option value="sub2">Sub 2</option>
                                <option value="sub3">Sub 3</option>
                                <option value="tranparencia">Tranparencia</option>
                                <option value="utic">Utic</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="servidor-descripcion" class="col-sm-2 control-label">Alguna descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="servidor-descripcion"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn-regisrtar-servidores">Registar</button>
            </div>
        </div>
    </div>
</div>


<br/>
<button class="btn btn-default" id="servidores-btn-crear">Crear servidor de la institución</button>
<br/>
<br/>


<table class="table table-striped table-hover">
    <tr> 
        <td><b> </b></td>
        <td><b> </b></td>
        <td><b>Nombre </b></td>
        <td><b>Profeción </b></td>
        <td><b>Dirección </b></td>
        <td><b>Tel-int </b></td>
        <td><b>Email </b></td>
        <td><b>Unidad </b></td>
        <td><b>Descripción</b></td>
    </tr>

    @foreach ($data as $d)
    <tr> 
        <td style="width: 140px"> 
            <p>
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-edit" aria-hidden="true"></i>  Editar</button>
                <button type="button" class="btn btn-danger btn-xs eliminar-galery" data-id="{{ $d->id }}">
                    <i class="fa fa-times" aria-hidden="true"></i> Borrar</button>
            </p>
        </td>
        <td> <img src="{{ URL::to('images/').'/'.$d->foto }}" class="img-thumbnail" style="width: 100px"></td>
        <td><?= $d->nombre . " " . $d->apellidop . " " . $d->apellidom ?></td>
        <td><?= $d->profecion ?></td>
        <td><?= $d->direccion ?></td>
        <td><?= $d->telefono . '-' . $d->interno ?></td>
        <td><?= $d->email ?></td>
        <td><?= $d->unidad ?></td>
        <td><?= $d->descripcion ?></td>
    </tr>
    @endforeach




</table>

@endsection