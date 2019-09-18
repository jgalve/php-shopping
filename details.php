<?php include ("header.php"); ?>

    <!-- MAIN CONTENT -->
    <main class="container fill-bodyheight">
      <div class="row">
        <div class="col-md-3">
          <h3>CATEGORIES</h3>

          <ul class="list-unstyled">
            <?php getCats(); ?>
          </ul>

          <h3>BRANDS</h3>

          <ul class="list-unstyled">
            <?php getBrands(); ?>
          </ul>

        </div>

        <div class="col-md-9">

          <p class="text-center welcome-text">Welcome Guests! Shopping Cart - Total Items: Total Price: <a href="#">Go to Cart</a></p>

              <?php

                if (isset($_GET['pro_id'])) {

                  $product_id = $_GET['pro_id'];

                  $get_pro = "select * from products where product_id='$product_id'";

                  $run_pro = mysqli_query($con, $get_pro);

                  while ($row_pro = mysqli_fetch_array($run_pro)) {

                    $pro_id = $row_pro['product_id'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];
                    $pro_desc = $row_pro['product_desc'];

                    echo "
                      <div class='single-product'>
                        <img src='admin/product-images/$pro_image' class='img-responsive' />
                        <h3>$pro_title</h3>
                        <span class='price'> PRICE: $pro_price </span>
                        <a href='index.php' class='pull-right'>GO BACK</a>
                        <div class='clearfix'></div>
                        <p>$pro_desc</p>
                        <a href='index.php?pro_id=$pro_id' class='btn btn-primary center-block'>ADD TO CART</a>
                      </div>
                    ";

                  }
                }
              ?>

        </div>
      </div>
    </main>

<?php include ("footer.php"); ?>
