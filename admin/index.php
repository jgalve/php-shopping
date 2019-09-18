<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SHOP LOGO</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <main class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center">CMS ADMINISTRATION<h3/>
        </div>
        <div class="col-md-3">
          <h4>MANAGE CONTENT</h4>
          <ul class="list-unstyled">
            <li><a href="index.php?insert_product">INSERT PRODUCT</a></li>
            <li><a href="index.php?view_products">VIEW PRODUCTS</a></li>
            <li><a href="index.php?insert_category">INSERT CATEGORY</a></li>
            <li><a href="index.php?view_category">VIEW CATEGORY</a></li>
            <li><a href="index.php?insert_brand">INSERT BRAND</a></li>
            <li><a href="index.php?view_brand">VIEW BRAND</a></li>
            <li><a href="index.php?view_customers">VIEW CUSTOMERS</a></li>
            <li><a href="index.php?view_payments">VIEW PAYMENTS</a></li>
            <li><a href="index.php?admin_logout">ADMIN LOGOUT</a></li>
          </ul>

        </div>

        <!-- main content-->
        <div class="col-md-9">
          <?php
            if(isset($_GET['insert_product'])) {
              include("product-add.php");
            }
            if(isset($_GET['view_products'])) {
              include("view-products.php");
            }
            if(isset($_GET['edit_pro'])) {
              include("edit-product.php");
            }
          ?>
        </div>
      </div>
    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
