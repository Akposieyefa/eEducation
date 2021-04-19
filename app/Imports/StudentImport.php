<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentImport implements ToModel, WithStartRow
{
    public $level_id;

    public function __construct($level_id)
    {
        $this->term_id = $level_id;
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
        $id = 0;
        // TODO: Implement model() method.
        $t=time();
        $user =  User::create([
            'email' =>  $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
        ]);
        $student = Student::create([
            'user_id' => $user->id,
            'student_id' => Helpers::customIDGenerator(new Student, 'student_id', 5, 'STD'),
            'fname' => $row[0],
            'mname' => $row[1],
            'lname' => $row[2],
            'dob' => $this->dob,
            'gender' => 'male',
            'nationality' => 'Nigeria',
            'address' => 'Kaduna State',
            'state_id' => 12,
            'lga_id' => 12,
            'level_id' => $this->level_id,
            'addmited_date' => date("Y-m-d",$t),
            'passport' => $imageHasName
        ]);
        return true;
    }
}
