<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'slug'          => $faker->slug,
        'price'         =>$faker->randomNumber(5),
        'discount'      =>0,
        'image'         =>'',
        'meta_title'    =>$faker->title,
        'meta_desc'     =>'',
        'meta_keyword'  =>'',
    ];
});
