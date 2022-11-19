<?php
require('../settings/core.php');
require('../controllers/customer_controller.php');

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password =$_POST['pass'];
    
    //select a customer with the given email
	$result = select_one_customer_controller($email);
    
	if (empty($result)) {
		$_SESSION['error'] = "Email Does not Exist!";
        $error_msg=$_SESSION['error'];
        echo ("<script>alert('$error_msg'); window.location.href = 'login.php';</script>");
		
	} else {
        if (password_verify($password, $result['customer_pass'])){
            $_SESSION['user_id'] = $result['customer_id'];
            $_SESSION['user-email']=$email;
            $_SESSION['user_role'] = $result['user_role'];
            if($_SESSION['user_role']==0){
                header("Location: ../admin/products.php");
            }
            else{
                if(!isset($_SESSION['current_page'])){
                    header("Location: ../index.php");
                }
                else{
                    header("Location: ". $_SESSION['current_page']);
                }
                
            }
            
        }
        else{
            $_SESSION['error'] = 'Incorrect password!';
            $message = $_SESSION['error'];
            echo "<script>alert('$message');window.location.href = 'login.php';</script>";
        }

	}
}

else{
    $_SESSION['error'] = 'Input your credentials first';
    check_error();
}

?>