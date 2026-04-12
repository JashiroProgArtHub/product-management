# Product Management System

A Laravel-based product and category management application with Tailwind CSS styling.

## Features

- Product creation, editing, viewing, and deletion
- Category creation and listing
- Product-category association
- Tailwind CSS-powered user interface
- Laravel resource routes for products

## Requirements

- PHP 8.1+ (Laravel compatible)
- Composer
- Node.js + npm
- MySQL

## Setup

1. Copy the environment file:

```powershell
cp .env.example .env
```

2. Update database settings in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=product_management_system
DB_USERNAME=root
DB_PASSWORD=
```

3. Install PHP dependencies:

```powershell
composer install
```

4. Install Node dependencies:

```powershell
npm install
```

5. Generate the application key:

```powershell
php artisan key:generate
```

6. Run database migrations:

```powershell
php artisan migrate
```

## Frontend Build

Build production assets:

```powershell
npm run build
```

For development with hot reload:

```powershell
npm run dev
```

## Running the app

Start Laravel's server:

```powershell
php artisan serve
```

Then visit:

```
http://127.0.0.1:8000
```

If `php artisan serve` fails, use PHP's built-in server instead:

```powershell
php -S 127.0.0.1:8080 -t public
```

Then visit:

```
http://127.0.0.1:8080
```

## Notes

- Ensure MySQL is running and the database exists.
- If the app is using `SESSION_DRIVER=database`, run `php artisan session:table` and migrate if needed.
- Tailwind is configured via `resources/css/app.css` and Vite in `vite.config.js`.

## Main routes

- `/products`
- `/products/create`
- `/categories`
- `/categories/create`

## Troubleshooting

- If you see styling issues, run `npm run build` and refresh the page.
- If assets are not loading, remove stale `public/hot` so Laravel uses built build assets.
- Clear config/cache if environment changes:

```powershell
php artisan config:clear
php artisan route:clear
php artisan cache:clear
```

## License

This project is licensed under the MIT License.
