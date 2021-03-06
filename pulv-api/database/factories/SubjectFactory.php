<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = $this->faker->dateTimeBetween('next Monday', '+30 days')->format('Y-m-d');
        $end = $this->faker->dateTimeBetween($start, $start . '+5 days')->format('Y-m-d');

        $teacher = DB::table('teachers')->select('id')->inRandomOrder()->limit(1)->get();
        $school_year = DB::table('school_classes')->select('id')->inRandomOrder()->limit(1)->get();
        return [
            'name' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'date_begin' => $start,
            'date_end' => $end,
            'id_teacher' => $teacher->first()->id,
            'id_school_year' => $school_year->first()->id
        ];
    }
}
