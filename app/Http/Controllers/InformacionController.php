<?php

namespace App\Http\Controllers;

use App\Informacion;
use Illuminate\Http\Request;
use App\Informaciones;
use App\Services\PayUService\Exception;
use DB;

class InformacionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return $_POST;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = Informaciones::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = new Informaciones();
            $model->titulo = $request->titulo;
            $model->descripcion = $request->descripcion;
            $model->contenido = $request->contenido;
            $model->portal = $request->portal;
            $model->tipo = $request->tipo;
            $model->fechainicio = $request->fechainicio;
            $model->fechafinal = $request->fechafinal;
            $model->sitiowebid = 1;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function show($data) {
        if (is_numeric($data)) {
            $datos = Informaciones::find($data);
            $data = $datos->tipo;
            return view('informacion/view', ['data' => $data, 'datos' => $datos]);
        } else {
            return view('informacion/view', ['data' => $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Informacion $informacion) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {

        $rules = Informaciones::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = Informaciones::find($id);
            $model->titulo = $request->titulo;
            $model->descripcion = $request->descripcion;
            $model->contenido = $request->contenido;
            $model->portal = $request->portal;
            $model->tipo = $request->tipo;
            $model->fechainicio = $request->fechainicio;
            $model->fechafinal = $request->fechafinal;
            $model->sitiowebid = 1;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Informacion  $informacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Informaciones::destroy($id);
    }

}
