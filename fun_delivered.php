<?php
session_start();
if(!isset($_SESSION['staff'])){
  header("Location: index.php");
  exit();
}
  include_once "dbactions.php";
  $staff_id=$_SESSION['staff'];
  $o_id=$_GET['id'];
  $sql="UPDATE `oreders` SET `status`='Delivered' WHERE `slno`=$o_id";
  if(setData($sql)){
  	echo "<script>alert('Deliver Successfull.'),window.location.href='deliveredlist.php';</script>";
  }
?> 