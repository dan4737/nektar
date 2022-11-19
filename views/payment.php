<?php
session_start();
if(!isset($_SESSION['user_id'])){
  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
  header('location:../login/login.php');
}
require('../controllers/product_controller.php');
require('../controllers/cart_controller.php');
include_once('menu.php');

 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="main">
  <section class="module bg-dark-30" data-background="../assets/images/Landing/background.webp">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h1 class="module-title font-alt mb-0">Thanks for Choosing Nectar!</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="module">
    <div class="container">
      <div class="row-center">
        <div class="col-sm-5">
          <h4 class="font-alt">Confirm your Order</h4>
          <hr class="divider-w mb-10">
          <form class="form" id="paymentForm" >
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" id="email-address" type="text" name="email" value="<?=$_SESSION['user-email']?>"  required/>
            </div>
            <div class="form-group">
              <label for="name">Amount</label>
              <input class="form-control" id="amount"  name="amount" value= <?= $_GET['amount'] ?>  required disabled/>
            </div>
            
            <div class="form-group">
              <button class="btn btn-block btn-round btn-b" type="button" onclick="payWithPaystack()">Pay</button>
            </div>
          </form>
            <!-- END FORM -->
          <script src="https://js.paystack.co/v1/inline.js"></script> 
            <script src="../JS/payment.js"></script>
          
          <!-- PAYSTACK INLINE SCRIPT -->
        </div>
      </div>
    </div>
  </section>
</div>      
<?php include('footer.php')?>
