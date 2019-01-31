@extends('layouts.website')
@section('title', 'Inicio')
@section('content')
<div class="container" style="background-color: #fff">
    <div class="row">
        <div class="col-md-12">
            <br/>
            <h1 class="text-center">Revistas</h1>
            <br/>
            <?php foreach ($data as $revi) { ?>
                <div class="col-md-3">
                    <?php
                    $paginas = '';
                    $sql = "select * from multimedia where idgalery = " . $revi->id . " ";
                    $flip = (array) DB::select($sql);
                    ?>
                    <?php foreach ($flip as $key => $val) { ?>
                        <?php $paginas .= URL::to("/images") . '/' . $val->nombre . '*' ?>
                    <?php } ?>
                    <form action="{{URL::to('libro/samples/basic/index.php')}}" method="POST">
                        <input name="libro" type="hidden" value="<?= $paginas ?>">
                        <input name="titulo" type="hidden" value="<?= $revi->nombre ?>">
                        <div class="card" style="width: 18rem;">
                            <input type="image" id="image" class="card-img-top img-thumbnail" src="{{URL::asset('img/revista.png')}}">
                            <div class="card-body">
                                <input type="submit" class="btn btn-link" value="<?= $revi->nombre; ?>"/>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

@endsection
