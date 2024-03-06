<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class EmployeeExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::select('id', 'first_name', 'last_name', 'email', 'date_of_birth', 'gender', 'phone_number', 'address', 'city', 'state', 'pincode', 'start_date', 'department', 'position', 'salary')->get();
    }

    public function title(): string{

        return 'Employee';
    }

    public function headings(): array
    {
        return ['id', 'first_name', 'last_name', 'email', 'dob', 'gender', 'phone', 'address', 'city', 'state', 'pincode', 'start_date', 'department', 'position', 'salary'];

    }
}
