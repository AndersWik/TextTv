<?php

class Type {

  private $acceptHeaders;
  private $types;
  private $type;

  public function __construct() {

    $this->acceptHeaders = Request::getAcceptHeadersArray();
  }

  public function setType() {

    $types = $this->negotiateType();
    $this->type = $this->isType($types);
  }

  public function getType() {

    return $this->type;
  }

  private function negotiateType() {

    $types = $this->acceptHeaders;
    
    for($i = 0; $i < count($types); $i++) {
      $needle = "q=";
      $pos = strpos($types[$i], $needle);

      if($pos === false) {
        $types[$i] = ['point' => 1, 'value' => $types[$i]];

      } else {
        $start = $pos+strlen($needle);
        $stop = strlen($types[$i])-$start;
        $point = substr($types[$i], $start, $stop);
        $point = floatval($point);
        $value = substr($types[$i], 0, $pos);
        $types[$i] = ['point' => $point, 'value' => strtolower($value)];
      }
    }
    return $types;
  }

  private function isType($types) {

    $type = "json";

    foreach($types as $value) {

      if(strpos ($value['value'] , 'json')) {
        break;

      } elseif(strpos ($value['value'] , 'xml')) {
        $type = "xml";
        break;

      } elseif(strpos ($value['value'] , 'html')) {
        $type = "html";
        break;

      } elseif(strpos ($value['value'] , 'text')) {
        $type = "text";
        break;

      } elseif(strpos ($value['value'] , 'debug')) {
        $type = "debug";
        break;
      }
    }
    return $type;
  }
}
