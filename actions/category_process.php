<?php

require('../controllers/product_controller.php');

// check if theres a POST variable with the name 'addcat'
if(isset($_POST['addcat'])){
    // retrieve the name from the form submission
    $name = $_POST['catname'];
   
    // call the add_brand_controller function: return true or false
    $result = add_category_controller($name);

    if($result === true){
        echo '<script> alert("Category Added succesfully!")
        window.location.href="../admin/category.php"
        </script>';
    }
    else{
        echo '<script> alert("Category Failed!")
        window.location.href="../admin/category.php"
        </script>';
    };

    

}



if(isset($_GET['deletecatID'])){

    $id = $_GET['deletecatID'];

    // call the function
    $result = delete_category_controller($id);


    if($result) {
        echo '<script> alert("Category succesfully deleted!")
        window.location.href="../admin/category.php"
        </script>';
    }
    else {
        echo '<script> alert("Category Failed to delete!")
        window.location.href="../admin/category.php"
        </script>';
    }


}


// Update category
if(isset($_POST['updatecat'])){
    // retrieve the name from the form submission
    $name = $_POST['catname'];
    $id = $_POST['catid'];

    // call the update_product_controller function: return true or false
    $result = update_category_controller($id, $name);

    if($result){
        echo '<script> alert("Category updated succesfully!")
        window.location.href="../admin/category.php"
        </script>';
    }
    else {
        echo '<script> alert("Category failed to update!")
        window.location.href="../admin/category.php"
        </script>';
    }

}


?>