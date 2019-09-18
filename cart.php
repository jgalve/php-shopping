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

          <p class="text-center welcome-text">

            <?php
              if(isset($_SESSION['customer_email'])) {
                echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b>Your</b>";
              } else {
                echo "<b>Welcome Guest!</b>";
              }
            ?>

            <b>Shopping Cart -</b>  Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="index.php">Back to Shop</a>

            <?php
              if(!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>Login</a>";
              } else {
                  echo "<a href='logout.php'>Logout</a>";
              }
            ?>
          </p>

          <div class="row" id="product-cart-list">

            <!-- form -->
            <form action="" method="post">

              <div class="table-responsive">
                <table class="table table-cart">
                  <thead>
                    <tr class="text-center">
                      <th>Remove</th>
                      <th>Products</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                    </tr>
                  </thead>

                  <?php
                    $total = 0;

                    global $con;

                    $ip = getIp();

                    $sel_price = "select * from cart where ip_add='$ip'";

                    $run_price = mysqli_query($con, $sel_price);

                    while($p_price = mysqli_fetch_array($run_price)) {

                        $pro_id = $p_price['p_id'];

                        $pro_price = "select * from products where product_id='$pro_id'";

                        $run_pro_price = mysqli_query($con, $pro_price);

                        while ($pp_price = mysqli_fetch_array ($run_pro_price)) {

                          $product_price = array($pp_price['product_price']);

                          $product_title = $pp_price['product_title'];

                          $product_image = $pp_price['product_image'];

                          $single_price = $pp_price['product_price'];

                          $values = array_sum($product_price);

                          $total += $values;
                  ?>

                    <tr>
                      <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
                      <td><?php echo $product_title; ?><br />
                        <img src="admin/product-images/<?php echo $product_image; ?>" width="60" />
                      </td>
                      <td><input type="text" size="3" name="qty" value="<?php echo $_SESSION['qty']; ?>"/></td>
                      <?php
                        if (isset($_POST['update_cart'])) {

                          $qty = $_POST['qty'];

                          $update_qty = "update cart set qty='$qty'";
                          $run_qty = mysqli_query($con, $update_qty);

                          $_SESSION['qty']=$qty;

                          $total = $total * $qty;
                        }
                      ?>

                      <td><?php echo "$" . $single_price; ?></td>
                    </tr>

                  <?php } } ?>

                    <tr >
                      <td> </td>
                      <td> </td>
                      <td><b>Sub-Total:</b> </td>
                      <td><?php echo "$" . $total; ?> </td>
                    </tr>

                </table>
              </div>

              <div class="row">


                <div class="col-md-12 text-center">
                  <button type="submit"  class="btn btn-primary" name="update_cart">UPDATE CART</button>
                  <a href="checkout.php" class="btn btn-primary" name="continue">CHECKOUT</a>
                </div>

                <div class="col-md-12 text-center">
                  <br />
                  <button type="submit"  class="btn btn-primary" name="continue">CONTINUE SHOPPING</button>
                </div>

              </div>

            </form>
            <!-- end form -->

            <?php
               /*function updatecart() {*/

                global $con;

                $ip = getIp();

                if(isset($_POST['update_cart'])) {

                  foreach($_POST['remove'] as $remove_id) {

                    $delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";

                    $run_delete = mysqli_query($con, $delete_product);

                    if($run_delete) {
                      echo "<script>window.open('cart.php','_self')</script>";
                    }

                  }

                }

                if(isset($_POST['continue'])) {
                  echo "<script>window.open('index.php','_self')</script>";
                }

                /*echo @$up_cart = updatecart();
              }*/
            ?>



          </div>

        </div>
      </div>
    </main>

<?php include ("footer.php"); ?>
