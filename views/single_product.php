<?php
require('../controllers/product_controller.php');
require('../controllers/cart_controller.php');
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
  $_SESSION['qty']="";
  $_SESSION['desc']="";
  
 
}

include_once('menu.php');
?>
<div class="main">
  <section class="module">
    <div class="container">
      <?php
      $product=select_one_product_controller($_GET['id']);
      $cat=$product['product_cat'];
      $price=$product['product_price'];
      $id=$_GET['id'];
        
      $ipadd=getRealIpAddr();
        if(isset($_SESSION['user_id'])) {
          $cid=$_SESSION['user_id'];
        }
        else{$cid=null;}
      
        $qty=1;
      
      ?>
      <div class="row">
        <div class="col-sm-6 mb-sm-40"><a class="gallery"><img src=<?= $product['product_image']; ?> alt="Single Product Image"/></a>
          <div class="row" style= "padding-top:5%; "> 
           <?php if( True ) {?>
            <div class="cart" style="padding-top:5%">
              <a class="btn btn-round btn-b" href="<?php echo '../actions/add_to_cart.php?pid='.$id.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><span class="icon-basket">Add To Cart</span></a>
            </div>
            <?php } else{?>
            <div  class="cart">
            <a class="btn btn-danger btn-round" href="">Out of Stock</a>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="product-title font-alt"><?= $product['product_title']; ?></h1>
            </div>
        </div>
          
        <div class="row mb-20">
          <div class="col-sm-12">
            <div class="price font-alt"><span class="amount"><?= $product['product_price']; ?> RWF</span></div>
          </div>
        </div>

        <div class="row mb-20">
          <div class="col-sm-12">
            <div class="description">
              <p><?= $product['product_desc']; ?></p>
            </div>
          </div>
        </div> 
        <div class="row mb-20">
           <?php if( True ) {?>
          <form method="get" action="pay_now.php">
          <div class="col-sm-4 mb-sm-20">
            <input class="form-control input-lg" type="number" name="qty" value="1" max="40" min="1" required="required"/>
            <input class="form-control input-lg" type="hidden" name="pid" value=<?= $product['product_id']?>/>
            <input class="form-control input-lg" type="hidden" name="price" value=<?= $price?>/>
            
          </div>
         
          <div class="col-sm-8"><button class="btn btn-lg btn-block btn-round btn-b" type="submit" >Buy Now</button></div>
          </form>
          <?php } ?>
        </div>                
    </div>   
  </section>
      
  

  <hr class="divider-w">
  
  <hr class="divider-w">
<!-- include staple footer               -->
<?php include('footer.php');?>
