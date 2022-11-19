<?php
session_start();
require_once("../controllers/cart_controller.php");
$pid = $_POST['pid'];
$qty = $_POST['qty'];
$ipadd = $_POST['ipadd'];
$cid = $_POST['cid'];

//check if user is loggedn in
if (isset($_SESSION['user_id'])){
    $cid = $_SESSION['user_id'];
    // call function that updates the cart for a logged in user
    $updateCart = updateCart_controller($cid, $pid, $qty);

}else{
    //call function that updates the cart for user who is not logged in
    $ipadd = getRealIpAddr();
    $updateCart = updateCartNull_controller($ipadd, $pid, $qty);

}
?>
