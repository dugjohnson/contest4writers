<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Scoresheet;

class ScoresheetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Scoresheet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->text(),
            'commentsFile' => $this->faker->text(),
            'completed' => $this->faker->boolean(),
            'entry_id' => \App\Models\Entry::factory(),
            'finalScore' => $this->faker->randomNumber(),
            'followup' => $this->faker->dateTime(),
            'judge_id' => \App\Models\Judge::factory(),
            'published' => $this->faker->boolean(),
            'ready' => $this->faker->boolean(),
            'scoreReceived' => $this->faker->dateTime(),
            'scoresheetData' => $this->faker->text(),
            'sentToCoordinator' => $this->faker->dateTime(),
            'sentToJudge' => $this->faker->dateTime(),
            'tiebreaker' => $this->faker->randomNumber(),
            'title' => $this->faker->sentence(),
        ];
    }
}
