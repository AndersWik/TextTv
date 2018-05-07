<?php

class Content {

  private $type = "json";
  private $content = "";

  public function setType($type) {

    switch (strtolower($type)) {
      case 'html':
        $this->type = 'html';
        break;
      case 'text':
        $this->type = 'text';
        break;
      case 'xml':
        $this->type = 'xml';
        break;
      case 'debug':
        $this->type = 'debug';
        break;
      default:
        $this->type = 'json';
        break;
    }
  }

  public function getType() {

    return $this->type;
  }

  public function setContent($content) {

    $this->content = $content;
  }

  public function getContent() {

    $content = $this->content;

    if($this->type == "html") {
      $content = $this->getHTML($content);

    } elseif($this->type == "json") {
      $content = $this->getJson($content);

    } elseif($this->type == "text") {
      $content = $this->getText($content);

    } elseif($this->type == "xml") {
      $content = $this->getXML($content);

    } elseif($this->type == "debug") {
      $content = $this->getDebug($content);
    }

    return $content;
  }

  public function getContentLength() {

    return strlen($this->content);
  }

  private function getHTML($content) {

    $content = $this->getArray($content);
    $items = '';
    foreach ($content as $key => $value) {
      $items = $items.'<p>'.$value.'</p>';
    }
    return $items;
  }

  private function getJson($content) {

    $content = $this->getArray($content);
    return json_encode($content);
  }

  private function getText($content) {

    $content = $this->getArray($content);
    return implode ( ',', $content);
  }

  private function getXML($content) {

    $content = $this->getArray($content);
    $document = new DOMDocument();

    foreach ($content as $key => $value) {
      $item = $document->createElement('item', $value);
      $document->appendChild($item);
    }
    return $document->saveXML();
  }

  private function getDebug($content) {

    return print_r($options, true);
  }

  private function getArray($content) {

    if(!is_array($content)) {
      $arr = array();
      $arr[] = $content;
      $content = $arr;
    }
    return $content;
  }
}
