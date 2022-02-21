<?php
session_start();
include "includecon.php";


if($_SESSION['email']=='')
{
header('Location:login.php');

}
else
{
   $id= $_GET['sid'];
   $email=$_SESSION['email'];
   $query1=mysqli_query($con,"Select name from student where email='$email'") or die("Error in Query");
    $row1=mysqli_fetch_array($query1);
echo "hello ".$row1['name'];

$query2=mysqli_query($con,"Select * from student where id='$id'") or die("Error in Query");
    $row2=mysqli_fetch_array($query2);

    $sname=$row2['name'];
    $sadd=$row2['address'];
    $smob=$row2['mobile'];
    $semail=$row2['email'];
    $spass=$row2['password'];

}
?>

<html>
<body>
<form method="post">
name<input type="text" name="name" value="<?php echo $sname ?>">  <br />
address<input type="text" name="address" value="<?php echo $sadd ?>">  <br />
mobile<input type="text" name="mobile" value="<?php echo $smob ?>">  <br />
email<input type="text" name="email" value="<?php echo $semail ?>">  <br />
password<input type="text" name="pass" value="<?php echo $spass ?>">  <br />


<input type="submit" value="Update" name="Update"/>
</body>
</html>
<?php
if(isset($_POST['Update']))
{
    $snam=$_POST['name'];
    $saddd=$_POST['address'];
    $smobi=$_POST['mobile'];
    $smail=$_POST['email'];
    $sspass=$_POST['pass'];

include "includecon.php";

$sql="update student set name='$snam', address='$saddd', mobile='$smobi', email='$smail', password='$sspass' where id ='$id'";
$query=mysqli_query($con,$sql) or die("Error in Query");


if($query)
{
    echo "Data Updated";
    header('Location:selecttable.php');

}
else
{
    echo "Error in updating";
}

mysqli_close($con);
}
?>