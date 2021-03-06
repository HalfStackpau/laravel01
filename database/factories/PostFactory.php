<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->word(2),
        'contents'=>$faker->text(256),
        'category_id'=>1,
        'user_id'=>2
    ];
});
