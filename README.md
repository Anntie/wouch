<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Installation (requires PHP 7.4)
> 1. `git clone https://github.com/Anntie/wouch.git`
> 2. Create .env - `cp .env.example .env`
> 3. Configure .env
> 4. `composer install`
> 7. `php artisan migrate`
> 8. `php artisan db:seed` 

`Project was built on php 7.4, postgres and nginx`
 
## Routes
- `http://wouch.test/api/v1/users/active` - with optional `?posts_limit=n`
- `http://wouch.test/api/v1/user/{id}/comments` - with optional `?type=TYPE`, where TYPE = `{eloquent, builder, sql}`

Check these files:
- `database/migrations/*`
- `database/factories/DataFactory.php`
- `database/seeds/DatabaseSeeder.php`
- `app/Models/*`
- `routes/api.php`
- `app/Http/Controllers/UsersController.php`
- `app/Providers/AppServiceProvider.php`
- `app/Services/*`
