<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Result;

class SubjectResultSheet  implements ToModel, WithStartRow
{
    public $term_id;
    public $level_id;
    public $subject_id;

    public function __construct($term_id,$subject_id,$level_id)
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

        return new Result([
            'student_id'     => $row[0],
            'score'    =>  $row[4],
            'term_id' => $this->term_id,
            'subjcet_id' => $this->subject_id,
            'level_id' => $this->level_id
        ]);
    }
}