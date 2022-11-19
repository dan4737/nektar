<?php

require('../classes/product_class.php');



function add_category_controller($cat_name){
    // create an instance of the product class
    $product_instance = new Product();
    //call method from product class
    return $product_instance->add_category($cat_name);
}
function update_category_controller($id, $name){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->update_category($id, $name);
}

function displaycategories_controller(){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->displaycategories();     
}
function select_one_category_controller($id){
    // create an instance of the product class
    $product_instance = new Product();
    
    return $product_instance->select_one_category($id);
}
function delete_category_controller($id){
    $product_instance=new Product();
    // return true or false
    return $product_instance->delete_category($id);
}

function add_product_controller($cat, $brand, $title,$price,$desc,$image,$keywords){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->add_product($cat, $brand, $title,$price,$desc,$image,$keywords);
}


function delete_one_product_controller($id){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->delete_one_product($id);
}

function update_one_product_controller($id, $cat, $brand, $title,$price,$desc,$image,$keywords){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->update_one_product($id, $cat, $brand, $title,$price,$desc,$image,$keywords);
}
function select_all_products_controller(){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->select_all_products();
}


function select_one_product_controller($id){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->select_one_product($id);
}
// selecting a product by its brand
function select_by_category_controller($cat){
    $product_instance = new Product();
    return $product_instance->select_by_category($cat);
}

function  add_brand_controller($name){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->add_brand($name);
}

function update_brand_controller($id, $name){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->update_brand($id, $name);
}
function displayBrands_controller(){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->displayBrands();      
}
function select_one_brand_controller($id){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->select_one_brand($id);
}
function delete_brand_controller($id){
    // create an instance of the product class
    $product_instance = new Product();
    return $product_instance->delete_brand($id);
}
function search_controller($name){
    $product_instance=new Product();

    return $product_instance->search($name);
}
	
function countproducts_controller(){
    $product = new Product();
    $countproducts = $product->countproducts();
    if($countproducts){
        return $countproducts;
    }else{
        return false;
    }  
}

function countbrands_controller(){
    $brand = new Product();
    $countbrands = $brand->countbrands();
    if($countbrands){
        return $countbrands;
    }else{
        return false;
    }  
}

function countcategories_controller(){
    $category = new Product();
    $countcategories = $category->countcategories();
    if($countcategories){
        return $countcategories;
    }else{
        return false;
    }  
}

function countorders_controller(){
    $cart = new Product();
    $countorders = $cart->countorders();
    if ($countorders){
        return $countorders;
    }else{
        return false;
    }
}

function displayorders_controller(){
    $cart = new Product();
    $order = $cart->displayorders();
    if ($order){
        return $order;
    }else{
        return false;
    }
}


?>