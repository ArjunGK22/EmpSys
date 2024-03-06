<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeUpdateController extends Controller
{
    //

    public function fetchDetails($id){
        
        // $emp_data = Employee::fetch($id);
        // return view('updateemployee',['$emp_data' => $emp_data ]);
        $employee = Employee::with('families','educations','experiences')->find($id);

        // return $employee;
        return view('admin/editemployee',['employee' => $employee]);

    }

    


}
