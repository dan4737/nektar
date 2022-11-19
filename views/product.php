<?php 
require('../controllers/product_controller.php');
require('../controllers/cart_controller.php');
session_start();
include('menu.php');
$cat=$_GET['cat'];
$category=select_one_category_controller($cat);

?>

<div class="main">    
  <section class="module-small">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt"><?=$category['cat_name']?></h2>
        </div>
  
        <form class="form-inline" method="get" action="../actions/search.php">
          <input class="form-control" type="search" placeholder="Search"  name="searchTerm">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search"><i class ="fa fa-search"></i></button>
        </form>
      </div>
            
      <div class="row multi-columns-row">
        <?php
          
          $products=select_by_category_controller($cat);
          $ipadd=getRealIpAddr();
          if(isset($_SESSION['user_id'])) {
            $cid=$_SESSION['user_id'];
          }
          else{$cid=null;}
          $qty=1;
          foreach ($products as $product){
            $id=$product['product_id'];

        ?>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="shop-item">
              <div class="shop-item-image"><img src=<?php echo $product['product_image'];?> >
                <div class="shop-item-detail">
                  <a class="btn btn-round btn-b" href="<?php echo '../actions/add_to_cart.php?pid='.$id.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><span class="icon-basket"></span></a>
                  <a class="btn btn-round btn-b" href="single_product.php?id=<?= $id;?>" ><i class="far fa-eye"></i></a>
                </div>

              </div>
           <?php if(True ) {?>
            <div class="cart" style="padding-top:5%">
              <a class="btn btn-round btn-b" href="<?php echo '../actions/add_to_cart.php?pid='.$id.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><span class="icon-basket">Add To Cart</span></a>
            </div>
            <!-- ADD TO CART -->
            <?php }else{?>
            <div class="cart" style="padding-top:5%; color:red">
                <a class="btn btn-danger btn-round" href="">Out of Stock</a>
            </div>
            <?php }?>
            <h4 class="shop-item-title font-alt"><a href="single_product.php?id=<?= $id;?>" ><?= $product['product_title']?></a></h4><?= $product['product_price']?>
          </div>
        </div>       
        <?php }; ?>
      </div> 
      <div class="row mt-30">
        <div class="col-sm-12 align-center"><a class="btn btn-b btn-round" href="shop.php#products">See all products</a></div>
      </div>
    </div>
  </section>
</div>
<?php include('../views/footer.php');?>
