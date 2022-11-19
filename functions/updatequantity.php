<?php
require("../controllers/cart_controller.php");


ob_start();
  session_start(); 
  if (!isset($_SESSION['useremail'])) {
      $_SESSION['msg'] = "You must log in first";
  	  header('location: ../login/login.php');
  }


if(isset($_POST['manageQuantity'])){

    $p_id = $_POST['p_id'];
    $c_id = $_SESSION['userid'];
    $qty = $_POST['qty'];

    
    $if_found = select_one_cart_item_controller($c_id, $p_id);


    if ($if_found){
       
        $new_qty =  $qty;
        $newquantity = updateproductquantity_controller($p_id, $c_id, $new_qty);
            
        if($newquantity){
        echo "sucess";
        header("Location:../view/shopping-cart.php");

        }else{
        echo "failed";
        }

    }

}