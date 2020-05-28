

![This package is in beta. Use with caution.]

# Laravel Nova Stripe Dashboard

This package makes it easy to see high-level information about your application's [Algolia](https://algolia.com/) stats in a Nova dashboard.

## Installation

You can install this package via [Composer](https://getcomposer.org/):

```bash
$ composer require dottd-io/nova-algolia`
```

## Usage

Add your Stripe key and secret values to your `.env` file:

```
ALGOLIA_APP_ID=
ALGOLIA_SECRET=
```

* https://stripe.com/docs/keys#obtain-api-keys

Add a `algolia` element to your `config/scout.php` configuration file:

```php
'algolia' => [
    'id' => env('ALGOLIA_APP_ID', ''),
    'secret' => env('ALGOLIA_SECRET', ''),
],
```

Register the `NovaAlgolia` tool in `app/Providers/NovaServiceProvider`:

```php
public function tools()
{
    return [
        new \Dottd\NovaAlgolia\NovaAlgolia,
    ];
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
