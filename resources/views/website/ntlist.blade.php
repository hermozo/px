@foreach($datos as $key=>$model)
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
<div class="row">
	<div class="col-md-12"></div>
</div>
{{$datos->links()}}