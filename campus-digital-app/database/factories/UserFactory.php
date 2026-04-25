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
        return [
            'nombre' => fake()->firstName(),
            'apellido' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password_hash' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verificado' => true,
        ];
    }

    /**
     * Configure the factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (\App\Models\User $user) {
            // Assign estudiante role (id 3) if it exists
            try {
                $rol = \App\Models\Rol::find(3);
                if ($rol) {
                    \Illuminate\Support\Facades\DB::table('usuario_rol')->insert([
                        'usuario_id' => $user->id,
                        'rol_id' => 3,
                    ]);
                }
            } catch (\Exception $e) {
                // Silently fail if table doesn't exist or rol doesn't exist
            }
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verificado' => false,
        ]);
    }
}
