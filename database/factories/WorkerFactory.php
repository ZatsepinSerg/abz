<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 02.12.2017
 * Time: 16:48
 */



$factory->define(App\Worker::class,function(Faker\Generator $faker){
    return [
      'parent_id' => $faker->numberBetween($min = 1, $max = 5),
      'surname' =>$faker->firstName($gender = null|'male'|'female'),
      'name' =>$faker->name($gender = null|'male'|'female'),
      'patronymic' =>$faker->lastName,
      'position' =>$faker->jobTitle,
      'date_receipt' =>$faker->date($format = 'Y-m-d', $max = 'now'),
      'salary' =>$faker->numberBetween($min = 1000, $max = 9000),
      'photo' =>$faker->imageUrl($width = 640, $height = 480, 'business', true, 'Faker'),
    ];
});

