@extends('layouts.master')
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-3">
            <legend>Crear infografia</legend>
            <label>Nombre de la infografia</label>
            <input placeholder="" class="form-control"/>
            <br/>
            <label>Descripción infografia</label>
            <textarea class="form-control"></textarea>
        </div>
        <div class="col-md-9">

            <div class="cajadiv img-thumbnail">
                <input placeholder="Titulo" class="form-control"/>

                <br/>
                <div class="circulo img-circle"></div>   

                <br/>

                <input placeholder="Descripción" class="form-control"/>
            </div>

            
            
            
            <div id="timer"></div>

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