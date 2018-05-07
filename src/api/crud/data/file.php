<?php

class File {

  private $path;
  private $filePath = "";

  public function __construct($path, $directory, $file) {

    $this->path = $path;
    
    if($directory && $file) {
      $this->filePath = $path.$directory.'/'.$file;
    }
  }

  public function getDataFromFile() {

    return file_get_contents($this->filePath);
  }

  public function isPathFile() {

    return is_file($this->filePath);
  }

  public function isFile404() {

    $is404 = false; 
    if($this->filePath !== "" && !$this->isPathFile()) {

      $is404 = true;
    }
    return $is404;
  }

}
