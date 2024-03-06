<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Experience;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class ExperienceImport implements ToModel, WithHeadingRow, SkipsOnError
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $employee = Employee::where('email', $row['email'])->first();

        // dd($row);
        if ($employee !== null) {

            if (!isset($row['company'])) {
                return null;
            }

            return new Experience([
                'emp_id' => $employee['id'],
                'company_name' => $row['company'],
                'position' => $row['position'],
                'year_of_exp' => $row['year_of_experience']
            ]);
        }
    }

    public function onError(Throwable $e)
    {
        
    }
}
