<?php

 ?>

<div class="col-md-6 col-md-offset-3">

  <form method="post" action="" class="form-login">

    <div class="form-group">
      <h3 class="text-center">Login or Register to Buy!</h3>
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email" required/>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="pass" placeholder="Password" required/>
    </div>

    <p class="text-center"><a href="checkout.php?forgot-password" >Forgot Password?</a></p>

    <br />

    <button class="btn btn-primary center-block" type="submit" name="login">SUBMIT</button>

  </form>

  <br />

  <h3 class="text-center"><a href="customer-register.php">Register Here</a></h3>

</div>

<?php
  if(isset($_POST['login'])) {

    $c_email = $_POST['email'];
    $c_pass = $_POST['pass'];

    $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

    $run_c = mysqli_query($con, $sel_c);

    $check_customer = mysqli_num_rows($run_c);

    if($check_customer==0) {
      echo "<script>alert('Email or Password incorrect')</script>";
      exit();
    }

    echo var_dump($run_c);
    echo mysqli_error($con);


    $ip = getIp();
    $sel_cart = "select * from cart where $ip_add='$ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);


    if($check_customer>0 AND $check_cart==0) {

      $_SESSION['customer_email']=$c_email;

      echo "<script>alert('Login Successful!')</script>";
      echo "<script>window.open('customer/my-account.php','_self')</script>";

    } else {

      $_SESSION['customer_email']=$c_email;

      echo "<script>alert('Login Successful!')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";

    }

  }
 ?>
