<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitioweb extends Model {

    protected $table = "sitioweb";
    public $timestamps = false;

    public static function roles() {
        return [
            'nombre' => 'required'
        ];
    }

}
