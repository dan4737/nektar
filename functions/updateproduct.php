<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

require('../controllers/product_controller.php');

// check if theres a POST variable with the name 'updatebrand"
if(isset($_POST['updateproduct'])){
    // retrieve the name from the form submission
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $pbrand = $_POST['pbrand'];
    $pdesc = $_POST['pdesc'];
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
                //insert image file name into database
                $updateProduct=update_one_product_controller($id,$pcat, $pbrand, $pname, $pprice, $pdesc, $targetFilePath, $pkeyword);
            

                if($updateProduct) {
                    echo "Update Successful";
                    header("location: ../admin/products.php");
                }
                
                else echo "Update Failed";
        
            }
        }

        
    }
    else{
        $updateProduct = update_one_product_controller($id, $pcat, $pbrand, $pname, $pprice, $pdesc, $productDetails['product_image'], $pkeyword);

        if($updateProduct) {
            echo "Update Successful";
            header("location: ../admin/products.php");
        }
        
        else echo "update Failed";
    }
} 

?>