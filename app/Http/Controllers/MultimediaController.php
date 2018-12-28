<?php

namespace App\Http\Controllers;

use App\Multimedia;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;
use DB;
use Session;

class MultimediaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                /*                 * */
                $r = 0;
                if (isset($_POST["tipo"])) {
                    $r = 1;
                } else {
                    $r = Session::get('ID');
                }
                $model = new Multimedia();
                $model->tipo = 'galery';//$_POST["tipo"];
                $model->nombre = $fileName;
                $model->texto = $array[0];
                $model->slide = $r;
                $model->idgalery = NULL;
                $model->orden = 1;
                $model->save();
            }
            return json_encode($ret);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        Session::put('ID', $id);
        if ($id == 2) {
            $data = DB::table('multimedia')->select(['*'])->where('slide', $id)->paginate(20);
            return view('multimedia/index', ['data' => $data]);
        } else {
            $data = DB::table('multimedia')->select(['*'])->paginate(20);
            return view('multimedia/index', ['data' => $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function edit(Multimedia $multimedia) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multimedia $multimedia) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Multimedia  $multimedia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Multimedia::destroy($id);
    }

}
