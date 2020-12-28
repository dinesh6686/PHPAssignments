<?php 
$s1 = "paperkraft"; //string
$s2 = "raft"; //substring
echo "<br>Is \"$s2\" a substring of \"$s1\" : ";
if ((is_numeric(strpos($s1, $s2)) == 1) && (strpos($s1, $s2) >= 0) && (strpos($s1, $s2) < strlen($s1))) echo "True"; 
else echo "False"; 
?> 