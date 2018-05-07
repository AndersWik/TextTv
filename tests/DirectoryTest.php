<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DirectoryTest extends TestCase
{
    private $directory = "2018-03-04";

    public function testGetListFromRootPath(): void {

        $path = dirname(__DIR__)."/data/test/";
        $directory = new Folder($path, $this->directory);
        $list = $directory->getListFromRootPath();
        $this->assertTrue(is_array($list));
    }

    public function testGetListFromDirectoryPath(): void {

        $path = dirname(__DIR__)."/data/test/";
        $directory = new Folder($path, $this->directory);
        $list = $directory->getListFromDirectoryPath();
        $this->assertTrue(is_array($list));
    }

    public function testIsPathDirectoryTrue(): void {

        $path = dirname(__DIR__)."/data/test/";
        $directory = new Folder($path, $this->directory);
        $isDir = $directory->isPathDirectory();
        $this->assertTrue($isDir);
    }

    public function testIsPathDirectoryFalse(): void {

        $path = dirname(__DIR__)."/data/test/";
        $directory = "2018-03-05";
        $directory = new Folder($path, $directory);
        $isDir = $directory->isPathDirectory();
        $this->assertFalse($isDir);
    }

    public function testIsDirectory404False(): void {

        $path = dirname(__DIR__)."/data/test/";
        $directory = new Folder($path, $directory);
        $is404 = $directory->isDirectory404();
        $this->assertFalse($is404);
    }

    public function testIsDirectory404True(): void {

        $path = dirname(__DIR__)."/data/test/";
        $directory = "2018-03-05";
        $directory = new Folder($path, $directory);
        $is404 = $directory->isDirectory404();
        $this->assertTrue($is404);
    }

}