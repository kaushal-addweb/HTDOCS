<?php

class Calc
{
    function add($a,$b)
    {
        $c=$a+$b;
        echo "the total is ".$c."<br/>";
    }
    function sub($a,$b)
    {
        $c=$a-$b;
        echo "the difference is ".$c."<br/>";
    }
    function multiply($a,$b)
    {
        $c=$a*$b;
        echo "the product is ".$c."<br/>";
    }
}
$cal=new Calc();
$cal->add(5,3);
$cal->sub(5,3);
$cal->multiply(5,3);
?>