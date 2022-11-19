<?php

require('../controllers/customer_controller.php');

// check if theres a POST variable with the name 'register'
if(isset($_POST['register'])){
    // retrieve the deatils of the customer
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact=$_POST['contact'];
    $pass=password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $cpass=password_hash($_POST["cpass"], PASSWORD_DEFAULT);
    $role=1;

   // $result=$mysqli->select_all_customers_controller();

  

   if ($_POST['pass']===$_POST['cpass']){
        $result=add_customer_controller($name, $email, $pass,$contact,$role);
    
        if($result===true){
            echo"<script>alert('User Registration Completed!')</script>";
            header("Location:login.php");
        }
        else{
            echo "<script>alert('Oops! ')</script>";
        }
} 
}
?>