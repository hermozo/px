<?php

namespace App\Http\Controllers;

use App\Infografia;
use Illuminate\Http\Request;

class InfografiaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = Infografia::all();
        return view('infografia/index', ['data' => $data]);
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
        $rules = Infografia::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = new Infografia();
            $model->nombre = $request->nombre;
            $model->descripcion = $request->descripcion;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Infografia  $infografia
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Infografia::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Infografia  $infografia
     * @return \Illuminate\Http\Response
     */
    public function edit(Infografia $infografia) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Infografia  $infografia
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        $rules = Infografia::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = Infografia::find($id);
            $model->nombre = $request->nombre;
            $model->descripcion = $request->descripcion;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Infografia  $infografia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Infografia::destroy($id);
    }

}
