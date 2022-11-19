<?php

require('../settings/connection.php');

// inherit the methods from Connection
class Product extends Connection{
	//adding a product
	function add_category($cat_name){
		// return true or false
		return $this->query("insert into categories (cat_name) values('$cat_name')");
	}
	function update_category($id, $name){
		// return true or false
		return $this->query("update categories set cat_name='$name'  where cat_id = '$id'");
	}

	function displaycategories(){
        return $this->fetch(" select * FROM categories");      
    }
	function select_one_category($id){
		// return associative array or false
		return $this->fetchOne("select * from categories where cat_id='$id'");
	}
	function delete_category($id){
		// return true or false
		return $this->query("delete from categories where cat_id = '$id'");
	}


	function add_product($cat, $brand, $title,$price,$desc,$image,$keywords){
		// return true or false
		return $this->query("insert into products(product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) 
        values('$cat', '$brand', '$title','$price','$desc', '$image', '$keywords')");
	}
    
	function delete_one_product($id){
		// return true or false
		return $this->query("delete from products where product_id = '$id'");
	}

	function update_one_product($id, $cat, $brand, $title,$price,$desc,$image,$keywords){
		// return true or false
		return $this->query("update products set product_cat='$cat', product_brand='$brand', product_title='$title' ,product_price='$price', product_desc='$desc', 
        product_image='$image', product_keywords='$keywords' where product_id = '$id'");
	}
    function select_all_products(){
		// return array or false
		return $this->fetch("select * from products");
	}
	
	function select_one_product($id){
		// return associative array or false
		return $this->fetchOne("select * from products where product_id='$id'");
	}
	// selecting a product by its brand
	function select_by_category($cat){
		// return associative array or false
		return $this->fetch("select * from products where product_cat='$cat'");
	}
    function  add_brand($name){
		// return true or false
		return $this->query("insert into brands(brand_name) values ('$name')");
	}
    function update_brand($id, $name){
		// return true or false
		return $this->query("update brands set brand_name='$name'  where brand_id = '$id'");
	}
	function displayBrands(){
        return $this->fetch(" select * FROM brands");      
    }
	function select_one_brand($id){
		// return associative array or false
		return $this->fetchOne("select * from brands where brand_id='$id'");
	}
    function delete_brand($id){
		// return true or false
		return $this->query("delete from brands where brand_id = '$id'");
	}
	function search($name){
		$sql = "SELECT * FROM products WHERE product_title LIKE '%$name%' OR product_keywords LIKE '%$name%'";
		return $this->fetch($sql);
	}

	public function countproducts(){
        $sql ="SELECT COUNT(*) FROM products";
        return $this->fetchOne($sql);
    }

    public function countbrands(){
        $sql ="SELECT COUNT(*) FROM brands";
        return $this->fetchOne($sql);
    }

    public function countcategories(){
        $sql ="SELECT COUNT(*) FROM categories";
        return $this->fetchOne($sql);
    }

	function countorders(){
        $sql ="SELECT COUNT(*) FROM orders";
        return $this->fetchOne($sql);
    }

	function displayorders(){
        $sql ="select * FROM orders";
        return $this->fetch($sql);
    }


	

}

?>