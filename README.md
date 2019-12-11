# Fabelio Price Monitor

## Description

A web application to scrap information and monitoring price from [Fabelio](https://fabelio.com) website.

## Requirement

A local webserver already configured for php (Laravel) application, my recommendation:

-   Laragon (Windows)
-   Laravel Valet (Mac)
-   Devilbox (Cross-platform)

Tools needed for installation:

-   Composer (PHP dependency installer)
-   Node/NPM (optional)
-   SQLite PHP extension
-   Terminal/CMD

## How to Install

1. Clone this repo
2. Cd into directory
3. Open up terminal
4. Type `composer install`
5. Type `npm install` (optional)
6. Copy `.env.example` to `.env` (please configure, especially `APP_KEY` & `APP_URL`)
7. Type `php artisan serve`
8. Open `http://127.0.0.1:8000` in your browser

## Features

-   Add product link
-   Page to display all links added to system, with pagination (5 items per page)
-   View detail of product (from scrapped info) including name, description, additional info, and images
-   Price update chart on product detail page (updated every hour)

## Important Files

-   `app/Console/Commands/UpdatePrices.php` (contain artisan command to update price)
-   `app/Http/Controllers/ProductController.php` (contain main application logic)
-   `app/Http/Services/FabelioService.php` (contain logic for web scraping & price update)

## Tests

-   All tests available in `tests` folder
-   For unit test run command `./vendor/bin/phpunit`
-   For browser test you must configure [Laravel Dusk](https://laravel.com/docs/6.x/dusk) and run `php artisan dusk`
