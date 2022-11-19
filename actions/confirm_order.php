<?php
require("../controllers/cart_controller.php");


    $qty = $_POST['qty'];
    $price=$_POST['price'];
    $amount=$price*$qty;
    $order_stat="confirmed";
    $ord_id=$_POST['order_id'];

    $update = updateOrderstatus_controller($ord_id,$order_stat,$amount);
    

    if ($update){
        echo '<script> alert("Order COnfirmed Succesfully")
        window.location.href="../admin/customizedorders.php"
        </script>';
    }else{
        echo '<script> alert("Failed to confirm order!")
        window.location.href="../admin/customizedorders.php"
        </script>';
    }


?>