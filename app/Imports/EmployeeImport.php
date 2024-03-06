<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class EmployeeImport implements ToModel, WithHeadingRow, SkipsOnError
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $userDetails = Employee::where('email', $row['email'])->first();

        // if ($userDetails === null) {
        // dd($row);
        // return new Employee([
        //     'first_name' => $row[0],
        //     'last_name' => $row[1],
        //     'date_of_birth' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]))->toDateString('Y-m-d'),
        //     'gender' => $row[4],
        //     'email' => $row[2],
        //     'password' => bcrypt($row[2]),
        //     'phone_number' => $row[5],
        //     'address' => $row[6],
        //     'city' => $row[7],
        //     'state' => $row[8],
        //     'pincode' => $row[9],
        //     'start_date' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]))->toDateString('Y-m-d') ?? null,
        //     'department' => $row[11],
        //     'position' => $row[12],
        //     'salary' => $row[13]





        //     //
        // ]);


        // }
        if ($userDetails === null) {

            if (!isset($row['first_name'])) {
                return null;
            }

            return new Employee([

                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'date_of_birth' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob']))->toDateString('Y-m-d'),
                'gender' => $row['gender'],
                'email' => $row['email'],
                'password' => bcrypt($row['email']),
                'phone_number' => $row['phone'],
                'address' => $row['address'],
                'city' => $row['city'],
                'state' => $row['state'],
                'pincode' => $row['pincode'],
                'start_date' => \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start_date']))->toDateString('Y-m-d') ?? null,
                'department' => $row['department'],
                'position' => $row['position'],
                'salary' => $row['salary']





                //
            ]);
        }
    }

   public function onError(Throwable $e)
   {
    
   }
}
