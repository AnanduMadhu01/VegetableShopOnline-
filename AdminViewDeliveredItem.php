
<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
  exit();
}
include 'dbactions.php';
?>
<html>
<head>
<title>
Project</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
  a{
  text-decoration: none;
 } 
 a:hover {
  text-decoration: underline;
 }
 .backbttn a {
   text-decoration: none;
   padding: 10px;
   background-color: #000;
   color: #fff;
   border-radius: 5px;
   position: fixed;
   top: 90%;
   left: 90%;
 }
 span{
  color: red;
 }
 table{
  width: 1000px;
  margin: auto;
  border: 1px solid black;
  border-collapse: collapse;
  margin-top: 20px;
 }
</style>
</head> 
<body bgcolor="lightgrey">
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
  <div class="backbttn">
    <a href="admpage.php">Back</a>
  </div>
<center><table border="1">
                    <tr>
                      <th>SL NO</th>
                      <th><h4>CUSTOMER NAME</h4></th>
                      <th><h4>ADDRESS</h4></th>
                      <th><h4>PRODUCTS</h4></th>
                      <th><h4>QUANTITY</h4></th>
                      <th><h4>STATUS</h4></th>
                    </tr>
                    <tr>
    <?php
    $sql="SELECT * FROM `oreders` WHERE `status`='Delivered'";
    $result = getData($sql);
    if($result->num_rows > 0) {
      $count=1;
      while($row = $result->fetch_assoc())
{
?> 
    <td><center><?php echo $count; ?></center></td>
    <td><center><?php echo $row["customer_name"]; ?></center> </td>
    <td><?php echo $row["address"]; ?></td> 
    <td><center><?php echo $row["product_name"]; ?></center></td>
    <td> <center><?php echo $row["quantity"]; ?></center></td> 
    <td> <center><span><?php echo $row["status"]; ?></span></center></td> 
 </tr>  
<?php
$count++;
}
}
?>
  </table>
</center>
</body>
</html>