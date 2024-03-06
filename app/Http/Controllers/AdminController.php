<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\employee;
use App\Models\Test;
use App\Models\Experience;
use App\Models\family;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function create(Request $req)
    {
     

            //Inserts data to an employee table
            
            $emp_data = $req->validate([
                'admin' => 'nullable',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'gender' => 'required|string|in:male,female,others',
                'email' => 'required|email|unique:employees,email',
                'password' => 'sometimes',
                'phone_number' => 'required|min:10|max:10',
                'address' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'pincode' => 'required|string|min:6',
                'start_date' => 'required|date',
                'department' => 'required|string',
                'position' => 'required|string',
                'salary' => 'required',
            ]);

            $emp_data['password'] = bcrypt($emp_data['email']);
            // $emp_data = ([

            //     'admin' => true,
            //     'first_name' => $req->fname,
            //     'last_name' => $req->lname,
            //     'date_of_birth' => $req->dob,
            //     'gender' => $req->gender,
            //     'email' => $req->uemail,
            //     'password' => bcrypt($req->uemail),
            //     'phone_number' => $req->contact,
            //     'address' => $req->address,
            //     'city' => $req->city,
            //     'state' => $req->state,
            //     'pincode' => $req->pincode,
            //     'start_date' => $req->doj,
            //     'department' => $req->dept,
            //     'position' => $req->position,
            //     'salary' => $req->salary

            // ]);

            //stores data to table
            $emp = Employee::create($emp_data);

            //fetch the inserted id from employee table
            $id = $emp->id;

            /*Store the Previous Experience */
            $emp_experience = []; //empty array to insert the array of data


            if ($req->company) {

                //for loop to fetch all the data
                for ($x = 0; $x < count($req->company); $x++) {
                    $emp_experience[] = [
                        'emp_id' => $id,
                        'company_name' => $req->company[$x],
                        'position' => $req->jobtitle[$x],
                        'year_of_exp' => $req->exp_year[$x]
                    ];
                }
                Experience::insert($emp_experience);
            }

            //Insert into experience table - for bulk operarion use insert()


            // ddd($req->company);

            /*Store the Education Details */

            // ddd($req->degree[0]);
            if ($req->degree) {

                $emp_education = [];
                //for loop to fetch all the data
                for ($x = 0; $x < count($req->degree); $x++) {
                    $emp_education[] = [
                        'emp_id' => $id,
                        'degree' => $req->degree[$x],
                        'institution' => $req->institution[$x],
                        'completion_year' => $req->completion_year[$x],
                        'aggregate' => $req->gpa[$x]
                    ];
                }


                Education::insert($emp_education);
            }
            /*Store the Family Details */

            if ($req->rel_fname) {

                $emp_family = [];
                //for loop to fetch all the data
                for ($x = 0; $x < count($req->rel_fname); $x++) {
                    $emp_family[] = [
                        'emp_id' => $id,
                        'first_name' => $req->rel_fname[$x],
                        'last_name' => $req->rel_lname[$x],
                        'relationship' => $req->relationship[$x],
                        'rel_dob' => $req->rel_dob[$x],
                        'occupation' => $req->rel_occupation[$x]
                    ];
                }

                // ddd($req->rel_fname[0]);


                Family::insert($emp_family);
            }


            return redirect('/view')->with('success', 'Employee Created Successfully!');
        // } catch (Exception $e) {
        //     return $e;
        // }
    }


    public function fetch()
    {
        $emp_data = Employee::all();
        return view('admin/viewemployee', ['employees' => $emp_data]);
    }

    public function updateEmployee(Request $request)
    {

        //Fetches the existing employee data
        $empData = Employee::find($request->emp_id);

        $request->validate([
            'phone_number' => "required|min:10",
            'email' => "required|email|unique:employees,email,{$empData['id']},id",
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        

        //Updating the fields
        $empData->admin = $request->input('admin') ?? 0;
        $empData->first_name = $request->input('first_name');
        $empData->last_name = $request->input('last_name');
        $empData->date_of_birth = $request->input('date_of_birth');
        $empData->gender = $request->input('gender');
        $empData->email = $request->input('email');
        $empData->phone_number = $request->input('phone_number');
        $empData->address = $request->input('address');
        $empData->city = $request->input('city');
        $empData->state = $request->input('state');
        $empData->pincode = $request->input('pincode');
        $empData->start_date = $request->input('start_date');
        $empData->department = $request->input('department');
        $empData->position = $request->input('position');
        $empData->salary = $request->input('salary');


        //Performing update operation on employee table
        $empData->save();

        /*Store the Previous Experience */
        if ($request->company) {


            // return Experience::findOrFail($request->exp_id[1] ?? null);

            //for loop to fetch all the data
            for ($x = 0; $x < count($request->company); $x++) {

                $exp_id = $request->exp_id[$x] ?? null;
                if ($exp_id) {

                    $exp_data = Experience::find($request->exp_id[$x]);
                    $exp_data->emp_id = $request->emp_id;
                    $exp_data->company_name = $request->company[$x];
                    $exp_data->position = $request->jobtitle[$x];
                    $exp_data->year_of_exp = $request->exp_year[$x];

                    $exp_data->save();
                } else {
                    $emp_experience = [
                        'emp_id' => $request->emp_id,
                        'company_name' => $request->company[$x],
                        'position' => $request->jobtitle[$x],
                        'year_of_exp' => $request->exp_year[$x]
                    ];


                    Experience::insert($emp_experience);
                }
            }
        }
        /*Store the Education Details */
        if ($request->degree) {

            //for loop to fetch all the data
            for ($x = 0; $x < count($request->degree); $x++) {

                $edu_id = $request->edu_id[$x] ?? null;

                if ($edu_id) {

                    $edu_data = Education::find($request->edu_id[$x]);

                    $edu_data->emp_id = $request->emp_id;
                    $edu_data->degree = $request->degree[$x];
                    $edu_data->institution = $request->institution[$x];
                    $edu_data->completion_year = $request->completion_year[$x];
                    $edu_data->aggregate = $request->gpa[$x];

                    $edu_data->save();

                } else {
                    $emp_education = [
                        'emp_id' => $request->emp_id,
                        'degree' => $request->degree[$x],
                        'institution' => $request->institution[$x],
                        'completion_year' => $request->completion_year[$x],
                        'aggregate' => $request->gpa[$x]
                    ];
                    Education::insert($emp_education);
                }
            }
        }

         /*Store the fAMILY Details */
        if ($request->rel_fname) {

            //for loop to fetch all the data
            for ($x = 0; $x < count($request->rel_fname); $x++) {

                $rel_id = $request->rel_id[$x] ?? null;

                if ($rel_id) {

                    $rel_data = Family::find($request->rel_id[$x]);

                    $rel_data->emp_id = $request->emp_id;
                    $rel_data->first_name = $request->rel_fname[$x];
                    $rel_data->last_name = $request->rel_lname[$x];
                    $rel_data->relationship = $request->relationship[$x];
                    $rel_data->rel_dob = $request->rel_dob[$x];
                    $rel_data->occupation = $request->rel_occupation[$x];

                    $rel_data->save();

                } else {
                    $emp_family = [
                        'emp_id' => $request->emp_id,
                        'first_name' => $request->rel_fname[$x],
                        'last_name' => $request->rel_fname[$x],
                        'relationship' => $request->relationship[$x],
                        'rel_dob' => $request->rel_dob[$x],
                        'occupation' => $request->rel_occupation[$x]
                    ];
                    Family::insert($emp_family);
                }
            }
        }

        return redirect('/view')->with('success', 'Employee Updated Successfully!');



    }

    public function fetchDetails($id){
        
        $employee = Employee::with('families','educations','experiences')->find($id);

        // return $employee;
        return view('admin/editemployee',['employee' => $employee]);
    }

    public function deleteEmployee($id){

        $emp = Employee::find($id);

        if($emp)
            $emp->delete();
        
        return redirect('/view')->with('success', 'Employee Deleted Successfully!');

    }
}
