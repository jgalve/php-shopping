<div class="col-md-8 col-md-offset-2">

  <br />
  <br />

  <h3 class="text-center">Do you want to DELETE your account?</h3>

  <form action="" method="post">

    <br />
    <div class="text-center">
      <button type="submit" class="btn btn-primary" name="yes">YES</button>
      <button type="submit" class="btn btn-primary" name="no">NO</button>
    </div>

  </form>
</div>

<?php

include ("includes/dbconnect.php");

$user = $_SESSION['customer_email'];

if(isset($_POST['yes'])) {

  $delete_customer = "delete from customers where customer_email='$user'";

  $run_customer = mysqli_query($con, $delete_customer);

  echo "<script>alert('Your account has been deleted.')</script>";
  echo "<script>window.open('../index.php', '_self')</script>";
}

if(isset($_POST['no'])) {
  echo "<script>window.open('my-account.php', '_self')</script>";
}

?>
