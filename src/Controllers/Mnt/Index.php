<?php
 namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Mnt\Cines as DaoCines;

class Index extends PublicController
{
  private $viewData = array();  

    public function run():void
    {                    
        error_log(json_encode($this->viewData));   
        
        $CinesPopulares = DaoCines::CinesPopulares();
        $this->viewData["CinesPopulares"] = array();
        
        foreach($CinesPopulares as $cinespop){
          $cinespop['Imagen64'] = "data:image/jpg;base64," . base64_encode($cinespop['Imagen']);          
          $this->viewData["CinesPopulares"][] = $cinespop;
        }

        $CinesPublicidad = DaoCines::CinesPublicidad();
        $this->viewData["CinesPublicidad"] = array();
        foreach($CinesPublicidad as $cinespup){
          $cinespup['Imagen64'] = "data:image/jpg;base64," . base64_encode($cinespup['Imagen2']);
          $this->viewData["CinesPublicidad"][] = $cinespup;
        }

        $CinesPublicidad2 = DaoCines::CinesPublicidad2();
        $this->viewData["CinesPublicidad2"] = array();
        foreach($CinesPublicidad2 as $cinespup2){
          $cinespup2['Imagen64'] = "data:image/jpg;base64," . base64_encode($cinespup2['Imagen2']);
          $this->viewData["CinesPublicidad2"][] = $cinespup2;
        }

        $CinesRecientes = DaoCines::CinesRecientes();
        $this->viewData["CinesRecientes"] = array();        
        foreach($CinesRecientes as $cines){
          $cines['Imagen64'] = "data:image/jpg;base64," . base64_encode($cines['Imagen']);
          $this->viewData["CinesRecientes"][] = $cines;
        }

        $Mangas = DaoCines::Mangas();
        $this->viewData["CinesMangas"] = array();
        foreach($Mangas as $CinesMangas){
          $CinesMangas['Imagen64'] = "data:image/jpg;base64," . base64_encode($CinesMangas['Imagen2']);
          $this->viewData["CinesMangas"][] = $CinesMangas;
        }

        $Mangas2 = DaoCines::Mangas2();
        $this->viewData["CinesMangas2"] = array();
        foreach($Mangas2 as $CinesMangas2){
          $CinesMangas2['Imagen64'] = "data:image/jpg;base64," . base64_encode($CinesMangas2['Imagen2']);
          $this->viewData["CinesMangas2"][] = $CinesMangas2;
        }


        $GenerosLit = DaoCines::ObtenerGenerosSeccion('Comic');
        $this->viewData["GenerosLiterarios"] = array();
        foreach($GenerosLit as $Generos){
          $Generos['Imagen64'] = "data:image/jpg;base64," . base64_encode($Generos['Imagen']);
          $this->viewData["GenerosLiterarios"][] = $Generos;
        }                

        Renderer::render('mnt/index', $this->viewData);
    }
}
