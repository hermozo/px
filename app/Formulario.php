<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model {

    protected $table = "consultas";
    public $timestamps = false;

    public static function roles() {
        return [
            'nombreuno' => 'required|string|max:40',
            'apellidopaternouno' => 'required|string|max:40',
            'apellidomaternouno' => 'required|string|max:40',
            'ci' => 'required|numeric|min:6',
            'expx' => 'required|string|max:15',
            'emailuno' => 'required|string|max:80',
            'telefeonouno' => 'required|numeric|min:8',
            'nombredos' => 'required|string|max:40',
            'apellidopaternodos' => 'required|string|max:40',
            'apellidomaternodos' => 'required|string|max:40',
            'tipopersona' => 'string|max:40',
            'unidadorganizacional' => 'required|string|max:50',
            'cargo' => 'string|max:50',
            'ciudad' => 'string|max:50',
            'tipoqueja' => 'string|max:10',
            'descripcionqueja' => 'string|max:500',
            'fecha' => 'required|date',
            'tipodocumento' => 'string|max:100',
            'descripcion' => 'string|max:500',
            'uploaddocumento' => 'required|string|max:255',
            'descripciondocumento' => 'string|max:500',
            'createat' => 'required',
            'updateat' => 'required'
        ];
    }

}
