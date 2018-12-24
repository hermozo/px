<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model {

    protected $table = "galeria";
    public $timestamps = false;

    public static function roles() {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
        ];
    }

}
