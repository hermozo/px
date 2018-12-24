<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model {

    protected $table = "pagina";
    public $timestamps = false;



    public static function roles() {
        return [
            'titulo' => 'required',
            'descripcion' => 'required'
        ];
    }

}
