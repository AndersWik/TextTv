<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{

    public function testContentTypeHtml(): void {
        
        $content = new Content();
        $content->setType('html');
        $type = $content->getType();
        $this->assertEquals($type, 'html');
    }

    public function testContentTypeJson(): void {
        
        $content = new Content();
        $content->setType('json');
        $type = $content->getType();
        $this->assertEquals($type, 'json');
    }

    public function testContentTypeText(): void {
        
        $content = new Content();
        $content->setType('text');
        $type = $content->getType();
        $this->assertEquals($type, 'text');
    }

    public function testContentTypeXml(): void {
        
        $content = new Content();
        $content->setType('xml');
        $type = $content->getType();
        $this->assertEquals($type, 'xml');
    }

    public function testContentTypeDebug(): void {
        
        $content = new Content();
        $content->setType('debug');
        $type = $content->getType();
        $this->assertEquals($type, 'debug');
    }

    public function testContentJson(): void {
        
        $content = new Content();
        $content->setType('json');
        $content->setContent("Test");
        $type = $content->getContent();
        $this->assertEquals(JSON_ERROR_NONE, json_last_error());
    }

    public function testContentXml(): void {
        
        $content = new Content();
        $content->setType('xml');
        $content->setContent("Test");
        $xml = $content->getContent();
        $obj = (bool)simplexml_load_string($xml);
        $this->assertTrue($obj);
    }

}