<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Result  implements ToModel, WithStartRow
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
            'english'    =>  $row[4],
            'maths' =>  $row[5],
            'civic_education'    =>  $row[6],
            'basic_science'    =>  $row[7],
            'basic_tech'    =>  $row[8],
            'business_studies'    =>  $row[9],
            'home_economic'    =>  $row[10],
            'fine_art'    =>  $row[11],
            'social_studies'    =>  $row[12],
            'phe'    =>  $row[13],
            'irs_crs'    =>  $row[14],
            'local_language'    =>  $row[15],
            'arabic' => $row[16],
            'agricultural_science'    =>  $row[17],
            'computer_science'    =>  $row[18],
            'french'    =>  $row[19],
            'intro_tech'    =>  $row[20],
        ]);
    }
}
