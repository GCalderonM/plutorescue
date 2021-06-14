<?php

namespace Database\Factories;

use App\Models\Announce;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnounceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announce::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Prueba de anuncio '.$this->faker->randomDigit(),
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement([1, 2, 3]),
            'gender' => $this->faker->randomElement([1, 2]),
            'type' => $this->faker->randomElement([1, 2, 3, 4])
        ];
    }
}
