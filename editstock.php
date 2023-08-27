<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
  exit(); 
}
$_SESSION['message']='';
 include 'dbactions.php';
 $id=$_GET['id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/userreg.css">
    <script>
function cancel()
{
    document.forms['rform'].action='adminviewstock.php';
    document.forms['rform'].submit();
}
</script>
</head>
<body>
    <?php
    $sql="SELECT * FROM `addstock` WHERE `icode`='$id'";
    $result = getData($sql);
    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    ?>
    <section>
        <div class="form-container">
            <h1>Edit Stock Details</h1>
            <form class="form"  method="post" name="rform">   
            <div class="alert"><?=$_SESSION['message']?></div>       
                <div class="control">
                    <input type="text" name="name" value="<?php echo $row['iname']; ?>" placeholder="Item name" required="required"/>
                    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" placeholder="Quantity" required="required"/>
                    <input type="number" name="price" value="<?php echo $row['sprice']; ?>"  placeholder="Price" required="required"/>
                    <input type="submit" class="button" id="btnSubmit" name="reg" value="Update"/>
                    <input type="button" value="Cancel" onclick="cancel();"/>
                </div>
            </form>
        </div>
    </section>
    <?php
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['reg']))
    {
        $name=$_POST['name'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $sql="UPDATE `addstock` SET `iname`='$name',`quantity`='$quantity',`sprice`='$price' WHERE `icode`='$id'";
        if(setData($sql)){
            echo "<script>alert('Stock Successfully Updated.'),window.location.href='adminviewstock.php';</script>";
      }
    }
}
?>
</body>
</html>


