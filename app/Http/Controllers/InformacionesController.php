<?php

namespace App\Http\Controllers;

use App\Informaciones;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;
use DB;

class InformacionesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('informaciones/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return 1;
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
     * @param  \App\Informaciones  $informaciones
     * @return \Illuminate\Http\Response
     */
    public function show($data) {
        $datax = DB::table('informaciones')->select(['*'])->where('tipo', "$data")->paginate(10);
        return view('informaciones/view', ['data' => $data, 'datax' => $datax]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informaciones  $informaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Informaciones $informaciones) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informaciones  $informaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informaciones $informaciones) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Informaciones  $informaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Informaciones::destroy($id);
    }

}
