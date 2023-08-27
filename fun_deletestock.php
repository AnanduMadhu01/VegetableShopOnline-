<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
  exit(); 
}
include_once "dbactions.php"; 
$icode=$_GET['id'];
$sql="DELETE FROM `addstock` WHERE `icode`='$icode'";
if (setData($sql)) {
	echo "<script>alert('Removed Successfully.'),window.location.href='adminviewstock.php';</script>";
}