<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  exit();
}
  include_once "dbactions.php";
  $user_id=$_SESSION["user_id"];
?>
<!DOCTYPE html>
<html>
<head>

	<title>MY ORDER</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
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
		</div>
		<?php
			$sql="SELECT * FROM order_detailes WHERE `logi_id`=$user_id";
			$result = getData($sql);
  			if($result->num_rows > 0) {
    			while($row = $result->fetch_assoc()) {
		?>
				<div class="product">
					<div class="image">
						<img src="images/<?php echo $row['image'];?>">
					</div>
					<div class="discription">
						<label><?php echo $row['iname'];?></label><br/><br/>
						<label>quantity selected: <?php echo $row['quantity'];?>kg</label><br/><br/>
						<label>Tolal Price: <?php echo $row['price'];?></label><br/><br/>
						<!-- <a href=""><?php echo $row['status'];?></a> -->
					</div>
					<div class="clear"></div>
				</div>
		<?php
			}
		}
		else {
			?>
			<a href="customerpage.php"><h1>Order List is Empty....Click me For Continue Shopping.....</h1></a>
			<?php
		}
		?>
	</div>
</body>
</html>