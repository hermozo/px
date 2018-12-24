<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagina;
use App\Contenido;
use App\Services\PayUService\Exception;
use DB;

class PaginarestController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function querysql($id) {
        return DB::select('select *  from pagina WHERE idpagina = :id order by id desc ', ['id' => $id]);
    }

    public function bus($id, $data = []) {
        $i = 0;
        if (count($this->querysql($id)) > 0) {
            $datax = $this->querysql($id);
            foreach ($datax as $v) {
                $r = $i++;
                $data[$r] = $v;
                if (!empty($this->bus($v->id))) {
                    $v->estado = false;
                    $v->mas = $this->bus($v->id);
                } else {
                    $v->estado = false;
                }
            }
            return $data;
        } else {
            return false;
        }
    }

    public function index() {
        $menu = [];
        $data = DB::select('select * from pagina where idpagina IS NULL ', []);
        foreach ($data as $v) {
            $data = [];
            $v->estado = false;
            $v->mas = $this->bus($v->id, $data);
            $menu[] = $v;
        }
        return $menu;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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
