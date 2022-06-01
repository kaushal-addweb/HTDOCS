<?php
$con=mysqli_connect("localhost","root","","SampleDB") or die("Error in Connection");
$query=mysqli_query($con,"update student set name='Arun Kumar',address='Station Road, Ahmedabad', mobile=7894561230 where id=3") or die("Error in Query");
if($query)
{
    echo "<script>alert('Data Updated');</script>";
}
else
{
    echo "<script>alert('Error in Updating');</script>";
}

mysqli_close($con);
?>