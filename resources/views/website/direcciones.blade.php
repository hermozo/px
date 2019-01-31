@extends('layouts.website')
@section('title', 'Inicio')
@section('content')
@section('title', 'Direcciones')
<?php
$maps = $list;
reset($maps);
$map = $maps[0];
?>
<link href="{{ asset('css/page.css') }}" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl8EOqS1aoH-FgT43WuP6_F50GSZ12ScM&callback=initialize" async defer></script>
<style>
    .direccioncontainer{
        background-color: #999;
        cursor: pointer
    }
    .direccioncontainer:hover{
        background-color: #ccc;
    }
</style>
<section id="content_page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Direcciones</h3>
            </div>
            <div class="col-xs-12 col-sm-3 ">
                <?php foreach ($list as $key => $val) { ?>
                    <div class=" direccioncontainer thumbnail">
                        <div class="direccion" data-lat="<?php echo $val['lat']; ?>" data-lng="<?php echo $val['lng']; ?>" data-param="<?php echo $val['heading']; ?>">	
                            <p><b><?php echo $val['direccion']; ?> </b>  </p> 
                            <p><button class="btn btn-warning" style="width:100%">Ver ubicación</button></p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-xs-12 col-sm-9">
                <div class="row">
                    <div class="col-md-6" style="margin:0px; padding:0px">
                        <div id="map"></div>
                    </div>
                    <div class="col-md-6"  style="margin:0px; padding:0px">
                        <div id="pano"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var map;
/*public*/ var fenway;

/*public*/ function initMap(ubi) {
    fenway = ubi;
    map = new google.maps.Map(document.getElementById('map'), {
        center: fenway,
        zoom: 14
    });
}
/*public*/ function parom(ubi, p) {
    var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
        position: ubi,
        pov: {
            heading: p,
            pitch: 10
        }
    });
    map.setStreetView(panorama);
}
/*private*/ function marca(ubicacion) {
    var marker = new google.maps.Marker({
        position: ubicacion,
        map: map,
        title: 'AJ'
    });
}
function initialize() {
    var fenway = {lat: <?= $map->lat ?>, lng: <?= $map->lng ?>};
    map = new google.maps.Map(document.getElementById('map'), {
        center: fenway,
        zoom: 14
    });
    var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
        position: fenway,
        pov: {
            heading: <?= $map->heading ?>,
            pitch: <?= $map->pitch ?>
        }
    });
    map.setStreetView(panorama);
}
var btndic = document.querySelectorAll('.direccion');

for (var x = 0; x < btndic.length; x++) {
    btndic[x].addEventListener("click", function () {
        //alert("button was clicked"+this.getAttribute("data-lat"));
        var lat = parseFloat(this.getAttribute("data-lat"));
        var lng = parseFloat(this.getAttribute("data-lng"));
        var p = parseInt(this.getAttribute("data-param"));
        var ubi = {lat: lat, lng: lng};
        initMap(ubi);
        parom(ubi, p);
    });
}
/*$(".direccion").click(function(){
 alert("Si");
 var lat = parseFloat($(this).data("lat"));
 var lng = parseFloat($(this).data("lng"));
 var p = parseInt($(this).data("param"));
 var ubi = {lat: lat, lng: lng};
 initMap(ubi); 
 parom(ubi,p);
 });*/
</script>
@endsection