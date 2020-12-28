<?php
function move_zeros_to_end($arr)
{
   $nonzerocount = 0;
   $n = count($arr);
    
    for ($i = 0; $i < $n; $i++)
    {
        if ($arr[$i] != 0)
          {
            $arr[$nonzerocount++] = $arr[$i]; //move all non-zero elements towards front
          }
     }
     
    while ($nonzerocount < $n)
    {
        $arr[$nonzerocount++] = 0; //adding zeros at the end of an array 
    }
    return $arr;
}
$num_list1 = array(0,2,3,4,6,7,10);
$num_list2 = array(9,0,11,12,0,14,0,0,17);
print_r(move_zeros_to_end($num_list1));
print_r(move_zeros_to_end($num_list2));
?>