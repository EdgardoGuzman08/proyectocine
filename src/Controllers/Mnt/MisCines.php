<?php
 namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;
use Dao\Mnt\MisCines as DaoMisCines;

class MisCines extends PrivateController
{
    private $viewData = array();    

    public function run():void
    {                
        $userId = \Utilities\Security::getUserId();

        $MisCines = DaoMisCines::ObtenerMisCines($userId);

        $this->viewData["CargarCines"] = array();
        
        foreach($MisCines as $MisCine){
            $MisCine['Imagen64'] = "data:image/jpg;base64," . base64_encode($MisCine['Imagen']);          
            $this->viewData["CargarCines"][] = $MisCine;
        }        

        $this->viewData["CantidadCines"] = DaoMisCines::CantidadCines($userId);

        error_log(json_encode($this->viewData));
        Renderer::render('mnt/miscines', $this->viewData);
    }
}

?>