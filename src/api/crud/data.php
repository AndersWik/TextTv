<?php

class Data {

  private $file;
  private $directory;
  private $content = "";
  private $notfound = false;

  public function __construct() {

    $path = Paths::getDataPath();
    $directory = Request::getDirectoryPath();
    $file = Request::getFilePath();

    $this->directory = new Folder($path, $directory);
    $this->file = new File($path, $directory, $file);
  }

  public function getData() {

    if($this->file->isPathFile()) {
      $content = $this->file->getDataFromFile();

    } elseif($this->directory->isPathDirectory()) {
      $content = $this->directory->getListFromDirectoryPath();

    } else {
      $content = $this->directory->getListFromRootPath();
    }

    $this->notfound = $this->file->isFile404() || $this->directory->isDirectory404();
    return $content;
  }

  public function getNotFound() {

    return $this->notfound;
  }

}
