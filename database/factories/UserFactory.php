<?php

$factory->define(Modules\Users\Entities\User::class, function (Faker\Generator $faker, int $lidnr) {
    return [
        'lidnr' => function () {
            return entity(Modules\Decision\Entities\Member::class)->create($lidnr);
        },
        'email' => $faker->unique()->email,
        'password' => '$2y$13$5WprUFHONf2tcFOKU2rlM.nhTs2x1m4rHEezFcZrMLm6qq.4hm6kC',
    ];
});
