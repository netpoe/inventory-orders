# ECOMMERCEUI 0.0.1

A Laravel ^5.4 e-commerce CMS.

## Features

- Track orders segmented by address regions
- Assign the best suitable warehouse to orders
- Keep track of products per warehouse
- Let users publish products from the front client-side
- Let admins track orders and analytics from the admin-panel dashboard side

## Usage

```bash
git clone git@github.com:netpoe/inventory-orders.git
composer install
npm install
php artisan serve
```

## Structure

You can find the application paths at `./routes/web.php`.

The project tries to use the controller resources as fine as possible so you may find them in the `./app/Http/Controllers` directory.

Eloquent models are defined in the `./app` directory, however, controllers use `./app/ModelAdapters` for a more versatile and modular Model extension

Models are restricted to relatioships, table definitions, attributes and mutators.

## Contributing

Feel free to make pull-requests to the project or open issues
