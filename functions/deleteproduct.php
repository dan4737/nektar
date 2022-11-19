<?php
require("../controllers/product_controller.php");
require("../settings/core.php");
$errors = array();

$deleteproductID=$_GET['deleteproductID'];

    if (count($errors) == 0){
        $deleteproduct = delete_one_product_controller($deleteproductID);
        if ($deleteproduct){
            header("location: ../admin/products.php");
        }else{
            array_push($errors, "An Error occured");
        }

    }


?>
