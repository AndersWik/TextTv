<?php

class Crawler {

  private $url = "https://www.svt.se/svttext/web/pages/";
  private $path;
  private $date;

  public function __construct() {

    $date = new DateTime();
    $this->date = $date->format('Y-m-d');
    $this->path = dirname(dirname(__DIR__))."/data/";
  }

  public function savePages() {

    for($i = 100; $i <= 800; $i++) {

      $file = $this->getFile($i);
      $page = $this->getPage($file);
      $content = $this->getContent($page);
      $this->saveFiles($content, $i);

      echo "Saving page $i for ".$this->date."\r\n";
      usleep(500000);
    }
  }

  private function getFile($page) {

    return file_get_contents($this->url.$page.".html");
  }

  private function getPage($file) {

    $divs = explode("<div>", $file);
    $page = "";

    for($i = 0; $i < count($divs); $i++) {

      $position = strpos($divs[$i], 'pre class="root"');

      if($position) {
        $divs = explode("</div>", $divs[$i]);

        if(isset($divs[0])) {
          $page = $divs[0];
        }
      }
    }
    return $page;
  }

  private function getContent($content) {

    $rows = explode(PHP_EOL, $content);
    $content = "";
    for($i = 0; $i < count($rows); $i++) {

      $rows[$i] = $this->clean($rows[$i]);
      $content .= $rows[$i].PHP_EOL;
    }
    return $content;
  }

  private function clean($text) {

    $text = strip_tags($text, '<a>');
    $text = str_replace('<a class="preclass" name="subpage1"> </a>', '', $text);
    $text = str_replace('<a class="preclass" name="subpage2"> </a>', '', $text);
    $text = trim($text);

    return $text;
  }

  private function saveFiles($content, $name) {

    $path = $this->path.$this->date;

    if(!file_exists($path)) {

      mkdir($path, 0700);
    }

    $path = $path."/".$name.".html";

    if(!file_exists($path)) {

      $file = fopen($path, "w+");
      echo fwrite($file, $content);
      fclose($file);
    }
  }

}
