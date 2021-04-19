<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubjectResultSheet implements FromCollection, WithHeadings
{
    protected $level_id;

    public function __construct($level_id)
    {
        $this->level_id = $level_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  Student::where('level_id', '=', $this->level_id)
            ->get(['student_id','fname','mname','lname']);
    }

    /**
     * @return array|string[]
     * headers
     */
    public function headings(): array
    {
        return [
            'REG NUMBER',
            'FIRST NAME',
            'MIDDLE NAME',
            'LAST NAME',
            'CA SCORE',
            'EXAM SCORE',
        ];
    }
}
