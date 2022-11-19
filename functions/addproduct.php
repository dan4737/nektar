<?php
require_once("../controllers/product_controller.php");


// check if theres a POST variable with the name 'addbrand'
if(isset($_POST['addproduct'])){
    //get product info inputs
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $pbrand = $_POST['pbrand'];
    $pdesc = $_POST['pdesc'];
    $pkeyword = $_POST['pkeyword'];
    
    //file upload path
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
            $result= add_product_controller($pcat, $pbrand, $pname, $pprice, $pdesc, $targetFilePath, $pkeyword);
        

            if($result){
                header("Location: ../admin/products.php");
            }
            else{
               
               header("Location: ../admin/products.php");
            }
            
            }else{
                echo "failed to move image ";

                }
        
    }
    

}


?>