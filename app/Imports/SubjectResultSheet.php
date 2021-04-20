<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Result;
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
        $resultCheck = Result::where(['subject_id' => $this->subject_id, 'term_id' => $this->term_id, 'level_id' => $this->level_id])->get();
        if (count($resultCheck) > 0) {
            //dd('fgdfhdfhfdh');
            DB::table('results')->where('student_id', $row['0'])->update([
                'ca_score'    =>  $row[4],
                'exam_score'    =>  $row[5],
            ]);
        } else {
            return new Result([
                'student_id'     => $row[0],
                'ca_score'    =>  $row[4],
                'exam_score'    =>  $row[5],
                'term_id' => $this->term_id,
                'subject_id' => $this->subject_id,
                'level_id' => $this->level_id
            ]);
        }
    }
}
