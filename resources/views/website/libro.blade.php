@extends('layouts.websitelibro')
@section('title', 'Inicio')
@section('content')


<br/>
<br/>
<h1 class="text-center">Libro de app</h1>



<div class="flipbook-viewport">
    <div class="container">
        <div class="flipbook">
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
            <div style="background-image:url({{ asset('images/1546460971-5c2d1f2b1255b11011001111001011111601716.png') }})"></div>
        </div>
    </div>
</div>


<br/>
<br/>
<br/>
<br/>
@section('scripts')


{{ Html::script(asset('libro/extras/modernizr.2.5.3.min.js')) }}
<script type="text/javascript">
    function loadApp() {
        $('.flipbook').turn({
            width: 922,
            height: 600,
            elevation: 50,
            gradients: true,
            autoCenter: true
        });
    }
    yepnope({
        test: Modernizr.csstransforms,
        yep: ['{{URL::to(asset('libro/lib/turn.js'))}}'],
        nope: ['{{URL::to(asset('libro/lib/turn.html4.min.js'))}}'],
        both: ['{{URL::to(asset('libro/samples/basic/css/libro.css'))}}'],
        complete: loadApp
    });
</script>


@stop



@endsection

