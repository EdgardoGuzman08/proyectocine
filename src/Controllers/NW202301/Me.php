<?php
namespace Controllers\NW202301;
use Controllers\PublicController; //Controlador publico, ya esta dado en el fram
use Views\Renderer; //Plantillero, el que renderiza
use Dao\Clases\Demo;
class Me extends PublicController{ //Clase abstracta, extiende el public controller
    public function run() :void
    {
        $viewData = array();
        $responseDao = Demo::getAResponse()[0][""];
        $viewData["response"] =  $responseDao;
        renderer::render('nw202301/me', $viewData);
    }
}
?>