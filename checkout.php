<?php
 session_start();
 include ("header.php");
?>

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

          <?php cart() ?>
          <?php getIp() ?>

          <p class="text-center welcome-text">Welcome Guests! Shopping Cart - Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php">Go to Cart</a></p>

          <div class="row" id="products-list">

            <?php
              if (!isset($_SESSION['customer_email'])) {
              include("customer-login.php");
              }
              else {
               include("payment.php");
              }
            ?>

          </div>

        </div>
      </div>
    </main>

<?php include ("footer.php"); ?>
