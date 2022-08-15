<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $languages = [
            "ar", "en", "ru", "uk", "bg", "pl", "de", "be", "sr", "hr",
            "sk", "cs", "fr", "el", "es", "it", "pt", "ro", "la", "fa",
            "ur", "ga", "sv", "da", "nl", "no", "is"
        ];

        $title = [];
        $content = [];

        for ($i = 0; $i < count($languages); $i++) {
            $language = $languages[$i];
            $title[$language] = $this->faker->sentence(20, FALSE);
            $content[$language] = $this->faker->paragraph(10000, FALSE);
        }

        return [
            "title" => $title,
            "content" => $content
        ];
    }
}
