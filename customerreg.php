<?php
session_start();
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
    document.forms['rform'].action='index.php';
    document.forms['rform'].submit();
}
</script>
</head>


<body>
    <section>
        <div class="form-container">
            <h1>Signup </h1>
            <form class="form"  method="post" name="rform">   
            <div class="alert"><?=$_SESSION['message']?></div>       
                <div class="control">
                    <input type="text" name="fname" placeholder="First Name" required="required" pattern="[a-zA-Z\s]{2,20}" title="Enter the valid  Name!"/>
                    <input type="text" name="lname" placeholder="SurName" required="required" pattern="[a-zA-Z\s]{1,20}" title="Enter the valid  Name!" />
                    <input type="number" name="mob" placeholder="Mob No:" required="required"/>
                    <input type="text" name="username"  placeholder="Username" id="username" required="required"></span> 
                    <input type="password" name="pass" placeholder="Password" required="required"/>
                    <input type="submit" class="button" id="btnSubmit" name="reg" value="Register"/>
                    <input type="button" value="Cancel" onclick="cancel();"/>
                </div>
            </form>
                <p> have an account? <a href="customerlogin.php"   style="color:blue">Login</a></p>
        </div>
    </section>
    <?php
$mysql=new mysqli('localhost','root','','vshop');
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['reg']))
    {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $Password=$_POST['pass'];
    $mob=$_POST['mob'];
    $sql="INSERT INTO `login`( `FNAME`, `LNAME`,`Phone_No`, `uname`, `password`) VALUES 
         ('$fname','$lname',$mob,'$username','$Password')";
         echo $sql;
          if($mysql->query($sql)==true)
          {
            $_SESSION['message']="Registration successfull!";
            echo "<script>alert('Registration successfull'),window.location.href='customerlogin.php';</script>";
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


