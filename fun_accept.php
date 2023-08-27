<?php
session_start();
if(!isset($_SESSION['staff'])){
  header("Location: index.php");
  exit();
}
  include_once "dbactions.php";
  $staff_id=$_SESSION['staff'];
  $o_id=$_GET['id'];
  $sql="UPDATE `oreders` SET `staff_id`=$staff_id WHERE `slno`=$o_id";
  if(setData($sql)){
  	echo "<script>alert('Accepted Successfully.'),window.location.href='accepted_list.php';</script>";
  }
?>