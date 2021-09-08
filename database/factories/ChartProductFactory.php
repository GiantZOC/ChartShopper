<?php

namespace Database\Factories;

use App\Models\chartproduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChartProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = chartproduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'latitude' => $this->faker->numberBetween(-1000, 1000),
            'longitude' => $this->faker->numberBetween(-1000, 1000)
        ];
    }
}
