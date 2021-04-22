<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker;
use App\Helpers\Helpers;
use App\Models\Role;

class StudentImport implements ToModel, WithStartRow
{
    public $level_id;

    public function __construct($level_id)
    {
        $this->level_id = $level_id;
    }
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $faker = Faker\Factory::create();
        $id = 0;
        // TODO: Implement model() method.
        $t = time();

        $user =  User::create([
            'email' =>  $row[1],
            'password' => Hash::make($row[1]),
        ]);

        $role = Role::where('name', "Student",)->first();
        $user->roles()->attach($role->id);

        $student = Student::create([
            'user_id' => $user->id,
            'student_id' => Helpers::customIDGenerator(new Student, 'student_id', 5, 'STD'),
            'fname' => $row[0],
            'level_id' => $this->level_id,
            'admission_no' => $row[1]
        ]);

        /*$student = Student::create([
            'user_id' => $user->id,
            'student_id' => Helpers::customIDGenerator(new Student, 'student_id', 5, 'STD'),
            'fname' => $row[0],
            'mname' => $row[1],
            'lname' => $row[2],
            'level_id' => $this->level_id,
            'admission_no' => $row[3]
        ]);*/

        /*$user = User::create([
            'email' =>  $faker->unique()->safeEmail,
            'password' => Hash::make('password'),
        ]);
        $user->student()->create([
            'student_id' => Helpers::customIDGenerator(new Student, 'student_id', 5, 'STD'),
            'fname' => $row[0],
            'mname' => $row[1],
            'lname' => $row[2],
            'dob' => date("Y-m-d", $t),
            'gender' => 'male',
            'nationality' => 'Nigeria',
            'address' => 'Kaduna State',
            'state_id' => 12,
            'lga_id' => 12,
            'level_id' => $this->level_id,
            'addmited_date' => date("Y-m-d", $t),
            'passport' => 'akpos'
        ]);*/
        return $user;
    }
}
