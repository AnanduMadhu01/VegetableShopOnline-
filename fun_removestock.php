<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  exit();
}
include_once "dbactions.php";
$icode=$_GET['icode'];
$qndty=$_GET['qlty'];
$sql="SELECT * FROM addstock WHERE icode=$icode";
$result = getData($sql);
  if($result->num_rows > 0) {
  	$row = $result->fetch_assoc();
  	$orginal_quantity=$row['quantity']+$qndty;
  	}
 $sql1="UPDATE `addstock` SET `quantity`=$orginal_quantity WHERE `icode`=$icode";
 if(setData($sql1)) {
 	$sql2="DELETE FROM `cart` WHERE `icode`=$icode AND `selected_quantity`=$qndty";
 	if(setData($sql2)) {
 		header("location:MyCart.php");
 	}
 }
?>