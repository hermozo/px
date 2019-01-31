@foreach($datos as $key=>$model)
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
<div class="row">
    <div class="col-md-12"></div>
</div>
{{$datos->links()}}