<?php

use Faker\Generator as Faker;

$factory->define(App\quiz_data::class, function (Faker $faker) {
    
    $options = [
     
     'option' => [
      $faker->name ,
      $faker->name ,
      $faker->name ,
      $faker->name 
     ] ,
     'correct' => rand(0,3)

    ];

    return [
        'title' => $faker->sentence,
        'options' => json_encode($options),
    ];
});
