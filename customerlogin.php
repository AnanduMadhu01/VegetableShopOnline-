
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style type="text/css">
        body{
        background-image: url("images/image.jpeg");
        background-repeat: no-repeat; 
        background-position: center;
        background-attachment: fixed; 
        }
    </style>
  
<script>
function cancel()
{
    document.forms['loginform'].action='index.php';
    document.forms['loginform'].submit();
}
function SignUp()
{
    document.forms['loginform'].action='customerreg.php';
    document.forms['loginform'].submit();
}
</script>
<?php
session_start();
$_SESSION['message']='';
$mysql=new mysqli('localhost','root','','vshop');

if($_SERVER['REQUEST_METHOD']=='POST')
{
        $Username=$_POST['username'];
        $Password= $_POST['password'];
         $sql="SELECT * FROM `login` WHERE uname='$Username' && password='$Password'";
          $result=$mysql->query($sql);
          if ($result->num_rows > 0) 
          {
            while($row = $result->fetch_assoc()) {
                 $_SESSION['user']= $row["uname"];
                 $_SESSION['user_id'] =$row["logi_id"];
                    }
            if(isset($_SESSION['username'])){
                $url="customerpage.php";
                header('Location:' .$url);
                exit(); 
                
            }
            else if(isset($_POST['username'])){
                $username=$_POST['username'];
                $url="customerpage.php";
                header('Location:' .$url);
                exit();
            }
          } 
          else
          {
            $_SESSION['message']="Incorrect Username or password!";
          }
}
?>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header" >
                <h3 align="center" style="color:white"><b>CUSTOMER LOGIN!</b></h3>
            </div>
            <div class="card-body">
                <form name="loginform" method="POST" action="">
                <div class="alert alert-error" style="color:red"><?=$_SESSION['message']?></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="username" required>
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="button" name="btncancal" value="Cancel"  class="btn float-left cancel_btn" onclick=cancel()>
                    </div>
                    <div class="form-group">
                        <input type="button" name="btnsignup" value="SignUp"  class="btn float-left login_btn" onclick=SignUp()>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
        </div>
    </div>
</div>
</body>
</html>