<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
  exit(); 
}
?>

<?php
include_once "dbactions.php"; 
$sql = "SELECT * FROM addstock";
$result = getData($sql);

?>
<html>
<head>
<title>Project</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
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
<center><table id="dataTable" width="100%" cellspacing="0" cellpadding="15">
                  <thead>
                    <tr>
                      <th><h4>Sl.no</h4></th>
                      <th><h4>ITEM CODE</h4></th>
                      <th><h4>ITEM NAME</h4></th>
                      <th><h4>QUANTITY</h4></th>
                      <th><h4>SELLING PRICE</h4></th>
                    </tr>
                    <tr>
    <?php
    $i=0;
while($row = mysqli_fetch_array($result)) 
{
?> 
  <td> <center><?php ++$i;echo $i; ?>  </td>
  <td> <center><?php echo $row["icode"]; ?>  </td>  
  <td><center><?php echo $row["iname"]; ?> </td>
  <td> <center><?php echo $row["quantity"]; ?>  </td> 
  <td><center><?php echo $row["sprice"]; ?> </td>
      
 <td><center> <a href="editstock.php?id=<?php echo $row["icode"]; ?>">EDIT</a></center></td>
  <td><center><a href="fun_deletestock.php?id=<?php echo $row["icode"]; ?>">DELETE</a></center></td>
</tr>  
<?php
}
?>
  </table>
</center>
</body>
</html>