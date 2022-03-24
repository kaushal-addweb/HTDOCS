<?php
session_start();
include "includecon.php";


if($_SESSION['email']=='')
{
header('Location:login.php');

}
else
{
   $email= $_SESSION['email'];

   $query1=mysqli_query($con,"Select name from student where email='$email'") or die("Error in Query");

    $row1=mysqli_fetch_array($query1);

echo "hello ".$row1['name'];


$query=mysqli_query($con,"Select * from student") or die("Error in Query");

echo "<table border=3><tr><td>id</td><td>name</td><td>address</td><td>mobile</td><td>email</td><td>password</td><td>Edit</td><td>Delete</td></tr>";
while($row=mysqli_fetch_array($query))
{
    $sid=$row['id'];
    echo "<tr>";
    echo "<td>".$sid."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['mobile']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['password']."</td>";
    echo "<td><a href=update.php?sid=$sid>Edit</a></td>";
    echo "<td><a href=Delete.php?sid=$sid>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
}
?>