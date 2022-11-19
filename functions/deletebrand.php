<?php
require("../controllers/product_controller.php");
require("../settings/core.php");
$errors = array();

$deletebrandID=$_GET['deletebrandID'];

    if (count($errors) == 0){
        $deletebrand = delete_brand_controller($deletebrandID);
        if ($deletebrand){
            header("location: ../admin/brand.php");
        }else{
            array_push($errors, "An Error occured");
        }

    }


?>
