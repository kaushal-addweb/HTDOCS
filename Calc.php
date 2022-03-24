<?php
$a=$_REQUEST['fvalue'];
$b=$_REQUEST['svalue'];

if($_REQUEST['btn1']=='Add')
{
$c=$a+$b;
echo "The total is ".$c;
}
else if($_REQUEST['btn1']=='Subtract')
{
$c=$a-$b;
echo "The total is ".$c;
}
else if($_REQUEST['btn1']=='Multiply')
{
$c=$a*$b;
echo "The total is ".$c;
}
else if($_REQUEST['btn1']=='Divide')
{
$c=$a/$b;
echo "The total is ".$c;
}
?>