<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    $user=factory('App\User')->create();
    return [
        'user_id' => $user->id,
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->lastName($gender),
        'Gender' => $gender, 
        'job_title' => $faker->jobTitle,
        'city' => $faker->city,
        'country' => $faker->country,
        'profile_image' => 'default.png',
        'profile_url' =>  str_slug($user->name.$user->id)
    ];
});
