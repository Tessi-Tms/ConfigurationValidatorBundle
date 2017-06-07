Configuration Validator Bundle
==============================

A symfony bundle which validate a configuration.

Installation
------------

Add dependencies in your `composer.json` file:
```json
"require": {
    ...
    "idci/configuration-validator-bundle" : "dev-master"
},
```

Install these new dependencies in your application using composer:
```sh
$ php composer.phar update
```

Register needed bundles in your application kernel:
```php
// app/AppKernel.php
<?php

public function registerBundles()
{
    $bundles = array(
        // ...
        new IDCI\Bundle\ConfigurationValidatorBundle\IDCIConfigurationValidatorBundle(),
    );
}
```