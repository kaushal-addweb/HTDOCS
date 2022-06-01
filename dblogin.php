<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert data</title>
</head>
<body>
    <form method="post">
        UserName:<input type="text" name="username" /><br />
        Password:<input type="text" name="password" /><br />
        <input type="submit" name="Login" value="Login" />
    </form>
</body>
</html>
<?php
if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
$con=mysqli_connect("localhost","root","","SampleDB") or die("Error in Connection");
$query=mysqli_query($con,"select * from login where username='$username' and password='$password'") or die("Error in query");

$rows=mysqli_num_rows($query);
if($rows>0){
    echo "Login Successful";
}
else{
    echo "Incorrect Username or password";
}

mysqli_close($con);
}
?>