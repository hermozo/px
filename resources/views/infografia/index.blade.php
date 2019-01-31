@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <br/>
            <br/>


            <button type="button" class="btn btn-default" id="infografiasModal"> Crear nueva infografía </button>

            <!-- Modal -->
            <div class="modal fade" id="myModalInfografias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Crear infografía</h4>
                        </div>
                        <div class="modal-body">
                            <label for="infografiaNombre">Nombre de la infografía</label>
                            <input placeholder="" id="infografiaNombre" class="form-control"/>
                            <br/>
                            <label for="infografiaDescripcion">Descripción infografía</label>
                            <textarea class="form-control" id="infografiaDescripcion"></textarea>
                            <br/>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="crearInfografias">Registrar</button>
                            <button type="button" class="btn btn-primary" id="editarInfografias">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bs-direccion-modal-sm" id="modal-eliminar-Infografias" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                            <button type="button" class="btn btn-danger" id="eliminar-infografia-btn">SI</button>
                        </div>
                    </div>
                </div>
            </div>

            <br/>
            <br/>


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
                            <a href="{{URL::to('/graficos/'.$d->id)}}" type="button" class="btn btn-success btn-xs"><i class="fa fa-play" aria-hidden="true"></i> Gráficos </a>
                            <button type="button" class="btn btn-default btn-xs editar-infografia" data-id="{{ $d->id }}"><i class="fa fa-edit" aria-hidden="true"></i>  Editar</button>
                            <button type="button" class="btn btn-danger btn-xs eliminar-infografia" data-id="{{ $d->id }}">
                                <i class="fa fa-times" aria-hidden="true"></i> Borrar</button>
                        </p>
                    </td>
                    <td><?= $d->nombre; ?></td>
                    <td><?= $d->descripcion; ?></td>
                </tr>
                @endforeach
            </table>









        </div>
    </div>
</div>


<style>
    .cajadiv{
        height: 300px !important;
        width: 200px;
        background-color: #ccc;
    }
    .circulo{
        height: 160px;
        width: 160px;
        background-color: #999;
        margin: auto;

        border-right: 20px white solid;
        border-left: 20px black solid;
        border-top: 20px black solid;
        border-bottom: 20px white solid;
    }
</style>

@endsection
