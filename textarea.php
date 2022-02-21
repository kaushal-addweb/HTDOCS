<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <textarea rows="5" cols="10" name="texta"></textarea>
        <input type="submit" name="submit"></input>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    echo $_POST['texta'];
}
?>