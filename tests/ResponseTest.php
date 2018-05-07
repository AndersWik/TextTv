<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
  public function testResponseTypeHtml(): void {

    $response = new Response();
    $response->setContentType('html');
    $type = $response->getContentType();
    $this->assertEquals($type, 'Content-Type: text/html');
  }

  public function testResponseTypeJson(): void {

    $response = new Response();
    $response->setContentType('json');
    $type = $response->getContentType();
    $this->assertEquals($type, 'Content-Type: application/json');
  }

  public function testResponseTypeText(): void {

    $response = new Response();
    $response->setContentType('text');
    $type = $response->getContentType();
    $this->assertEquals($type, 'Content-Type: text/plain');
  }

  public function testResponseTypeXml(): void {

    $response = new Response();
    $response->setContentType('xml');
    $type = $response->getContentType();
    $this->assertEquals($type, 'Content-Type: text/xml');
    
  }

  public function testResponseTypeDebug(): void {

    $response = new Response();
    $response->setContentType('debug');
    $type = $response->getContentType();
    $this->assertEquals($type, 'Content-Type: text/plain');
  }

  public function testResponseCode200(): void {

    $response = new Response();
    $response->setResponse('200');
    $code = $response->getCode();
    $this->assertEquals($code, 200);
  }

  public function testResponseCode201(): void {

    $response = new Response();
    $response->setResponse('201');
    $code = $response->getCode();
    $this->assertEquals($code, 201);
  }

  public function testResponseCode304(): void {

    $response = new Response();
    $response->setResponse('304');
    $code = $response->getCode();
    $this->assertEquals($code, 304);
  }

  public function testResponseCode405(): void {

    $response = new Response();
    $response->setResponse('405');
    $code = $response->getCode();
    $this->assertEquals($code, 405);
  }

  public function testResponseCode409(): void {

    $response = new Response();
    $response->setResponse('409');
    $code = $response->getCode();
    $this->assertEquals($code, 409);
  }

  public function testResponseCode404(): void {

    $response = new Response();
    $response->setResponse('404');
    $code = $response->getCode();
    $this->assertEquals($code, 404);
  }

  public function testResponseHeader200(): void {

    $response = new Response();
    $response->setResponse('200');
    $header = $response->getHeader();
    $this->assertEquals($header, 'HTTP/1.0 200 OK');
  }

  public function testResponseHeader201(): void {

    $response = new Response();
    $response->setResponse('201');
    $header = $response->getHeader();
    $this->assertEquals($header, 'HTTP/1.0 201 Created');
  }

  public function testResponseHeader304(): void {

    $response = new Response();
    $response->setResponse('304');
    $header = $response->getHeader();
    $this->assertEquals($header, 'HTTP/1.0 304 Not Modified');
  }

  public function testResponseHeader405(): void {

    $response = new Response();
    $response->setResponse('405');
    $header = $response->getHeader();
    $this->assertEquals($header, 'HTTP/1.0 405 Method Not Allowed');
  }

  public function testResponseHeader409(): void {

    $response = new Response();
    $response->setResponse('409');
    $header = $response->getHeader();
    $this->assertEquals($header, 'HTTP/1.0 409 Conflict');
  }

  public function testResponseHeader404(): void {

    $response = new Response();
    $response->setResponse('404');
    $header = $response->getHeader();
    $this->assertEquals($header, 'HTTP/1.0 404 Not Found');
  }

  public function testResponseContentLength(): void {

    $response = new Response();
    $response->setContent('Test');
    $contentLength = $response->getContentLength();
    $this->assertEquals($contentLength, 'Content-Length: 4');
  }

}