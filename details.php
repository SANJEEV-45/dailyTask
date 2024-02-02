<?php
  $details = file_get_contents("details.json");
  $myfile = json_decode($details,true);

  foreach($myfile as $key => $value)
  {
     echo ("{$key} => {$value}<br>");
  }

  print_r($myfile);
?>