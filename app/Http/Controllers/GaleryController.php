<?php

namespace App\Http\Controllers;

use App\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Galery::all();
        return view('galery/index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('galery/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = Galery::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = new Galery();
            $model->nombre = $request->nombre;
            $model->descripcion = $request->descripcion;
            $model->tipo = $request->tipo;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data = Galery::all()->where("tipo", $id);
        return view('galery/index', ['data' => $data, 'tipo' => $id]);
        //return view('galery/vista');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $galery) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        $rules = Galery::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = Galery::find($id);
            $model->nombre = $request->nombre;
            $model->descripcion = $request->descripcion;
            $model->tipo = $request->tipo;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Galery::destroy($id);
    }

}
