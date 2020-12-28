<?php
function reverse_sum($x, $y)
{
    $sum = reverse_integer($x) + reverse_integer($y);
    return reverse_integer($sum);
}

function reverse_integer($n)
{
    $reverse = 0;
    while ($n > 0)
      {
        $reverse *= 10;
        $reverse += $n % 10;
        $n = (int)($n/10);
      }
     return $reverse;
}   
echo "Reversed sum for (12,13):".reverse_sum(12, 13)."<br>";
echo "Reversed sum for (305,794):".reverse_sum(305, 794)."<br>";
?>