<?php

require('../controllers/product_controller.php'); 
?>


<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    // require_once('../controllers/product_controller.php');
    ?>
    <!--  
    Document Title
    =============================================
    -->
    <title>Nectar</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="../assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="../assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="../assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="../assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="../assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="../assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="../assets/css/colors/default.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    
    
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top " role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="#">Nectar</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li ><a  href="../views/shop.php#products" >Home</a>
                <li class= "dropdown"><a  class="dropdown-toggle" href="../views/shop.php" >Shop</a>
                
                <ul class="dropdown-menu">
                <?php 
                $categories=displaycategories_controller();

                foreach($categories as $cat){?>
                    
                      <li><a href="../views/product.php?cat= <?= $cat['cat_id']?> "><?=$cat['cat_name']?></a></li>
                    
                
                <?php }?>
                </ul>
                </li>

                <li class= "dropdown"><a  class="dropdown-toggle" href="../views/shop.php" ><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
                  <ul class="dropdown-menu">
                                     
                    <?php if(isset($_SESSION['user_id'])) {
                            if(($_SESSION['user_role']) == 0){?>
                              <li ><a  href="../admin/products.php" >Dashboard</a></li>
                              <li><a href="../login/logout.php">Logout</a></li>
                              <?php } else{?>
                                <li><a href="../login/logout.php">Logout</a></li>
                                
                            <?php }
                            
                          }else{?>
                              <li><a href="../login/login.php">Login</a></li>
                              <li><a href="../login/register.php">register</a></li>
                           
                             <?php }?>
                    </ul>
                </li>

                <li><a  href="../views/cart.php" ><i class="fa fa-shopping-cart" style="font-size:20px"></i></a> </li>
                
          </div>
        </div>
      </nav>







      <div class="main">
        <section class="module bg-dark-30" data-background="../assets/images/Landing/background.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Register</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row-center">
    
              <div class="col-sm-5">
                <h4 class="font-alt">Register</h4>
                <hr class="divider-w mb-10">
                <form class="form" method="post" name="Formregister"  action="registerprocess.php" onSubmit="return validate()">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" type="text" name="email" placeholder="Email" required/>
                  </div>
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input class="form-control" id="name" type="text" name="name" placeholder="Full Name" required/>
                  </div>
                  <div class="form-group">
				    <label for="contact">Phone number</label>
				    <input class="form-control" type="number" placeholder="Contact Number" name="contact" id="contact">
				   
			    </div>
                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input class="form-control" id="pass" type="password" name="pass" placeholder="Password" required/>
                  </div>
                  <div class="form-group">
                    <label for="cpass">Confirm Password</label>
                    <input class="form-control" id="cpass" type="password" name="cpass" placeholder="Re-enter Password" required/>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-block btn-round btn-b" type="submit" id="button" name="register">Register</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
    <?php include('../views/footer.php')?>
  </body>
</html>

<script>
        function validate(){

            var a = document.getElementById("pass").value;
            var b = document.getElementById("cpass").value;
            if (a!=b) {
               alert("Passwords do no match");
               return false;
            }
        }
     </script>