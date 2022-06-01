<?php
$con=mysqli_connect("localhost","root","","SampleDB") or die("Error in Connection");
$query=mysqli_query($con,"delete from student where id=4") or die("Error in Query");
if($query)
{
    echo "<script>alert('Data Deleted');</script>";
}
else
{
    echo "<script>alert('Error in Deleting');</script>";
}

mysqli_close($con);
?>