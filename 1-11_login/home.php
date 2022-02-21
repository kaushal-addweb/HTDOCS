<?php 
session_start();
include "conn.php";

if(!$_SESSION['email'])
{
	header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>home pages</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>	
</body>
</html>