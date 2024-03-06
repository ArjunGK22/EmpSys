@extends('layouts.master')

@section('content')

<x-modal/>

<h1 class="pt-4">Edit Employee</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/adminDashboard" class="bread-link">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/view" class="bread-link">View Employee</a></li>
        <li class="breadcrumb-item active" aria-current="page" class="bread-link">Update Employee</li>
    </ol>
</nav>
<hr>

<x-flash />

<form action="/update" method="POST">
    @csrf
    <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                    <h4 class="text-center">Step 1/4 - Personal Details</h4>

                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        <input type="hidden" name="emp_id" id="emp_id" value="{{ $employee['id'] }}">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="fname" name="first_name" value="{{$employee['first_name']}}">
                                <x-error prop="first_name" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="lname" name="last_name" value="{{$employee['last_name']}} ">
                                <x-error prop="last_name" />

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label> <span class="text-danger">*</span>
                                <input type="number" class="form-control" id="contact" name="phone_number" value="{{$employee['phone_number']}}">
                                <x-error prop="phone_number" />


                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="uemail" class="form-label">Email Address</label> <span class="text-danger">*</span>
                                <input type="email" class="form-control" id="uemail" name="email" value="{{$employee['email']}}">
                                <x-error prop="email" />

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="address" name="address" value="{{$employee['address']}}">
                                <x-error prop="address" />

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="city" name="city" value="{{$employee['city']}}">
                                <x-error prop="city" />

                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="state" class="form-label">State / Province</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="state" name="state" value="{{$employee['state']}}">
                                <x-error prop="state" />

                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="pincode" class="form-label">Pincode</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="pincode" name="pincode" value="{{$employee['pincode']}}">
                                <x-error prop="pincode" />

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="dob" class="form-label">Gender</label> <span class="text-danger">*</span>
                                <select class="form-select" name="gender" aria-label="Gender Selection">
                                    <option>Select the Gender</option>
                                    <option value="male" {{$employee['gender'] == 'male'? 'selected' : ''}}>Male</option>
                                    <option value="female" {{$employee['gender'] == 'female'? 'selected' : ''}}>Female</option>
                                    <option value="others" {{$employee['gender'] == 'others'? 'selected' : ''}}>Others</option>
                                </select>
                                <x-error prop="gender" />


                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="dob" class="form-label">DOB</label> <span class="text-danger">*</span>
                                <input type="date" class="form-control" id="dob" name="date_of_birth" value="{{$employee['date_of_birth']}}">
                                <x-error prop="date_of_birth" />

                            </div>

                        </div>
                    </div>
                    <hr class="w-25 mx-auto">
                    <h4 class="text-center">Additional Information</h4>
                    <hr class="w-25 mx-auto">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="doj" class="form-label">Date of Joining</label> <span class="text-danger">*</span>
                                <input type="date" class="form-control" id="doj" name="start_date" value="{{$employee['start_date']}}">
                                <x-error prop="start_date" />


                            </div>

                        </div>


                        <div class="col">
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label> <span class="text-danger">*</span>
                                <input type="number" class="form-control" id="salary" name="salary" value="{{$employee['salary']}}">
                                <x-error prop="salary" />

                            </div>
                        </div>



                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="dept" class="form-label">Department</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="dept" name="department" value="{{$employee['department']}}">
                                <x-error prop="department" />

                            </div>


                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="dept" class="form-label">Position</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" id="position" name="position" value="{{$employee['position']}}">
                                <x-error prop="position" />

                            </div>

                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="isAdminCheck" {{$employee['admin'] ? 'checked' : ''}} name="admin">
                        <label class="form-check-label" for="isAdminCheck">
                            <strong> Confirm eligibility for Admin privileges.
                            </strong>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h4 class="text-center">Step 2/4 - Previous Experience Details</h4>

                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <table class="table" id="experience-table">
                        <thead>

                            <tr>
                                <th class="d-none"></th>
                                <th>Company Name</th>
                                <th>Job Title</th>
                                <th>Experience (in years)</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr class="exp-firstrow"></tr>

                            @foreach($employee->experiences as $experience)
                            <tr>
                                <td class="d-none"><input type="hidden" class="form-control" name="exp_id[]" value="{{$experience['id']}}"></td>
                                <td><input type="text" class="form-control" name="company[]" value="{{$experience['company_name']}}"></td>
                                <td><input type="text" class="form-control" name="jobtitle[]" value="{{$experience['position']}}"></td>
                                <td><input type="number" class="form-control" name="exp_year[]" value="{{$experience['year_of_exp']}}"></td>
                                <td><button type="button" class="btn btn-danger delete-confirmation" data-id="{{ $experience['id'] }}" data-route="/deleteExperience/"><i class="bi bi-archive"></i></button></td>

                            </tr>
                            @endforeach



                        </tbody>

                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-secondary addExperience" type="button">+ Add Experience</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h4 class="text-center">Step 3/4 - Education Qualifications</h4>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table" id="education-table">
                        <thead>

                            <tr>
                                <th>Degree</th>
                                <th>Institution</th>
                                <th>Completion Year</th>
                                <th>CGPA / Percentage</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="edu-firstrow"></tr>

                            @foreach($employee->educations as $education)
                            <tr>
                                <td class="d-none"><input type="hidden" class="form-control" name="edu_id[]" value="{{$education['id']}}"></td>
                                <td><input type="text" class="form-control" name="degree[]" value="{{$education['degree']}}"></td>
                                <td><input type="text" class="form-control" name="institution[]" value="{{$education['institution']}}"></td>
                                <td><input type="date" class="form-control" name="completion_year[]" value="{{$education['completion_year']}}"></td>
                                <td><input type="number" class="form-control" name="gpa[]" value="{{$education['aggregate']}}"></td>
                                <td><button type="button" class="btn btn-danger delete-confirmation" data-id="{{ $education['id'] }}" data-route="/deleteEducation/"><i class="bi bi-archive"></i></button></td> 

                            </tr>
                            @endforeach


                        </tbody>

                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-secondary addEducation" type="button">+ Add Education</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h4 class="text-center">Step 4/4 - Family Details</h4>

                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table" id="family-table">
                        <thead>

                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Relationship</th>
                                <th>DOB</th>
                                <th>Occupation</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="rel-firstrow"></tr>
                            @foreach($employee->families as $family)
                            <tr>
                                <td class="d-none"><input type="hidden" class="form-control" name="rel_id[]" value="{{$family['id']}}"></td>
                                <td><input type="text" class="form-control" name="rel_fname[]" value="{{$family['first_name']}}"></td>
                                <td><input type="text" class="form-control" name="rel_lname[]" value="{{$family['last_name']}}"></td>
                                <td>
                                    <select class="form-select" name="relationship[]">
                                        <option value="">--Select Relationship--</option>
                                        <option value="Father" {{$family['relationship'] == 'Father'? 'selected' : ''}}>Father</option>
                                        <option value="Mother" {{$family['relationship'] == 'Mother'? 'selected' : ''}}>Mother</option>
                                        <option value="Sibling" {{$family['relationship'] == 'Sibling'? 'selected' : ''}}>Sibling</option>
                                        <option value="Spouse" {{$family['relationship'] == 'Spouse'? 'selected' : ''}}>Spouse</option>
                                        <option value="Others" {{$family['relationship'] == 'Others'? 'selected' : ''}}>Others</option>

                                    </select>
                                </td>

                                <td><input type="date" class="form-control" name="rel_dob[]" value="{{$family['rel_dob']}}"></td>
                                <td><input type="text" class="form-control" name="rel_occupation[]" value="{{ $family['occupation'] }}"></td>
                                <td><button type="button" class="btn btn-danger delete-confirmation" data-id="{{ $family['id'] }}" data-route="/deleteFamily/"><i class="bi bi-archive"></i></button></td>

                            </tr>
                            @endforeach




                        </tbody>

                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-secondary addFamily" type="button">+ Add Family Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex gap-2">
        <button class="btn btn-success m-3 py-2 w-25" type="submit">Save Changes</button>
    </div>






</form>

@endsection