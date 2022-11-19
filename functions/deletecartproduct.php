<?php
require("../controllers/cart_controller.php");
require ('../settings/core.php');   

$errors = array();

$p_id=$_GET['id'];
$c_id = $_SESSION['userid'];

    if (count($errors) == 0){
        $removecart = removecart_controller($p_id, $c_id);
        if ($removecart){
            header("location: ../view/shopping-cart.php");
        }else{
            array_push($errors, "An Error occured");
        }

    }


?>
