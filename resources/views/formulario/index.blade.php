@extends('layouts.website')
@section('title', 'Ubicaciones')
@section('content')
<section>


    <br/>
    <br/>
    <style>
        label{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        h4{
            margin-top: 10px !important;
            margin-bottom: 10px !important;
            background-color: #999580;
            color:#fff;
            padding:10px;
            text-align: center;
        }
    </style>
    <h1 class="text-center">FORMULARIO DE QUEJAS Y RECLAMOS</h1>
    <div class="container">
        <div class="row">
            <form id="formularioquejareclamos">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <h4 class="text-center">DATOS DE QUIEN ES LA QUEJA O RECLAMO</h4>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label for="nombreuno">Nombres</label>
                        <input type="text" id="nombreuno" name="nombreuno" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="apellidopaternouno">Primer Apellido</label>
                        <input type="text" id="apellidopaternouno" name="apellidopaternouno" value="" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="apellidomaternouno">Segundo Apellido</label>
                        <input type="text"  id="apellidomaternouno" name="apellidomaternouno" value=""  class="form-control">
                    </div>
                </div>  	

                <div class="col-md-12">
                    <div class="col-md-2">
                        <label for="ci">Cedula de Indentidad</label>
                        <input type="number" id="ci" name="ci" value="" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="expx">Expedición</label>
                        <select class="form-control" id="expx" name="expx">
                            <option value="LP">La Paz</option>
                            <option value="OR">Oruro</option>
                            <option value="PT">Potosi</option>
                            <option value="CB">Cochabamba</option>
                            <option value="CQ">Chuquisaca</option>
                            <option value="TJ">Tarija</option>
                            <option value="BN">Beni</option>
                            <option value="SC">Santa Cruz</option>
                            <option value="PD">Pando</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="emailuno">Correo Electronico</label>
                        <input type="email" id="emailuno" name="emailuno" value="" class="form-control">
                    </div>	
                    <div class="col-md-4">
                        <label for="telefeonouno">Telefono - Celular</label>
                        <input type="number" id="telefeonouno" name="telefeonouno" value="" class="form-control">
                    </div>	
                </div>
                <div class="col-md-12">
                    <h4 class="text-center">DATOS A QUIEN SE QUEJA O RECLAMA</h4>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label for="nombredos">Nombres</label>
                        <input type="text" id="nombredos" name="nombredos" value="" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="apellidopaternodos">Primer Apellido</label>
                        <input type="text" id="apellidopaternodos" name="apellidopaternodos" value="" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="apellidomaternodos">Segundo Apellido</label>
                        <input type="text" id="apellidomaternodos" name="apellidomaternodos" value="" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-3"><br>
                        <p> <b>Tipo de persona</b> </p>
                        <p> <input type="radio" checked="checked" value="Natural" name="tipopersona" id="personanaturalid"> <label for="personanaturalid">Persona Natural </label></p>
                        <p> <input type="radio" value="Institucional" name="tipopersona" id="personaInstitucionalid"> <label for="personaInstitucionalid"> Persona Institucional </label> </p>
                    </div>
                    <div class="col-md-3">
                        <label for="unidadorganizacional">Unidad Organizacional</label>
                        <input type="text" id="unidadorganizacional" name="unidadorganizacional" value="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="cargo">Cargo</label>
                        <input type="text" id="cargo" name="cargo" value="" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="ciudad">Ciudad</label>
                        <select class="form-control" id="ciudad" name="ciudad">
                            <option value="La Paz">La Paz</option>
                            <option value="Oruro">Oruro</option>
                            <option value="Potosi">Potosi</option>
                            <option value="Cochabamba">Cochabamba</option>
                            <option value="Chuquisaca">Chuquisaca</option>
                            <option value="Tarija">Tarija</option>
                            <option value="Beni">Beni</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Pando">Pando</option>
                        </select>
                    </div>	
                </div>
                <div class="col-md-12">
                    <h4 >DESCRIPCION DE DE LA QUEJA O RECLAMO</h4>
                </div>
                <div class="col-md-12">
                    <div class="col-md-2"><br>
                        <p><b>Es Un:</b></p>
                        <p><input type="radio" name="tipoqueja" checked="checked" id="quejaid"> <label for="quejaid"> Queja </label> </p>
                        <p><input type="radio" name="tipoqueja" id="reclamouno">  <label for="reclamouno"> Reclamo </label>  </p>
                    </div><br>
                    <div class="col-md-6">
                        <label for="descripcionqueja">Descripción de Queja o Reclamo</label><br>
                        <textarea class="form-control" id="descripcionqueja" name="descripcionqueja"></textarea>
                    </div><br>
                    <div class="col-md-4">
                        <label for="fecha">Fecha</label>
                        <input type="text" id="fecha" name="fecha" value="" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <br>
                    <h4>PRUEBAS QUE LA ACOMPAÑAN</h4><br>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label for="tipodocumento">Tipo de Documento</label>
                        <select class="form-control" id="tipodocumento" name="tipodocumento">
                            <option value="original">Original</option>
                            <option value="fotocopiaLegalizada">Fotocopia Legalizada</option>
                            <option value="fotocopiaSimple">Fotocopia Simple</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" id="descripcion" value="" name="descripcion" class="form-control">
                    </div>

                </div>
                <div class="col-md-12">
                    <h4>OTRAS PRUEBAS QUE LA ACOMPAÑAN</h4><br>
                    <div class="col-md-4">

                        <label for="uploadfoto">Documento <img src="{{ URL::to('img/ajax-loader.gif') }}" id="cargandoUploadGif"/> </label>
                        <input type="file" id="uploadfoto"/>
                        <input type="hidden" id="uploaddocumento" name="uploaddocumento" value="document"  class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="descripciondocumento">Descripcion</label>
                        <input type="text" id="descripciondocumento" value="" name="descripciondocumento" class="form-control">
                        <input type="hidden" id="createat" name="createat" value="<?= date("Y-m-d H:i:s"); ?>"  class="form-control">
                        <input type="hidden" id="updateat" name="updateat" value="<?= date("Y-m-d H:i:s"); ?>" class="form-control">
                    </div>
                </div>
            </form>	
            <br/>
            <br/>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p class="text-center"><button id="enviarformularioquejareclamos" class="btn btn-primary btn-lg">Enviar</button></p>
            <br/>
            <br/>
        </div>
    </div>

    <span id="imgUploadnoticiasformulario" name="<?= URL::to('uploadservidor'); ?>"></span>

</section>
<style>
    #cargandoUploadGif{
        display:none
    }
</style>


@endsection