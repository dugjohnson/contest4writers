<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Judge;

class JudgeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Judge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bdsm' => $this->faker->boolean(),
            'categoriesjudged' => $this->faker->text(),
            'childdeath' => $this->faker->boolean(),
            'comments' => $this->faker->text(),
            'emergencyJudgePub' => $this->faker->boolean(),
            'emergencyJudgeUnpub' => $this->faker->boolean(),
            'erotic' => $this->faker->boolean(),
            'firstYear' => $this->faker->randomNumber(),
            'glbt' => $this->faker->boolean(),
            'historical' => $this->faker->boolean(),
            'internalComments' => $this->faker->text(),
            'judgeEitherNotBoth' => $this->faker->boolean(),
            'judgePub' => $this->faker->boolean(),
            'judgeThisYear' => $this->faker->text(),
            'judgeUnpub' => $this->faker->boolean(),
            'longTitle' => $this->faker->boolean(),
            'mainstream' => $this->faker->boolean(),
            'maxpubentries' => $this->faker->boolean(),
            'maxunpubentries' => $this->faker->boolean(),
            'novella' => $this->faker->boolean(),
            'paranormal' => $this->faker->boolean(),
            'religious' => $this->faker->boolean(),
            'shortTitle' => $this->faker->boolean(),
            'subcategorydislike' => $this->faker->text(),
            'subcategorylike' => $this->faker->text(),
            'user_id' => \App\Models\User::factory(),
            'vampires' => $this->faker->boolean(),
            'yearsJudged' => $this->faker->boolean(),
        ];
    }
}
