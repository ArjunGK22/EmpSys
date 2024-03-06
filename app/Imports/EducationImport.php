<?php

namespace App\Imports;

use App\Models\Education;
use App\Models\Employee;
use Carbon\Carbon;
use DateTime;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class EducationImport implements ToModel, WithHeadingRow,SkipsOnError
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $employee = Employee::where('email', $row['email'])->first();
        
        if($employee != null ){

            if (!isset($row['degree'])) {
                return null;
            }
            
            return new Education([

                'emp_id' => $employee['id'],
                'degree' => $row['degree'] ,
                'institution' => $row['institution'],
                'completion_year' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['year'])),
                'aggregate' => $row['gpa']
    
                //
            ]);

        }
    }

    public function onError(Throwable $e)
    {
        
    }

}
