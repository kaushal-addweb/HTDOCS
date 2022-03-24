<html>
<head>
<title>PHP CURD Operation using PDO Extension  </title>
</head>
<body>
<h3>Insert Record | PHP CRUD Operations using PDO Extension</h3>
<form name="insertrecord" method="post">
Id: <input type="text" name="id" required><br/>
Name:<input type="text" name="name" required><br/>
Address:<input type="text" name="address" required><br/>
Mobile:<input type="text" name="mobile" maxlength="10" required><br/>
<input type="submit" name="insert" value="Submit"><br/>
</form>
</body>
</html>

<?php
if(isset($_POST['insert']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
try {
    $pdo = new PDO("mysql:host=localhost;dbname=practise", "root", "");
    $sql = 'insert into student(id, name, address, mobile) values(:id,:name,:address,:mobile)';
	$query = $pdo -> prepare($sql);
	$query -> bindParam(':id', $id, PDO::PARAM_STR);
	$query -> bindParam(':name', $name, PDO::PARAM_STR);
	$query -> bindParam(':address', $address, PDO::PARAM_STR);
	$query -> bindParam(':mobile', $mobile, PDO::PARAM_STR);
    //$q = $pdo->query($sql);
	$query -> execute();
	$lastInsertId=$pdo->lastInsertId();
	if($lastInsertId!="")
	{
		echo "Data Inserted Successfully";
	}
	else
	{
		echo "Error in Inserting";
	}
    //$query->setFetchMode(PDO::FETCH_ASSOC);
	// while($row=$query->fetch())
	// {
		// echo $row['id']." ".$row["name"]." ".$row['address']." ".$row['mobile']." "."<br>";
		
	// }
} catch (PDOException $e) {
    die("Could not connect to the database :" . $e->getMessage());
}
}
?>