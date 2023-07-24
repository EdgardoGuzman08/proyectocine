<?php

namespace Controllers\Checkout;

use Controllers\PublicController;

class Checkout extends PublicController{
    public function run():void
    {
        $viewData = array();
        if ($this->isPostBack()) {
            $Titulo = $_POST['Titulo'];
            $Autor = $_POST['Autor'];
            $Idioma = $_POST['Idioma'];
            $Genero = $_POST['Genero'];
            $Precio = $_POST['Precio'];
            $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                "test".(time() - 10000000),
                "http://localhost/ProyectoCines/index.php?page=checkout_error",
                "http://localhost/ProyectoCines/index.php?page=checkout_accept"
            );
            $PayPalOrder->addItem($Titulo, $Autor, $Idioma, $Genero, $Precio, 1 , 1);
            $response = $PayPalOrder->createOrder();
            $_SESSION["orderid"] = $response[1]->result->id;
            \Utilities\Site::redirectTo($response[0]->href);
            die();
        }

        \Views\Renderer::render("paypal/checkout", $viewData);
    }
}
?>
