<?php
$a=$_REQUEST['fvalue'];
$b=$_REQUEST['svalue'];

if(isset($_REQUEST['Add']))
{
$c=$a+$b;
echo "The total is ".$c;
}
else if(isset($_REQUEST['Subtract']))
{
$c=$a-$b;
echo "The total is ".$c;
}
else if(isset($_REQUEST['Multiply']))
{
$c=$a*$b;
echo "The total is ".$c;
}
else if(isset($_REQUEST['Divide']))
{
$c=$a/$b;
echo "The total is ".$c;
}
?>