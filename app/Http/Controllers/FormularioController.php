<?php

namespace App\Http\Controllers;

use App\Formulario;
use Illuminate\Http\Request;

class FormularioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('formulario.index');
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
        $rules = Formulario::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = new Formulario();
            $model->nombreuno = $request->nombreuno;
            $model->apellidopaternouno = $request->apellidopaternouno;
            $model->apellidomaternouno = $request->apellidomaternouno;
            $model->ci = $request->ci;
            $model->expx = $request->expx;
            $model->emailuno = $request->emailuno;
            $model->telefeonouno = $request->telefeonouno;
            $model->nombredos = $request->nombredos;
            $model->apellidopaternodos = $request->apellidopaternodos;
            $model->apellidomaternodos = $request->apellidomaternodos;
            $model->tipopersona = $request->tipopersona;
            $model->unidadorganizacional = $request->unidadorganizacional;
            $model->cargo = $request->cargo;
            $model->ciudad = $request->ciudad;
            $model->tipoqueja = $request->tipoqueja;
            $model->descripcionqueja = $request->descripcionqueja;
            $model->fecha = $request->fecha;
            $model->tipodocumento = $request->tipodocumento;
            $model->descripcion = $request->descripcion;
            $model->uploaddocumento = $request->uploaddocumento;
            $model->descripciondocumento = $request->descripciondocumento;
            $model->createat = $request->createat;
            $model->updateat = $request->updateat;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function show(Formulario $formulario) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function edit(Formulario $formulario) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formulario $formulario) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formulario $formulario) {
        //
    }

}
