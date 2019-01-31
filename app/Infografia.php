<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infografia extends Model {

    protected $table = "infografia";
    public $timestamps = false;

    public static function roles() {
        return [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];
    }

}
