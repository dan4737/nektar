
<?php

require('../controllers/product_controller.php');

// check if theres a POST variable with the name 'addbrand'
if(isset($_POST['addbrand'])){
    // retrieve the name from the form submission
    $name = $_POST['brandname'];
   
    // call the add_brand_controller function: return true or false
    $result = add_brand_controller($name);

    if($result){
        echo '<script> alert("Brand Added succesfully!")
        window.location.href="Location: ../admin/brand.php"
        </script>';
    } 
    else{
        echo '<script> alert("Failed to add brand!")
        window.location.href="Location: ../admin/brand.php"
        </script>';
    } 

    

}


//delete Brand
if(isset($_GET['deleteBrandID'])){
    $id = $_GET['deleteBrandID'];

    // call the function to delete a brand
    $result = delete_brand_controller($id);
    
    if($result){
        echo '<script> alert("Brand deleted succesfully!")
        window.location.href="Location: ../admin/brand.php"
        </script>';
    }
    else {
        echo '<script> alert("Could not deleted brand!")
        window.location.href="Location: ../admin/brand.php"
        </script>';
        }


}


// Update Brand
if(isset($_POST['updatebrand'])){
    // retrieve the name from the form submission
    $name = $_POST['brandname'];
    $id = $_POST['brandid'];

    // call the update_product_controller function: return true or false
    $result = update_brand_controller($id, $name);

    if($result){echo '<script> alert("Brand updated succesfully!")
        window.location.href="../admin/brand.php"
        </script>';}
    else {
        echo '<script> alert("Failed to update brand!")
        window.location.href="../admin/brand.php"
        </script>';
    }

}


?>