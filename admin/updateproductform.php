<?php 
require_once('../controllers/product_controller.php');
require_once('../controllers/cart_controller.php');


require_once('../settings/core.php');
if(check_permission()){
  header("Location: ../login/login.php");
}

$totalproducts = countproducts_controller();
$totalbrands = countbrands_controller();
$totalcategories = countcategories_controller();
$totalorders=countorders_controller();

$errors = array();


$product=select_one_product_controller($_GET['id']);
$categories = displaycategories_controller();
$brands =displaybrands_controller();
$a_cat=select_one_category_controller($product['product_cat']);
$a_brand=select_one_brand_controller($product['product_brand']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nectar (Admin)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../images/logo.png" alt="AdminLTELogo"  width="400px">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Dashboard</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-black bg-black my-1 mx-1 mb-1 rounded elevation-4">
    <!-- Brand Logo -->
    <a href="products.php" class="brand-link border-bottom-0 mt-3" style="text-align:center;">
      <img  src="../img/logo.png" width="200px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-black">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../index.php" class="nav-link">
                <i class="fas fa-home"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./payments.php" class="nav-link ">
                  <i class="fas fa-wallet"></i>
                  <p>Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./orders.php" class="nav-link">
                  <i class="fas fa-hourglass-half "></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./products.php" class="nav-link  active">
                <i class="fas fa-hamburger"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./brand.php" class="nav-link">
                <i class="fas fa-book"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./categories.php" class="nav-link ">
                  <i class="fa fa-bars"></i>
                  <p>Categories</p>
                </a>
              </li>
              
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper px-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $totalproducts['COUNT(*)']; ?></h3>

                <p>All Products</p>
              </div>
              <div class="icon">
                <i class="fas fa-hamburger"></i>
              </div>
              <a href="./products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $totalorders['COUNT(*)']; ?></h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-hourglass-half"></i>
              </div>
              <a href="./orders.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $totalcategories['COUNT(*)']; ?></h3>

                <p>All Categories</p>
              </div>
              <div class="icon">
                <i class="fas fa-bars"></i>
              </div>
              <a href="./categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $totalbrands['COUNT(*)']; ?></h3>

                <p>Brands</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="./brand.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
   
		<?php
        
		// redirect if user isn't admin
		// require_once('../settings/core.php');
		// if(check_login()){
		//	if($_SESSION['role']!=0){
		//		header('location: ../index.php');

		//	}
		//	else{
		//		echo'
		//			<div style="text-align:right">
		//			<a style="font-size: 1.5rem" href="../views/login.php">Logout</a>
		//			</div>';
		//	}
		//} 
        ?>
	
  
  <div class="container">
        <h1>Update Product</h1>

        <form method="post" action="../functions/updateproduct.php" enctype="multipart/form-data" >
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $product['product_title'] ?>">
          </div>
          <div class="form-group">
            <label>Product Price (Ghc)</label>
            <input type="number" class="form-control" id="pprice" name="pprice" value="<?php echo $product['product_price'] ?>">
          </div>
          <div class="form-group">
            <label for="form-pcat">Product Category</label>
            <select class="form-control" id="form-pcat" name="pcat">
            <option value="<?php echo $product['product_cat'] ?>" > <?php echo $a_cat['cat_name'] ?></option>
             <?php
              foreach($categories as $cat){
                  echo "<option value=".$cat['cat_id'].">".$cat['cat_name']."</options>";
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="pbrand">Product Brand</label>
            <select class="form-control" id="pbrand" name="pbrand">
            <option value="<?php echo $product['product_brand'] ?>" ><?php echo $a_brand['brand_name'] ?></option>
             <?php
              foreach($brands as $brand){
                  echo "<option value=".$brand['brand_id']."> ".$brand['brand_name']."</options>";
              }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="pdesc">Product Description</label>
            <input class="form-control" id="pdesc" name="pdesc" value="<?php echo $product['product_desc'] ?>"></input>
          </div>
          <div class="form-group">
            <label for="pimg">Product Image</label>
            <input type="file" class="form-control-file" id="pimg" name="img">
          </div>
          <div class="form-group">
            <label>Product Keyword</label>
            <input type="text" class="form-control" id="pkeyword" name="pkeyword" value="<?php echo $product['product_keywords'] ?>">
          </div>
          <input class="form-control" type="hidden" name="id" value="<?php echo $product['product_id'] ?>">
          <button type="submit" class="btn btn-primary" name="updateproduct">Update</button>
        </form>
        </div>



    <script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
