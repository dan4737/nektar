<?php
require("../controllers/product_controller.php");
$errors = array();


if(isset($_POST['updatecategory'])){
    $category_id=$_POST['category_id'];
    $category_name = $_POST['category_name'];

    
    if (count($errors) == 0){
        $updatecategory = update_category_controller($category_id,$category_name);
        if ($updatecategory){
            header("location: ../admin/categories.php");
        }else{
            array_push($errors, "An Error occured");
        }

    }

}
?>
