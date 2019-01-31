@extends('layouts.website')
@section('title', 'Inicio')
@section('content')


<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<section class="contenido-web">
    <div class="owl-carousel owl-theme">
        @foreach($slides as $key => $model)
        <?php
        $ext = $model->tipo;
        switch ($ext) {
            case('video'):
                ?>
                <div class="item">
                    <a class="owl-video" href="https://www.youtube.com/watch?v={{$model->nombre}}"></a>
                </div>
                <?php break; ?>
            <?php case('galery'): ?>
                <div class="item" style="background-image: url({{ asset('images/')}}/{{$model->nombre}}); background-size:cover; background-position:top center; width: 100%;"></div>
                <?php break; ?>
        <?php }
        ?>

        @endforeach
    </div>
</section>

<?php if (count($infofrafia) > 0 && isset($infofrafia)) { ?>
    <section id="section2">
        <div class="bg_blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <!--h3>RESULTADOS DE LA DEFENSA LEGAL EN PROCESOS INTERNACIONALES</h3-->
                    <h3><?= $infofrafia[0]->nombre; ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="triangle"></div>
        <!--<img src="{{ asset('img/triangle.png') }}" class="triangleimg">-->

        <div class="container">
            <div class="row">

                <?php
                $i = 0;
                foreach ($infofrafia as $key) {
                    ?>
                    <div class="col-md-3 col-xs-6">
                        <br/>
                        <div class="card" style="width: 12rem;">
                            <br/>
                            <center>
                                <div id="timer<?= $i; ?>"></div>
                            </center>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $key->titulo; ?></h5>
                            </div>
                        </div>
                        <br/>
                    </div>

                    <?php
                    $i++;
                }
                ?>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center"> <?= $infofrafia[0]->descripcion; ?></p>
                </div>
            </div>
        </div>
    </section>

<?php } ?>


<!--<section id="section3">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>NOTICIAS RECIENTES</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <div class="row">
            @foreach($noticias as $key=>$model)
            <div class="col-md-3 col-xs-12">
                <a href="{{URL::to('/detail/'.$model->id)}}">
                    <!--div class="choice_item" id="{{$model->id}}" style="cursor:pointer"-->

                <!--    <img src="{{ asset('images/imagen_4x4.png') }}" title="{{$model->titulo}}"
                         style="background-image: url({{ asset('images/'.$model->portal) }});
                         background-size:cover;
                         background-position:top center;" alt="{{$model->titulo}}" class="img-thumbnail"/>
                    <ol class="breadcrumb" style="font-size:10px !important">
                        <li>Publicado</li>
                        <li>{{$model->fechainicio}}</li>
                    </ol>
                    <div class="choice_text">
                        <h4 class="text-center">{{$model->titulo}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <div class="page-header">
                <center><a href="{{ URL::to('/noticias') }}" class="btn btn-link text-center" style="border:1px solid #999" >   <h4 >MAS NOTICIAS</h4></a> </center>
            </div>
        </div>
    </div>
</section>-->
<section id="section4">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>COMUNICADOS</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <div class="row">
            @foreach($comunicados as $key=>$model)
            <div class="col-md-3 col-xs-12">
                <a href="{{URL::to('/detail/'.$model->id)}}">
                    <!--div class="choice_item" id="{{$model->id}}" style="cursor:pointer"-->
                    <img src="{{ asset('images/imagen_4x4.png') }}" title="{{$model->titulo}}"
                         style="background-image: url({{ asset('images/'.$model->portal) }});
                         background-size:cover;
                         background-position:top center;" alt="{{$model->titulo}}" class="img-thumbnail"/>
                    <ol class="breadcrumb" style="font-size:10px !important">
                        <li>Publicado</li>
                        <li>{{$model->fechainicio}}</li>
                    </ol>
                    <div class="choice_text">
                        <h4 class="text-center">{{$model->titulo}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <div class="page-header">
                <center><a href="{{ URL::to('/comunicados') }}" class="btn btn-link text-center" style="border:1px solid #999" >   <h4 >MAS COMUNICADOS</h4></a> </center>
            </div>
        </div>
    </div>
</section>
<!--<section id="section5">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>ORGANIZACION</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <?= $organizacion[0]->texto; ?>
    </div>

</section>-->
<!--<section id="section6">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>CASOS DESTACADOS</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <div class="row">
            @foreach($casos as $key=>$model)
            <div class="col-md-3 col-xs-12">
                <a href="{{URL::to('/detail/'.$model->id)}}">
                    <!--div class="choice_item" id="{{$model->id}}" style="cursor:pointer"-->
                    <!--<img src="{{ asset('images/imagen_4x4.png') }}" title="{{$model->titulo}}"
                         style="background-image: url({{ asset('images/'.$model->portal) }});
                         background-size:cover;
                         background-position:top center;" alt="{{$model->titulo}}" class="img-thumbnail"/>
                    <ol class="breadcrumb" style="font-size:10px !important">
                        <li>Publicado</li>
                        <li>{{$model->fechainicio}}</li>
                    </ol>
                    <div class="choice_text">
                        <h4 class="text-center">{{$model->titulo}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <div class="page-header">
                <center><a href="{{ URL::to('/casos') }}" class="btn btn-link text-center" style="border:1px solid #999" >   <h4 >MAS CASOS</h4></a> </center>
            </div>
        </div>
    </div>
</section>-->
<section id="section7">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>REVISTAS</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <div class="row">
            <?php foreach ($revistas as $revi) { ?>
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
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <center><a href="{{ URL::to('/masrevistas') }}" class="btn btn-link text-center" style="border:1px solid #999" >   <h4>MAS REVISTAS</h4></a> </center>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
</section>
<!--<section id="section8">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>PASANTIAS</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <?= $pasantias[0]->texto; ?>
    </div>
</section>-->

<section id="section9">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>BIBLIOTECA</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <?= $biblio[0]->texto; ?>
    </div>
</section>
<!--<section id="section9">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>REPORTAJE DE INTERESES DE OTROS MEDIOS</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
<?= $reportaje[0]->texto; ?>
    </div>
</section>-->
@endsection

@section('scripts')
<script>
    $(function () {
<?php if (count($infofrafia) > 0 && isset($infofrafia)) { ?>
    <?php
    $i = 0;
    foreach ($infofrafia as $key) {
        ?>
                var dt = new DashTimer('#timer<?= $i; ?>').init({
                    start: {
                        fill: '#2196f3',
                        innerRatio: .9,
                        outerRatio: 1
                    },
                    finish: {
                        fill: '#0d47a1',
                        innerRatio: .3,
                        outerRatio: 1
                    },
                    values: {
                        show: true,
                        decorate: function (d) {
                            return Math.floor(d / 10) * 10;
                        },
                        classes: "mui--text-light-secondary mui--text-caption"
                    }
                }).setData([{
                        immediate: {
                            angle: true
                        },
                        start: {
                            angle: 1,
                            fill: '#eee'
                        },
                        finish: {
                            angle: 0,
                            fill: '#eee'
                        }
                    }, {
                        values: {
                            show: true
                        }
                    }]).start(1000, 0, .<?= $key->porcentaje; ?>);
        <?php
        $i++;
    }
    ?>
<?php } ?>
    })
</script>
@stop
