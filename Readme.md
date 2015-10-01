# Laravel 5.1 Multi Domain Support
This package is designed to provide a simple configurable way to bootstrap and display different libraries depending on
simple configuration and flexible bootstrapping.

#Installation
Start by modifying your composer.json file to add/update entities to look similar to the following:

```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/andrewjwolf/laravel-multidomain"
        }
    ],
    
    "require": {
            "trdp/domain": "v0.1-alpha"
    },
```
Next modify your config/app.php file and add the following line to your providers array:

```php
        Trdp\Domain\Providers\DomainServiceProvider::class
```

From here you will need to publish the default configuration file and modify the contents
to fit your application structure.

Start by running the following command in console: php artisan vendor:publish.
You will see a new file appear within your configuration folder named domains.

In here you will find an example of a domain.
When our application fires up it will first look at these items to see if either the serverName or any of the serverAliases
match with the current url attached to the request.

If it is found, the application will simply register the provided bootstrap class and let it take care of any additional
business.

Typically within your bootstrap provider, you will then register additional services to be used only with that domain.
Any service that is used globally should be bootstrapped via the config/app.php providers array.


