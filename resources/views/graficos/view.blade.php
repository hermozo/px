@extends('layouts.master')
@section('content')
<div class="page-header">
    <h2>Infografia: {{ $data->nombre }} - {{$data->descripcion}}</h2>
</div>


<style>
    #graficosPorcentaje {
        width: 4em;
        height: 1.6em;
        top: 50%;
        margin-top: -.8em;
        text-align: center;
        line-height: 1.6em;
    }
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
</style>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">

            <form class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="graficosNombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="graficosNombre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="graficosDescripcion" class="col-sm-2 control-label">Descripción</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="graficosDescripcion">
                        <input type="hidden" value="{{$data->id}}" id="graficosIdinfo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="graficosPorcentaje" class="col-sm-2 control-label">Porcentaje</label>
                    <div class="col-sm-offset-2 col-sm-10">
                        <div id="slider">
                            <div id="graficosPorcentaje" class="ui-slider-handle"></div>
                        </div>
                    </div>
                </div>
            </form>
            <button id="registrarGrafico" class="btn btn-default">Registrar</button>
        </div>
        <div class="col-md-7">

            <div class="row">
                <?php foreach ($datax as $key => $val) { ?>
                    <div class="col-xs-4">
                        <div class="card">
                            <h1 class="text-center">{{$val->porcentaje}} %</h1>
                            <div class="container">
                                <h4><b>{{$val->nombre}}</b></h4> 
                                <p>{{$val->descripcion}}</p> 
                                <p> <button type="button" class="btn btn-danger btn-xs eliminar-graficos" data-id="{{ $val->id }}"><i class="fa fa-times" aria-hidden="true"></i> Borrar</button></p> 
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </div>

        </div>
    </div>
</div>






@endsection