<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informaciones extends Model {

    protected $table = "informaciones";
    public $timestamps = false;

    public static function roles() {
        return [
            'titulo' => 'required',
            'contenido' => 'required',
            'contenido' => 'required',
            'portal' => 'required',
            'tipo' => 'required',
            'fechainicio' => 'required',
            'fechafinal' => 'required'
        ];
    }

}
