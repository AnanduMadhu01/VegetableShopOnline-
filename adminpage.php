
<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/style.css">
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
  <li><a href="adminpage.php">HOME</a></li>
  <li class="dropdown" style="float:left;" >
    <a href="javascript:void(0)" class="dropbtn">STOCK</a>
    <div class="dropdown-content">
      <a href="adminaddstock.php">ADD STOCK</a>
      <a href="adminviewstock.php">VIEW STOCK </a>
      <li class="dropdown" style="float:left;" >
    <a href="javascript:void(0)" class="dropbtn">SALES RETURN</a>
    <div class="dropdown-content">
      <a href="AdminViewReturnedItem.php">VIEW RETURNED ITEM</a>
      <a href="AdminViewDeliveredItem.php">VIEW DELIVERED ITEM</a>
      <a href="AdminViewOrderedItem.php">VIEW ORDERED ITEM</a>
      <li class="dropdown" style="float:left;" >
        <a href="javascript:void(0)" class="dropbtn">STAFF DETAILS</a>
        <div class="dropdown-content">
        <a href="staffRegistration.php">ADD STAFF</a>
        <a href="remove_user.php">DELETE STAFF</a>
        <a href="staffview.php">VIEW STAFF</a>
      <li class="dropdown" style="float:left;" >
    <a href="javascript:void(0)" class="dropbtn">CUSTOMER</a>
    <div class="dropdown-content">
      <a href="customerview.php">VIEW </a>
      <li style="float: right;"><a href="logout.php">LOGOUT</a></li>
    </div>
  </li>
</ul>
</body>
</html>
