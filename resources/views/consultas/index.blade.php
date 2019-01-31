@extends('layouts.master')
@section('content')

<br/>
<h3>Formulario de Quejas y Reclamos</h3>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr> 
            <td><b>Registrado </b></td>
            <td><b>Documento subido </b></td>
            <td><b>Nombre </b></td>
            <td><b>CI </b></td>
            <td><b>Email </b></td>
            <td><b>Tel </b></td>
            <td><b>Nombre (Queja) </b></td>
            <td><b>Tipo de persona </b></td>
            <td><b>Unidad Org</b></td>
            <td><b>Cargo</b></td>
            <td><b>Ciudad</b></td>
            <td><b>Tipo de queja</b></td>
            <td width="400px"><b>Descripcion queja</b></td>
            <td><b>Fecha</b></td>
            <td><b>Tipo documento</b></td>
            <td><b>Descripción</b></td>
            <td><b>Descripcion documento</b></td>
        </tr>
        @foreach ($data as $d)
        <tr> 
            <td><?= $d->createat; ?></td>
            <td> <a target="_blank" href="{{URL::to('images')}}/<?= $d->uploaddocumento; ?>">Descargar</a></td>
            <td><?= $d->nombreuno . ' ' . $d->apellidopaternouno . ' ' . $d->apellidomaternouno; ?></td>
            <td><?= $d->ci . ' ' . $d->expx ?></td>
            <td><?= $d->emailuno; ?></td>
            <td><?= $d->telefeonouno; ?></td>
            <td><?= $d->nombredos . ' ' . $d->apellidopaternodos . ' ' . $d->apellidomaternodos; ?></td>
            <td><?= $d->tipopersona; ?></td>
            <td><?= $d->unidadorganizacional; ?></td>
            <td><?= $d->cargo; ?></td>
            <td><?= $d->ciudad; ?></td>
            <td><?= $d->tipoqueja; ?></td>
            <td><span style="font-size: 10px"><?= $d->descripcionqueja; ?></span></td>
            <td><?= $d->fecha; ?></td>
            <td><?= $d->tipodocumento; ?></td>
            <td><?= $d->descripcion; ?></td>
            <td><?= $d->descripciondocumento; ?></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
