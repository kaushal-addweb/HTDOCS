<?php 
session_start();
include "conn.php";
echo "hello";

// if(!$_SESSION['email'])
// {
// 	header('Location:index.php');
// }

$q="SELECT * FROM student";
$result=mysqli_query($conn,$q);
while($row=mysqli_fetch_array($result))
				{
					$id=$row['id'];
					$name=$row['name'];
					$address=$row['address'];
					$mob=$row['mobile'];
				}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Show</title>
</head>
<body>
	<form>
		<table align="center" border="2">
			<tr>
				<th>ID</th>
				<th>Fullname</th>
				<th>Address</th>
				<th>Mobile</th>
				<th>Action</th>
			</tr>


						<tr>
							<td><?php echo $id ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $address; ?></td>
							<td><?php echo $mob; ?></td>
							<th><a href="delete.php?id=<?php $row['id']; ?>" style="text-decoration: none; color: red;">DELETE</a></th>
							<th><a href="edit.php?id=<?php $row['id']; ?>" style="text-decoration: none; color: red;">EDIT</a></th>
						</tr>
		</table>
	</form>
</body>
</html>