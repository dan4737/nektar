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
    $pay_date=date("Y/m/d");
    $ord_stat='pending';
    $order_id=$_GET['order_id'];
    $amount=$_GET['amount'];

    // insert payment details
    $addPayment=addPayment_controller($amount,$cid,$order_id,"RWF",$pay_date);
   
    if($addPayment){
         // updated the order status of the customized order
        $update=updateOrderstatus_controller($ord_id,$order_stat,$amount);
            if($update){
                echo "Payment verified successfully";
                // take client to payment sucessful page
                
            }
        
    }
    else{
        // take client to payment unsuccesful page
        echo"Payment failed";
    }
    
}else{
    // if verification failed
    echo $response;
}

?>