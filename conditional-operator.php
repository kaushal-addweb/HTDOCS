<?php
echo "&rarr; Calculate Maximum / Minimum/ Second Maximum out of 4 numbers (Using ? : Operator) ";
echo "<br>";
echo "<br>";

$a = 80;
$b = 50;
$c = 10;
$d = 40;

$max = ($a > $b && $a > $c && $a > $d) ? $a : (($b > $c && $b > $d) ?$b : ($c > $d ? $c : $d));
echo $max;

?>