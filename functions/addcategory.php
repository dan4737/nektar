<?php

require '../controllers/product_controller.php';

// check if theres a POST variable with the name 'addcat'
if (!empty($_POST['type'])) {
    if (isset($_POST['addtype'])) {
        // retrieve the name from the form submission
        $name = $_POST['type'];
        $result = add_category_controller($name);
        // call the add_category_controller function: return true or false
        if ($result) {
            echo '<script> alert("Successfully added a new category")
            window.location.href="Location: ../admin/categories.php"
            </script>';
        } else {
            echo '<script> alert("Failed to add this category")
            window.location.href="Location: ../admin/categories.php"
            </script>';
        }
    } else {
        echo '<script> alert("Category Cannot be empty")
        window.location.href="Location: ../admin/categories.php"
        </script>';
    }
}


?>
