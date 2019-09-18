<!DOCTYPE html>
<?php
  include("includes/dbconnect.php");

  if (isset($_GET['edit_pro'])) {
    $get_id =  $_GET['edit_pro'];
    $get_pro = "select * from products where product_id='$get_id'";
    $run_pro = mysqli_query($con, $get_pro);

    $i = 0;

    $row_pro=mysqli_fetch_array($run_pro);

    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_image = $row_pro['product_image'];
    $pro_price = $row_pro['product_price'];
    $pro_desc = $row_pro['product_desc'];
    $pro_keywords = $row_pro['product_keywords'];
    $pro_cat = $row_pro['product_cat'];
    $pro_brand = $row_pro['product_brand'];

    $get_cat = "select * from categories where cat_id='$pro_cat'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $category_title = $row_cat['cat_title'];

    $get_brand = "select * from brands where brand_id='$pro_brand'";
    $run_brand = mysqli_query($con, $get_brand);
    $row_brand = mysqli_fetch_array($run_brand);
    $brand_title = $row_brand['brand_title'];

  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>product Add - Shop Logo</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <main class="">

      <form class="form-horizontal" method="post" action="product-add.php" enctype="multipart/form-data">
        <h2 class="text-center">EDIT AND UPDATE PRODUCTS</h2>

        <div class="form-group">
          <label>PRODUCT TITLE</label>
          <input type="text" class="form-control" name="prod-title" value="<?php echo $pro_title ?>" required/>
        </div>

        <div class="form-group">
          <label>PRODUCT CATEGORY</label>
          <select class="form-control" name="prod-category">
            <option selected disabled><?php echo $category_title ?></option>

            <?php
              $get_cats = "select * from categories";

              $run_cats = mysqli_query($con, $get_cats);

              while ($row_cats = mysqli_fetch_array($run_cats)) {

                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];

                echo "<option value='$cat_id'>$cat_title</option>";
              }
            ?>

          </select>
        </div>

        <div class="form-group">
          <label>PRODUCT BRAND</label>
          <select class="form-control" name="prod-brand">
            <option selected disabled><?php echo $brand_title ?></option>

            <?php
              $get_brands = "select * from brands";

              $run_brands = mysqli_query($con, $get_brands);

              while ($row_brands = mysqli_fetch_array($run_brands)) {

                $brand_id = $row_brands['brand_id'];
                $brand_title = $row_brands['brand_title'];

                echo "<option value='$brand_id'>$brand_title</option>";

              }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label>PRODUCT IMAGE</label>
          <input type="file" class="form-control" name="prod-image"><img src="product-images/<?php echo $pro_image ?>" class="img-responsive"/></input>
        </div>

        <div class="form-group">
          <label>PRODUCT PRICE</label>
          <input type="number" class="form-control" name="prod-price" value="<?php echo $pro_price ?>" required/>
        </div>

        <div class="form-group">
          <label>PRODUCT DESCRIPTION</label>
          <textarea class="form-control" name="prod-description">
            <?php echo $pro_desc ?>
          </textarea>
        </div>

        <div class="form-group">
          <label>PRODUCT KEYWORDS</label>
          <input type="text" class="form-control" name="prod-keywords" value="<?php echo $pro_keywords ?>" required/>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-submit" name="add-product">UPDATE PRODUCT</button>
        </div>

      </form>

      <a href="../index.php" class="text-center center-block">HOME</a>

    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=s2c32tbfedgga293d1v8xonmsz3o40iw27pem9j8o8tryfzi"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

  </body>
</html>

<?php
  if (isset($_POST['add-product'])) {

    $update_id = $pro_id;
    //getting the text data from fields
    $product_title = $_POST['prod-title'];
    $product_cat = $_POST['prod-category'];
    $product_brand = $_POST['prod-brand'];
    $product_price = $_POST['prod-price'];
    $product_desc = $_POST['prod-description'];
    $product_keywords = $_POST['prod-keywords'];
    $product_image = $_POST['prod-image'];

    //getting the image from fields
    $product_image = $_FILES['prod-image']['name'];
    $product_image_tmp = $_FILES['prod-image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product-images/$product_image");

        $update_product = "update products set prod-cat='$product_cat',prod-brand='$product_brand',prod-title='$products_title',prod-price='$product_price',prod-desc='$product_desc',prod-keywords='$product_keywords',prod-image='$product_image',prod-keywords='$product_keywords' where product_id='$update_id'";


        $run_product = mysqli_query($con, $update_product);

        if($run_product) {
          echo "<script>alert('Your product has been updated!')</script>";
          echo "<script>window.open('index.php?product-add.php','_self')</script>";
        }

  };
?>
