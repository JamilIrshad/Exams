<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    protected $model = Exam::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3), // Generates a random name
            'exam_date' => $this->faker->dateTimeBetween('now', '+2 year'), // Exam date in the future
            'category_id' => $this->faker->numberBetween(1, 4), // Random category ID between 1 and 4
            'description' => $this->faker->sentence(10), // Generates a random description
            'price' => $this->faker->randomFloat(2, 10, 100), // Price between 10 and 100
            'image_path' => 'exam'.$this->faker->numberBetween(1, 5).'.jpg', // Random image path
        ];
    }
}
