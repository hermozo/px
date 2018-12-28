@extends('layouts.master')
@section('content')
<br/>
<div class="row">
    <div class="row">
        <div class="col-md-3">
            <form method='post' action='' class="btn-file" enctype='multipart/form-data'>
                <label for="uploadGaleryFiles" class="btn btn-danger btn-lg" style="width:100%">Explorar</label>
                <input  id="uploadGaleryFiles" type="file" name="file[]" id="file" multiple>
            </form> 
        </div>
        <div class="col-md-9">
            <ul id="sortable">
                <li class="ui-state-default" style="background-image: url({{asset('images/unnamed.jpg')}}); background-size:cover; background-position: center"></li>
            </ul>
        </div>
    </div>

</div>
<style>
    #uploadGaleryFiles{
        display: none;
    }


    #sortable {
        list-style-type: none; 
        margin: 0;
        padding: 0; 
        width: 100%;
    }
    #sortable li {
        margin: 3px 3px 3px 0; 
        padding: 1px; 
        float: left; 
        width: 120px; 
        height: 120px; 
        font-size: 4em; 
        text-align: center;
        cursor:move
    }

</style>
@endsection