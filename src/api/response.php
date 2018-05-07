<?php

class Response {

  private $content = "";
  private $contentType = "";
  private $header = "HTTP/1.0 404 Not Found";
  private $code = 404;

  public function setResponse($code) {

    switch ($code) {
      case '200':
        $this->header = "HTTP/1.0 200 OK";
        $this->code = 200;
        break;
      case '201':
        $this->header = "HTTP/1.0 201 Created";
        $this->code = 201;
        break;
      case '304':
        $this->header = "HTTP/1.0 304 Not Modified";
        $this->code = 304;
        break;
      case '405':
        $this->header = "HTTP/1.0 405 Method Not Allowed";
        $this->code = 405;
        break;
      case '409':
        $this->header = "HTTP/1.0 409 Conflict";
        $this->code = 409;
        break;
      case '404':
      default:
        $this->header = "HTTP/1.0 404 Not Found";
        $this->code = 404;
        break;
    }
  }

  public function getContent() {

    return $this->content;
  }

  public function setContent($content) {

    $this->content = $content;
  }

  public function getContentLength() {

    return 'Content-Length: '.strlen($this->content);
  }

  public function getContentType() {

    return $this->contentType;
  }

  public function setContentType($type) {

    switch ($type) {
      case 'html':
        $this->contentType = 'Content-Type: text/html';
        break;
      case 'json':
        $this->contentType = 'Content-Type: application/json';
        break;
      case 'text':
        $this->contentType = 'Content-Type: text/plain';
        break;
      case 'xml':
        $this->contentType = 'Content-Type: text/xml';
        break;
      case 'debug':
      default:
        $this->contentType = 'Content-Type: text/plain';
        break;
    }
  }

  public function getHeader() {

    return $this->header;
  }

  public function getCode() {

    return $this->code;
  }

}
