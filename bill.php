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
		<title>Bill</title>
		<link rel="stylesheet" type="text/css" href="css/bill.css">
	</head>
	<body>
		<table border="1">
			<tr class="sname">
				<td><h1>V-Shop,Rajakkad,Kerala</h1></td>
				<td><h5>Mob: 7306510549</h5><h5>Email: rejeena56@gmail.com</h5></td>
			</tr>
		</table>
		<table border="1">
			<tr>
			<th>SL No:</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total</th>
		</tr>
  <?php
$sql="SELECT * FROM cart WHERE logi_id='$user_id'";
$result=getData($sql);
	if($result->num_rows > 0)
	{
		$count=1;
		$total=0;
		while($row = $result->fetch_assoc()) {
			
			$icode=$row['icode'];
			$iname=$row['iname'];
			$image=$row['image'];
			$qndty=$row['selected_quantity'];
			$tprice=$row['Total_Price'];
			$price=$tprice/$qndty;
			$total+=$tprice;
				?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $iname; ?></td>
					<td><?php echo $qndty; ?></td>
					<td><?php echo $price; ?></td>
					<td><?php echo $tprice; ?></td>
				</tr>	
				<?php
		$count++;
		}
	}
	
?>
		<tr>
			<td></td><td></td><td></td>
			<td><b>Total Bill Amount:</b></td>
			<td><b><?php echo $total; ?></b></td>
		</tr>
</table><br/><br/>
<table border="1" class="shipping">
	<tr>
		<th>Shipping Address</th>
	</tr>
	<?php
	$sql3="SELECT * FROM login WHERE logi_id=$user_id";
	$result=getData($sql3);
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
	?>
	<tr>
		<td>Name: <?php echo $row['uname'];?></td>
	</tr>
	<tr>
		<td>Address: <?php echo $row['Shipping_Address'];?></td>
	</tr>
<?php
}?>
</table>
	<div class="button">
		<a href="fun_confirm.php">Confirm</a>
	</div>
	<div class="backbtn">
		<a href="MyCart.php">Back</a>
	</div>
</body>
</html>