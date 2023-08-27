<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
  exit();
}
$_SESSION['message']='';
 include 'dbactions.php';
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
    document.forms['rform'].action='adminpage.php';
    document.forms['rform'].submit();
}
</script>
<style >
    select{
        width: 320px;
        height: 40px;
    }
</style>
</head>
<body>
    <section>
        <div class="form-container">
            <h1>REMOVE STAFF</h1>
            <form class="form"  method="post" name="rform">   
            <div class="alert"><?=$_SESSION['message']?></div>       
                <div class="control">
                    <select name="select">
                    <?php
                    $sql1="SELECT * FROM `staff_login`";
                    $res=getData($sql1);
                    if($res->num_rows >0){
                       while ($row=$res->fetch_assoc()) {
                        ?>
                        <option><?php echo $row['sid'];?></option>
                        <?php
                        } 
                    }
                    ?> 
                    </select>
                     <input type="submit" class="button" id="btnSubmit" name="srh" value="search"/>
    <?php
        $mysql=new mysqli('localhost','root','','vshop');
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            if(isset($_POST['srh']))
            {
                $id=$_POST['select'];
                $_SESSION['id']=$_POST['select'];
                $sql="SELECT * FROM staff_login WHERE sid=$id";
                $result=getData($sql);
                if($result->num_rows >0)
                {
                    $row=$result->fetch_assoc();
                    ?>
                    <input type="text" name="name" placeholder="name" value="<?php echo $row['staff_name'];?>" required="required" pattern="[a-zA-Z\s]{2,20}" title="Enter the valid  Name!"/>
                    <input type="number" name="mob" placeholder="Mob No:" value="<?php echo $row['phone_no']; ?>" required="required"/>
                    <input type="text" name="username"  placeholder="Username" value="<?php echo $row['username'];?>"id="username" required="required"></span> 
                    <input type="password" name="pass" placeholder="Password" value="<?php echo $row['password']; ?>" required="required"/>
                    <input type="submit" class="button" id="btnSubmit" name="remove" value="REMOVE"/>
                    <?php
                }
            }
                    ?>
                    <input type="button" value="Cancel" onclick="cancel();"/>
                </div>
            </form>
        </div>
    </section>
            <?php    
    if(isset($_POST['remove']))
    {
        $id=$_SESSION['id'];
    $sql="DELETE FROM `staff_login` WHERE `sid`=$id";
    echo $sql;
          if($mysql->query($sql)==true)
          {
            $_SESSION['message']="Deleted successfully!";
            echo "<script>alert('Deleted successfully'),window.location.href='adminpage.php';</script>";
          }
          else
          {
            $_SESSION['message']="Registration Failed!";
          }
    }
}
?>
</body>
</html>


