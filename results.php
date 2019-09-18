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

          <div class="row" id="products-list">

            <?php
              if (isset($_GET['search'])) {

                $search_query = $_GET['user-query'];

                $get_pro = "select * from products where product_keywords like '%$search_query%'";

                $run_pro = mysqli_query($con, $get_pro);

                while ($row_pro = mysqli_fetch_array($run_pro)) {

                  $pro_id = $row_pro['product_id'];
                  $pro_cat = $row_pro['product_cat'];
                  $pro_brand = $row_pro['product_brand'];
                  $pro_title = $row_pro['product_title'];
                  $pro_price = $row_pro['product_price'];
                  $pro_image = $row_pro['product_image'];

                  echo "
                    <div class='col-md-4 col-sm-6 col-prods'>
                      <img src='admin/product-images/$pro_image' class='img-responsive' />
                      <h3>$pro_title</h3>
                      <span class='price'> PRICE: $pro_price </span>
                      <a href='details.php?pro_id=$pro_id' class='pull-right'>DETAILS</a>
                      <div class='clearfix'></div>
                      <a href='index.php?pro_id=$pro_id' class='btn btn-primary center-block'>ADD TO CART</a>
                    </div>
                  ";

                }
              }
            ?>

          </div>

        </div>
      </div>
    </main>

<?php include ("footer.php"); ?>
