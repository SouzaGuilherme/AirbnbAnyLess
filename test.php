<?php
$date1 = strtotime("NOW"); 
$date2 = strtotime("2021-06-22"); 
  
// Formulate the Difference between two dates
$diff = abs($date2 - $date1); 


print_r($date1);
echo "<br/>";
print_r($date2);
echo "<br/>";
echo date($diff/(365));

echo "<br/>";


  

// Formulate the Difference between two dates
$diff = abs($date2 - $date1); 
  
  

$years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 -  $months*30*60*60*24)/ (60*60*24));
echo $days;