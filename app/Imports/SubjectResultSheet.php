<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class SubjectResultSheet  implements ToModel, WithStartRow
{
    public $term_id;
    public $level_id;
    public $subject_id;

    public function __construct($term_id, $subject_id, $level_id)
    {
        $this->term_id = $term_id;
        $this->subject_id = $subject_id;
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
        $id = 0;
        // TODO: Implement model() method.
        /*return new Result([
            'student_id'     => $row[0],
            'ca_score'    =>  $row[5],
            'exam_score'    =>  $row[6],
            'term_id' => $this->term_id,
            'subject_id' => $this->subject_id,
            'level_id' => $this->level_id
        ]);
        
        $resultCheck = Result::where(['student_id' => $row['0'], 'subject_id' => $this->subject_id, 'term_id' => $this->term_id, 'level_id' => $this->level_id])->get();
            if (count($resultCheck) > 0) {
                //dd('fgdfhdfhfdh');
                DB::table('results')->where('student_id', $row['0'])->update([
                    'ca_score'    =>  $row[5],
                    'exam_score'    =>  $row[6],
                ]);
            } else {
                return new Result([
                    'student_id'     => $row[0],
                    'ca_score'    =>  $row[5],
                    'exam_score'    =>  $row[6],
                    'term_id' => $this->term_id,
                    'subject_id' => $this->subject_id,
                    'level_id' => $this->level_id
                ]);
            }
        
        */

        $student = Student::where(['admission_no' => $row['0']])->get();
        if (count($student) > 0) {
            $student_id = $student[0]['student_id'];
            $resultCheck = Result::where(['student_id' => $student_id, 'subject_id' => $this->subject_id, 'term_id' => $this->term_id, 'level_id' => $this->level_id])->get();
            if (count($resultCheck) > 0) {
                //dd('fgdfhdfhfdh');
                DB::table('results')->where('student_id', $student_id)->update([
                    'ca_score'    =>  $row[1],
                    'exam_score'    =>  $row[2],
                ]);
            } else {
                return new Result([
                    'student_id'     => $student_id,
                    'ca_score'    =>  $row[1],
                    'exam_score'    =>  $row[2],
                    'term_id' => $this->term_id,
                    'subject_id' => $this->subject_id,
                    'level_id' => $this->level_id
                ]);
            }
        } else {
            return 'No Record found for student  ' . $row['0'];
        }
    }
}
