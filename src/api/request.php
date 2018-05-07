<?php

class Request {

  private static $directory = '';
  private static $file = '';

  public static function getDirectoryPath() {

    $path = self::getRequestUriArray();
    $part = isset($path[1]) ? $path[1] : "";
    self::$directory = Validate::getCleanDirectory($part);
    return self::$directory;
  }

  public static function getFilePath() {

    $path = self::getRequestUriArray();
    if(self::$directory) {
      $part = isset($path[2]) ? $path[2] : "";
      self::$file = Validate::getCleanFile($part);
    }
    return self::$file;
  }
    
  public static function getRootURI() {
    
    return "$_SERVER[HTTP_HOST]/";
  }
    
  public static function getFullURI() {
    
    return "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  }
    
  public static function getRequestUriArray() {
    
    return explode("/", $_SERVER['REQUEST_URI']);
  }
    
  public static function getAcceptHeadersArray() {
    
    return explode(',', $_SERVER['HTTP_ACCEPT']);
  }

  public static function isRequestUriRoot() {

    return Request::getRootURI() == Request::getFullURI();
  }

}