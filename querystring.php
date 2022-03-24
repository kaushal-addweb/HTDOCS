<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form id="form1" name="form1" method="get">
        First value:<input type="text" name="fvalue" /><br/> 
        Second value:<input type="text" name="svalue" /><br/><br/>
        <input type="submit" name="Add" value="Add" />
    </form>
</body>
</html>
<?php
if(isset($_GET['Add']))
{
    $a=$_GET['fvalue'];
$b=$_GET['svalue'];
echo "<a href=Calc.php?fvalue=$a&svalue=$b&btn1=Add>Edit</a>";
}
?>  