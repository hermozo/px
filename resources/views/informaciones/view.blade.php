@extends('layouts.master')
@section('content')
<br/>
<a href="{{ url('informacion/'.$data) }}" type="button" class="btn btn-default">Crear nuevo {{$data}}</a>
<legend></legend>
<span id="url-informacion" name="{{ URL::to('informacion') }}" href="{{$data}}"></span>
<div class="table-responsive">

    <table class="table table-striped table-bordered table-condensed">
        <tr>
            <td style="width:140px"> 

            </td>
            <td style="width:100px"> Banner</td>
            <td> Titulo</td>
            <td> Descripcion</td>
            <td style="width:100px"> Fecha inicio</td>
            <td style="width:100px"> Fecha fin</td>
        </tr>
        @foreach ($datax as $dt)
        <tr>
            <td> 
                <p>
                    <a href="{{ url('informacion/'.$dt->id) }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
                    <button type="button" class="btn btn-danger btn-xs eliminar-informacion" data-id="{{ $dt->id }}">
                        <i class="fa fa-times" aria-hidden="true"></i> Borrar</button>
                </p>
            </td>
            <td>

                <img src="{{ URL::to('images/').'/'.$dt->portal }}" class="img-thumbnail" style="width: 100px">
            </td>
            <td> {{ $dt->titulo }}</td>
            <td> {{ $dt->descripcion }}</td>
            <td> {{ $dt->fechainicio }}</td>
            <td> {{ $dt->fechafinal }}</td>
        </tr>
        @endforeach

    </table>
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
                <button type="button" class="btn btn-danger" id="eliminar-informacion-btn">OK</button>
            </div>
        </div>
    </div>
</div>

{{ $datax->render() }}



@endsection