<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class WebsiteController extends Controller {

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function __invoke(Request $request)
      {
      //
      } */
    public function libro() {
        return view('website.libro');
    }

    public function elx($cadena) {
        $cadena = str_replace(
                ['á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'], ['a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'], $cadena);
        $cadena = str_replace(
                ['é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'], ['e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'], $cadena);
        $cadena = str_replace(
                ['í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'], ['i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'], $cadena);
        $cadena = str_replace(
                ['ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'], ['o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'], $cadena);
        $cadena = str_replace(
                ['ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'], ['u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'], $cadena);
        $cadena = str_replace(
                ['ñ', 'Ñ', 'ç', 'Ç'], ['n', 'N', 'c', 'C'], $cadena
        );
        return $cadena;
    }

    public function search(Request $request) {
        $ds = strtolower($this->elx(($request->data)));
        $datax = [];
        $sql2 = "select p.id, p.descripcion as descripcion, p.titulo, regexp_replace(c.texto, E'<[^>]+>', '', 'gi') as texto from pagina p inner join contenido c on  p.id = c.idpagina WHERE  lower(translate(p.titulo,'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜñ','aeiouAEIOUaeiouAEIOUn')) LIKE '%" . $ds . "%' OR lower(translate(regexp_replace(c.texto, E'<[^>]+>', '', 'gi'),'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜñ','aeiouAEIOUaeiouAEIOUn')) like '%" . $ds . "%';";
        $datados = DB::select($sql2);
        $sql = "select id, titulo, regexp_replace(contenido, E'<[^>]+>', '', 'gi') as contenido from informaciones  WHERE lower(translate(regexp_replace(contenido, E'<[^>]+>', '', 'gi'),'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜñ','aeiouAEIOUaeiouAEIOUn')) LIKE '%" . $ds . "%' OR lower(translate(titulo,'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜñ','aeiouAEIOUaeiouAEIOUn')) LIKE '%" . $ds . "%';";
        $datauno = DB::select($sql);
        /*         * ********** */
        foreach ($datados as $dat) {
            $datax[] = [
                'tipo' => 1,
                'url' => '/page/' . $dat->descripcion,
                'titulo' => $dat->titulo,
                'texto' => $dat->texto,
            ];
        }
        foreach ($datauno as $datx) {
            $datax[] = [
                'tipo' => 2,
                'url' => $datx->id,
                'titulo' => $datx->titulo,
                'texto' => $datx->contenido,
            ];
        }
        return view('website.search', ['datax' => $datax]);
    }

    public function index($p1 = null) {
        $page = \App\Website::getPageMenu($p1);
        //print_r($page);
        return view('website.content', compact("page"));
    }

    public function detail($id) {
        $content = \App\Informaciones::find($id);
        //return $content->titulo;
        $sql = 'insert into visitainformaciones(idinformacion,createat) values(:id,null);';
        DB::select($sql, ['id' => $id]);
        return view('website.detail', compact("content"));
    }

    public function faq() {
        $content = \App\Contenido::find(431);
        $content = DB::table('contenido')->select('pagina.*', 'contenido.*')
                ->join('pagina', 'pagina.id', '=', 'contenido.idpagina')
                ->where('pagina.id', 431)
                //->where('albums.status',1)
                ->first();
        //return $content->titulo;
        return view('website.faq', compact("content"));
    }

    public function masrevistas() {
        $sql = "select * from galeria where tipo = 3 order by id desc";
        return view('website.masrevistas', ['data' => DB::select($sql)]);
    }

    public function noticias() {
        $datos = \App\Informaciones::where('tipo', '=', 'noticia')->orderBy('id', 'DESC')->paginate(8);
        if (isset($_GET["ajax"]))
            return View::make('website.ntlist', ['datos' => $datos])->render();
        else
            return View::make('website.noticias', ['datos' => $datos])->render();
    }

    public function comunicados() {
        $datos = \App\Informaciones::where('tipo', '=', 'comunicado')->orderBy('id', 'DESC')->paginate(8);
        if (isset($_GET["ajax"]))
            return View::make('website.ntlist', ['datos' => $datos])->render();
        else
            return View::make('website.comunicados', ['datos' => $datos])->render();
    }

    public function casos() {
        $datos = \App\Informaciones::where('tipo', '=', 'casos')->orderBy('id', 'DESC')->paginate(8);
        if (isset($_GET["ajax"]))
            return View::make('website.ntlist', ['datos' => $datos])->render();
        else
            return View::make('website.casos', ['datos' => $datos])->render();
    }

    public function direcciones() {
        $list = \App\Direcciones::orderBy('id', 'ASC')->get();
        //return $content->titulo;
        return view('website.direcciones', compact("list"));
    }

    public function galeria($id = null) {
        if ($id) {
            $model = \App\Galery::find($id);
            $list = \App\Website::getListGalery($id);
            return view('website.gdetalle', compact("model", "list"));
        } else {
            $list = \App\Website::GaleriaView(2);
            return view('website.galeria', compact("list"));
        }
    }

    public function videos($id = null) {
        if ($id) {
            $model = \App\Galery::find($id);
            return view('website.vdetalle', compact("model"));
        } else {
            $list = \App\Website::Videos(1);
            return view('website.videos', compact("list"));
        }
    }

    public function revistas($id) {
        $model = \App\Galery::find($id);

        $list = \App\Website::getListGalery($id);
        //$list=[];
        //print $id;
        return view('website.revistas', compact("model", "list"));
    }

    /* public function show($id)
      {
      return view('user.profile', ['user' => User::findOrFail($id)]);
      } */
}
