<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Multimedia;
use DB;
use Session;

class UploadController extends Controller {

 /*   public function __construct() {
        $this->middleware('auth');
    }
*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return 'g';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $ret = [];
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
            }
            return json_encode($ret);
        } else {
            return $ret;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $sql = "select * from multimedia where idgalery = :id order by orden ASC";
        $data = DB::select($sql, ['id' => $id]);
        return view('uploadservidor/view', ['id' => $id, 'imagenes' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
