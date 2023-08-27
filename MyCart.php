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

	<title>MY CART</title>
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
	<?php
		$sql="SELECT * FROM login WHERE logi_id='$user_id'";
		$result=getData($sql);
		if($result->num_rows > 0)
		{
		$row=$result->fetch_assoc();
	?>
	<div class="wrapper">
		<div class="shipping-address">
				<?php
				if($row['Shipping_Address'] == NULL)
				{
					
					?>
					<form name="addressform" method="post">
						<textarea name="address" id="address" placeholder="Shipping Address is Not Provided.Enter Your Shiping address With Mob: Number....." required="required"></textarea>
						<input type="submit" name="btnsubmit" value="Add/Change Shipping Address"/>
					</form>
				<?php
				}
				else
				{
					?>
					<form name="addressform" method="post">
						<textarea name="address" placeholder="" value="" required="required"><?php echo $row['Shipping_Address']; ?></textarea>
						<input type="submit" name="btnsubmit" value="Add/Change Shipping Address"/>
					</form>
				<?php
				}
			 if($_SERVER['REQUEST_METHOD']=='POST') {
			 	if(isset($_POST['btnsubmit'])){
			 		$address=$_POST['address'];
			 		$sql="UPDATE `login` SET `Shipping_Address`='$address' WHERE logi_id='$user_id'";
			 		if(setData($sql)){
			 			echo "<script>alert('Shipping Address Updated Successfully.'),window.location.href='MyCart.php';</script>";
			 		}
			 	}
			 }
		}
		?>
		</div>
		<?php
			$sql="SELECT * FROM cart WHERE `logi_id`=$user_id";
			$result = getData($sql);
			$total=0;
  			if($result->num_rows > 0) {
    			while($row = $result->fetch_assoc()) {
    				$total=$total+$row['Total_Price'];
		?>
				<div class="product">
					<div class="image">
						<img src="images/<?php echo $row['image'];?>">
					</div>
					<div class="discription">
						<label><?php echo $row['iname'];?></label><br/><br/>
						<label>quantity selected: <?php echo $row['selected_quantity'];?>kg</label><br/><br/>
						<label>Tolal Price: <?php echo $row['Total_Price'];?></label><br/><br/>
						<a href="fun_removestock.php?icode=<?php echo $row['icode'];?>&qlty=<?php echo $row['selected_quantity'];?>">Remove</a>
					</div>
					<div class="clear"></div>
				</div>
	
		<?php
			}
		}
		else {
			?>
			<a href="customerpage.php"><h1>Cart is Empty....Click me For Continue Shopping.....</h1></a>
			<?php
		}
		?>
		<div class="Tprice">
			<label>Total:<br/>&nbsp;&nbsp;&nbsp;<span><?php echo $total; ?></span></label><br/>
			<?php
				$sql2="SELECT * FROM login WHERE logi_id=$user_id";
				$result=getData($sql2);
				if($result->num_rows > 0)
				{
					$row = $result->fetch_assoc();
					if($row['Shipping_Address'] != NULL){
			?>
						<a href="bill.php?total=<?php echo $total; ?>">Order Now!</a>
			<?php
					}
					else {
						?>
						<a href="MyCart.php#address">Update Address</a>
						<?php
					}
				}
			?>
		</div>
	</div>
</body>
</html>