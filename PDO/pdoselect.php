<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=practise", "root", "");

    $sql = 'SELECT * FROM student';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
	while($row=$q->fetch())
	{
		//echo $row['id']." ".$row["name"]." ".$row['address']." ".$row['mobile']." "."<br>";
		echo "{$row['id']} - {$row['name']} - {$row['address']} - {$row['mobile']} <br>";
	}
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>