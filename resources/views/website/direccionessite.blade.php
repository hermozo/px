@extends('layouts.website')
@section('title', 'Ubicaciones')
@section('content')
<br/>
<br/>
<h1 class="text-center">Direcciones departamentales</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="map"></div>
            <div id="pano"></div>
        </div>

    </div>
</div>

<br/>
<br/>
<style>

    #map, #pano {
        float: left;
        height: 500px;
        width: 45%;
    }
</style>


<script>
    function initialize() {
        var fenway = {lat: 42.345573, lng: -71.098326};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: fenway,
            zoom: 14
        });
        var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('pano'), {
            position: fenway,
            pov: {
                heading: 34,
                pitch: 10
            }
        });
        map.setStreetView(panorama);
    }
</script>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl8EOqS1aoH-FgT43WuP6_F50GSZ12ScM&callback=initialize">
</script>

@endsection