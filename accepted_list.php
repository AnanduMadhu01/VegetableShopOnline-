
<?php
session_start();
if(!isset($_SESSION['staff'])){
  header("Location: index.php");
  exit();
}
  include_once "dbactions.php";
  $staff_id=$_SESSION['staff'];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/staffpage.css">
  <title>staff</title>
  <style>
  body{
    background-image: url("images/image.jpeg");
    background-repeat: no-repeat; 
    background-position: center;
    background-attachment: fixed; 
  }
   </style>
</head>
<body>
  <ul>
  <li><a href="staffpage.php">HOME</a></li>
  <li><a href="accepted_list.php">ACCEPTED LIST</a></li>
  <li><a href="deliveredlist.php">DELIVERED LIST</a></li>
  <li style="float: right;"><a href="logout.php">LOGOUT</a></li>
    </div>
  </li>
</ul>
<div class="wrapper">
  <div class="orderlist">
      <?php
          $sql="SELECT * FROM `oreders` WHERE `staff_id`=$staff_id AND `status`='ordered'";
          $result = getData($sql);
          if($result->num_rows > 0) {
            ?>
          <table border="1">
            <tr>
              <th>SL No</th>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Product name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th></th>
            </tr>
        <?php
        $count=1;
        while($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row['customer_name']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['product_name']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo $row['total_price']; ?></td>
              <td><a href="fun_delivered.php?id=<?php echo $row['slno']; ?>">Delivered</a></td>
              <td><a href="fun_rejected.php?id=<?php echo $row['slno']; ?>">Rejected</a></td>
            </tr>
          <?php
          $count++;
        }
        ?>
        </table>
        <?php
        }
        else
        {
        echo "<h1>No orders Found......</h1>";
      }
    
      ?>
    
      
  </div>
</div>
</body>
</html>
