# PHP Symfony Console IO Component

This component extends the existing symfony console application by a generic IO object.

This will easy up the input/output handling in an symfony console project.

## Intension

The main intension of that project is to use the IOInterface of composer in more then one symfony console application.
The project starts as a copycate of the composer ConsoleIO.

## Packagist
  
https://packagist.org/packages/net_bazzline/php_symfony_console_io
  
Add following line to you composer.json file.  
"net_bazzline/php_symfony_console_io" : "dev-master"

## References

https://github.com/jenswiese/phpteda/blob/master/src/Phpteda/CLI/IO/ConsoleIO.php
https://github.com/composer/composer/blob/master/src/Composer/IO/ConsoleIO.php

# History

* 1.0.0 - 2013-08-05
    * Stable *IOInterface*
    * Implementation of interface by *ConsoleIO*
    * Existing *IOAwareInterface*
    * Available *ConsoleIOFactory*
    * Two exceptions, *InputException* and *RuntimeException*
