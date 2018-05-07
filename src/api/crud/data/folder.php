<?php

class Folder {

    private $path;
    private $directoryPath = "";

    private $excludes = array('.', '..', '.gitkeep', '.DS_Store');

    public function __construct($path, $directory) {

      $this->path = $path;
      
      if($directory) {
        $this->directoryPath = $this->path.$directory;
      }
    }

    public function getListFromRootPath() {

      return $this->getList($this->path);
    }

    public function getListFromDirectoryPath() {

      return $this->getList($this->directoryPath);
    }

    private function getList($path) {

      $list = scandir($path, 1);
      $list = array_diff($list, $this->excludes);
      return array_reverse($list);
    }

    public function isPathDirectory() {

      return is_dir($this->directoryPath);
    }

    public function isDirectory404() {

      $is404 = false; 
      if($this->directoryPath !== "" && !$this->isPathDirectory()) {
        $is404 = true;
      }
      return $is404;
    }

}