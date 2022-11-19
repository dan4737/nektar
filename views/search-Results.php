<?php
require('../controllers/product_controller.php'); 
session_start();
include_once('menu.php');
if(!isset($_GET['searchTerm'])){
    header("location:../index.php");
}
?>

      
<div class="main">
  <section class="module-small">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Search Results</h2>
        </div>
        
        <form class="form-inline" method="get" >
          <input class="form-control" type="search" placeholder="Search"  name="searchTerm">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search"><i class ="fa fa-search"></i></button>
        </form>
      </div>
  
      <?php  
        $product_name=$_GET['searchTerm']. "%";
        $result=search_controller($product_name);
        
        if(!empty($result)){
          foreach ($result as $key => $product){
              $id=$product['product_id'];

      ?>
      

      <div class="row multi-columns-row">
        <div class="col-sm-6 col-md-3 col-lg-3">
          <div class="shop-item">
            <div class="shop-item-image"><img src=<?php echo $product['product_image'];?> alt="Accessories Pack"/>
                <div class="shop-item-detail">
                  <a class="btn btn-round btn-b" href="<?php echo '../actions/add_to_cart.php?pid='.$id.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><span class="icon-basket"></span></a>
                  <a class="btn btn-round btn-b" href="single_product.php?id=<?= $id;?>" ><i class="far fa-eye"></i></a>
                </div>
            </div>
            <div class="cart" style="padding-top:5%">
              <a class="btn btn-round btn-b" href="<?php echo '../actions/add_to_cart.php?pid='.$id.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><span class="icon-basket">Add To Cart</span></a>
            </div>
            <h4 class="shop-item-title font-alt"><a href="#"><?= $product['product_title']?></a></h4><?= $product['product_price']?>
          </div>
      </div>
      <?php }} else {?>
        <div class="alert alert-danger">Sorry nothing was found. Please Try Another term</div> 
      <?php } ?>  
      
    </div>
  </section>        
</div>
           
<hr class="divider-w">
<?php include('../views/footer.php');?>
