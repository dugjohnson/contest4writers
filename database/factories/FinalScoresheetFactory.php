<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FinalScoresheet;

class FinalScoresheetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FinalScoresheet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assessment' => $this->faker->text(),
            'category' => $this->faker->text(),
            'comments' => $this->faker->text(),
            'entry_id' => \App\Models\Entry::factory(),
            'final_judge_id' => \App\Models\FinalJudge::factory(),
            'finalScore' => $this->faker->randomNumber(),
            'full_manuscript' => $this->faker->boolean(),
            'improve' => $this->faker->text(),
            'lookup_code' => $this->faker->word(),
            'other' => $this->faker->boolean(),
            'published' => $this->faker->boolean(),
            'rank' => $this->faker->randomNumber(),
            'score' => $this->faker->randomNumber(),
            'scoresheetData' => $this->faker->text(),
            'signature' => $this->faker->text(),
            'standout' => $this->faker->text(),
            'synopsis' => $this->faker->boolean(),
            'title' => $this->faker->sentence(),
        ];
    }
}
