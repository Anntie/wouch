<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\WouchUser::class, fn(Faker $faker) => [
    'name' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
]);

$factory->define(\App\Models\Image::class, fn(Faker $faker) => [
    'url' => $faker->imageUrl(1280, 720),
]);

$factory->define(\App\Models\Post::class, fn(Faker $faker) => [
    'author_id' => factory(\App\Models\WouchUser::class),
    'image_id' => factory(\App\Models\Image::class),
    'content' => $faker->realText(300),
]);

$factory->define(\App\Models\Comment::class, fn(Faker $faker) => [
    'post_id' => factory(\App\Models\Post::class),
    'user_id' => factory(\App\Models\WouchUser::class),
    'content' => $faker->realText(100),
]);
