<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidores extends Model {

    protected $table = "seridores";
    public $timestamps = false;

    public static function roles() {
        return [
            'foto' => 'required',
            'nombre' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'profecion' => 'required',
            'ubicacion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'interno' => 'required',
            'email' => 'required',
            'unidad' => 'required',
            'descripcion' => 'required',
        ];
    }

}
