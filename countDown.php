<?php
$target_day = mktime(0, 0, 0, 4, 26, 2021);
$today = time();
$remaining_days = (int) (($target_day - $today)/86400);
echo "Days till next birthday: $remaining_days days!";
?>