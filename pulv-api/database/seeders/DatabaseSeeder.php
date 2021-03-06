<?php

namespace Database\Seeders;

use App\Models\Mark;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();

        DB::table('users')->truncate();
        User::factory(3)->create();

        DB::table('school_classes')->truncate();
        SchoolClass::factory(10)->create();

        DB::table('students')->truncate();
        Student::factory(300)->create();

        DB::table('teachers')->truncate();
        Teacher::factory(10)->create();

        DB::table('subjects')->truncate();
        Subject::factory(15)->create();

        DB::table('marks')->truncate();
        Mark::factory(150)->create();

        Schema::disableForeignKeyConstraints();
        Model::reguard();
    }
}
