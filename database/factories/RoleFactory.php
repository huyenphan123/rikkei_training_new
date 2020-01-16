<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Role::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['Head Department', 'Employee','Admin']),
        'user_id'=> App\User::all()->random()->id,
        'department_id' => App\Models\Department::all()->random()->id,
    ];
});
