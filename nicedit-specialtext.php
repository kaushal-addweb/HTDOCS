<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert data</title>
    <script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
</head>

<body>
    <form method="post">
        Id:<input type="text" name="id" required="Enter Value" /><br />
        Name:<input type="text" name="name" /><br />
        Address:<textarea rows="10" cols="30" name="address"></textarea><br />
        Mobile:<input type="text" name="mobile" /><br />
        <input type="submit" name="Insert" value="Insert Data" />
    </form>
</body>
</html>

<?php
if (isset($_POST['Insert'])) {
    $con = mysqli_connect("localhost", "root", "", "SampleDB") or die("Error in Connection");

    $id = mysqli_real_escape_string($con,$_POST['id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    
    $abc="Insert into student values($id,'$name','$address',$mobile)";
    echo $abc;
    $query = mysqli_query($con,$abc ) or die("Error in Query");
    if ($query) {
        echo "<script>alert('Data Inserted');</script>";
    } else {
        echo "<script>alert('Error in Inserting');</script>";
    }

    mysqli_close($con);
}
?>