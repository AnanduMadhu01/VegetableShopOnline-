<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  exit();
}
include_once "dbactions.php";
$c_id=$_SESSION['user_id'];
$icode= $_GET['pid'];
$image= $_GET['img'];
$selected_quality= $_GET['sq'];
$total= $_GET['tp'];
$bquantity=$_GET['bq'];
$iname=$_GET['iname'];
$sql="INSERT INTO `cart`(`icode`,`iname`, `image`, `logi_id`, `selected_quantity`, `Total_Price`) VALUES
($icode,'$iname','$image',$c_id,$selected_quality,$total)";
if(setData($sql)){
	$sql1="UPDATE `addstock` SET `quantity`= $bquantity WHERE icode='$icode'";
	if(setData($sql1)) {
		echo "<script>alert('Added to cart Successfully.'),window.location.href='MyCart.php';</script>";
	}
	else{
		echo "<script>alert('Failed');</script>";
	}
}
?>