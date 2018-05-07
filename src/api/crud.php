<?php

class Crud {

  private $content;
  private $data;
  private $response;
  private $type;

  public function __construct() {

    $this->content = new Content();
    $this->data = new Data();
    $this->response = new Response();
    $this->type = new Type();
  }

  public function getContent() {

    $content = $this->data->getData();
    $this->type->setType();
    $type = $this->type->getType();
    $this->content->setType($type);
    $this->content->setContent($content);
    $content = $this->content->getContent();

    $responseCode = '200';
    if($this->data->getNotFound()) {
      $responseCode = '404';
    }

    $this->response->setResponse($responseCode);
    $this->response->setContentType($type);
    $this->response->setContent($content);
    return $this->response;
  }

  public function putContent() {

    $this->response->setResponse('405');
    return $this->response;
  }

  public function deleteContent() {

    $this->response->setResponse('405');
    return $this->response;
  }

  public function getOtherContent() {

    $this->response->setResponse('404');
    return $this->response;
  }

}
