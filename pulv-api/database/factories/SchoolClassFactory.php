<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolClass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'A2',
                'A3',
                'A4',
                'A5'
            ]),
            'school_year' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now +3 years')->format('Y'),
        ];
    }
}
