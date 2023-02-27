<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FinalJudge;

class FinalJudgeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FinalJudge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'business_name' => $this->faker->text(),
            'email' => $this->faker->email(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'title' => $this->faker->sentence(),
        ];
    }
}
