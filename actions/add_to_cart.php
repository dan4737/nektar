<?php
require("../controllers/cart_controller.php");

    //grab get data from links
    $pid = $_GET['pid'];
    $ipadd = $_GET['ipadd'];
    $cid = $_GET['cid'];
    $qty = $_GET['qty'];
  
    
    //check for log in
    if (empty($cid)){
        //check for duplicates

        $isDuplicate = checkDuplicateNull_controller($pid, $ipadd);
       
        //check if user has already added a product to the cart
        if (!empty($isDuplicate)){
            //qty is increased by one if a product was clicked and was already in the cart
            $quantity=$isDuplicate['qty']+1;
            updateCartNull_controller($ipadd, $pid, $quantity);
            
            echo "<script>
            alert('Product added to cart Successfully');
            window.location.href = '../views/shop.php';
            </script>";
            
        }
        else{
            
            // add to cart  for a user who is not logged in
            $insertIntoCart = insertProductIntoCartNull_controller($pid,$ipadd,$qty);
            
            if ($insertIntoCart){
                echo "<script>
                window.location.href='../views/shop.php';
                alert('Product Added to cart succesfully');
                </script>";
            }else{
                echo "<script>
                window.location.href='../views/shop.php';
                alert('Product could not be added to cart');
                </script>";
            }
        }
    }else{
       //check if user has already added a product to the cart
        $isDuplicate = checkDuplicate_controller($pid, $cid);
        if ($isDuplicate){

            $quantity=$isDuplicate['qty']+1;
            updateCart_controller($cid, $pid, $quantity);
            
            echo "<script>
            alert('Product added to cart Successfully');
            window.location.href = '../views/shop.php';
            </script>";
        }else{
            // add product to the cart
            $insertIntoCart = insertProductIntoCart_controller($pid, $ipadd, $cid, $qty);

            if ($insertIntoCart){
                echo "<script>
                window.location.href='../views/shop.php';
                alert('Product Added to cart succesfully');
                </script>";
            }else{
                echo "<script>
                window.location.href='../views/shop.php';
                alert('Product could not be added to cart');
                </script>";
            }
         }
          
    }
   

?>