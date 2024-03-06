<?php

namespace App\Exports;

use App\Models\Experience;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ExperienceExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Experience::select('emp_id','company_name', 'position', 'year_of_exp')->get();
    }

    public function title(): string{

        return 'Experience';
    }

    public function headings(): array
    {
        return ['emp_id','company_name', 'position', 'year_of_experience'];

    }

}
