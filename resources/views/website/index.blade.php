@extends('layouts.website')
@section('title', 'Inicio')
@section('content')
<?php 
?>
<link href="{{ asset('css/bxSlider.css') }}" rel="stylesheet">
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<section id="section1" class="slide">
    <ul class="bxslider">
        @foreach($slides as $key=>$model)
        <li><img src="{{ asset('images/vacio.png') }}" title="{{$model->texto}}" style="background-image: url({{ asset('images/')}}/{{$model->nombre}}); background-size:cover; background-position:top center; width: 100%;"/></li>
        @endforeach
    </ul>
</section>
<section id="section2">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>RESULTADOS DE LA DEFENSA LEGAL EN PROCESOS INTERNACIONALES</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <!--<img src="{{ asset('img/triangle.png') }}" class="triangleimg">-->

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <br/>
                <div class="card" style="width: 12rem;">
                    <br/>
                    <center>
                        <div id="timer0"></div>
                    </center>
                    <div class="card-body">
                        <h5 class="card-title text-center">Card title</h5>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-md-3 col-xs-6">
                <br/>
                <div class="card" style="width: 12rem;">
                    <br/>
                    <center>
                        <div id="timer2"></div>
                    </center>
                    <div class="card-body">
                        <h5 class="card-title text-center">Card title</h5>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-md-3 col-xs-6">
                <br/>
                <div class="card" style="width: 12rem;">
                    <br/>
                    <center>
                        <div id="timer3"></div>
                    </center>
                    <div class="card-body">
                        <h5 class="card-title text-center">Card title</h5>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-md-3 col-xs-6">
                <br/>
                <div class="card" style="width: 12rem;">
                    <br/>
                    <center>
                        <div id="timer4"></div>
                    </center>
                    <div class="card-body">
                        <h5 class="card-title text-center">Card title</h5>
                    </div>
                </div>
                <br/>
            </div>

        </div>
    </div>

</section>
<section id="section3">
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
            <div class="col-md-3 col-xs-4">
                <div class="choice_item" id="{{$model->id}}">
					<img src="{{ asset('images/imagen_4x4.png') }}" title="{{$model->titulo}}" style="background-image: url({{ asset('images/'.$model->portal) }}); background-size:cover; background-position:top center;" alt="{{$model->titulo}}"/>
					<div class="choice_text">
						<!--div class="date">
							<a class="gad_btn" href="#">Gadgets</a>
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
						</div-->
						<a href="#"><h4>{{$model->titulo}}</h4></a>
						<!--p>Planning to visit Las Vegas or any other vacational resort where casinos</p>-->
					</div>
				</div>
            </div>
            @endforeach
            <div class="col-md-12 row_btn">
            	<a href="{{ URL::to('/noticias') }}" class="btn btn-default">Ver más</a><br/><br/>
            </div>
        </div>
    </div>
</section>
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
            <div class="col-md-3 col-xs-4">
                <div class="choice_item" id="{{$model->id}}">
					<img src="{{ asset('images/imagen_4x4.png') }}" title="{{$model->titulo}}" style="background-image: url({{ asset('images/'.$model->portal) }}); background-size:cover; background-position:top center;" alt="{{$model->titulo}}"/>
					<div class="choice_text">
						<!--div class="date">
							<a class="gad_btn" href="#">Gadgets</a>
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
						</div-->
						<a href="#"><h4>{{$model->titulo}}</h4></a>
						<!--p>Planning to visit Las Vegas or any other vacational resort where casinos</p>-->
					</div>
				</div>
            </div>
            @endforeach
            <div class="col-md-12 row_btn">
            	<a href="{{ URL::to('comunicados') }}" class="btn btn-default">Ver más</a><br/><br/>
            </div>
        </div>
    </div>
</section>
<section id="section5">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>NUESTRO EQUIPO</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('images/user.png')}}" alt="Juan lovera">
                    <div class="card-body">
                        <h5 class="card-title text-center">Card title</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('images/user.png')}}" alt="Juan lovera">
                    <div class="card-body">
                        <h5 class="card-title text-center">Card title</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset('images/user.png')}}" alt="Juan lovera">
                    <div class="card-body">
                        <h5 class="card-title text-center">Card title</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section id="section6">
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
            <div class="col-md-3 col-xs-4">
                <div class="choice_item" id="{{$model->id}}">
					<img src="{{ asset('images/imagen_4x4.png') }}" title="{{$model->titulo}}" style="background-image: url({{ asset('images/'.$model->portal) }}); background-size:cover; background-position:top center;" alt="{{$model->titulo}}"/>
					<div class="choice_text">
						<!--div class="date">
							<a class="gad_btn" href="#">Gadgets</a>
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>March 14, 2018</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>05</a>
						</div-->
						<a href="#"><h4>{{$model->titulo}}</h4></a>
						<!--p>Planning to visit Las Vegas or any other vacational resort where casinos</p>-->
					</div>
				</div>
            </div>
            @endforeach
            <div class="col-md-12 row_btn">
            	<a href="{{ URL::to('casos') }}" class="btn btn-default">Ver más</a><br/><br/>
            </div>
        </div>
    </div>
</section>
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
            <div class="col-md-3 col-xs-4">
                <h3>Contenido</h3>
            </div>
        </div>
    </div>
</section>
<section id="section8">
    <div class="bg_blue">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>PASANTÍAS</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="triangle"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-4">
                <h3>Contenido</h3>
            </div>
        </div>
    </div>
</section>
<section id="section9">
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
        <div class="row">
           <div class="col-md-12">
           	<h3>Contenido</h3>
           </div>
        </div>
    </div>
</section>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_view">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">.</h4>
			</div>
			<div class="modal-body" id="content_modal">
				
			</div>
		</div>
	</div>
</div>
@endsection