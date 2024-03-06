<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Experience;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EmployeeDetailsExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        return [
            'Employee' => new EmployeeExport(),
            'Education' => new EducationExport(),
            'Experience' => new ExperienceExport(),
            'Family' => new FamilyExport()
        ];
    }
}
