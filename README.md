# texttv

Save all text tv pages from svt.se and access them from a REST api.

## Prerequisite

* Composer (https://getcomposer.org/)

## Setup

Run composer to install all dependencies.

``` bash
php composer.phar install
```

In apache we need to add a server name and alias to the virtual host.

* server name: texttv.int
* server alias: www.texttv.int

And set point the document root to the public html folder.

## Usage

First download all text tv pages from today.

``` bash
./texttv
```

All pages are downloaded to the data folder and saved in a sub folder with todays date.

To access a list of all available days go to the server name.

``` bash
http://texttv.int/
```

To get a list of all available pages from a day add the date to the url.

``` bash
http://texttv.int/2016-05-07
```

To get the content from a page add the page number to the url.

``` bash
http://texttv.int/2016-05-07/101.html
```

## Versioning

This project uses Semantic versioning

* https://semver.org/




