<?php

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'position' => $faker->jobTitle,
        'grade' => $faker->numberBetween(19,52),
        'office' => $faker->company,
        'state_from' => $faker->numberBetween(1,16),
        'district_from' => $faker->city,
        'state_to' => $faker->numberBetween(1,16),
        'district_to' => $faker->city,
        'job_scope' => $faker->paragraph,
        'note' => $faker->paragraph,
        'status' => 'Aktif',
    ];
});
