<?php
  session_start();
  include ("header.php");
?>

    <!-- MAIN CONTENT -->
    <main class="container fill-bodyheight">

      <div class="row">
        <div class="col-md-3">
          <h3>MY ACCOUNT</h3>

          <ul class="list-unstyled" id="cats">
            <?php
              $user = $_SESSION['customer_email'];
              $get_img = "select * from customers where customer_email='$user'";
              $run_img = mysqli_query($con, $get_img);
              $row_img = mysqli_fetch_array($run_img);
              $c_image = $row_img['customer_image'];
              $c_name = $row_img['customer_name'];

              echo "<li class='profile-pic'><img src='customer-images/$c_image'/></li>";
            ?>
            <li><a href="my-account.php?my_orders">MY ORDERS</a></li>
            <li><a href="my-account.php?edit_account">EDIT ACCOUNT</a></li>
            <li><a href="my-account.php?change_pass">CHANGE PASSWORD</a></li>
            <li><a href="my-account.php?delete_account">DELETE ACCOUNT</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
          </ul>


        </div>

        <div class="col-md-9">

          <?php cart() ?>
          <?php getIp() ?>

          <p class="text-center welcome-text">

            <?php
              if(isset($_SESSION['customer_email'])) {
                echo "<b>Welcome:</b>" . $_SESSION['customer_email'];
              }
            ?>

            <?php
              if(!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>Login</a>";
              } else {
                echo "<a href='logout.php'>Logout</a>";
              }
            ?>

          </p>

          <!-- content -->
          <div class="row" id="products-list">



              <?php
                if(!isset($_GET['my_orders'])) {
                  if(!isset($_GET['edit_account'])) {
                    if(!isset($_GET['change_pass'])) {
                      if(!isset($_GET['delete_account'])) {

                        echo "
                          <h3 class='text-center'>Welcome: $c_name </h3>
                          <p class='text-center'><a href='my-accounts.php?my_orders'>TRACK ORDERS HERE</a></p><br /><br />
                        ";

                      }
                    }
                  }
                }
              ?>

              <?php
                if(isset($_GET['edit_account'])) {
                  include ("edit-account.php");
                }
                if(isset($_GET['change_pass'])) {
                  include ("change-password.php");
                }
                if(isset($_GET['delete_account'])) {
                  include ("delete-account.php");
                }
              ?>

          </div>

        </div>
      </div>
    </main>

<?php include ("footer.php"); ?>
