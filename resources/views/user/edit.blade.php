@extends('user.header')

@section('content')
<x-modal/>


<div class="container mt-5">
    <form action="/udpate_employee" method="POST">
        @csrf
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                        <h4 class="text-center">Section 1/3 - Personal Details</h4>

                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <input type="hidden" name="emp_id" id="emp_id" value="{{ $user['id'] }}">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="fname" class="form-label">First Name</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="fname" name="first_name" value="{{$user['first_name']}}">
                                    <x-error prop="first_name" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="lname" class="form-label">Last Name</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="lname" name="last_name" value="{{$user['last_name']}} ">
                                    <x-error prop="last_name" />

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact</label> <span class="text-danger">*</span>
                                    <input type="number" id="contact" class="form-control" name="phone_number" value="{{$user['phone_number']}}" pattern="[0-9]{10}">
                                    <x-error prop="phone_number" />


                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="uemail" class="form-label">Email Address</label> <span class="text-danger">*</span>
                                    <input type="email" class="form-control" id="uemail" name="email" value="{{$user['email']}}">
                                    <x-error prop="email" />

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="address" name="address" value="{{$user['address']}}">
                                    <x-error prop="address" />

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="city" name="city" value="{{$user['city']}}">
                                    <x-error prop="city" />

                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="state" class="form-label">State / Province</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="state" name="state" value="{{$user['state']}}">
                                    <x-error prop="state" />

                                </div>

                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pincode" class="form-label">Pincode</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="{{$user['pincode']}}">
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
                                        <option value="male" {{$user['gender'] == 'male'? 'selected' : ''}}>Male</option>
                                        <option value="female" {{$user['gender'] == 'female'? 'selected' : ''}}>Female</option>
                                        <option value="others" {{$user['gender'] == 'others'? 'selected' : ''}}>Others</option>
                                    </select>
                                    <x-error prop="gender" />


                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">DOB</label> <span class="text-danger">*</span>
                                    <input type="date" class="form-control" id="dob" name="date_of_birth" value="{{$user['date_of_birth']}}">
                                    <x-error prop="date_of_birth" />

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h4 class="text-center">Section 2/3 - Education Qualifications</h4>
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

                                @foreach($user->educations as $education)
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
                        <h4 class="text-center">Section 3/3 - Family Details</h4>

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
                                @foreach($user->families as $family)
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
</div>

@endsection