<?php 
$text = "Hello<br>World!<br>Good<br>Morning!"; 
  
// Display the string before
echo "String before: $text<br><br>"; 
  
$textAfter = str_replace("<br>", "", $text); 
  
// Display the new string after removing the new line characters
echo "String after removing new line characters: $textAfter<br>"; 
?> 