<?php

namespace App\Http\Controllers;

use App\Servidores;
use Illuminate\Http\Request;

class ServidoresController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Servidores::all();
        return view("servidores/index", ["data" => $data]);
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
        $rules = Servidores::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = new Servidores();
            $model->foto = $request->foto;
            $model->nombre = $request->nombre;
            $model->apellidop = $request->apellidop;
            $model->apellidom = $request->apellidom;
            $model->profecion = $request->profecion;
            $model->ubicacion = $request->ubicacion;
            $model->direccion = $request->direccion;
            $model->telefono = $request->telefono;
            $model->interno = $request->interno;
            $model->email = $request->email;
            $model->unidad = $request->unidad;
            $model->descripcion = $request->descripcion;
            $model->sitioweb_id = 1;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servidores  $servidores
     * @return \Illuminate\Http\Response
     */
    public function show(Servidores $servidores) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servidores  $servidores
     * @return \Illuminate\Http\Response
     */
    public function edit(Servidores $servidores) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servidores  $servidores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servidores $servidores) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servidores  $servidores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servidores $servidores) {
        //
    }

}
