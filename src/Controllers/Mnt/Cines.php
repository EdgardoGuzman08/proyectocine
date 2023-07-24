<?php

namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;
use Utilities\Validators;
use Dao\Mnt\Cines as DaoCines;

class Cines extends PrivateController
{
    private $viewData = array();
    private $arrModeDesc = array();   

    public function run():void
    {

        $this->init();

        // Cuando es método GET (se llama desde la lista)
        if (!$this->isPostBack()) {
            $this->procesarGet();
        }
        

        error_log(json_encode($this->viewData));

        Renderer::render('mnt/cines', $this->viewData);
    }



    private function init()
    {
        $this->viewData = array();                

        $this->arrModeDesc = array(
            "DSP" => "Detalle de %s %s",            
        );
        
        $this->viewData["Cines"] = DaoCines::getAll();        
    }


    private function procesarGet()
    {
        if (isset($_GET["mode"])) {
            $this->viewData["mode"] = $_GET["mode"];

            if (!isset($this->arrModeDesc[$this->viewData["mode"]])) {
                error_log('Error: (Cines) Mode solicitado no existe.');
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_cines",
                    "No se puede procesar su solicitud!"
                );
            } 
        }

        if (isset($_GET["Busqueda"])) {
            $Cine = $_GET["Busqueda"];
            $this->viewData["Cines"] = DaoCines::buscarCine($Cine);
        }
    }
}




