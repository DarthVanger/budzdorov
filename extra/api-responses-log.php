<?php
  $text = 
      "\n===========================\n"
      ."New response ". date("Y-m-d H:i:s") 
      ."\n==========================\n";
  foreach ($_POST as $key => $value) {
      $text .= "POST[".$key."] = ".$value."\n";
  }
  file_put_contents("api-responses.log", $text, FILE_APPEND);
