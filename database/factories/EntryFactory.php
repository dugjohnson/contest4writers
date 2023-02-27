<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Entry;

class EntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => $this->faker->text(),
            'author2' => $this->faker->text(),
            'author2_user_id' => $this->faker->randomDigitNotNull(),
            'author2Email' => $this->faker->text(),
            'author_user_id' => $this->faker->randomDigitNotNull(),
            'authorEmail' => $this->faker->text(),
            'bdsm' => $this->faker->boolean(),
            'category' => $this->faker->text(),
            'childdeath' => $this->faker->boolean(),
            'dateOfEntry' => $this->faker->dateTime(),
            'editor' => $this->faker->text(),
            'enteredByPublisher' => $this->faker->boolean(),
            'erotic' => $this->faker->boolean(),
            'filename' => $this->faker->text(),
            'final_filename' => $this->faker->text(),
            'finalist' => $this->faker->boolean(),
            'glbt' => $this->faker->boolean(),
            'invoiceNumber' => $this->faker->word(),
            'publicationMonth' => $this->faker->text(),
            'published' => $this->faker->boolean(),
            'publisher' => $this->faker->text(),
            'readRules' => $this->faker->boolean(),
            'received' => $this->faker->boolean(),
            'signed' => $this->faker->text(),
            'title' => $this->faker->sentence(),
            'user_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
