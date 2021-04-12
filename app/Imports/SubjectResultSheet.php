<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SubjectResultSheet  implements ToModel, WithStartRow
{
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

        return new BeceResult([
            'student_id'     => $row[0],
            'score'    =>  $row[4]
        ]);
    }
}
