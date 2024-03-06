<?php

namespace App\Imports;

use App\Models\Experience;
use App\Models\Family;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EmployeeDetailsImport implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {

        return [
            'Employee' => new EmployeeImport(),
            'Education' => new EducationImport(),
            'Experience' => new ExperienceImport(),
            'Family' => new FamilyImport()
        ];
        
    }
   
}
