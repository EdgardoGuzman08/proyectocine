<?php
namespace Controllers\Mnt;

use Controllers\PublicController;
use Exception;
use Views\Renderer;

class Agregar extends PublicController{
    private $redirectTo = "index.php?page=Mnt-Agregars";
    private $viewData = array(
        "mode" => "DSP",
        "modedsc" => "",
        "ID" => 0,
        "Titulo" => "",
        "Contenido" => "",
        "Fecha" => "",
        "Autor" => "",
        "Imagen" => "",
        "Genero" => "",
        "Idioma" => "",
        "Precio" => "",
        "Popularidad" => "",
        "Imagen2" => "",
        "PublicidadEspecial" => "NOACT",
        "PublicidadEspecial_NOACT" => "selected",
        "PublicidadEspecial_ACT" => "",
        "Titulo_error"=> "",
        "general_errors"=> array(),
        "has_errors" =>false,
        "show_action" => true,
        "readonly" => false,
    );
    private $modes = array(
        "DSP" => "Detalle de %s (%s)",
        "INS" => "Nueva Pelicula",
        "UPD" => "Editar %s (%s)",
        "DEL" => "Borrar %s (%s)"
    );
    public function run() :void
    {
        try {
            $this->page_loaded();
            if($this->isPostBack()){
                $this->validatePostData();
                if(!$this->viewData["has_errors"]){
                    $this->executeAction();
                }
            }
            $this->render();
        } catch (Exception $error) {
            error_log(sprintf("Controller/Mnt/Agregar ERROR: %s", $error->getMessage()));
            \Utilities\Site::redirectToWithMsg(
                $this->redirectTo,
                "Algo Inesperado Sucedió. Intente de Nuevo."
            );
        }
    }
    private function page_loaded()
    {
        if(isset($_GET['mode'])){
            if(isset($this->modes[$_GET['mode']])){
                $this->viewData["mode"] = $_GET['mode'];
            } else {
                throw new Exception("Mode Not available");
            }
        } else {
            throw new Exception("Mode not defined on Query Params");
        }
        if($this->viewData["mode"] !== "INS") {
            if(isset($_GET['ID'])){
                $this->viewData["ID"] = intval($_GET["ID"]);
            } else {
                throw new Exception("Id not found on Query Params");
            }
        }
    }
    private function validatePostData(){
        if(isset($_POST["Titulo"])){
            if(\Utilities\Validators::IsEmpty($_POST["Titulo"])){
                $this->viewData["has_errors"] = true;
                $this->viewData["Titulo_error"] = "El Titulo no puede ir vacío!";
            }
        } else {
            throw new Exception("Titulo not present in form");
        }
        if(isset($_POST["PublicidadEspecial"])){
            if (!in_array( $_POST["PublicidadEspecial"], array("ACT","NOACT"))){
                throw new Exception("PublicidadEspecial incorrect value");
            }
        }else {
            if($this->viewData["mode"]!=="DEL") {
                throw new Exception("PublicidadEspecial not present in form");
            }
        }
        if(isset($_POST["mode"])){
            if(!key_exists($_POST["mode"], $this->modes)){
                throw new Exception("mode has a bad value");
            }
            if($this->viewData["mode"]!== $_POST["mode"]){
                throw new Exception("mode value is different from query");
            }
        }else {
            throw new Exception("mode not present in form");
        }
        if(isset($_POST["ID"])){
            if(($this->viewData["mode"] !== "INS" && intval($_POST["ID"])<=0)){
                throw new Exception("ID is not Valid");
            }
            if($this->viewData["ID"]!== intval($_POST["ID"])){
                throw new Exception("ID value is different from query");
            }
        }else {
            throw new Exception("ID not present in form");
        }

        $this->viewData["Titulo"] = $_POST["Titulo"];
        $this->viewData["Contenido"] = $_POST["Contenido"];
        $this->viewData["Fecha"] = $_POST["Fecha"];
        $this->viewData["Imagen"] = $_POST["Imagen"];
        $this->viewData["Genero"] = $_POST["Genero"];
        $this->viewData["Idioma"] = $_POST["Idioma"];
        $this->viewData["Precio"] = $_POST["Precio"];
        $this->viewData["Popularidad"] = $_POST["Popularidad"];
        if($this->viewData["mode"]!=="DEL"){
            $this->viewData["PublicidadEspecial"] = $_POST["PublicidadEspecial"];
        }
        $this->viewData["Imagen2"] = $_POST["Imagen2"];
    }
    private function executeAction(){
        switch($this->viewData["mode"]){
            case "INS":
                $inserted = \Dao\Mnt\Agregars::insert(
                    $this->viewData["Titulo"],
                    $this->viewData["Contenido"],
                    $this->viewData["Fecha"],
                    $this->viewData["Autor"],
                    $this->viewData["Imagen"],
                    $this->viewData["Genero"],
                    $this->viewData["Idioma"],
                    $this->viewData["Precio"],
                    $this->viewData["Popularidad"],
                    $this->viewData["PublicidadEspecial"],
                    $this->viewData["Imagen2"]
                );
                if($inserted > 0){
                    \Utilities\Site::redirectToWithMsg(
                        $this->redirectTo,
                        "Pelicula Creada Exitosamente"
                    );
                }
                break;
            case "UPD":
                $updated = \Dao\Mnt\Agregars::update(
                    $this->viewData["Titulo"],
                    $this->viewData["Contenido"],
                    $this->viewData["Fecha"],
                    $this->viewData["Autor"],
                    $this->viewData["Imagen"],
                    $this->viewData["Genero"],
                    $this->viewData["Idioma"],
                    $this->viewData["Precio"],
                    $this->viewData["Popularidad"],
                    $this->viewData["PublicidadEspecial"],
                    $this->viewData["Imagen2"],
                    $this->viewData["ID"]
                );
                if($updated > 0){
                    \Utilities\Site::redirectToWithMsg(
                        $this->redirectTo,
                        "Pelicula Actualizada Exitosamente"
                    );
                }
                break;
            case "DEL":
                $deleted = \Dao\Mnt\Agregars::delete(
                    $this->viewData["ID"]
                );
                if($deleted > 0){
                    \Utilities\Site::redirectToWithMsg(
                        $this->redirectTo,
                        "Pelicula Eliminada Exitosamente"
                    );
                }
                break;
        }
    }
    private function render(){
        if($this->viewData["mode"] === "INS") {
            $this->viewData["modedsc"] = $this->modes["INS"];
        } else {
            $tmpCine = \Dao\Mnt\Agregars::findById($this->viewData["ID"]);
            if(!$tmpCine){
                throw new Exception("Pelicula no existe en DB");
            }
            \Utilities\ArrUtils::mergeFullArrayTo($tmpCine, $this->viewData);
            $this->viewData["PublicidadEspecial_ACT"] = $this->viewData["PublicidadEspecial"] === "ACT" ? "selected": "";
            $this->viewData["PublicidadEspecial_NOACT"] = $this->viewData["PublicidadEspecial_ACT"] === "NOACT" ? "selected": "";
            $this->viewData["modedsc"] = sprintf(
                $this->modes[$this->viewData["mode"]],
                $this->viewData["Titulo"],
                    $this->viewData["Contenido"],
                    $this->viewData["Fecha"],
                    $this->viewData["Autor"],
                    $this->viewData["Imagen"],
                    $this->viewData["Genero"],
                    $this->viewData["Idioma"],
                    $this->viewData["Precio"],
                    $this->viewData["Popularidad"],
                    $this->viewData["Imagen2"],
                    $this->viewData["ID"]
            );
            if(in_array($this->viewData["mode"], array("DSP","DEL"))){
                $this->viewData["readonly"] = "readonly";
            }
            if($this->viewData["mode"] === "DSP") {
                $this->viewData["show_action"] = false;
            }
        }
        Renderer::render("mnt/agregar", $this->viewData);
    }
}
?>