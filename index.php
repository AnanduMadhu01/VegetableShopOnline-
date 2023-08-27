<?php
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
  <li><a href="index.php">HOME</a></li>
  <li><a href="history.php">ABOUT US</a></li>
  <li><a href="contact.php">CONTACT US</a></li>
  <li class="dropdown" style="float:right" >
    <a href="javascript:void(0)" class="dropbtn">SIGN IN</a>
    <div class="dropdown-content">
      <a href="adminlogin.php">Admin</a>
      <a href="customerlogin.php">Customer</a>
      <a href="stafflogin.php">Staff</a>
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
      <a href="customerlogin.php">Buy</a>
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
