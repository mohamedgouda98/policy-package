#Repository design pattern Laravel

Foobar is a Python library for dealing with word pluralization.

## Installation

Use the package manager [Composer](https://packagist.org/packages/unlimited/repository-design-pattern-laravel) to install repository-design-pattern-laravel.

```bash
composer require unlimited/policy-package
```

## Config

add blow line to providers list in config/app.php
```bash
Unlimited\Policy\PolicyServiceProvider::class,
```

## Usage

```php
php artisan vendor:publish --tag="policy-package-views"
```

## Routes
```php
/admin/policy_category/index
/admin/policy_category/create
/admin/policy_category/edit/{id}
---------------
/admin/policy/index
/admin/policy/create
/admin/policy/edit/{id}
---------------
/user/policies
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
