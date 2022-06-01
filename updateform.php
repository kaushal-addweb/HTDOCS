<?php
$id=1;
$con=mysqli_connect("localhost","root","","SampleDB") or die("Error in Connection");
$query=mysqli_query($con,"select * from student where id=$id") or die("Error in query");
while($row=mysqli_fetch_array($query))
{
    $sid=$row["id"];
    $sname=$row["name"];
    $saddress=$row["address"];
    $smobile=$row["mobile"];
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert data</title>
</head>

<body>
    <form method="post">
        Id:<input type="text" name="id" value="<?php echo $sid ?>" /><br />
        Name:<input type="text" name="name" value="<?php echo $sname ?>" /><br />
        Address:<input type="text" name="address" value="<?php echo $saddress ?>" /><br />
        Mobile:<input type="text" name="mobile" value="<?php echo $smobile ?>" /><br />
        <input type="submit" name="Update" value="Update Data" />
    </form>
</body>
</html>

<?php
if (isset($_POST['Update'])) {
    $pid=$_POST['id'];
    $pname = $_POST['name'];
    $paddress = $_POST['address'];
    $pmobile = $_POST['mobile'];
    $con = mysqli_connect("localhost", "root", "", "SampleDB") or die("Error in Connection");
    $query = mysqli_query($con, "update student set name='$pname',address='$paddress', mobile=$pmobile where id=$pid") or die("Error in Query");
    if ($query) {
        echo "<script>alert('Data Updated');</script>";
    } else {
        echo "<script>alert('Error in Updating');</script>";
    }

    mysqli_close($con);
}
?>