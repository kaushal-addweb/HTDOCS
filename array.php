<?php
error_reporting(0);		// TO Hide all warnings, errors and notices.
ob_start();

$d=$_GET['text1'];
$a=array("Amit","Atul","Rahul","Shobit");

print_r($a);
$b=10;
$c="Aaqib";

var_dump($f); //Print datatype of variable
var_dump($c);
var_dump($a);

if($b==10)
{
	header('Location:Multibtn.php');  // transfer to another page
}
echo "<a href=''>Link</a>";
?>