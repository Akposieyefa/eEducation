<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class SubjectResultSheet  implements ToCollection, WithValidation
{
    public $term_id;
    public $level_id;
    public $subject_id;
    public $session_id;
    public $data;

    use Importable;


    public function __construct($term_id, $subject_id, $level_id, $session_id)
    {
        $this->term_id = $term_id;
        $this->subject_id = $subject_id;
        $this->level_id = $level_id;
        $this->session_id = $session_id;
    }
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [];
    }



    public function collection(Collection $rows)
    {
        $this->data = $rows;
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
        ]);*/

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
    }
}
