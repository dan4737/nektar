<?php
require("../controllers/product_controller.php");
require("../settings/core.php");
$errors = array();

$deletecategoryID=$_GET['deletecategoryID'];

    if (count($errors) == 0){
        $deletecategory = delete_category_controller($deletecategoryID);
        if ($deletecategory){
            header("location: ../admin/categories.php");
        }else{
            array_push($errors, "An Error occured");
        }

    }


?>
