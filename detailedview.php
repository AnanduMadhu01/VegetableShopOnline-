<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  exit();
}
  include_once "dbactions.php";
  $icode=$_GET['id'];
  $user_id=$_SESSION['user_id'];

?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="css/detailedview.css">
   <script>
     function cancel()
    {
        document.forms['dform'].action='customerpage.php';
        document.forms['dform'].submit();
    }
   </script>
</head>
<body>

<ul>
  <li><a href="customerpage.php">HOME</a></li>
  <li><a href="MyCart.php">MY CART</a></li>
  <li><a href="MyOrder.php">MY ORDERS</a></li>
  <li style="float: right;"><a href="logout.php">LOGOUT</a></li>
    </div>
  </li>
</ul>
  <?php
  $sql="SELECT * FROM addstock WHERE icode='$icode'";
  $result = getData($sql);
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if(isset($_POST['btngetprice'])){
        $selected_quality=$_POST['soption'];
        $price=$row['sprice'];
        $totalp=$selected_quality*$price;
      }
  ?>

<div class="wrapper">
  <div class="image">
    <img src="images/<?php echo $row['image'];?>">
  </div>
  <div class="discription">
    <form name="dform" method="post">
      <br/><br/>
      <label><?php echo $row['iname'];?></label><br/><br/>
      <label>Today's Price: <span>&#8377;<?php echo $row['sprice'];?></span>/Kg</label><br/><br/>
      <label>Stock Left: <?php echo $row['quantity'];?> kg</label><br/><br/>
      <label>select quantity: </label>
      <select name="soption" required="required">
        <?php
          $count=1;
          $total=$row['quantity'];
          while ($count<=$total) {
           echo "<option value=$count>$count</option>";
           $count++;
          }
        ?>
      </select><br/><br/>
      <label>total price: </label><input type="text" name="price" placeholder=0 value="<?php if(isset($totalp)) echo $totalp; ?>" disabled><br/>
      <div class="price"><input type="submit" name="btngetprice" value="get price"></div>
      
    </form>
    
    <form method="post">
      <div class="sub"><input type="button" name="btncancel" onclick="cancel();" value="Cancel"/></div>
      </form>
      <?php
        if (isset($totalp)) {
          $image=$row['image'];
          $oq=$row['quantity'];
          $iname=$row['iname'];
          $bquantity=$oq-$selected_quality;
          ?>
            <div class="sub"><a href="fun_addtocart.php?pid=<?php echo $icode; ?>&img=<?php echo $image; ?>&sq=<?php echo $selected_quality;?>&tp=<?php echo $totalp;?>&bq=<?php echo $bquantity;?>&iname=<?php echo $iname;?>">Add to cart</a></div>
          <?php
        }
      ?>
  </div>
  <div class="clear"></div>
</div>
<?php
    }
  }
?>
</body>
</html>
