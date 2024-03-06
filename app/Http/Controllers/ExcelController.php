<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeDetailsExport;
use App\Imports\EmployeeDetailsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function viewimportUser()
    {

        return view('admin.bulkemployee');
    }

    public function saveExcel(Request $request)
    {

        $request->validate(
            [

                'upload_file' => 'required|file|mimes:xls,xlsx'

            ],
            [
                'excel_file.mimetypes' => 'The uploaded file must be a valid Excel file.',
            ]
        );
        $uploadedFile = $request->file('upload_file');


        Excel::import(new EmployeeDetailsImport(), $uploadedFile, '', \Maatwebsite\Excel\Excel::XLSX);

        return redirect('/importUsers')->with('success', 'Employees Data Uploaded Successfully!');
    }


    public function exportExcel()
    {

        return Excel::download(new EmployeeDetailsExport(), 'Employee_Details.xlsx');
    }
}
