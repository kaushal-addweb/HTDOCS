
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- star link-->
    
    <!-- end-->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    <style>
        body{
  margin: 0;
  padding: 0;
  background: url(img/bg1.jpg) no-repeat;
  background-size: cover;
  /*background-image: linear-gradient(to right, skyblue , #e0c870);*/
}
    .select, .slc{
      background: none;
      font-size: 20px;
      border: none;
      border: 2px solid orange;
      border-radius: 5px;
      padding: 5px;
      margin-left: 300px;
    }
    #grace img{
      filter: grayscale(100%);
    }
    
    </style>

</head>
<body>
   <!-- Start Navbar -->
   
<!-- navbar ends -->

</head>
<body>
	<br><br>
<form method="POST">

<div class="container mt-5" style="width:40%; ">
  <div class="row">
	<h2 class="p-2 mb-3" style="border-bottom:5px solid green; width: 20%;">Log in</h2>
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  
 <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><font style="color:red; border:none; font-size:20px;">If not Register ?</font><a href="register.php" style="text-decoration:none; color:blue;">Click Here</a></label>
    <div id="emailHelp" class="form-text"></div>
  </div>
  
  <input type="submit" name="login" value="Log in" class="btn btn-success">
</div>
</div>
</form>
</div>
</body>
</html>

<?php 
include "conn.php";
error_reporting(0);
if(isset($_POST['login']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];

  $query="SELECT email,password FROM student WHERE email='$email' AND password='$password'";
  //echo $query;
  $result=mysqli_query($conn,$query) or die("Error in Query");

  //print_r ($result);
  
  $rows = mysqli_num_rows($result);
  //echo $rows;
   if($rows > 0)
   {
     session_start();
      $_SESSION['email'] = $email;
      header('Location:data.php');
      //echo "welcome";
   }
   else
   {
     echo "<br><br><center><b>Email and Password are Wrong</b></center>";
   }
   
}

?>