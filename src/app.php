<?php

class App {

  private $crawler;

  public function __construct() {

    $this->crawler = new Crawler();
  }

  private function getHelp() {

    echo <<<HELP
\n
  Text TV
  ======================================
  Run script to fetch all text tv pages.
  help                  (Show help menu)
\n
HELP;
  }

  private function getArgs() {

    $arguments = array("key" => "");

    if(!isset($argv)) {
      $argv = $_SERVER['argv'];
    }
    if(isset($argv[1])) {

      $arguments['key'] = $argv[1];
    }
    return $arguments;
  }

  public function run() {

    $args = $this->getArgs();

    if($args['key'] == "help") {

      $this->getHelp();

    } else {

      $this->crawler->savePages();
    }
  }
}