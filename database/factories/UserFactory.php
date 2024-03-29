<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female', null]);
        $firstName = fake()->firstName($gender);
        $lastName = fake()->lastName($gender);

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'username' => fake()->userName(),
            'gender' => ['male' => 'm', 'female' => 'f'][$gender] ?? 'n',
            'avatar' => null,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => in_array(fake()->randomDigit(), [0, 7, 9]) ? null : now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
