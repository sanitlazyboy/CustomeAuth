<?php

namespace Database\Factories;

use App\Models\DataTabel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataTabel>
 */
class DataTabelFactory extends Factory
{
    protected $model = DataTabel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   

    public function definition()
    {
        return [
            'action' => fake()->name(),
            'table_name' => fake()->name(),
        ];
    }
}