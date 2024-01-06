<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Teachers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeachersClasses>
 */
class TeachersClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'teacher_id' =>$this->faker->randomElement(Teachers::pluck('id')),
          'class_id' => $this->faker->randomElement(Classes::pluck('id'))
        ];
    }
}
