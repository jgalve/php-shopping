
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

          <div class="col-md-8 col-md-offset-2">

            <form action="customer-register.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <h3 class="text-center">Create an account</h3>
              </div>

              <div class="form-group">
                <label>Customer Name</label>
                <input type="text" class="form-control" name="c_name" required/>
              </div>

              <div class="form-group">
                <label>Customer Email</label>
                <input type="email" class="form-control" name="c_email" required/>
              </div>

              <div class="form-group">
                <label>Customer Password</label>
                <input type="password" class="form-control" name="c_password" required/>
              </div>

              <div class="form-group">
                <label>Customer Image</label>
                <input type="file" class="form-control" name="c_image" required/>
              </div>

              <div class="form-group">
                <label>Customer Country</label>
                <select class="form-control" name="c_country" required/>
                  <option>USA</option>
                  <option>UK</option>
                  <option>Philippines</option>
                  <option>Australia</option>
                </select>
              </div>

              <div class="form-group">
                <label>Customer City</label>
                <input type="text" class="form-control" name="c_city" required/>
              </div>

              <div class="form-group">
                <label>Customer Contact</label>
                <input type="text" class="form-control" name="c_contact" required/>
              </div>

              <div class="form-group">
                <label>Customer Address</label>
                <textarea class="form-control" name="c_address" required></textarea>
              </div>

              <button class="btn btn-primary center-block" type="submit" name="register">Create Account</button>

            </form>

          </div>

        </div>
      </div>
    </main>

<?php include ("footer.php"); ?>

<?php
  if(isset($_POST['register'])) {

    $ip = getIp();

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_password = $_POST['c_password'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    move_uploaded_file($c_image_tmp,"customer/customer-images/$c_image");

    $insert_c  = "INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) VALUES ('$ip','$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image')";

    $run_c = mysqli_query($con, $insert_c);

    echo var_dump($run_c);

    $sel_cart = "select * from cart where ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart==0) {
      $_SESSION['customer_email']=$c_email;

      echo "<script>alert('Registration Successful!')</script>";
      echo "<script>window.open('customer/my-account.php','_self')</script>";

    } else {
      $_SESSION['customer_email']=$c_email;

      echo "<script>alert('Registration Successful!')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    }

  }
?>
