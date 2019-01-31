@extends('layouts.master')
@section('content')
<br/>
<span id="uploadtugare" name="<?= URL::to('uploadtugare') ?>"></span>
<span id="ordenafotos" name="<?= URL::to('ordenafotos') ?>"></span>
<span id="idGaleryre" name="<?= $id; ?>"></span>
<div class="row">
    <div class="row">
        <div class="col-md-3">
            <form method='post' action='' class="btn-file" enctype='multipart/form-data'>
                {{ csrf_field() }}
                <label for="uploadGaleryFiles" class="btn btn-danger btn-lg" style="width:100%">Explorar</label>
                <input  id="uploadGaleryFiles" type="file" name="file[]" id="file" multiple>
            </form> 

            <ul id="estadosubir" class="list-group"></ul>
        </div>
        <div class="col-md-9">
            <ul id="sortable" >
                <?php foreach ($imagenes as $val) { ?>

                    <li class="ui-state-default" id="item-<?= $val->id; ?>">    
                        <div style="background-image: url({{asset('images/')}}<?= '/' . $val->nombre; ?>);background-size:cover; background-position: center" >
                            <br/>
                        </div>
                        <button style="top:-100px !important" class="btn btn-danger btn-xs eliminar-galery-img" data-id="<?= $val->id; ?>">Borrar</button>
                    </li>  
                <?php } ?>
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
        margin: 3px 3px 25px 5px; 
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