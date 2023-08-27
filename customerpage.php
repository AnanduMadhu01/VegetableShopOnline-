<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  exit();
}
  include_once "dbactions.php";
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="css/mainpage.css">
  <style>
    body{
      background-image: url("images/mainpage.jpeg");
      background-repeat: no-repeat; 
      background-position: center;
      background-attachment: fixed; 
    }
   </style>
</head>
<body>

<ul>
  <li><a href="customerpage.php">HOME</a></li>
  <li><a href="MyCart.php">MY CART</a></li>
  <li><a href="MyOrder.php">MY ORDERS</a></li>
  <li style="float: right;"><a href="logout.php">LOGOUT</a></li>
    </div>
  </li>
</ul>
  <?php
  $sql="SELECT * FROM addstock";
  $result = getData($sql);
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  ?>
<div class="wrapper">
  <div class="product">
    <div class="p-image">
      <img src="images/<?php echo $row["image"];?>"/>
    </div>
    <div class="discription">
      <h4><?php echo $row["iname"];?></h4>
      <h4><span>&#8377;</span><?php echo $row["sprice"];?></h4>
      <div class="clear"></div>
      <a href="detailedview.php?id=<?php echo $row["icode"];?>">Buy</a>
      <h4>Stock<br/><br/><br/> Left:<?php echo $row["quantity"];?></h4> 
    </div>
  </div>  
</div>
<?php
    }
  }
?>
</body>
</html>
