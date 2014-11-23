ZfrMailChimpBundle
==================

[![Latest Stable Version](https://poser.pugx.org/zfr/zfr-mailchimp-bundle/v/stable.png)](https://packagist.org/packages/zfr/zfr-mailchimp-bundle)

A Symfony 2 bundle for the [ZfrMailChimp](https://github.com/zf-fr/zfr-mailchimp) library.

## Installation

To install the bundle, require it through composer via the command line:

```sh
php composer.phar require zfr/zfr-mailchimp-bundle
```

or via your composer.json file:

```js
{
    "require": {
        "zfr/zfr-mailchimp-bundle": "2.*"
    }
}
```

To have composer download the needed files, run:

``` bash
$ php composer.phar update zfr/zfr-mailchimp-bundle
```

This will place the bundle (and the ZfrMailChimp library) inside the `vendor/zfr` directory of your project.

Next, enable the bundle in your project by adding it to the AppKernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new ZfrMailChimpBundle\ZfrMailChimpBundle()
    );
}
```

## Configuration

To configure the bundle, add the following to your app/config/config.yml:

``` yml
# app/config/config.yml
zfr_mail_chimp:
  api_key: #your MailChimp API key here (required)
  async: #use Guzzle's Asyncronous library (default: false)
```

## Usage

Lastly, call the client using Symfony's DI Container:

```php
$mailchimp = $this->get('zfr_mailchimp')->getClient();
```
