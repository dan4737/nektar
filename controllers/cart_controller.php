<?php
//connect to database class
require_once("../classes/cart_class.php");

     
    // method to get the IP adress of the client
    function getRealIpAddr(){
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
        $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

   //method to insert into the cart
    function insertProductIntoCart_controller($pid, $ipadd, $cid, $qty){
        $cart= new cart();
        //run the query
        return $cart->insertProductIntoCart($pid, $ipadd, $cid,$qty);
    }

    //for customers who haven't logged in.
    function insertProductIntoCartNull_controller($pid, $ipadd, $qty){
        $cart= new cart();
        //run the query
        return $cart->insertProductIntoCartNull($pid, $ipadd, $qty);
    }

    //check for duplicate
    //logged in customers
    function checkDuplicate_controller($pid, $cid){
        $cart= new cart();
        return $cart->checkDuplicate($pid, $cid);
    }

    //not logged in customers
    function checkDuplicateNull_controller($pid, $ipadd){
        $cart= new cart();
        return $cart->checkDuplicateNull($pid, $ipadd);
    }
    
    //display cart
    //logged in customers
    function displayCart_controller($cid){
        $cart = new cart();
        //run the query
        return $cart->displayCart($cid);
    }

    //not logged in customers
    function displayCartNull_controller($ipadd){
        $cart = new cart();
        //run the query
        return $cart->displayCartNull($ipadd);
    }


    //update cart
    //logged in customers
    function updateCart_controller($cid, $pid, $qty){
        $cart= new cart();
        //run the query
        return $cart->updateCart($cid, $pid, $qty);
    }

    //not logged in customers
    function updateCartNull_controller($ipadd, $pid, $qty){
        $cart= new cart();
        //run the query
        return $cart->updateCartNull($ipadd, $pid, $qty);
    }

    //delete from cart
    //logged in customers
    function deleteCart_controller($cid,$pid){
        $cart= new cart();
        //run the query
        return $cart->deleteCart($cid,$pid);
    }

    //not logged in customers
    function deleteCartNull_controller($ipadd, $pid){
        $cart= new cart();

        //run the query
        return $cart->deleteCartNull($ipadd, $pid);
    }

    //get cart total
    //logged in customers
    function cartValue_controller($cid){
        $cart= new cart();
        return $cart->cartValue($cid);
    }

    //not logged in customers
    function cartValueNull_controller($ipadd){
        $cart= new cart();
        return $cart->cartValueNull($ipadd);
    }
     //function to add to customized orders
     function addCustomization_controller($cid,$pid,$qty, $inv_no, $ord_date, $ord_stat, $file, $desc,$amount){
        $cart=new cart();
        return $cart->addCustomization($cid,$pid,$qty, $inv_no, $ord_date, $ord_stat, $file, $desc,$amount);
    }

    //function to update customized order status
    function updateOrderstatus_controller($ord_id,$ord_stat,$amount){
        $cart=new cart();
        return $cart->updateOrderstatus($ord_id,$ord_stat,$amount);
    }
    
     //function to select to customized orders
    function select_customized_orders_controller(){
        $cart=new cart();
        return $cart->select_customized_orders();
    }

     //function to select one customized order by its order id
    function select_one_customized_order_controller($id){
        $cart=new cart();
        return $cart->select_one_customized_order($id);
    }
     //function to select customized order of a customer given its status
     function customized_orders_controller($cid){
        $cart=new cart();
        return $cart->customized_orders($cid);
    }
   
    //function to add to orders
    function addOrder_controller($cid, $inv_no, $ord_date, $ord_stat){
        $cart=new cart();
        return $cart->addOrder($cid, $inv_no, $ord_date, $ord_stat);
    }

    //function to add to order details
    function addOrderDetails_controller($ord_id, $prod_id, $qty){
        $cart= new cart();
        return $cart->addOrderDetails($ord_id, $prod_id, $qty);
    }

    function addPayment_controller($amt, $cid, $ord_id, $currency, $pay_date){
        $cart= new cart();
        return $cart->addPayment($amt, $cid, $ord_id, $currency, $pay_date);
    }
    //select all payments
    function select_payments_controller(){
        $cart= new cart();
        return $cart->select_payments();
    }

    function recentOrder_controller(){
        $cart = new cart();
        return $cart->recentOrder();
    }
    function deleteWholeCart_controller($cid){
        $cart = new cart();
        return $cart->deleteWholeCart($cid);
    }

    function getOrder_controller($ord_id){
        $cart = new cart();
        return $cart->getOrder($ord_id);
    }
    //function to get all orders in the database
    function orders_controller(){
        $cart= new cart();
        return $cart->orders();
    }

    function getOrderDetails_controller($ord_id){
        $cart= new cart();
        return $cart->getOrderDetails($ord_id);
    }


?>