<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements WithHeadings
{
     /**
     * @return array|string[]
     * headers
     */
    public function headings(): array
    {
        return [
            'FIRST NAME',
            'MIDDLE NAME',
            'LAST NAME'
        ];
    }
}
