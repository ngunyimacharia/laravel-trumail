mashytski/trumail
================

[![Latest Version on Packagist](https://img.shields.io/travis/mashytski/trumail.svg?style=flat-square)](https://packagist.org/packages/mashytski/trumail)
[![Packagist](https://img.shields.io/packagist/l/mashytski/trumail.svg?style=flat-square)](https://packagist.org/packages/mashytski/trumail)
[![Total Downloads](https://img.shields.io/packagist/dt/mashytski/trumail.svg?style=flat-square)](https://packagist.org/packages/mashytski/trumail)
[![Packagist](https://img.shields.io/packagist/v/mashytski/trumail.svg?style=flat-square)](https://packagist.org/packages/mashytski/trumail)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/mashytski/trumail.svg?style=flat-square)](https://packagist.org/packages/mashytski/trumail)


Custom PHP Library for Laravel 5 - developed by [ngunyimacharia](https://gitlab.com/ngunyimacharia)

The package provides an easy interface for validating emails from your Laravel web application. The package provides a simple method of checking whether emails are valid or not. Additionally, the returned response is filtered to provide formatted data ready for rendering to the user. This makes it easier to validate emails quickly while making your code more comprehensive.

 

 > Note before posting an issue: When posting an issue for the package, always be sure to provide as much information 
 > regarding the request as possible. 




## Installation

Pull this package in through Composer.

```js

    {
        "require": {
            "mashytski/trumail": "dev-master"
        }
    }

```

or run in terminal:
`composer require mashytski/trumail`

### Laravel 5.5+ Integration

Laravel's package discovery will take care of integration for you.


### Laravel 5.* Integration

Add the service provider to your `config/app.php` file:

```php

    'providers'     => array(

        //...
        Mashytski\Trumail\TrumailServiceProvider::class,

    ),

```

Add the facade to your `config/app.php` file:

```php

    'aliases'       => array(

        //...
        'Trumail'          => Mashytski\Trumail\Facades\Trumail::class,

    ),

```


### Laravel 4.* Integration

Add the service provider to your `app/config/app.php` file:

```php

    'providers'     => array(

        //...
        'Mashytski\Trumail\TrumailServiceProvider',

    ),

```

Add the facade to your `app/config/app.php` file:

```php

    'facades'       => array(

        //...
        'Trumail'          => 'Mashytski\Trumail\Facades\Trumail',

    ),

```

## Usage



### .env configuration

In order to use the [Trumail](https://trumail.io) API, one needs to have a token. To get the token, [register for an account](https://trumail.io/register).

After obtaining the token, add it to your .env file. If you do not have a .env file, you may create one by duplicating your .env.example file.

```

    TRUMAIL_TOKEN = YOUR_TRUMAIL_TOKEN_HERE

```


### Email Validation

In order to validate an email address, you need to use the validate() method that is provided in the package:

```php

    use Mashytski\Trumail\Facades\Trumail;

    // Validate email
    $response = Trumail::validate('email@example.com');

```


### Validation Response

By default, the Trumail::validate() method will always return a TrumailResponse object. 

The follow are the responses to expect:

__1. Invalid API Token Provided__ 

```php
TrumailResponse {
   status: 403
   "error": "Invalid API token/key"
}

```
__2. Invalid Email Provided__

```php

TrumailResponse {
  status: 200
  "isValid": false
  "invalid_reason": "Email address not deliverable"
}


```

__3. Valid Email Provided__

```php

TrumailResponse {
  status: 200
  "isValid": true
}

```


## Testing

The package uses PHPUNIT for testing. The package tests are located in the \tests folder.

To perform the package tests, navigate to the package's root: `vendor\Mashytski\Trumail`

Add your `phpunit.xml`. Ensure to set your **Trumail token** in there as well. Here is a sample:

```
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="vendor/autoload.php"
  backupGlobals="false"
  backupStaticAttributes="false"
  colors="true"
  verbose="true"
  convertErrorsToExceptions="true"
  convertNoticesToExceptions="true"
  convertWarningsToExceptions="true"
  processIsolation="false"
  stopOnFailure="false">
  <testsuites>
    <testsuite name="MyPackage Test Suite">
      <directory>tests</directory>
    </testsuite>
  </testsuites>
  <filter>
    <whitelist>
      <directory suffix=".php">src/</directory>
    </whitelist>
  </filter>
  <php>
    <env name="APP_ENV" value="testing"/>
    <env name="TRUMAIL_TOKEN" value="PLACE_YOUR_TRUMAIL_TOKEN_HERE"/>
  </php>
</phpunit>

```


## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)




## Contact

For package questions, bug, suggestions and/or feature requests, please use the Gitlab issue system and/or submit a pull request. When submitting an issue, always provide a detailed explanation of your problem, any response or feedback your get, log messages that might be relevant as well as a source code example that demonstrates the problem. If not, I will most likely not be able to help you with your problem. Please review the [contribution guidelines](https://gitlab.com/mashytski/laravel-trumail/blob/master/CONTRIBUTING.md) before submitting your issue or pull request.

For any other questions, feel free to use the credentials listed below: 

Kelvin Macharia (developer)

- Email: ngunyimacharia@gmail.com
- Telephone: (+254)726 832329


