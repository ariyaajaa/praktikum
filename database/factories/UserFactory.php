<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model= User::class;
/**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'nama' => $this->faker->name(),//generate nama
            'email' => $this->faker->unique()->safeEmail(),//generate format email
            'role' => 'user',
            'password' => 'user', // password
            'status'=>'aktif',
            'last_login' => now()
        ];

    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
