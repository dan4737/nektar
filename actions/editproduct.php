<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

require('../controllers/product_controller.php');

// check if theres a POST variable with the name 'updateproduct"
if(isset($_POST['updateproduct'])){
    // retrieve the name from the form submission
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $pbrand = $_POST['pbrand'];
    $pdesc = $_POST['pdesc'];
    $stock=$_POST['stock'];
    $pkeyword = $_POST['pkeyword'];
    $id=$_POST['id'];
    $productDetails=select_one_product_controller($id);

    // check if a new image is being uploaded
    if(!empty($_FILES['img']['name'])){
        $targetDir="../images/products/";
        $fileName=basename($_FILES['img']['name']);
        $targetFilePath=$targetDir.$fileName;
        $fileType=strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $tempname=$_FILES['img']['tmp_name'];

     
    //Allow certain file formats
 
        if ($fileType == "jpg" || $fileType == "png" || $fileType =="jpeg"){
            $image=$targetFilePath;
            //upload file to server
            $upload=move_uploaded_file($tempname,$targetFilePath);
            
            
            if($upload){
                //insert new image file name into database  and other modified items
                $updateProduct=update_one_product_controller($id,$pcat, $pbrand, $pname,$stock, $pprice, $pdesc, $targetFilePath, $pkeyword);
            

                if($updateProduct) {
                    echo "<script>
                    window.location.href='../admin/products.php';
                    alert('Update Successful');
                    </script>";
                
                }
                
                else {echo "<script>
                window.location.href='../admin/products.php';
                alert('Update Failed');
                </script>";}
        
            }
        }

        
    }
    else{
        // insert old image back to the db and other updates details
        $updateProduct = update_one_product_controller($id, $pcat, $pbrand, $pname, $stock ,$pprice, $pdesc, $productDetails['product_image'], $pkeyword);

        if($updateProduct) {
            echo "<script>
                    window.location.href='../admin/products.php';
                    alert('Update Successful');
                    </script>";
          
        }
        
        else {
            echo "<script>
                    window.location.href='../admin/products.php';
                    alert('Failed');
                    </script>";
        }
    }
} 



//delete peoduct
if(isset($_GET['deleteID'])){

    $id = $_GET['deleteID'];

    // call the function
    $result = delete_one_product_controller($id);
    
    if($result === true){
        header("Location: ../admin/products.php");
    }
    else {echo "deletion failed";
    }


}





?>