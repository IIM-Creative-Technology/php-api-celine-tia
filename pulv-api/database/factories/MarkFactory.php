<?php

namespace Database\Factories;

use App\Models\Mark;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $student = DB::table('students')->select('id')->inRandomOrder()->limit(1)->get();
        $subject = DB::table('subjects')->select('id')->inRandomOrder()->limit(1)->get();
        return [
            'id_student' => $student->first()->id,
            'id_subject' => $subject->first()->id,
            'score' => $this->faker->numberBetween(0, 20),
        ];
    }
}
