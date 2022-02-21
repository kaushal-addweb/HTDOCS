<html>
<body>
<form method="get">
Id: <input type="text" name="id">  <br />
Name: <input type="text" name="name" /><br/>
Address<input type="text" name="add">  <br />
Mobile<input type="text" name="mob">  <br />
email<input type="text" name="emai">  <br />
password<input type="text" name="pass">  <br />


<input type="submit" value="Insert" name="Insert"/>
</body>
</html>
<?php
if(isset($_GET['Insert']))
{
$sid=$_GET['id'];
$sname=$_GET['name'];
$saddress=$_GET['add'];
$smobile=$_GET['mob'];
$semail=$_GET['emai'];
$spass=$_GET['pass'];

error_reporting(0);

$con=mysqli_connect("localhost:3306","root","","practise") or die("Error in Connection");

$query=mysqli_query($con,"Insert into student(id,name,address,mobile,email,password) values($sid,'$sname','$saddress',$smobile,'$semail','$spass')") or die("Error in Query");

if($query)
{
    echo "data Inserted";

}
else
{
    echo "Error in Inserting";
}


mysqli_close($con);
}
?>