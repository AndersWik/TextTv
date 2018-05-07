<?php

class Paths {

    public static function getRootPath() {

      return dirname(dirname(dirname(__DIR__)));
    }

    public static function getDataPath() {

      return self::getRootPath()."/data/";
    }

}