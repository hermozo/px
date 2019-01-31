@extends('layouts.master')
@section('content')
<span id="url-pagina" name="{{ URL::to('/') }}"></span>
@foreach ($paginas as $data)
<h4 class="text-center">Pagina {{ $data->titulo }}</h4>
<p class="text-center"><small>{{ $data->descripcion}} </small></p>
@endforeach

@foreach ($contenido as $datax)
<div id="keyId" data-val="{{ $datax->id}}"></div>
{{ csrf_field() }}
<textarea class="form-control textoContenido" id="summary-ckeditor">{{ $datax->texto }}</textarea>
@endforeach
<legend></legend>
<p class="text-center">
    <button class="btn btn-primary" id="btn-guardar-texto">Guardar</button>
</p>


<script src="{{ URL::to('../ckeditor/ckeditor.js') }}"></script>

<script>
CKEDITOR.replace('summary-ckeditor', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '500'
});
</script>
@endsection