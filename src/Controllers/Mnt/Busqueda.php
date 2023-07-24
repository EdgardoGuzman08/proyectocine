<?php
 namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Mnt\Cines as DaoCines;
class Busqueda extends PublicController
{
    private $viewData = array();
    public function run():void
    {
        $this->init();
        
        if (!$this->isPostBack()) {
            $this->procesarGet();
        }         
        
        $CinesEncontrados = DaoCines::buscarCine($this->viewData["Busqueda"]);        
        
        $this->viewData['CinesEncontrados'] = array();
        foreach($CinesEncontrados as $Cines){
            $Cines['Imagen64'] = "data:image/jpg;base64," . base64_encode($Cines['Imagen']);
            $this->viewData["CinesEncontrados"][] = $Cines;
        }
        $this->processView();
        error_log(json_encode($this->viewData));      
        Renderer::render('mnt/busqueda', $this->viewData);
    }    


    private function init()
    {
        $this->viewData = array();
        $this->viewData["mode"] = "";                        
        //Datos del libro
        $this->viewData["Titulo"] = "";
        $this->viewData["Busqueda"] = '';

        $this->arrModeDesc = array(
            "DSP" => "Detalle de %s %s",
            "ALL" => "Todos Los Cines",
        );
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
            $this->viewData["Busqueda"] = $_GET["Busqueda"];            
        }
    }

    private function processView()
    {        
            if ($this->viewData["mode"] === "DSP") {
                $this->viewData["readonly"] = true;
                $this->viewData["showBtn"] = false;                
                $this->viewData["Titulo"] = "Resultados";
            }

            if ($this->viewData["mode"] === "ALL") {
                $this->viewData["Titulo"] = "Todos Los Cines";
            }
     
        $this->viewData["crsf_token"] = md5(getdate()[0] . $this->name);
        $_SESSION[$this->name . "crsf_token"] = $this->viewData["crsf_token"];
    }

}
