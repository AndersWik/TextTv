<?php

class Validate {

  public static function getCleanDirectory($date, $length = 10) {

    $dir = "";
          
    if(isset($date) && strlen($date) >= $length) {

      $dir = "1";
          
      if(strtotime(substr($date, 0, $length))) {

        $dir = substr($date, 0, $length);
      }
    }
    return $dir;
  }
    
  public static function getCleanFile($page, $length = 3) {
          
    $file = "";
        
    if(isset($page) && strlen($page) >= $length) {

      $dir = "1";
        
      if(ctype_digit(substr($page, 0, $length))) {
        $file = substr($page, 0, $length).".html";
      }
    }
    return $file;
  }

}