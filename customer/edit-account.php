<?php
  include ("includes/dbconnect.php");


  $user = $_SESSION['customer_email'];
  $get_customer = "select * from customers where customer_email='$user'";
  $run_customer = mysqli_query($con, $get_customer);
  $row_customer = mysqli_fetch_array($run_customer);

  $c_id = $row_customer['customer_id'];
  $name = $row_customer['customer_name'];
  $email = $row_customer['customer_email'];
  $pass = $row_customer['customer_pass'];
  $image = $row_customer['customer_image'];
  $country = $row_customer['customer_country'];
  $city = $row_customer['customer_city'];
  $contact = $row_customer['customer_contact'];
  $address = $row_customer['customer_address'];
?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <h3 class="text-center">Update account</h3>
  </div>

  <div class="form-group">
    <label>Customer Name</label>
    <input type="text" class="form-control" name="c_name" value="<?php echo $name ?>" required/>
  </div>

  <div class="form-group">
    <label>Customer Email</label>
    <input type="email" class="form-control" name="c_email" value="<?php echo $email ?>" required/>
  </div>

  <div class="form-group">
    <label>Customer Password</label>
    <input type="password" class="form-control" name="c_password" value="<?php echo $pass ?>" required/>
  </div>

  <div class="form-group">
    <label>Customer Image</label>
    <input type="file" class="form-control" name="c_image" required/>
    <br />
    <div class="profile-pic">
    <img src="customer-images/<?php echo $image ?>" width="100" class="img-responsive"/>
    </div>
  </div>

  <div class="form-group">
    <label>Customer Country</label>
    <select class="form-control" name="c_country" disabled/>
      <option><?php echo $country ?></option>
      <option>UK</option>
      <option>Philippines</option>
      <option>Australia</option>
    </select>
  </div>

  <div class="form-group">
    <label>Customer City</label>
    <input type="text" class="form-control" name="c_city" value="<?php echo $city ?>" required/>
  </div>

  <div class="form-group">
    <label>Customer Contact</label>
    <input type="text" class="form-control" name="c_contact" value="<?php echo $contact ?>" required/>
  </div>

  <div class="form-group">
    <label>Customer Address</label>
    <textarea class="form-control" name="c_address" required><?php echo $address ?></textarea>
  </div>

  <button class="btn btn-primary center-block" type="submit" name="update">Update Account</button>

</form>

<br />
<br />


<?php
  if(isset($_POST['update'])) {

    $ip = getIp();

    $customer_id = $c_id;
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_password = $_POST['c_password'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    move_uploaded_file($c_image_tmp,"customer-images/$c_image");

    $update_c  = "UPDATE customers SET customer_name='$c_name', customer_email='$c_email', customer_pass='$c_password', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' WHERE customer_id='$customer_id'";

    $run_update = mysqli_query($con, $update_c);

    if ($run_update) {
      echo "<script>alert('Your account has been updated!')</script>";
      echo "<script>window.open('my-account.php','_self')</script>";
      //echo "var_dump($run_update) ";
      //echo "var_dump($c_image) ";

    }

  }
?>
