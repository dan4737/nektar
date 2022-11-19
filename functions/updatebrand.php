<?php
require("../controllers/product_controller.php");
$errors = array();


if(isset($_POST['updatebrand'])){
    $brand_id=$_POST['brand_id'];
    $brand_name = $_POST['brand_name'];

    
    if (count($errors) == 0){
        $updatebrand = update_brand_controller($brand_id,$brand_name);
        if ($updatebrand){
            header("location: ../admin/brand.php");
        }else{
            array_push($errors, "An Error occured");
        }

    }

}
?>
