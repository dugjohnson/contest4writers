<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->text(),
            'published' => $this->faker->boolean(),
            'role' => $this->faker->text(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
