<?php
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Agregars extends PublicController {
    public function run() :void
    {
        $viewData = array(
            "edit_enabled"=>true,
            "delete_enabled"=>true,
            "new_enabled"=>true
        );
        $viewData["agregars"] = \Dao\Mnt\Agregars::findAll();
        Renderer::render('mnt/agregars', $viewData);
    }
}
?>