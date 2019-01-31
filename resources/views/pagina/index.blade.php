@extends('layouts.master')
@section('content')



<span id="url-pagina" name="{{ URL::to('/') }}"></span>

<h3>Páginas Definidas</h3>
<pre>
    <?= $pagext ?>
</pre>

<h3>Estructura del Menú</h3>
<button type="button" class="btn btn-default   btn-crear-categoria" data-id="NULL"><i class="fa fa-plus"  aria-hidden="true" title="Adicionar"></i> Agregar nuevo menú  </button>

<div class="jumbotron">
    <?= $html; ?>
</div>
<div class="modal fade bs-eliminar-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                <button type="button" class="btn btn-danger" id="eliminarCategoria">SI</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <label>Agregar menú</label>
                <input type="text" class="form-control" id="textCategoriMenu"/>
                <label>Url</label>
                <input type="text" class="form-control" id="textCategoriaDescripcion"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="crearCategoria">Crear</button>
            </div>
        </div>
    </div>
</div>
@endsection
