<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multimedia;

class UploadtugareController extends Controller {

    public function store(Request $request) {
        $output_dir = "images/";
        if (isset($_FILES["file"])) {
            $ret = [];
            $error = $_FILES["file"]["error"];
            if (!is_array($_FILES["file"]["name"])) {
                $array = explode('.', $_FILES['file']['name']);
                $extension = end($array);
                $fileName = date('U') . '-' . uniqid() . decbin(rand(1, 999999)) . rand(1, 999999) . '.' . $extension;
                move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir . $fileName);
                $ret['archivo'] = $fileName;

                $model = new Multimedia();
                $model->tipo = 'galery';
                $model->nombre = $fileName;
                $model->texto = 'Galeri';
                $model->slide = NULL;
                $model->idgalery = $_POST['idp'];
                $model->orden = 99999;
                $model->save();
            }
            return json_encode($ret);
        }
    }

}
