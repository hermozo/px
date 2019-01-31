@section('title', $content->titulo)
<!-- <link href="{{ asset('css/bxSlider.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/page.css') }}" rel="stylesheet">
<section class="containe-fluid">
    <div class="row">
    	<div class="col-md-12">
    	
    		<h3>Preguntas Frecuentes</h3>
    		{!! $content->texto !!}
    	
    	</div>
    </div>
</section>