<?php

class Api {

  private $response;
  private $crud;

  public function __construct() {

    $this->crud = new Crud();
  }

  public function route() {

    switch (strtoupper($_SERVER['REQUEST_METHOD'])) {
      case 'GET':
        $this->response = $this->crud->getContent();
        break;
      case 'PUT':
        $this->response = $this->crud->putContent();
        break;
      case 'DELETE':
        $this->response = $this->crud->deleteContent();
        break;
      default:
        $this->response = $this->crud->getOtherContent();
        break;
    }

    $this->setHeader();
    $this->getContent();
  }

  private function setHeader() {

    header($this->response->getHeader(), TRUE, $this->response->getCode());
    header($this->response->getContentType());
    header($this->response->getContentLength());
  }

  private function getContent() {

    $this->content = $this->response->getContent();
    if($this->content !== "") {

      echo $this->content;
    }
  }
}
