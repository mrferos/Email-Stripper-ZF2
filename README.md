Email-Stripper ZF2
==================

The ZF2 package for the [Email Stripper](https://github.com/mrferos/Email-Stripper) library. 

## Installation
```bash
composer require "mrferos/email-stripper-zf2:dev-master"
cp vendor/mrferos/email-stripper-zf2/config/autoload/email-stripper.config.php.dist config/autoload/email-stripper.config.php
```

And add the module to your application.config.php

## Use
The Email Stripper can be pulled out of the Service Locator with the alias "EmailStripper". For any further details
on how the class works please visit [Email Stripper](https://github.com/mrferos/Email-Stripper)