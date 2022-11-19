<?php

require('../controllers/cart_controller.php');
session_start();
// initialize a client url which we will use to send the reference to the paystack server for verification
$curl = curl_init();

// set options for the curl session insluding the url, headers, timeout, etc
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$_GET['reference']}",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088",
    "Cache-Control: no-cache",
),
));

// get the response and store
$response = curl_exec($curl);
// if there are any errors
$err = curl_error($curl);
// close the session
curl_close($curl);

// convert the response to PHP object
$decodedResponse = json_decode($response);

// check if the object has a status property and if its equal to 'success' ie. if verification was successful
if(isset($decodedResponse->data->status) && $decodedResponse->data->status === 'success'){
    // get form values
    $email = $_GET['email'];
    $cid=$_SESSION['user_id'];
    $inv_no=mt_rand(1000,10000);
    $ord_date=date("Y/m/d");
    $ord_stat='pending';



    // insert a new order for the logged in customer
    $addorder=addOrder_controller($cid, $inv_no, $ord_date, $ord_stat);
    if($addorder){
        //look for the most recent orderid that has been added to the order table
        $recent=recentOrder_controller();
        
        // call a function that contains info by the customer's order
        $cart=displayCart_controller($cid);
        foreach ($cart as $item ){
            // insert the order deatails in the order details table
           addOrderDetails_controller($recent['recent'],$item['p_id'],$item['qty']); 
        }
        $amount=cartValue_controller($cid);

        // insert payment details
        $addPayment=addPayment_controller($amount['Result'],$cid,$recent['recent'],"GHC",$ord_date);
        if($addPayment){
            // delete all checked out products from cart from table
            $delete=deleteWholeCart_controller($cid);
            if($delete){
                echo "payment verified successfully and insertion complete";
                
            }
        }else{
            echo"payment failed";
        }
    }
    
}else{
    // if verification failed
    echo $response;
}

?>