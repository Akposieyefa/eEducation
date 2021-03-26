<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Result implements FromCollection, WithHeadings
{
    protected $level_id;
    protected $arm_id;
    public function __construct($level_id,$arm_id)
    {
        $this->level_id = $class_id;
        $this->arm_id = $arm_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  Student::where('level_id', '=', $this->level_id)
            ->where('arm_id', '=', $this->arm_id)
           ->get(['student_id','fname','mname','lname']);
    }

    /**
     * @return array|string[]
     * headers
     */
    public function headings(): array
    {
        return [
            'EXAM NUMBER',
            'FIRST NAME',
            'MIDDLE NAME',
            'LAST NAME',
            'ENGLISH',
            'MATHS',
            'CIVIC EDUCATION',
            'BASIC SCIENCE',
            'BASIC TECH',
            'BUSINESS STUDIES',
            'HOME ECONOMICS',
            'FINE/CREATIVE ART',
            'SOCIAL STUDIES',
            'PHE',
            'IRS/CRS',
            'HAUSA/IGBO/YORUBA',
            'ARABIC',
            'AGRIC SCIENCE',
            'COMPUTER SCIENCE',
            'FRENCH',
            'INTRO TECH',
        ];
    }
}
