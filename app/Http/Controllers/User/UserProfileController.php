<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Family;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function showProfile()
    {

        $user = Employee::find(session('user'));

        return view('user/profile', ['user' => $user]);
    }

    public function edit()
    {

        $user = Employee::find(session('user'));

        return view('user/edit', ['user' => $user]);
    }


    public function update(Request $request)
    {

        // try {
            
            $userData = Employee::find(session('user'));
            
            $request->validate([
                'phone_number' => "required|min:10",
                'email' => "required|email|unique:employees,email,{$userData['id']},id",
                'first_name' => 'required',
                'last_name' => 'required',
            ]);
            

            $userData->first_name = $request->input('first_name');
            $userData->last_name = $request->input('last_name');
            $userData->date_of_birth = $request->input('date_of_birth');
            $userData->gender = $request->input('gender');
            $userData->email = $request->input('email');
            $userData->phone_number = $request->input('phone_number');
            $userData->address = $request->input('address');
            $userData->city = $request->input('city');
            $userData->state = $request->input('state');
            $userData->pincode = $request->input('pincode');

            $userData->save();



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
                            'last_name' => $request->rel_lname[$x],
                            'relationship' => $request->relationship[$x],
                            'rel_dob' => $request->rel_dob[$x],
                            'occupation' => $request->rel_occupation[$x]
                        ];
                        Family::insert($emp_family);
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
            return redirect('profile')->with('success','Updated Profile');
        // } catch (ValidationException $e) {
        //     // Handle validation errors
        //     return response()->json(['success' => false, 'errors' => $e->validator->errors()], 422);
    
        // } catch (Exception $e) {
        //     // Handle other exceptions
        //     return response()->json(['success' => false, 'message' => 'An error occurred.'], 500);
        // }
    }
}
