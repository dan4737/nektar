<?php

require('../classes/customer_class.php');

function add_customer_controller($name, $email, $pass,$contact,$role){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->add_customer($name, $email, $pass,$contact,$role);

}

function delete_customer_controller($id){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->delete_one_customer($id);

}

function update_customer_controller($id,$name, $email, $password,$country,$city,$contact,$image,$role){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->update_one_customer($id,$name, $email, $password,$country,$city,$contact,$image,$role);

}

function select_all_customers_controller(){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->select_all_customers();

}

function select_one_customer_controller($email){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->select_one_customer($email);

}
function select_customer_controller($id){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->select_customer($id);

}




?>