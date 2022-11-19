<?php

require('../controllers/cart_controller.php');
session_start();



    // get form values
    $email = $_GET['email'];
    $cid=$_SESSION['user_id'];
    $inv_no=mt_rand(1000,10000);
    $ord_date=date("Y/m/d");
    $ord_stat='pending';
    $pid=$_GET['pid'];
    $qty=$_GET['qty'];
    $amount=$_GET['amount'];

    // insert a new order for the logged in customer
    $addorder=addOrder_controller($cid, $inv_no, $ord_date, $ord_stat);
    if($addorder){
        //look for the most recent orderid that has been added to the order table
        $recent=recentOrder_controller();
        
        addOrderDetails_controller($recent['recent'],$pid,$qty); 
        

        // insert payment details
        $addPayment=addPayment_controller($amount,$cid,$recent['recent'],"RWF",$ord_date);
        if($addPayment){ 
            echo "payment verified successfully ";
  
        }else{
            echo"payment failed";
        }
    }
    


?>