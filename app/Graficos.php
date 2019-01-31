<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graficos extends Model {

    protected $table = "graficos";
    public $timestamps = false;

    public static function roles() {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'porcentaje' => 'required|numeric',
            'id_infografia' => 'required|numeric'
        ];
    }

}
