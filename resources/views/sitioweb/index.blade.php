@extends('layouts.master')

@section('content')
<div style="background-color: #999; padding: 30px">
    <h1 class="text-center" style="color: #fff">Gestor de contenido</h1>
</div>
<hr/>
        <div class="col-md-3  page-header">
            <a href="{{ url('pagina') }}" style="color:#999;">
                <p class="text-center"><i class="fa fa-chrome fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Páginas Sitio Web</p>
            </a>
        </div>

        <div class="col-md-3 page-header">
            <a href="{{ url('multimedia',['id'=>'2']) }}" style="color:#999">
                <p class="text-center"><i class="fa fa-fast-forward fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Sliders</p>
            </a>
        </div>


        <div class="col-md-3 page-header">
            <a href="{{ url('informaciones',['tipo'=>'noticia']) }}" style="color:#999">
                <p class="text-center"><i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Noticias</p>
            </a>
        </div>

        <div class="col-md-3 page-header">
            <a href="{{ url('informaciones',['tipo'=>'comunicado']) }}" style="color:#999">
                <p class="text-center"><i class="fa fa-file-text-o fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Comunicados</p>
            </a>
        </div>

        <div class="col-md-3 page-header">
            <a href="{{ url('infografia') }}" style="color:#999">
                <p class="text-center"><i class="fa fa-pie-chart fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Infografías</p>
            </a>
        </div>

        <div class="col-md-3 page-header">
            <a href="{{  url('informaciones',['tipo'=>'casos']) }}" style="color:#999">
                <p class="text-center"><i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Casos</p>
            </a>
        </div>


        <div class="col-md-3 page-header">
            <a href="{{ url('direcciones') }}" style="color:#999">
                <p class="text-center"><i class="fa fa-map-marker fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Direcciones</p>
            </a>
        </div>


        <div class="col-md-3 page-header">
            <a href="{{ url('galery/1') }}" style="color:#999">
                <p class="text-center"><i class="fa fa-file-video-o fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Tutoriales y videos </p>
            </a>
        </div>

        <div class="col-md-3 page-header">
            <a href="{{  url('galery/2')  }}" style="color:#999">
                <p class="text-center"><i class="fa  fa-picture-o fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Galería de imágenes</p>
            </a>
        </div>

        <div class="col-md-3 page-header">
            <a href="{{  url('galery/3')  }}" style="color:#999">
                <p class="text-center"><i class="fa  fa-th-list fa-5x" aria-hidden="true"></i> </p>
                <p class="text-center">Revistas</p> 
            </a>
        </div>



@endsection
