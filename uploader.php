<?php
error_reporting(0);

  if (isset($_POST['upload'])) {
  
    $filepath = "images/" . $_FILES["fileTo"]["name"];
    echo $filepath;

    if(move_uploaded_file($_FILES["fileTo"]["tmp_name"], $filepath)) 
    {
    echo "<img src=".$filepath." height=200 width=300 />";
    } 
    else 
    {
    echo "Error !!";
    }
  }
  //$result = mysqli_query($db, "SELECT * FROM image");
?>