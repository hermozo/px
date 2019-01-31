<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagina;
use App\Contenido;
use App\Services\PayUService\Exception;
use DB;

class PaginaController extends Controller {

    public $i = "";
    public $items = [];

    public function __construct() {
        $this->middleware('auth');
    }

    public function querysql($id) {
        return DB::select('select * from pagina WHERE idpagina = :id  ', ['id' => $id]);
    }

    public function bus($id, $html = '') {
        $i = 0;
        if (count($this->querysql($id)) > 0) {
            $html = '<ol  class="list-group">';
            $datax = $this->querysql($id);
            foreach ($datax as $v) {
                $r = $i++;
                $data[$r] = $v;
                $html .= '<li  class="list-group-item">  '
                        . ' <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;' . $v->titulo . ' &nbsp; '
                        . '<button type="button" class="btn btn-default btn-xs  btn-crear-categoria badge" data-id="' . $v->id . '">  <i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar sub  </button>'
                        . ' <button type="button" class="btn btn-danger btn-xs btn-eliminar-pagina badge" data-id="' . $v->id . '"> <i class="fa fa-times" aria-hidden="true"></i> Borrar </button> '
                        . ' <a class="btn btn-success btn-xs badge"  href="' . url('pagina', ['id' => $v->id]) . '"> Agregar contenido <i class="fa fa-play" aria-hidden="true"></i></a> '
                        . '' . $this->bus($v->id) . '</li>';
            }
            $html .= '</ol>';
            return $html;
        } else {
            return '';
        }
    }

    public function index() {
        $menu = [];
        $data = DB::select('select * from pagina where idpagina IS NULL AND tipo IS NULL ORDER BY id ASC ', []);
        $pagext = DB::select('select * from pagina where tipo = 1 ORDER BY id ASC', []);

        $htmlextra = '<ol class="list-group">';
        foreach ($pagext as $v) {
            $htmlextra .= '<li class="list-group-item list-group-item-info">'
                    . ' <i class="fa fa-play text-danger" aria-hidden="true"></i> ' . $v->titulo . ' '
                    . ' <a class="btn btn-success btn-xs badge" href="' . url('pagina', ['id' => $v->id]) . '"> Contenido <i class="fa fa-play" aria-hidden="true"></i></a>' . $this->bus($v->id) . ''
                    . ' </li>';
        }
        $htmlextra .= '</ol>';

        $html = '<ol class="list-group">';
        foreach ($data as $v) {
            $data = [];
            $menu[] = $v;
            $html .= '<li class="list-group-item list-group-item-info">'
                    . ' <i class="fa fa-play text-danger" aria-hidden="true"></i> ' . $v->titulo . ' '
                    . '<button type="button" class="btn btn-default btn-xs  btn-crear-categoria badge" data-id="' . $v->id . '"> <i class="fa fa-plus-circle"  aria-hidden="true"></i> Agregar sub </button> '
                    . '<button type="button" class="btn btn-danger btn-xs btn-eliminar-pagina badge" data-id="' . $v->id . '"> <i class="fa fa-times" aria-hidden="true"></i> Borrar </button>'
                    . ' <a class="btn btn-success btn-xs badge" href="' . url('pagina', ['id' => $v->id]) . '"> Agregar contenido <i class="fa fa-play" aria-hidden="true"></i></a>' . $this->bus($v->id) . ''
                    . ' </li>';
        }
        $html .= '</ol>';
        return view('pagina/index', [
            'paginas' => $data,
            //'menu' => $menu,
            'html' => $html,
            'pagext' => $htmlextra
        ]);
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
        $rules = Pagina::roles();
        try {
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors' => $validator->errors()->all()
                ];
            }
            $model = new Pagina();
            $model->sitiowebid = 1;
            $model->idpagina = ($request->idpagina != 'NULL') ? $request->idpagina : NULL;
            $model->titulo = $request->titulo;
            $model->descripcion = $request->descripcion;
            return ($model->save() == 1) ? 1 : 0;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function show($id) {
        $data = DB::select('select * from pagina WHERE id = :id ', ['id' => $id]);
        $datacontenidoverifica = DB::select('select * from contenido WHERE idpagina = :id', ['id' => $id]);
        if (count($datacontenidoverifica) == 0) {
            $model = new Contenido();
            $model->idpagina = $id;
            $model->texto = 'Contenido';
            $model->nombre = NULL;
            $model->save();
        }
        $datacontenido = DB::select('select * from contenido WHERE idpagina = :id', ['id' => $id]);
        return view('pagina/view', [
            'paginas' => $data,
            'contenido' => $datacontenido
        ]);
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
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Pagina::destroy($id);
    }

}
