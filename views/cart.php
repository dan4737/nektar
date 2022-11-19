<?php

require('../controllers/product_controller.php');
require('../controllers/cart_controller.php');
session_start();
include('menu.php');
?>
<div class="main">
    
  <section class="module">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h1 class="module-title font-alt">Checkout</h1>
        </div>
      </div>
    
      <hr class="divider-w pt-20">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped table-border checkout-table">
            <tr>
              <th class="hidden-xs">Item</th>
              <th>Description</th>
              <th class="hidden-xs">Price</th>
              <th>Quantity</th>
              <th>Remove</th>
            </tr>
            <?php  
            //getting the details of the cart
              if (isset($_SESSION['user_id'])){
                  $cid = $_SESSION['user_id'];
                  $cart = displayCart_controller($cid);
                  $checkOutAmt = cartValue_controller($cid);
                  
              }
            else{
                $ipadd = getRealIpAddr();
                $cart = displayCartNull_controller($ipadd);
                $checkOutAmt = cartValueNull_controller($ipadd);
              
            }
            foreach ($cart as $item){
            ?>
            
            <tr>  
              <td class="hidden-xs"><a href=<?php echo "single_product.php?id=".$item['p_id'];?>><img src=<?= $item['product_image'];?> alt="Accessories Pack"/></a></td>
              <td>
                <h5 class="product-title font-alt"><?=$item['product_title'];?></h5>
              </td>
              <td class="hidden-xs">
                <h5 class="product-title font-alt"><?=$item['product_price'];?></h5>
              </td>
              <td>
                <form>
                  
                  <input class="form-control" type="number" class="form-control" min=1 id="qty" 
                  data-pid="<?= $item['p_id'];?>" data-qty="<?= $item['qty'];?>" value="<?php echo $item['qty']  ?>" 
                  onchange="updatecart(this)" onkeyup="updatecart(this)" >
                </form>
              </td>

              <td class="pr-remove"><a href= <?php echo "../actions/cart_process.php?deleteid=".$item['p_id'] ;?> title="Remove"><i class="fa fa-times"></i></a></td>
              
            </tr>
            
              
              <?php }?>  
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3 ">
          <div class="form-group">
          <a href='shop.php#products'> <button class="btn btn-lg btn-block btn-round btn-d" type="submit" > <i class="fa fa-shopping-cart" style="font-size:20px"></i> Continue Shopping</button></a>
          </div>
        </div>
      </div>

      <script> 
        function updatecart(j){
          $.ajax({
            url:'../actions/update_cart.php',
            type:'POST',
            data:{
              'pid':j.getAttribute('data-pid'),
              'cid':j.getAttribute('data-cid'),
              'ipadd':j.getAttribute('data-ipadd'),
              'qty':j.value
            
              },
              success: function(data){
              if(data.success == true){ // if true (1)
                  setTimeout(function(){// wait for 5 secs(2)
                      location.reload(); // then reload the page.(3)
                  }, 5000); 
              }
            }
           
              
          });
        }
      </script>
      
      <hr class="divider-w">
      <div class="row mt-70">
        <div class="col-sm-5 col-sm-offset-7">
          <div class="shop-Cart-totalbox">
            <h4 class="font-alt">Cart Totals</h4>
            <table class="table table-striped table-border checkout-table">
              <tbody>
                <tr>
                  <th>Cart Subtotal :</th>
                  <td><h5 class="product-title font-alt"><?=$checkOutAmt["Result"];?></h5></td>
                </tr>
                <tr>
                  <th>Shipping Total :</th>
                  <td></td>
                </tr>
                <tr class="shop-Cart-totalprice">
                  <th>Total :</th>
                  <td><h5 class="product-title font-alt"><?=$checkOutAmt["Result"];?></h5></td>
                </tr>
              </tbody>
            </table>
            <a class="btn btn-lg btn-block btn-round btn-d" href="payment.php?amount=<?=$checkOutAmt["Result"]?>">Proceed to Checkout</a> 
          </div>
        </div>
      </div>
    </div>
  </section>      
</div>
<?php include_once('footer.php');?>
