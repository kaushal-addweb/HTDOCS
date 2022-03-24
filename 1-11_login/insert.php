<?php 
// error_reporting = E_ALL | E_STRICT
// display_errors = On
// display_startup_errors = On

include 'conn.php';

if(isset($_POST['register']))
{
	$fullname=$_POST['fullname'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];

	echo $q=INSERT INTO student (fullname,password,email,mobile) VALUES ('$fullname','$password','$email','$mobile');
	$result=mysqli_query($conn,$q);
	
	if(!$result)
	{
		echo "record inserted";
	}
	else
	{
		echo "not inserted record";
	}


}

?>