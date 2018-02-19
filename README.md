# laravel-wishlist

A simple Wishlist implementation for Laravel 5.*.*.

[![Latest Stable Version](https://poser.pugx.org/bhavinjr/laravel-wishlist/v/stable)](https://packagist.org/packages/bhavinjr/laravel-wishlist)
[![Total Downloads](https://poser.pugx.org/bhavinjr/laravel-wishlist/downloads)](https://packagist.org/packages/bhavinjr/laravel-wishlist)
[![License](https://poser.pugx.org/bhavinjr/laravel-wishlist/license)](https://packagist.org/packages/bhavinjr/laravel-wishlist)

## Installation

First, you'll need to install the package via Composer:

```shell
$ composer require bhavinjr/laravel-wishlist
```

If you are don't use using Laravel 5.5.* Then, update `config/app.php` by adding an entry for the service provider.


```php
'providers' => [
    // ...
    Bhavinjr\Wishlist\Providers\WishlistServiceProvider::class,
];

'aliases' => [
    //...
    "Wishlist": "Bhavinjr\Wishlist\Facades\Wishlist",
];
```

In command line paste this command:
```shell
php artisan config:cache
```

In command line again, publish the default configuration file:
```shell
php artisan vendor:publish --provider="Bhavinjr\Wishlist\Providers\WishlistServiceProvider"
```

In command line paste this command:
```shell
php artisan migrate
```


## Configuration

Configuration was designed to be as flexible.
global configuration can be set in the `config/wishlist.php` file.


```<?php
return [
    'product_model'         =>  'App\Models\Product',
];
```

after update `config/wishlist.php` file.
```shell
php artisan config:cache
```

## Usage

The package gives you the following methods to use:

Adding an item to the wishlist is really simple 

you need specify product_id and user_id respectively all parameter are compulsory

### Wishlist::add()

```php
Wishlist::add(15, 1);
```

### Wishlist::remove()

To remove an item from the wishlist, specify the wishlist_id.

```php
Wishlist::remove(2);
```

### Wishlist::getUserWishlist()

To get users all wishlist item, specify the user_id.

```php
Wishlist::getUserWishlist(1);
```

### Wishlist::removeUserWishlist()

To remove users all wishlist item, specify the user_id.

```php
Wishlist::removeUserWishlist(1);
```

### Wishlist::removeByProduct()

To remove particular product using product_id, specify the product_id and user_id respectively.

```php
Wishlist::removeByProduct(15, 1);
```


### Wishlist::count()

To count users all wishlist item, specify the user_id.

```php
Wishlist::count(1);
```

### Wishlist::getWishlistItem()

To get particular wishlist item, specify the product_id and user_id respectively

```php
Wishlist::getWishlistItem(15, 1);
```


You can also load product detail

```php
$result  =  Wishlist::getUserWishlist(1)->load('product');

or you can also access directly
```
