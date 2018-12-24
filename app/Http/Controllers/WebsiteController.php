<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class WebsiteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function __invoke(Request $request)
    {
        //
    }*/
    
    public function index($p1=null){
        $page = \App\Website::getPageMenu($p1);
        //print_r($page);
        return view('website.content', compact("page"));
    }
    
    public function detail($id){
        $content = \App\Informaciones::find($id);
        //return $content->titulo;
        return view('website.detail', compact("content"));
    }
    
    public function faq(){
        $content = \App\Informaciones::find(43);
        //return $content->titulo;
        return view('website.faq', compact("content"));
    }
    
    public function noticias(){
        $datos = \App\Informaciones::where('tipo', '=', 'noticia')->paginate(8);
        if(isset($_GET["ajax"]))
            return View::make('website.ntlist',['datos' => $datos])->render();
        else
            return View::make('website.noticias',['datos' => $datos])->render();
    }
    
    public function comunicados(){
        $datos = \App\Informaciones::where('tipo', '=', 'comunicado')->paginate(8);
        if(isset($_GET["ajax"]))
            return View::make('website.ntlist',['datos' => $datos])->render();
            else
                return View::make('website.comunicados',['datos' => $datos])->render();
    }
    
    public function casos(){
        $datos = \App\Informaciones::where('tipo', '=', 'casos')->paginate(8);
        if(isset($_GET["ajax"]))
            return View::make('website.ntlist',['datos' => $datos])->render();
            else
                return View::make('website.casos',['datos' => $datos])->render();
    }
    /*public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }*/
    
    
}
