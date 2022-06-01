<?php
include("connectioninfo.php");
$query=mysqli_query($con,"select * from student") or die("Error in query");
echo "<table border=2><tr><td>ID</td><td>Name</td><td>Address</td><td>Mobile</td></tr>";
while($row=mysqli_fetch_array($query))
{
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["address"]."</td>";
    echo "<td>".$row["mobile"]."</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>