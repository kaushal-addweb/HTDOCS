<html>
<head>
 <title>Password Verification</title>
</head>
<body>
<br/><br/>
<form method="post" action="#">
 <input type="password" name="pass" />
 <input type="submit" name="sub" value="Verify Password" />
 </form>
</body>
</html>
<?php
//Generate the hash value of the password
$hash = password_hash('1234', PASSWORD_DEFAULT);
echo $hash;
//Check the password value is submitted by the user or not
if(isset($_POST['pass']))
{
 //Read the password submitted by the user
 $password = $_POST['pass'];
 //Check the password is valid or invalid
 if (password_verify($password, $hash)) {
 echo 'Password is valid!';
 } else {
 echo 'Password is invalid.';
 }
}