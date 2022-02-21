<html>
<body>
<form method="post">
email<input type="text" name="email">  <br />
password<input type="text" name="pass">  <br />


<input type="submit" value="Login" name="Login"/>
</body>
</html>
<?php
if(isset($_POST['Login']))
{
$semail=$_POST['emai'];
$spass=$_POST['pass'];

include "includecon.php";

$sql="Select * from student where email='$semail' and password='$spass'";
$query=mysqli_query($con,$sql) or die("Error in Query");
$rows=mysqli_num_rows($query);

if($rows>0)
{
    session_start();
    $_SESSION['email']=$semail;
    header('Location:selecttable.php');
    //echo "Login Success";

}
else
{
    echo "Incorrect Username or password";
}


mysqli_close($con);
}
?>