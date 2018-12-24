<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Website extends Pagina{
    public static function getMenuBase($url=null){
        
        $sql="SELECT m.id, m.idpagina, m.titulo, m.descripcion FROM public.pagina m WHERE idpagina IS NULL";
        $sql="SELECT m.id, m.idpagina, m.titulo, m.descripcion, c.id idp, c.texto FROM public.pagina m LEFT JOIN contenido c ON c.idpagina=m.id WHERE m.idpagina IS NULL ORDER BY m.id";
        $results = DB::select($sql);
        return $results;
    }
    public static function getSubmenu($id){
        $sql="SELECT m.id, m.idpagina, m.titulo, m.descripcion, c.id idp, c.texto FROM public.pagina m LEFT JOIN contenido c ON c.idpagina=m.id WHERE m.idpagina=:id ORDER BY m.id";
        $results = DB::select($sql, ["id"=>$id]);
        return $results;
    }
    public static function getChildHtml($id, $url=null){
        $html='';
        $submenu=self::getSubmenu($id);
        if(count($submenu)>0){
            $display = self::parentMenuId($id, $url);
            $html.="<ul class=\"dropdown_menu\" style=\"display:".$display.";\">\n";
            foreach ($submenu as $key=>$m){
                $sHtml = self::getChildHtml($m->id, $url);
                
                $html.= "<li>\n";
                $html.= "\t\t<a href=\"".($m->texto? '/page/'.$m->descripcion:'#')."\" class=\"".($m->descripcion==$url?'active':'')."\">".$m->titulo." "."</a>\n".(strlen($sHtml)>0?'<i class="fas fa-angle-down"></i>':'')."\n";
                $html.= $sHtml;
                $html.= "</li>\n";
            }
            $html.="</ul>\n";
        }
        return $html;
    }
    public static function getPageMenu($texto){
        /*$sql="SELECT m.id, m.idpagina, m.titulo, m.descripcion, c.id idp, c.texto, c.nombre FROM public.contenido c INNER JOIN public.pagina m ON c.idpagina=m.id WHERE m.titulo=:titulo";
        $content = DB::select($sql, ["titulo"=>$texto])->get();*/
        
        $content = DB::table('contenido')->select('pagina.*', 'contenido.*')
        ->join('pagina', 'pagina.id', '=', 'contenido.idpagina')
        ->where('pagina.descripcion',$texto)
        //->where('albums.status',1)
        ->first();
        return $content;
    }
    
    public static function parentMenuId($id, $url){
        /*$sql="SELECT pagina.* FROM pagina WHERE pagina.descripcion = :url LIMIT 1";
        $results = DB::select($sql, ["url"=>$url])->first();*/
        $result = DB::table('pagina')->select('pagina.*')
        ->where('pagina.descripcion',$url)
        //->where('albums.status',1)
        ->first();
        if($result){
            //print $result->idpagina." ".$id;
            if($result->idpagina==$id)
                return 'block';
        }
        return 'none';
    }
    
    public function getContents($tipo, $limit=4){
        /*$sql2 = "SELECT id, titulo, descripcion, contenido, portal, tipo, fechainicio, fechafinal, sitiowebid FROM public.informaciones WHERE tipo=:tp ORDER BY fechainicio DESC LIMIT 4";
        $noticias = \Illuminate\Support\Facades\DB::select($sql2, ['tp' => 'noticia']);*/
        $sql3 = "SELECT id, titulo, descripcion, contenido, portal, tipo, fechainicio, fechafinal, sitiowebid FROM public.informaciones WHERE tipo=:tp ORDER BY fechainicio DESC LIMIT :limit";
        $casos = DB::select($sql3, ['tp' => $tipo, "limit"=>$limit]);
        return $casos;
    }
    public function getSlide($tipo=2){
        $sql1 = 'SELECT id, tipo, nombre, texto, slide FROM public.multimedia WHERE slide=:tipo';
        $slides = DB::select($sql1, ['tipo' => $tipo]);
        return $slides;
    }
    
    public function getDisplayMenu($url){
        $html='';
        $submenu=self::getSubmenu($id);
        if(count($submenu)>0){
            $display = self::parentMenuId($id, $url);
            $html.="<ul class=\"dropdown_menu\" style=\"display:".$display.";\">\n";
            foreach ($submenu as $key=>$m){
                $sHtml = self::getChildHtml($m->id, $url);
                
                $html.= "<li>\n";
                $html.= "\t\t<a href=\"".($m->texto? '/page/'.$m->descripcion:'#')."\" class=\"".($m->descripcion==$url?'active':'')."\">".$m->titulo." "."</a>\n".(strlen($sHtml)>0?'<i class="fas fa-angle-down"></i>':'')."\n";
                $html.= $sHtml;
                $html.= "</li>\n";
            }
            $html.="</ul>\n";
        }
        return $html;
    }
    public static function getSubmenuUrl($url){
        /*$sql="SELECT m.id, m.idpagina, m.titulo, m.descripcion, c.id idp, c.texto FROM public.pagina m LEFT JOIN contenido c ON c.idpagina=m.id WHERE m.idpagina=:id ORDER BY m.id";
        $results = DB::select($sql, ["id"=>$id]);
        return $results;*/
        
        $sql="SELECT idpagina FROM public.pagina m WHERE m.id=359";
        $result = DB::table('pagina')->select('pagina.*')->where('pagina.descripcion',$url) ->first();
        if($result){
            $onoff=true;
            $list=[];
            $count=0;
            $pgid=$result->id;
            //print $pgid." ";
            while($onoff){
                $count++;
                $pmenu = DB::table('pagina')->select('*')->where('pagina.id',$pgid) ->first();
                print $pgid." ";
                if(isset($pmenu) && $pmenu->idpagina){
                    print "+++-> ";
                    array_push($list, $pmenu->idpagina);
                    $pgid=$pmenu->id;
                }
                else{
                    $onoff=false;
                    $pgid=null;
                }
                if($count>10)
                    $onoff=false;
                $pmenu=null;
            }
            print_r($list);
        }
    }
}