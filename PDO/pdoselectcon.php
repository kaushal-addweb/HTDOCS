<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=SampleDB", "root", "");
	$add='jaipur';
    $sql = 'SELECT * FROM student where address= :address';
	//echo $sql;
	$query = $pdo -> prepare($sql);
	$query -> bindParam(':address', $add, PDO::PARAM_STR);
    //$q = $pdo->query($sql);
	$query -> execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
	while($row=$query->fetch())
	{
		echo $row['id']." ".$row["name"]." ".$row['address']." ".$row['mobile']." "."<br>";
		
	}
} catch (PDOException $e) {
    die("Could not connect to the database :" . $e->getMessage());
}
?>