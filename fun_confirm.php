<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  exit();
}
  include_once "dbactions.php";
  $user_id=$_SESSION["user_id"];
  ?>
  <?php
  $sql="SELECT * FROM login WHERE logi_id='$user_id'";
  $result=getData($sql);
if($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$address = $row['Shipping_Address'];
	$name = $row['FNAME'];
}
  $sql1="SELECT * FROM cart WHERE logi_id='$user_id'";
	$result=getData($sql1);
	if($result->num_rows > 0)
	{
		$total=0;
		while($row = $result->fetch_assoc()) {
			
			$icode=$row['icode'];
			$iname=$row['iname'];
			$image=$row['image'];
			$qndty=$row['selected_quantity'];
			$tprice=$row['Total_Price'];
			$price=$tprice/$qndty;
			$total+=$tprice;
			$sql2="INSERT INTO `order_detailes`(`icode`, `iname`, `image`, `logi_id`,`c_name`,`shipping_address`, `quantity`, `price`) VALUES ($icode,'$iname','$image',$user_id,'$name','$address',$qndty,$tprice)";
			if(setData($sql2)){
				$sql3="DELETE FROM `cart` WHERE logi_id=$user_id";
				setData($sql3);
			}
		}
	}
	$sql4="SELECT * FROM `order_detailes` WHERE `logi_id`=$user_id AND `staff_id`=0";
      $result = getData($sql4);
      if($result->num_rows > 0) {
        $all_item="";
        $t_qndty=0;
        $t_price=0;
        
        while($row = $result->fetch_assoc()) {
          $all_item=$all_item.','.$row['iname'].'('.$row['quantity'].'Kg)';
          $t_qndty=$t_qndty+$row['quantity'];
          $t_price=$t_price+$row['price'];
          $cname=$row['c_name'];
          $address=$row['shipping_address'];
          $count++;
        }
        $sql5="INSERT INTO `oreders`(`logi_id`,`customer_name`, `address`, `product_name`, `quantity`, `total_price`) VALUES ($user_id,'$cname','$address','$all_item',$t_qndty,$t_price)";
        if(setData($sql5)){
        	$sql6="UPDATE `order_detailes` SET `staff_id`=1 WHERE logi_id=$user_id";
        	if(setData($sql6)){
				echo "<script>alert('Your Order is successfull'),window.location.href='MyOrder.php';</script>";
			}
		}
	}
