<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'slug'              => $faker->slug,
        'parent_id'         =>0,
        'meta_title'        =>$faker->title,
        'meta_desc'         =>'',
        'meta_keyword'      =>'',
    ];
});
