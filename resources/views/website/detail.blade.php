@extends('layouts.website')
@section('title', 'Inicio')
@section('content')
<!-- <link href="{{ asset('css/bxSlider.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/page.css') }}" rel="stylesheet">
<section class="containe-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main_blog_details">
                    <br/>
                    <h4 class="text-center">{{$content->titulo}}</h4>
                    <?= $content->contenido ?>


                    <div class="fb-share-button" 
                         data-href="{{URL::to('/detail/'.$content->id)}}" 
                         data-layout="box_count" data-size="large" data-mobile-iframe="true">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" 
                           class="fb-xfbml-parse-ignore">Compartir</a>
                    </div>


                    <a class='twitter-share-button btn btn-primary' style="margin-top: -15px !important" data-size='large' 
                       data-lang='es' data-via='{{URL::to('/detail/'.$content->id)}}' 
                       expr:data-text='data:post.title' 
                       expr:data-url='data:post.canonicalUrl' 
                       href='http://twitter.com/share'><i class="fab fa-twitter-square"></i> Twittear</a>

                </div>

            </div>
            <div class="col-xs-3">
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </div>

</section>


<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

@endsection