<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $school_years = DB::table('school_classes')->select(['id', 'school_year'])->inRandomOrder()->limit(1)->get();

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'age' => $this->faker->numberBetween($min = 18, $max = 30),
            'first_year' => date('Y', strtotime($school_years[0]->school_year . '-01-01 -5 years')),
            'id_school_year' => $school_years[0]->id,
        ];
    }
}
