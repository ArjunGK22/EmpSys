<?php

namespace App\Exports;

use App\Models\Education;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class EducationExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Education::select('emp_id', 'degree', 'institution', 'completion_year', 'aggregate')->get();
    }

    public function title(): string{

        return 'Education';
    }

    public function headings(): array
    {
        return ['emp_id', 'degree', 'institution', 'year', 'gpa'];
        ;

    }
}
