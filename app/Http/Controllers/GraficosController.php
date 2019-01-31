<?php

namespace App\Http\Controllers;

use App\Graficos;
use Illuminate\Http\Request;
use DB;

class GraficosController extends Controller {

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = Graficos::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = new Graficos();
            $model->nombre = $request->nombre;
            $model->descripcion = $request->descripcion;
            $model->porcentaje = $request->porcentaje;
            $model->id_infografia = $request->id_infografia;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Graficos  $graficos
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $datax = DB::table('graficos')->select(['*'])->where('id_infografia', $id)->paginate(10);
        return view('graficos.view', ['data' => \App\Infografia::find($id), 'datax' => $datax]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Graficos  $graficos
     * @return \Illuminate\Http\Response
     */
    public function edit(Graficos $graficos) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graficos  $graficos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graficos $graficos) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graficos  $graficos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Graficos::destroy($id);
    }

}
