<div class="col-md-6 col-md-offset-3">
  <h3 class="text-center">Change Password</h3>

  <br />

  <form action="" method="post">

    <div class="form-group">
      <label>Enter Current Password:</label>
      <input type="password" class="form-control" name="current_pass" required/>
    </div>

    <div class="form-group">
      <label>Enter New Password:</label>
      <input type="password" class="form-control" name="new_pass" required/>
    </div>

    <div class="form-group">
      <label>Confirm New Password:</label>
      <input type="password" class="form-control" name="new_pass_again" required/>
    </div>

    <div class="text-center">
      <button type="submit" name="change_pass" class="btn btn-primary">CHANGE PASSWORD</button>
    </div>
  </form>
</div>

<?php
  include ("includes/dbconnect.php");

  if(isset($_POST['change_pass'])) {

    $user = $_SESSION['customer_email'];
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_again = $_POST['new_pass_again'];

    $sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";

    $run_pass = mysqli_query($con, $sel_pass);

    $check_pass = mysqli_num_rows($run_pass);

    if ($check_pass == 0) {
      echo "<script>alert('Current password is wrong!')</script>";
      exit();
    }

    if ($new_pass != $new_again) {
      echo "<script>alert('Your new password do not match.')</script>";
      exit();
    } else {
      $update_pass = "update customers set customer_pass='$new_pass'";

      $run_update = mysqli_query($con, $update_pass);

      echo "<script>alert('Password updated!')</script>";
      echo "<script>window.open('my-account.php','_self')</script>";
    }

  }
?>
