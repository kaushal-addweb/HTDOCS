<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="form1" name="form1" method="post">
        First value:<input type="text" name="fvalue" /><br/> 
        Second value:<input type="text" name="svalue" /><br/><br/>
        <input type="submit" name="Add" value="Add" />
        <input type="submit" name="Subtract" value="Subtract" />
        <input type="submit" name="Multiply" value="Multiply" />
        <input type="submit" name="Divide" value="Divide" /><br/><br/>
    </form>
</body>
</html>
<?php
if(isset($_REQUEST['Add']))
{
    $a=$_REQUEST['fvalue'];
$b=$_REQUEST['svalue'];
$c=$a+$b;
echo "The total is ".$c."<br/><br/>";
echo "<a href=Calc.php?fvalue=$a&svalue=$b&btn1=Add>Edit</a>";
}
else if(isset($_REQUEST['Subtract']))
{
    $a=$_REQUEST['fvalue'];
$b=$_REQUEST['svalue'];
$c=$a-$b;
echo "The total is ".$c;
}
else if(isset($_REQUEST['Multiply']))
{
    $a=$_REQUEST['fvalue'];
$b=$_REQUEST['svalue'];
$c=$a*$b;
echo "The total is ".$c;
}
else if(isset($_REQUEST['Divide']))
{
    $a=$_REQUEST['fvalue'];
$b=$_REQUEST['svalue'];
$c=$a/$b;
echo "The total is ".$c;
}
?>