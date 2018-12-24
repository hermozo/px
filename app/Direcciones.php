<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model {

    protected $table = "direcciones";
    public $timestamps = false;

    public static function roles() {
        return [
            'heading' => 'required|numeric',
            'direccion' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'pitch' => 'required|numeric'
        ];
    }

}
