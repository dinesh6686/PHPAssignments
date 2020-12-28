<?php
$person = array(
    "Name" => "John Wick",
    "age" => "30",
    "city" => "New York"
);
$json = json_encode($person, JSON_PRETTY_PRINT);
echo $json;
?>