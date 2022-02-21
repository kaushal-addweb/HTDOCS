<?php 

include "conn.php";

$id=$_GET['id'];

$q="DELETE FROM student where id=".$id;

header('Location: data.php');

?>