<?php

namespace App\Exports;

use App\Models\Family;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class FamilyExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Family::select('emp_id','first_name', 'last_name', 'relationship', 'rel_dob', 'occupation')->get();
    }

    public function title(): string{

        return 'Family';
    }

    public function headings(): array
    {
        return ['emp_id','first_name', 'last_name', 'relationship', 'rel_dob', 'occupation'];

    }
}
