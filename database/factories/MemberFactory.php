<?php

$factory->define(Modules\Decision\Entities\Member::class, function (Faker\Generator $faker, int $lidnr) {
    $firstName = $this->faker->firstName;

    return [
        'lidnr' => $lidnr,
        'email' => $this->faker->unique()->email,
        'last_name' => $this->faker->lastName,
        'middle_name' => '',
        'initials' => $firstName[0] . '.',
        'first_name' => $firstName,
        'gender' => $faker->randomElement(['f' => 'f', 'm' => 'm', 'o' => 'o']),
        'generation' => $this->faker->year(),
        'type' => Modules\Decision\Entities\Member::TYPE_ORDINARY,
        'changed_on' => new \DateTime($this->faker->date()),
        'birth' => new \DateTime($this->faker->date()),
        'expiration' = > new \DateTime($this->faker->date()),
    ];
});
