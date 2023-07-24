<?php
 namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Mnt\Cines as DaoCines;

class Visualizar extends PublicController
{
    private $viewData = array();
    public function run():void
    {
        $this->init();
        
        if (!$this->isPostBack()) {
            $this->procesarGet();
        }         
        
        $Cine = DaoCines::obtenerCine($this->viewData['CineEncontrado']);
        
        $this->viewData["Cine"] = array();
        foreach($Cine as $Lb){
            $Lb['Imagen64'] = "data:image/jpg;base64," . base64_encode($Lb['Imagen']);          
            $Lb['Imagen65'] = "data:image/jpg;base64," . base64_encode($Lb['Imagen2']);          
            $this->viewData["Cine"][] = $Lb;
        }
        
        error_log(json_encode($this->viewData));      
        Renderer::render('mnt/visualizar', $this->viewData);
    }    


    private function init()
    {
        $this->viewData = array();        
        $this->viewData['CineEncontrado']= '';                                    
    }


    private function procesarGet()
    {        
        if (isset($_GET["Cine"])) {
            $this->viewData["CineEncontrado"] = intval($_GET["Cine"]);            
        }
    }
}

?>