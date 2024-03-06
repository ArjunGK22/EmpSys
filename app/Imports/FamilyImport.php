<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Family;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class FamilyImport implements ToModel, WithHeadingRow, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $employee = Employee::where('email', $row['email'])->get()->first();

        if($employee != null){

            if (!isset($row['first_name'])) {
                return null;
            }
            
            return new Family([

            'emp_id'=>$employee['id'],
            'first_name'=>$row['first_name'],
            'last_name'=>$row['last_name'],
            'relationship'=>$row['relationship'],
            'rel_dob'=>\Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['rel_dob']))->toDateString('Y-m-d') ?? null,
            'occupation'=>$row['occupation'],

            //
        ]);
        }
    }

    public function onError(Throwable $e)
    {
        
    }
}
