<?php

require_once('../controllers/cart_controller.php');

session_start();

//check if user logged in 
if (!isset($_SESSION['user_id'])){
    
    if(isset($_POST['order'])){
        $_SESSION['qty']=$_POST['qty'];
        $_SESSION['desc']=$_POST['desc'];
        header("location: ../login/login.php");
    }
}

// check if theres a POST variable with the name 'order'
if(isset($_POST['order'])){

    $cid=$_SESSION['user_id'];
    $pid=$_GET['pid'];
    $email=$_SESSION['user-email'];
    $inv_no=mt_rand(1000,10000);
    $ord_date=date("Y/m/d");
    $ord_stat='unconfirmed';
    $desc=$_POST['desc'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $existingimage=$_POST['image'];
    
    if($_FILES['file']['name']==""){
        $order= addCustomization_controller($cid,$pid,$qty, $inv_no, $ord_date, $ord_stat, $existingimage, $desc,$price);
        if($order){
            echo '<script type="text/javascript"> 
            alert("You have placed your customized order succesfully!");
            window.location.href="../views/personalized_cart.php";
            </script>';
        }
        else{
            echo '<script type="text/javascript"> 
            alert("Something went wrong could not place your order!");
            window.location.href="../views/single_product.php?id=$pid";
            </script>';
        }
    }
    else{
    //file upload path 
    $targetDir="../customized_orders/";
    $fileName=basename($_FILES['file']['name']);
    $targetFilePath=$targetDir.$fileName;
    $fileType=strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $tempname=$_FILES['file']['tmp_name'];


    // upload image inserted by the user
    $upload=move_uploaded_file($tempname,$targetFilePath);

    if($upload){
        // adding order to the customized order table
        $order= addCustomization_controller($cid,$pid,$qty, $inv_no, $ord_date, $ord_stat, $targetFilePath, $desc,$price);
        if($order){
            echo '<script> alert("You have placed your customized order succesfully!")
            window.location.href="../views/personalized_cart.php"
            </script>';
        }
        else{
            echo '<script> alert("Something went wrong could not place your order!")
            window.location.href="../views/single_product.php?id=$pid"
            </script>';
        }
    }
}
    
    

    
}

?>