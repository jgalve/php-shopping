
<h2 class="text-center">VIEW ALL PRODUCTS HERE</h2>

<div class="table-responsive">
  <table class="table table-striped table-condensed table-bordered product-table text-center">
    <thead>
      <tr>
        <th>SN</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include ('includes/dbconnect.php');

        $get_pro = "select * from products";

        $run_pro = mysqli_query($con, $get_pro);

        $i = 0;

        while ($row_pro=mysqli_fetch_array($run_pro)) {
          $pro_id = $row_pro['product_id'];
          $pro_title = $row_pro['product_title'];
          $pro_image = $row_pro['product_image'];
          $pro_price = $row_pro['product_price'];
          $i++;

      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $pro_title; ?></td>
        <td> <img src="product-images/<?php echo $pro_image;?>" class="img-responsive" /></td>
        <td><?php echo $pro_price; ?></td>
        <td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
        <td><a href="delete-product.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>
      </tr>

    <?php } ?>

    </tbody>
  </table>
</div>
