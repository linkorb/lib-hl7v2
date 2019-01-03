HL7v2 Parsing and Generation library
==============

NOTE: This project is work in progress, the API will change

## Build Docker Image

A docker image is available for ease of development.  The image contains PHP
7.2 and Composer.

    $ docker build -t lib-hl7v2-dev .

Then you can do, for example:-

    $ ./run php meta/generateSegments.php
    $ ./run vendor/bin/phpunit
    $ ./run composer require ...

## Code generation

This library uses code generation to generate classes for HL7 DataTypes and Segments from YAML definition files. Documentation, definitions and generator scripts can be found in the [meta/](meta/) directory.

## More info and utilities

* [Online HL7v2 message parser](http://pathology.healthbase.info/viewer/)
* [HL7 Datatypes](http://www.corepointhealth.com/resource-center/hl7-resources/hl7-data-types)
* [Escape sequences](http://www.hl7standards.com/blog/2006/11/02/hl7-escape-sequences/)
