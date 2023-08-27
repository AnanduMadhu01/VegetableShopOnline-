<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
  exit();
}
include_once "dbactions.php";
?>
<html>
<head>
<title>
STOCK</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
  body{
  	background-color: #000;
    background-image: url("images/stock.jpg");
    background-repeat: no-repeat; 
    background-position: center;
    background-attachment: fixed; 
  }
  a{
  	text-decoration: none;
  	padding:2px 5px;
  	background-color: #fff;
  	color: #000;
  }
   </style>

</head>
<body bgcolor="lightgrey" text="white">
<center><br><br><br>
<h1>&nbsp;&nbsp;ADD&nbsp;&nbsp;NEW &nbsp;&nbsp;STOCK</h1>
<br><br>
<form method="post" name="form" enctype="multipart/form-data">
<table align="center">
<tr><th align="left"><h4>ITEM CODE</h4></th><td></td><td align="left"><input type="text" name="icode" required></td></tr>
<tr><th align="left"><h4>ITEM NAME </h4></th><td></td><td align="left"><input type="text" name="iname" required></td></tr>
<tr><th align="left"><h4>QUANTITY </h4></th><td></td><td align="left"><input type="text" name="quantity" required></td></tr>
<tr><th align="left">SELLING PRICE<h4> </h4></th><td></td><td align="left"><input type="text" name="sprice" required></td></tr><td></td><td></td>
<tr><th align="left">UPLOAD IMAGE<h4> </h4></th><td></td><td align="left"><input type="file" name="image" value="" enctype="multipart/form-data"></td></tr>
<tr><td colspan="100%"></td></tr><tr><td colspan="100%"></td></tr>
<tr><td align="center" colspan="10">
	<input type="submit" name="submit" value="ADD">
	<a href="adminpage.php">Back</a> </td></tr>
</table>
</form>
</center>

</body>
</html>
  
<?php
if(isset($_POST['submit']))
{
$icode=$_POST['icode'];
$image=$_FILES['image']['name'];
$iname=$_POST['iname'];
$quantity=$_POST['quantity'];
$sprice=$_POST['sprice'];
$qry="INSERT INTO addstock(icode,image,iname,quantity,sprice)VALUES('$icode','$image','$iname','$quantity','$sprice')";
if(setData($qry))
{
	move_uploaded_file($_FILES['image']['tmp_name'],"images/$image");
    echo" item Added Successfully<br>";
   
 }
else
{
 echo"Try Again:<hr>".mysqli_error($conn);
 header("refresh:5;url=adminaddstock.php");
}
}
?>

