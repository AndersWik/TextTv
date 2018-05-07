<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FileTest extends TestCase
{
    private $directory = "2018-03-04";
    private $file = "100.html";

    public function testGetDataFromFile(): void {

        $path = dirname(__DIR__)."/data/test/";
        $file = new File($path, $this->directory, $this->file);
        $content = $file->getDataFromFile();
        $this->assertEquals($content, '<p>success</p>');
    }

    public function testIsPathFile(): void {

        $path = dirname(__DIR__)."/data/test/";
        $file = new File($path, $this->directory, $this->file);
        $page = $file->isPathFile();
        $this->assertTrue($page);
    }

    public function testIsFile404False(): void {

        $path = dirname(__DIR__)."/data/test/";
        $file = new File($path, $this->directory, $this->file);
        $is404 = $file->isFile404();
        $this->assertFalse($is404);
    }

    public function testIsFile404True(): void {

        $path = dirname(__DIR__)."/data/test/";
        $file = "101.html";
        $file = new File($path, $this->directory, $file);
        $is404 = $file->isFile404();
        $this->assertTrue($is404);
    }

}